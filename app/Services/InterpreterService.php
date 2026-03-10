<?php
declare(strict_types=1);

namespace App\Services;

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Listeners\ANTLRErrorListener;
use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Antlr\Antlr4\Runtime\Recognizer;
use Antlr\Antlr4\Runtime\Parser;
use Antlr\Antlr4\Runtime\Atn\ATNConfigSet;
use Antlr\Antlr4\Runtime\Dfa\DFA;
use Antlr\Antlr4\Runtime\Utils\BitSet;

use ANTLR\OLCLexer;
use ANTLR\OLCParser;
use App\Visitors\SemanticVisitor;
use App\Visitors\InterpreterVisitor;
use App\Services\SymbolTable;
use App\Services\ErrorManager;

/**
 * Captura errores léxicos y sintácticos de ANTLR con las firmas exactas
 * de la interfaz ANTLRErrorListener del runtime instalado.
 */
class OLCErrorListener implements ANTLRErrorListener
{
    private ErrorManager $errors;
    private string       $tipo;   // 'Léxico' | 'Sintáctico'

    public function __construct(ErrorManager $errors, string $tipo)
    {
        $this->errors = $errors;
        $this->tipo   = $tipo;
    }

    public function syntaxError(
        Recognizer $recognizer,
        ?object $offendingSymbol,
        int $line,
        int $charPositionInLine,
        string $msg,
        ?RecognitionException $exception,
    ): void {
        $this->errors->add(
            $this->tipo,
            $this->humanize($msg),
            $line,
            $charPositionInLine + 1
        );
    }

    public function reportAmbiguity(
        Parser $recognizer,
        DFA $dfa,
        int $startIndex,
        int $stopIndex,
        bool $exact,
        ?BitSet $ambigAlts,
        ATNConfigSet $configs,
    ): void {}

    public function reportAttemptingFullContext(
        Parser $recognizer,
        DFA $dfa,
        int $startIndex,
        int $stopIndex,
        ?BitSet $conflictingAlts,
        ATNConfigSet $configs,
    ): void {}

    public function reportContextSensitivity(
        Parser $recognizer,
        DFA $dfa,
        int $startIndex,
        int $stopIndex,
        int $prediction,
        ATNConfigSet $configs,
    ): void {}

    private function humanize(string $msg): string
    {
        if (preg_match("/token recognition error at: '(.+)'/u", $msg, $m)) {
            return "Símbolo no reconocido: {$m[1]}";
        }
        if (preg_match("/missing (.+) at (.+)/", $msg, $m)) {
            return "Se esperaba {$m[1]} (encontrado: {$m[2]})";
        }
        if (preg_match("/extraneous input '(.+)' expecting (.+)/", $msg, $m)) {
            return "Token inesperado '{$m[1]}', se esperaba: {$m[2]}";
        }
        if (str_contains($msg, 'no viable alternative')) {
            return 'Construcción sintáctica no válida en esta posición';
        }
        return $msg;
    }
}


class InterpreterService
{
    public function run($code)
    {
        $errors = new ErrorManager();

        // ── LEXER ────────────────────────────────────────────────────
        $input = InputStream::fromString($code);
        $lexer = new OLCLexer($input);
        $lexer->removeErrorListeners();
        $lexer->addErrorListener(new OLCErrorListener($errors, 'Léxico'));

        // ── PARSER ───────────────────────────────────────────────────
        $tokens = new CommonTokenStream($lexer);
        $parser = new OLCParser($tokens);
        $parser->removeErrorListeners();
        $parser->addErrorListener(new OLCErrorListener($errors, 'Sintáctico'));

        $tree = $parser->program();

        $symbolTable = new SymbolTable();

        // ── ANÁLISIS SEMÁNTICO ───────────────────────────────────────
        $semantic = new SemanticVisitor($symbolTable, $errors);
        try {
            $semantic->visit($tree);
        } catch (\Throwable $e) {
            $errors->add('Semántico', 'Error interno en análisis semántico: ' . $e->getMessage(), 0, 0);
        }

        // ── INTERPRETACIÓN ───────────────────────────────────────────
        $interpreter = new InterpreterVisitor($symbolTable, $errors);
        // Marcar las líneas con errores sintácticos para que el visitor
        // no ejecute bloques huérfanos generados por error recovery de ANTLR
        $interpreter->markOrphanBlockLines($errors->getAll());
        $interpreter->executeMain($tree);

        // ── TOKENS ───────────────────────────────────────────────────
        $tokens->fill();

        // ── COMBINAR TODOS LOS ERRORES ───────────────────────────────
        $todosLosErrores = array_merge(
            $errors->getAll(),
            $interpreter->getRuntimeErrors()
        );

        usort($todosLosErrores, fn($a, $b) => ($a['linea'] ?? 0) <=> ($b['linea'] ?? 0));

        // ── SALIDA CON RESUMEN DE ERRORES ─────────────────────────────
        $output = $interpreter->getOutput();

        if (count($todosLosErrores) > 0) {
            $nLex  = count(array_filter($todosLosErrores, fn($e) => $e['tipo'] === 'Léxico'));
            $nSin  = count(array_filter($todosLosErrores, fn($e) => $e['tipo'] === 'Sintáctico'));
            $nSem  = count(array_filter($todosLosErrores, fn($e) => $e['tipo'] === 'Semántico'));
            $total = count($todosLosErrores);

            $output .= "\n──────────────────────────────────────────\n";
            $output .= "⚠  {$total} error(es) detectado(s):\n";
            if ($nLex) $output .= "   • Léxicos:     {$nLex}\n";
            if ($nSin) $output .= "   • Sintácticos: {$nSin}\n";
            if ($nSem) $output .= "   • Semánticos:  {$nSem}\n";
            $output .= "   → Ver reporte completo para detalles.\n";
            $output .= "──────────────────────────────────────────\n";
        }

        return [
            "output"  => $output,
            "symbols" => $symbolTable->getAll(),
            "errors"  => $todosLosErrores,
            "tokens"  => $tokens->getTokens(0, -1),
        ];
    }
}
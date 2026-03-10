<?php
namespace App\Visitors;
use ANTLR\OLCBaseVisitor;
use App\Services\SymbolTable;
use App\Services\ErrorManager;

class SemanticVisitor extends OLCBaseVisitor
{
    private $symbols;
    private $errors;
    private $scope = "global";

    public function __construct($symbols, $errors)
    {
        $this->symbols = $symbols;
        $this->errors  = $errors;
    }

    // ----------------------------------------------------------------
    // FUNCIONES
    // ----------------------------------------------------------------
    public function visitFunctionDcl($ctx)
    {
        if (!$ctx) return null;
        $name = $ctx->IDENTIFIER()->getText();
        $this->symbols->add(
            $name, "funcion", "global", null,
            $ctx->start->getLine(),
            $ctx->start->getCharPositionInLine()
        );
        $prev        = $this->scope;
        $this->scope = $name;
        $this->visitChildren($ctx);
        $this->scope = $prev;
        return null;
    }

    // ----------------------------------------------------------------
    // var x tipo = expr
    // ----------------------------------------------------------------
    public function visitVarDcl($ctx)
    {
        if (!$ctx) return null;
        $ids  = $ctx->id_list()->IDENTIFIER();
        $type = $ctx->type() ? $ctx->type()->getText() : 'unknown';

        foreach ($ids as $id) {
            $name = $id->getText();
            $line = $id->getSymbol()->getLine();
            $col  = $id->getSymbol()->getCharPositionInLine();

            if ($this->symbols->exists($name, $this->scope)) {
                $this->errors->add(
                    "Semántico",
                    "Variable '$name' ya declarada en ámbito '{$this->scope}'",
                    $line, $col
                );
            }
            $this->symbols->add($name, $type, $this->scope, null, $line, $col);
        }
        return null;
    }

    // ----------------------------------------------------------------
    // x := expr  (short var declaration)
    // ----------------------------------------------------------------
    public function visitShortVarDcl($ctx)
    {
        if (!$ctx) return null;
        $ids = $ctx->id_list()->IDENTIFIER();

        foreach ($ids as $id) {
            $name = $id->getText();
            $line = $id->getSymbol()->getLine();
            $col  = $id->getSymbol()->getCharPositionInLine();

            if ($this->symbols->exists($name, $this->scope)) {
                $this->errors->add(
                    "Semántico",
                    "Variable '$name' ya declarada en ámbito '{$this->scope}'",
                    $line, $col
                );
            }
            // Tipo se marca como 'inferred' — el intérprete sabrá el tipo real
            $this->symbols->add($name, 'inferred', $this->scope, null, $line, $col);
        }
        // Verificar identificadores usados en las expresiones del lado derecho
        $this->visitChildren($ctx);
        return null;
    }

    // ----------------------------------------------------------------
    // const x tipo = expr
    // ----------------------------------------------------------------
    public function visitConstDcl($ctx)
    {
        if (!$ctx) return null;
        $name = $ctx->IDENTIFIER()->getText();
        $type = $ctx->type() ? $ctx->type()->getText() : 'inferred';
        $line = $ctx->start->getLine();
        $col  = $ctx->start->getCharPositionInLine();

        if ($this->symbols->exists($name, $this->scope)) {
            $this->errors->add(
                "Semántico",
                "Constante '$name' ya declarada en ámbito '{$this->scope}'",
                $line, $col
            );
        }
        $this->symbols->add($name, $type, $this->scope, null, $line, $col);
        $this->visitChildren($ctx);
        return null;
    }

    // ----------------------------------------------------------------
    // Verificar uso de identificadores no declarados
    // Se verifica en primaryExpr cuando es solo un IDENTIFIER (no función ni array)
    // ----------------------------------------------------------------
    public function visitPrimaryExpr($ctx)
    {
        if (!$ctx) return null;

        // Solo nos interesa el caso: un IDENTIFIER puro (sin '(' ni '[' a la derecha)
        if ($ctx->IDENTIFIER() && $ctx->getChildCount() === 1) {
            $name = $ctx->IDENTIFIER()->getText();
            $line = $ctx->start->getLine();
            $col  = $ctx->start->getCharPositionInLine();

            if (!$this->isDeclared($name)) {
                $this->errors->add(
                    "Semántico",
                    "Variable '$name' no declarada",
                    $line, $col
                );
            }
        }

        $this->visitChildren($ctx);
        return null;
    }

    // ----------------------------------------------------------------
    // HELPERS
    // ----------------------------------------------------------------

    /**
     * Busca si $name está declarado en el scope actual o en el global.
     * Incluye funciones built-in y palabras reservadas que no pasan por symbols.
     */
    private function isDeclared(string $name): bool
    {
        // Palabras reservadas / built-ins que no se declaran explícitamente
        $builtins = ['true', 'false', 'nil', 'len', 'now', 'substr', 'typeOf'];
        if (in_array($name, $builtins)) return true;

        // Buscar en scope actual y global
        foreach ([$this->scope, 'global'] as $s) {
            if ($this->symbols->existsAnyScope($name, $s)) return true;
        }
        return false;
    }
}
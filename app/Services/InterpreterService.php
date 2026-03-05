<?php

namespace App\Services;

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;

use ANTLR\OLCLexer;
use ANTLR\OLCParser;

use App\Visitors\SemanticVisitor;
use App\Visitors\InterpreterVisitor;

use App\Services\SymbolTable;
use App\Services\ErrorManager;

class InterpreterService
{

    public function run($code)
    {

        $input = InputStream::fromString($code);

        $lexer = new OLCLexer($input);

        $tokens = new CommonTokenStream($lexer);

        $parser = new OLCParser($tokens);

        $tree = $parser->program();

        $symbolTable = new SymbolTable();

        $errors = new ErrorManager();

        // -----------------------------
        // ANALISIS SEMANTICO
        // -----------------------------

        $semantic = new SemanticVisitor($symbolTable, $errors);
        $semantic->visit($tree);

        // -----------------------------
        // INTERPRETACION
        // -----------------------------

        $interpreter = new InterpreterVisitor($symbolTable);

        //$interpreter->visit($tree);

        $interpreter->executeMain($tree);

        // -----------------------------
        // TOKENS
        // -----------------------------

        $tokens->fill();

        return [
            "output" => $interpreter->getOutput(),
            "symbols" => $symbolTable->getAll(),
            "errors" => $errors->getAll(),
            "tokens" => $tokens->getTokens(0,-1)
        ];
    }

}
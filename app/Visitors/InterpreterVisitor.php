<?php

namespace App\Visitors;

use ANTLR\OLCBaseVisitor;

class InterpreterVisitor extends OLCBaseVisitor
{

    private $output = "";
    private $variables = [];
    private $symbolTable;

    public function __construct($symbolTable)
    {
        $this->symbolTable = $symbolTable;
    }

    public function getOutput()
    {
        return $this->output;
    }

    /*
    |--------------------------------------------------------------------------
    | Ejecutar función main
    |--------------------------------------------------------------------------
    */

    public function executeMain($tree)
    {
        $this->visit($tree);
    }

    /*
    |--------------------------------------------------------------------------
    | Funciones
    |--------------------------------------------------------------------------
    */

    public function visitFunctionDcl($ctx)
    {
        $name = $ctx->IDENTIFIER()->getText();

        if ($name == "main") {
            $this->visit($ctx->block());
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Variables
    |--------------------------------------------------------------------------
    */

    public function visitVarDcl($ctx)
    {

        $ids = $ctx->id_list()->IDENTIFIER();

        foreach ($ids as $index => $idToken) {

            $id = $idToken->getText();

            if ($ctx->exp_list()) {

                $value = $this->visit($ctx->exp_list()->expression($index));

                $this->variables[$id] = $value;

            } else {

                $this->variables[$id] = null;
            }
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | fmt.Println
    |--------------------------------------------------------------------------
    */

    public function visitFmtPrintlnCall($ctx)
    {

        $values = [];

        if ($ctx->exp_list()) {

            foreach ($ctx->exp_list()->expression() as $exp) {

                $values[] = $this->visit($exp);
            }
        }

        $this->output .= implode(" ", $values) . "\n";

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Expresiones
    |--------------------------------------------------------------------------
    */

    public function visitExpression($ctx)
    {
        return $this->visit($ctx->logicalOrExpr());
    }

    /*
    |--------------------------------------------------------------------------
    | Operaciones aritméticas
    |--------------------------------------------------------------------------
    */

    public function visitAdditiveExpr($ctx)
    {

        $result = $this->visit($ctx->multiplicativeExpr(0));

        for ($i = 1; $i < count($ctx->multiplicativeExpr()); $i++) {

            $right = $this->visit($ctx->multiplicativeExpr($i));

            $op = $ctx->getChild(($i * 2) - 1)->getText();

            if ($op == "+") {
                $result += $right;
            }

            if ($op == "-") {
                $result -= $right;
            }
        }

        return $result;
    }

    public function visitMultiplicativeExpr($ctx)
    {

        $result = $this->visit($ctx->unaryExpr(0));

        for ($i = 1; $i < count($ctx->unaryExpr()); $i++) {

            $right = $this->visit($ctx->unaryExpr($i));

            $op = $ctx->getChild(($i * 2) - 1)->getText();

            if ($op == "*") {
                $result *= $right;
            }

            if ($op == "/") {
                $result /= $right;
            }
        }

        return $result;
    }

    /*
    |--------------------------------------------------------------------------
    | Valores primarios
    |--------------------------------------------------------------------------
    */

    public function visitPrimaryExpr($ctx)
    {

        if ($ctx->IDENTIFIER()) {

            $id = $ctx->IDENTIFIER()->getText();

            if (isset($this->variables[$id])) {
                return $this->variables[$id];
            }

            return null;
        }

        if ($ctx->literal()) {

            $text = $ctx->literal()->getText();

            if (is_numeric($text)) {
                return intval($text);
            }

            return trim($text, '"');
        }

        if ($ctx->expression()) {
            return $this->visit($ctx->expression());
        }

        return $this->visitChildren($ctx);
    }

}
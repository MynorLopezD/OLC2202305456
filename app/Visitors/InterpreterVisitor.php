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
    |---------------------------------------------------
    | ENTRY POINT
    |---------------------------------------------------
    */

    public function executeMain($tree)
    {
        // print($tree);
        // Asegurarnos de que iniciamos desde el nodo correcto.
        // Si $tree ya es un nodo "program", visitProgram($tree) funciona.
        // Si no, simplemente delegamos a visit($tree) que ya maneja el parse tree.
        if (method_exists($tree, 'declaration')) {
            $this->visit($tree);
        } else {
            // Por si acaso: intentar con visitProgram si el root es otro tipo
            $this->visitProgram($tree);
        }
    }

    /*
    |---------------------------------------------------
    | PROGRAM
    |---------------------------------------------------
    */

    public function visitProgram($ctx)
    {
        foreach ($ctx->declaration() as $decl) {
            $this->visit($decl);
        }
    }

    /*
    |---------------------------------------------------
    | FUNCTIONS
    |---------------------------------------------------
    */

    public function visitFunctionDcl($ctx)
    {
        $name = $ctx->IDENTIFIER()->getText();

        if ($name == "main") {
            // Ejecutar el bloque de la función main
            $this->visit($ctx->block());
        }
    }

    public function visitDeclaration($ctx)
    {
        return $this->visitChildren($ctx);
    }

    /*
    |---------------------------------------------------
    | BLOCK
    |---------------------------------------------------
    */

    public function visitBlock($ctx)
    {
        foreach ($ctx->declaration() as $decl) {
            $this->visit($decl);
        }
    }

    public function visitEqualityExpr($ctx)
    {
        $result = $this->visit($ctx->relationalExpr(0));

        for ($i = 1; $i < count($ctx->relationalExpr()); $i++) {
            $right = $this->visit($ctx->relationalExpr($i));
            $op = $ctx->getChild(($i * 2) - 1)->getText();

            if ($op == '==') $result = $result == $right;
            if ($op == '!=') $result = $result != $right;
        }

        return $result;
    }

    public function visitRelationalExpr($ctx)
    {
        $result = $this->visit($ctx->additiveExpr(0));

        for ($i = 1; $i < count($ctx->additiveExpr()); $i++) {
            $right = $this->visit($ctx->additiveExpr($i));
            $op = $ctx->getChild(($i * 2) - 1)->getText();

            if ($op == '>')  $result = $result > $right;
            if ($op == '>=') $result = $result >= $right;
            if ($op == '<')  $result = $result < $right;
            if ($op == '<=') $result = $result <= $right;
        }

        return $result;
    }

    /*
    |---------------------------------------------------
    | VARIABLES
    |---------------------------------------------------
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
    }

    /*
    |---------------------------------------------------
    | SHORT VAR
    |---------------------------------------------------
    */

    public function visitShortVarDcl($ctx)
    {

        $ids = $ctx->id_list()->IDENTIFIER();

        foreach ($ids as $index => $idToken) {

            $id = $idToken->getText();

            $value = $this->visit($ctx->exp_list()->expression($index));

            $this->variables[$id] = $value;
        }
    }

    /*
    |---------------------------------------------------
    | PRINTLN
    |---------------------------------------------------
    */

    public function visitFmtPrintlnCall($ctx)
    {

        // Debug removido: ya no imprime mensajes extra
        $values = [];

        if ($ctx->exp_list()) {

            foreach ($ctx->exp_list()->expression() as $exp) {

                $values[] = $this->visit($exp);
            }
        }

        // Acumula la salida en output
        $this->output .= implode(" ", $values) . "\n";
    }

    /*
    |---------------------------------------------------
    | EXPRESSIONS
    |---------------------------------------------------
    */

    public function visitExpression($ctx)
    {
        return $this->visit($ctx->logicalOrExpr());
    }

    public function visitLogicalOrExpr($ctx)
    {

        $result = $this->visit($ctx->logicalAndExpr(0));

        for ($i = 1; $i < count($ctx->logicalAndExpr()); $i++) {

            $right = $this->visit($ctx->logicalAndExpr($i));

            $result = $result || $right;
        }

        return $result;
    }

    public function visitLogicalAndExpr($ctx)
    {

        $result = $this->visit($ctx->equalityExpr(0));

        for ($i = 1; $i < count($ctx->equalityExpr()); $i++) {

            $right = $this->visit($ctx->equalityExpr($i));

            $result = $result && $right;
        }

        return $result;
    }

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

            if ($op == "%") {
                $result %= $right;
            }
        }

        return $result;
    }

    public function visitUnaryExpr($ctx)
    {

        if ($ctx->getChildCount() == 2) {

            $op = $ctx->getChild(0)->getText();

            $value = $this->visit($ctx->unaryExpr());

            if ($op == "-") {
                return -$value;
            }

            if ($op == "!") {
                return !$value;
            }

            return $value;
        }

        return $this->visit($ctx->primaryExpr());
    }

    /*
    |---------------------------------------------------
    | PRIMARY
    |---------------------------------------------------
    */

    public function visitExprStmt($ctx)
    {
        return $this->visit($ctx->expression());
    }

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
            return $this->visit($ctx->literal());
        }

        if ($ctx->expression()) {
            return $this->visit($ctx->expression());
        }

        if ($ctx->fmtPrintlnCall()) {
            return $this->visit($ctx->fmtPrintlnCall());
        }

        return null;
    }

    /*
    |---------------------------------------------------
    | LITERALS
    |---------------------------------------------------
    */

    public function visitLiteral($ctx)
    {

        if ($ctx->INT_LITERAL()) {
            return intval($ctx->getText());
        }

        if ($ctx->FLOAT_LITERAL()) {
            return floatval($ctx->getText());
        }

        if ($ctx->STRING_LITERAL()) {
            return trim($ctx->getText(), '"');
        }

        if ($ctx->TRUE()) {
            return true;
        }

        if ($ctx->FALSE()) {
            return false;
        }

        return null;
    }

}

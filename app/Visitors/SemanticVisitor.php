<?php

namespace App\Visitors;

use ANTLR\OLCBaseVisitor;
use App\Services\SymbolTable;
use App\Services\ErrorManager;

class SemanticVisitor extends OLCBaseVisitor
{

    private $symbols;
    private $errors;
    private $scope="global";

    public function __construct($symbols,$errors)
    {
        $this->symbols=$symbols;
        $this->errors=$errors;
    }

    public function visitFunctionDcl($ctx)
    {
        $name=$ctx->IDENTIFIER()->getText();

        $this->symbols->add(
            $name,
            "funcion",
            "global",
            null,
            $ctx->start->getLine(),
            $ctx->start->getCharPositionInLine()
        );

        $prev=$this->scope;
        $this->scope=$name;

        parent::visitFunctionDcl($ctx);

        $this->scope=$prev;
    }

    public function visitVarDcl($ctx)
    {

        $ids=$ctx->id_list()->IDENTIFIER();
        $type=$ctx->type()->getText();

        foreach($ids as $id)
        {

            $name=$id->getText();

            if($this->symbols->exists($name,$this->scope))
            {
                $this->errors->add(
                    "Semántico",
                    "Variable '$name' ya declarada",
                    $id->getSymbol()->getLine(),
                    $id->getSymbol()->getCharPositionInLine()
                );
            }

            $this->symbols->add(
                $name,
                $type,
                $this->scope,
                null,
                $id->getSymbol()->getLine(),
                $id->getSymbol()->getCharPositionInLine()
            );
        }

        return null;
    }
}
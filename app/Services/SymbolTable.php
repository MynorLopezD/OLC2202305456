<?php

namespace App\Services;

class SymbolTable
{
    private $symbols = [];

    public function add($id, $type, $scope, $value, $line, $column)
    {
        $this->symbols[] = [
            "id"=>$id,
            "type"=>$type,
            "scope"=>$scope,
            "value"=>$value,
            "line"=>$line,
            "column"=>$column
        ];
    }

    public function exists($id,$scope)
    {
        foreach($this->symbols as $sym)
        {
            if($sym["id"]==$id && $sym["scope"]==$scope)
                return true;
        }

        return false;
    }

    public function getAll()
    {
        return $this->symbols;
    }
}
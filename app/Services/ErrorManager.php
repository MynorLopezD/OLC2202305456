<?php

namespace App\Services;

class ErrorManager
{
    public $errors = [];

    public function add($type,$description,$line,$column)
    {
        $this->errors[]=[
            "tipo"=>$type,
            "descripcion"=>$description,
            "linea"=>$line,
            "columna"=>$column
        ];
    }

    public function getAll()
    {
        return $this->errors;
    }
}
<?php
namespace App\Services;

class SymbolTable
{
    private $symbols = [];

    public function add($id, $type, $scope, $value, $line, $column)
    {
        $this->symbols[] = [
            "id"     => $id,
            "type"   => $type,
            "scope"  => $scope,
            "value"  => $value,
            "line"   => $line,
            "column" => $column,
        ];
    }

    /**
     * Verifica si $id ya existe exactamente en $scope.
     */
    public function exists($id, $scope): bool
    {
        foreach ($this->symbols as $sym) {
            if ($sym["id"] === $id && $sym["scope"] === $scope) {
                return true;
            }
        }
        return false;
    }

    /**
     * Verifica si $id existe en $scope O en 'global'.
     * Usado por el SemanticVisitor para verificar uso de variables no declaradas.
     */
    public function existsAnyScope($id, $scope): bool
    {
        foreach ($this->symbols as $sym) {
            if ($sym["id"] === $id && ($sym["scope"] === $scope || $sym["scope"] === 'global')) {
                return true;
            }
        }
        return false;
    }

    public function getAll(): array
    {
        return $this->symbols;
    }

    /**
     * Referencia directa al array para que el intérprete actualice
     * los valores en tiempo de ejecución y el reporte los muestre.
     */
    public function &getRef(): array
    {
        return $this->symbols;
    }
}
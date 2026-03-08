<?php

namespace App\Visitors;

use ANTLR\OLCBaseVisitor;

class InterpreterVisitor extends OLCBaseVisitor
{

    private $output = "";

    /*
    | Variables globales del scope actual.
    | Se usa un stack de scopes para manejar funciones y bloques.
    */
    private $scopeStack = [];

    /*
    | Almacena las funciones definidas: nombre => ctx del nodo functionDcl
    */
    private $functions = [];

    private $symbolTable;

    /*
    | Señales de control de flujo
    */
    private $breakSignal    = false;
    private $continueSignal = false;
    private $returnSignal   = false;
    private $returnValue    = null;

    public function __construct($symbolTable)
    {
        $this->symbolTable = $symbolTable;
        // Scope global inicial
        $this->scopeStack[] = [];
    }

    public function getOutput()
    {
        return $this->output;
    }

    /*
    |---------------------------------------------------
    | HELPERS DE SCOPE
    |---------------------------------------------------
    */

    private function pushScope()
    {
        $this->scopeStack[] = [];
    }

    private function popScope()
    {
        array_pop($this->scopeStack);
    }

    /**
     * Obtiene el valor de una variable buscando desde el scope más interno
     * hacia el más externo (closure-like lookup).
     */
    private function getVar($name)
    {
        for ($i = count($this->scopeStack) - 1; $i >= 0; $i--) {
            if (array_key_exists($name, $this->scopeStack[$i])) {
                return $this->scopeStack[$i][$name];
            }
        }
        return null;
    }

    /**
     * Asigna una variable en el scope más interno donde ya exista,
     * o en el scope actual si no existe en ninguno.
     */
    private function setVar($name, $value)
    {
        for ($i = count($this->scopeStack) - 1; $i >= 0; $i--) {
            if (array_key_exists($name, $this->scopeStack[$i])) {
                $this->scopeStack[$i][$name] = $value;
                return;
            }
        }
        // Si no existe en ningún scope, se declara en el actual
        $top = count($this->scopeStack) - 1;
        $this->scopeStack[$top][$name] = $value;
    }

    /**
     * Declara una variable en el scope actual (el más interno).
     */
    private function declareVar($name, $value)
    {
        $top = count($this->scopeStack) - 1;
        $this->scopeStack[$top][$name] = $value;
    }

    /*
    |---------------------------------------------------
    | ENTRY POINT
    |---------------------------------------------------
    */

    public function executeMain($tree)
    {
        if (method_exists($tree, 'declaration')) {
            $this->visit($tree);
        } else {
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
        // Primera pasada: registrar todas las funciones
        foreach ($ctx->declaration() as $decl) {
            $child = $decl->getChild(0);
            if ($child && method_exists($child, 'IDENTIFIER') && method_exists($child, 'block')) {
                $name = $child->IDENTIFIER()->getText();
                $this->functions[$name] = $child;
            }
        }

        // Segunda pasada: ejecutar (visitFunctionDcl se encarga de solo correr main)
        foreach ($ctx->declaration() as $decl) {
            $this->visit($decl);
        }
    }

    /*
    |---------------------------------------------------
    | DECLARATION
    |---------------------------------------------------
    */

    public function visitDeclaration($ctx)
    {
        return $this->visitChildren($ctx);
    }

    /*
    |---------------------------------------------------
    | FUNCTIONS — DECLARACION
    |---------------------------------------------------
    */

    public function visitFunctionDcl($ctx)
    {
        $name = $ctx->IDENTIFIER()->getText();

        // Registrar siempre la función para poder llamarla
        $this->functions[$name] = $ctx;

        // Solo ejecutar main automáticamente
        if ($name === "main") {
            $this->pushScope();
            $this->visit($ctx->block());
            $this->popScope();
        }
    }

    /*
    |---------------------------------------------------
    | FUNCTIONS — LLAMADA
    | Se invoca desde visitPrimaryExpr cuando detecta
    | primaryExpr '(' exp_list? ')'
    |---------------------------------------------------
    */

    private function callFunction($name, $argValues, $argRefs = [])
    {
        if (!isset($this->functions[$name])) {
            return null;
        }

        $funcCtx = $this->functions[$name];

        $this->pushScope();

        // Vincular parámetros con argumentos
        if ($funcCtx->params()) {
            $params = $funcCtx->params()->param();
            foreach ($params as $i => $param) {
                $paramName  = $param->IDENTIFIER()->getText();
                $paramValue = isset($argValues[$i]) ? $argValues[$i] : null;
                $this->declareVar($paramName, $paramValue);
            }
        }

        // Ejecutar el bloque
        $this->visit($funcCtx->block());

        // Writeback de punteros antes de hacer popScope
        if (!empty($argRefs) && $funcCtx->params()) {
            $params = $funcCtx->params()->param();
            foreach ($params as $i => $param) {
                $paramName = $param->IDENTIFIER()->getText();
                $paramType = $param->type()->getText();
                if (str_starts_with($paramType, '*') && isset($argRefs[$i])) {
                    // Leer el valor modificado dentro de la función
                    $modifiedVal = $this->getVar($paramName);
                    // Salir del scope de la función
                    $this->popScope();
                    // Escribir de vuelta en el scope del llamador
                    $this->setVar($argRefs[$i], $modifiedVal);

                    $result = $this->returnValue;
                    $this->returnSignal = false;
                    $this->returnValue  = null;
                    return $result;
                }
            }
        }

        $this->popScope();

        $result = $this->returnValue;
        $this->returnSignal = false;
        $this->returnValue  = null;

        return $result;
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

            // Propagar señales de control de flujo
            if ($this->breakSignal || $this->continueSignal || $this->returnSignal) {
                break;
            }
        }
    }

    /*
    |---------------------------------------------------
    | VARIABLES
    |---------------------------------------------------
    */

    public function visitVarDcl($ctx)
    {
        $ids  = $ctx->id_list()->IDENTIFIER();
        $type = $ctx->type() ? $ctx->type()->getText() : null;

        foreach ($ids as $index => $idToken) {

            $id = $idToken->getText();

            if ($ctx->exp_list()) {
                $value = $this->visit($ctx->exp_list()->expression($index));
                $value = $this->castToType($value, $type);
            } else {
                $value = $this->defaultValue($type);
            }

            $this->declareVar($id, $value);
        }
    }

    /*
    |---------------------------------------------------
    | SHORT VAR
    |---------------------------------------------------
    */

    public function visitShortVarDcl($ctx)
    {
        $ids  = $ctx->id_list()->IDENTIFIER();
        $exps = $ctx->exp_list()->expression();

        // Caso especial: múltiple asignación desde función con múltiple retorno
        // e.g.  sum, res := operacionesBasicas(50, 20)
        if (count($ids) > 1 && count($exps) === 1) {
            $value = $this->visit($exps[0]);
            if (is_array($value) && !$this->isSlice($value)) {
                foreach ($ids as $i => $idToken) {
                    $this->declareVar($idToken->getText(), $value[$i] ?? null);
                }
                return;
            }
        }

        // Caso normal: una expresión por identificador
        foreach ($ids as $index => $idToken) {
            $id  = $idToken->getText();
            $exp = $exps[$index] ?? null;

            if ($exp === null) {
                $this->declareVar($id, null);
                continue;
            }

            $value = $this->visit($exp);

            // Si el visitor devolvió null pero el texto parece un slice []tipo{...}
            if ($value === null) {
                $parsed = $this->tryParseSliceLiteral($exp->getText());
                if ($parsed !== null) $value = $parsed;
            }

            $this->declareVar($id, $value);
        }
    }

    /**
     * Detecta si un array PHP es un slice (indexado desde 0 con valores escalares/arrays)
     * vs un array de múltiple retorno.
     * Heurística: si tiene solo 2 elementos y ambos son escalares, podría ser múltiple retorno.
     * No es perfecto pero funciona para los casos del intérprete.
     */
    private function isSlice($arr)
    {
        // Si tiene más de 2 elementos siempre es un slice
        if (count($arr) > 2) return true;
        // Si algún elemento es array, es slice de arrays (matriz)
        foreach ($arr as $v) {
            if (is_array($v)) return true;
        }
        // Con 1-2 elementos escalares, asumimos múltiple retorno (caso más común)
        return false;
    }

    /*
    |---------------------------------------------------
    | CONSTANTES
    |---------------------------------------------------
    */

    public function visitConstDcl($ctx)
    {
        $id    = $ctx->IDENTIFIER()->getText();
        $type  = $ctx->type() ? $ctx->type()->getText() : null;
        $value = $this->visit($ctx->expression());
        $value = $this->castToType($value, $type);

        $this->declareVar($id, $value);
    }

    /*
    |---------------------------------------------------
    | ASIGNACIONES
    |---------------------------------------------------
    */

    public function visitAssignmentStmt($ctx)
    {
        // Caso: primaryExpr ('++' | '--')
        if ($ctx->getChildCount() == 2) {
            $op       = $ctx->getChild(1)->getText();
            $primary  = $ctx->primaryExpr();
            $name     = $primary->getText();
            $curr     = $this->getVar($name);

            if ($op === '++') $this->setVar($name, $curr + 1);
            else              $this->setVar($name, $curr - 1);
            return;
        }

        // Caso: primaryExpr assignOp expression
        $primaryCtx = $ctx->primaryExpr();
        $op         = $ctx->assignOp()->getText();
        $value      = $this->visit($ctx->expression());

        // Detectar acceso indexado: puede ser arr[i] o mat[i][j] (anidado)
        $indices = [];
        $current = $primaryCtx;

        // Desempacar cadena de accesos: mat[i][j] => nombre=mat, indices=[i,j]
        while ($current->getChildCount() === 4 && $current->getChild(1)->getText() === '[') {
            array_unshift($indices, (int)$this->visit($current->expression()));
            $current = $current->primaryExpr();
        }

        if (!empty($indices)) {
            // $current ahora es el nodo hoja con el nombre de la variable
            $varName = $current->getText();
            $arr     = $this->getVar($varName);

            // Navegar hasta el penúltimo nivel y asignar
            $ref = &$arr;
            for ($i = 0; $i < count($indices) - 1; $i++) {
                $ref = &$ref[$indices[$i]];
            }
            $lastIdx     = $indices[count($indices) - 1];
            $curr        = $ref[$lastIdx] ?? 0;
            $ref[$lastIdx] = $this->applyAssignOp($curr, $op, $value);

            $this->setVar($varName, $arr);
            return;
        }

        // Variable simple
        $name = $primaryCtx->getText();
        $curr = $this->getVar($name);
        $this->setVar($name, $this->applyAssignOp($curr, $op, $value));
    }

    private function applyAssignOp($curr, $op, $value)
    {
        switch ($op) {
            case '=':  return $value;
            case '+=': return $curr + $value;
            case '-=': return $curr - $value;
            case '*=': return $curr * $value;
            case '/=': return $curr != 0 ? intdiv($curr, $value) : 0;
            default:   return $value;
        }
    }

    /*
    |---------------------------------------------------
    | IF
    |---------------------------------------------------
    */

    public function visitIfStmt($ctx)
    {
        $this->pushScope();

        // Simple stmt opcional (e.g. temp := x * 2)
        if ($ctx->simpleStmt()) {
            $this->visit($ctx->simpleStmt());
        }

        $condition = $this->visit($ctx->expression());

        if ($condition) {
            // Primer block = rama true
            $this->visit($ctx->block(0));
        } else {
            // Rama else
            if ($ctx->ifStmt()) {
                // else if
                $this->visit($ctx->ifStmt());
            } elseif ($ctx->block(1)) {
                // else { }
                $this->visit($ctx->block(1));
            }
        }

        $this->popScope();
    }

    /*
    |---------------------------------------------------
    | SWITCH
    |---------------------------------------------------
    */

    public function visitSwitchStmt($ctx)
    {
        $switchVal = $this->visit($ctx->expression());
        $matched   = false;

        foreach ($ctx->caseClause() as $case) {
            foreach ($case->exp_list()->expression() as $exp) {
                $caseVal = $this->visit($exp);
                if ($caseVal == $switchVal) {
                    $matched = true;
                    $this->pushScope();
                    foreach ($case->declaration() as $decl) {
                        $this->visit($decl);
                        if ($this->breakSignal || $this->returnSignal) break;
                    }
                    $this->popScope();
                    $this->breakSignal = false;
                    break 2; // Solo el primer case que coincide
                }
            }
        }

        if (!$matched && $ctx->defaultClause()) {
            $this->pushScope();
            foreach ($ctx->defaultClause()->declaration() as $decl) {
                $this->visit($decl);
                if ($this->breakSignal || $this->returnSignal) break;
            }
            $this->popScope();
            $this->breakSignal = false;
        }
    }

    /*
    |---------------------------------------------------
    | FOR
    |---------------------------------------------------
    */

    public function visitForStmt($ctx)
    {
        $this->pushScope();

        // FOR forClause block
        if ($ctx->forClause()) {
            $clause = $ctx->forClause();

            /*
            | La gramática es: (simpleStmt)? ';' (expression)? ';' (simpleStmt)?
            | ANTLR indexa solo los nodos presentes, no las posiciones del texto.
            | Por eso usamos getText() del forClause para detectar cuántos simpleStmt hay
            | y en qué posición están, usando los hijos directos del forClause.
            */
            $initStmt = null;
            $postStmt = null;
            $allSimple = $clause->simpleStmt();  // array de todos los simpleStmt presentes

            // Detectar si el init está presente: el primer hijo del forClause es un simpleStmt
            // (no un ';'). Si el primer hijo texto es ';', no hay init.
            $firstChild = $clause->getChild(0);
            $hasInit = ($firstChild !== null && $firstChild->getText() !== ';');

            if ($hasInit && count($allSimple) > 0) {
                $initStmt = $allSimple[0];
            }

            // El post es el último simpleStmt, solo si el último hijo antes de EOF es simpleStmt
            $lastChild = $clause->getChild($clause->getChildCount() - 1);
            $hasPost = ($lastChild !== null && $lastChild->getText() !== ';');

            if ($hasPost) {
                $postStmt = $allSimple[count($allSimple) - 1];
                // Si init y post son el mismo nodo (solo hay 1 simpleStmt pero hay post)
                // verificamos que no sea el mismo que el init
                if ($hasInit && count($allSimple) === 1) {
                    $postStmt = null; // solo había init, no post
                }
            }

            // Ejecutar init
            if ($initStmt !== null) {
                $this->visit($initStmt);
            }

            while (true) {
                // Condición
                if ($clause->expression()) {
                    $cond = $this->visit($clause->expression());
                    if (!$cond) break;
                }

                $this->visit($ctx->block());

                if ($this->breakSignal) {
                    $this->breakSignal = false;
                    break;
                }
                if ($this->continueSignal) {
                    $this->continueSignal = false;
                    // continua al post igualmente
                }
                if ($this->returnSignal) break;

                // Post
                if ($postStmt !== null) {
                    $this->visit($postStmt);
                }
            }

        // FOR expression block (while)
        } elseif ($ctx->expression()) {
            while (true) {
                $cond = $this->visit($ctx->expression());
                if (!$cond) break;

                $this->visit($ctx->block());

                if ($this->breakSignal) {
                    $this->breakSignal = false;
                    break;
                }
                if ($this->continueSignal) {
                    $this->continueSignal = false;
                    continue;
                }
                if ($this->returnSignal) break;
            }

        // FOR block (loop infinito)
        } else {
            while (true) {
                $this->visit($ctx->block());

                if ($this->breakSignal) {
                    $this->breakSignal = false;
                    break;
                }
                if ($this->continueSignal) {
                    $this->continueSignal = false;
                    continue;
                }
                if ($this->returnSignal) break;
            }
        }

        $this->popScope();
    }

    /*
    |---------------------------------------------------
    | CONTROL DE FLUJO
    |---------------------------------------------------
    */

    public function visitBreakStmt($ctx)
    {
        $this->breakSignal = true;
    }

    public function visitContinueStmt($ctx)
    {
        $this->continueSignal = true;
    }

    public function visitReturnStmt($ctx)
    {
        if ($ctx->exp_list()) {
            $exps = $ctx->exp_list()->expression();
            if (count($exps) === 1) {
                $this->returnValue = $this->visit($exps[0]);
            } else {
                // Múltiple retorno: devolver array indexado
                $values = [];
                foreach ($exps as $exp) {
                    $values[] = $this->visit($exp);
                }
                $this->returnValue = $values;
            }
        } else {
            $this->returnValue = null;
        }

        $this->returnSignal = true;
    }

    /*
    |---------------------------------------------------
    | PRINTLN
    |---------------------------------------------------
    */

    public function visitFmtPrintlnCall($ctx)
    {
        $values = [];

        if ($ctx->exp_list()) {
            foreach ($ctx->exp_list()->expression() as $exp) {
                $val = $this->visit($exp);
                $values[] = $this->formatValue($val);
            }
        }

        $this->output .= implode(" ", $values) . "\n"; // sin cambios
    }

    /*
    |---------------------------------------------------
    | BUILT-IN FUNCTIONS
    |---------------------------------------------------
    */

    public function visitBuiltinCall($ctx)
    {
        $first = $ctx->getChild(0)->getText();

        // len(expr)
        if ($first === 'len') {
            $val = $this->visit($ctx->expression(0));
            if (is_array($val))  return count($val);
            if (is_string($val)) return strlen($val);
            return 0;
        }

        // now()
        if ($first === 'now') {
            return date('Y-m-d H:i:s');
        }

        // substr(str, start, length)
        if ($first === 'substr') {
            $str    = $this->visit($ctx->expression(0));
            $start  = $this->visit($ctx->expression(1));
            $length = $this->visit($ctx->expression(2));
            return substr((string)$str, (int)$start, (int)$length);
        }

        // typeOf(expr)
        if ($first === 'typeOf') {
            $val = $this->visit($ctx->expression(0));
            return $this->typeOf($val);
        }

        return null;
    }

    /*
    |---------------------------------------------------
    | EXPRESSIONS
    |---------------------------------------------------
    */

    public function visitExprStmt($ctx)
    {
        return $this->visit($ctx->expression());
    }

    public function visitExpression($ctx)
    {
        return $this->visit($ctx->logicalOrExpr());
    }

    public function visitLogicalOrExpr($ctx)
    {
        $result = $this->visit($ctx->logicalAndExpr(0));

        for ($i = 1; $i < count($ctx->logicalAndExpr()); $i++) {
            $right  = $this->visit($ctx->logicalAndExpr($i));
            $result = $result || $right;
        }

        return $result;
    }

    public function visitLogicalAndExpr($ctx)
    {
        $result = $this->visit($ctx->equalityExpr(0));

        for ($i = 1; $i < count($ctx->equalityExpr()); $i++) {
            $right  = $this->visit($ctx->equalityExpr($i));
            $result = $result && $right;
        }

        return $result;
    }

    public function visitEqualityExpr($ctx)
    {
        $result = $this->visit($ctx->relationalExpr(0));

        for ($i = 1; $i < count($ctx->relationalExpr()); $i++) {
            $right = $this->visit($ctx->relationalExpr($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();

            // nil comparado con cualquier cosa devuelve nil (<nil>)
            if (is_null($result) || is_null($right)) {
                $result = null;
                continue;
            }

            if ($op === '==') $result = ($result == $right);
            if ($op === '!=') $result = ($result != $right);
        }

        return $result;
    }

    public function visitRelationalExpr($ctx)
    {
        $result = $this->visit($ctx->additiveExpr(0));

        for ($i = 1; $i < count($ctx->additiveExpr()); $i++) {
            $right = $this->visit($ctx->additiveExpr($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();

            if ($op === '>')  $result = ($result > $right);
            if ($op === '>=') $result = ($result >= $right);
            if ($op === '<')  $result = ($result < $right);
            if ($op === '<=') $result = ($result <= $right);
        }

        return $result;
    }

    public function visitAdditiveExpr($ctx)
    {
        $result = $this->visit($ctx->multiplicativeExpr(0));

        for ($i = 1; $i < count($ctx->multiplicativeExpr()); $i++) {
            $right = $this->visit($ctx->multiplicativeExpr($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();

            if ($op === '+') $result += $right;
            if ($op === '-') $result -= $right;
        }

        return $result;
    }

    public function visitMultiplicativeExpr($ctx)
    {
        $result = $this->visit($ctx->unaryExpr(0));

        for ($i = 1; $i < count($ctx->unaryExpr()); $i++) {
            $right = $this->visit($ctx->unaryExpr($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();

            if ($op === '*') $result *= $right;
            if ($op === '/') $result = $right != 0 ? intdiv((int)$result, (int)$right) : 0;
            if ($op === '%') $result %= $right;
        }

        return $result;
    }

    public function visitUnaryExpr($ctx)
    {
        if ($ctx->getChildCount() == 2) {
            $op    = $ctx->getChild(0)->getText();
            $value = $this->visit($ctx->unaryExpr());

            if ($op === '-') return -$value;
            if ($op === '!') return !$value;

            return $value;
        }

        return $this->visit($ctx->primaryExpr());
    }

    /*
    |---------------------------------------------------
    | PRIMARY EXPR
    |---------------------------------------------------
    */

    public function visitPrimaryExpr($ctx)
    {
        $childCount = $ctx->getChildCount();

        // Acceso a arreglo: primaryExpr '[' expression ']'
        // La gramática lo produce como (primaryExpr '[' expression ']')
        if ($childCount === 4 && $ctx->getChild(1)->getText() === '[') {
            $arr   = $this->visit($ctx->primaryExpr());
            $index = (int)$this->visit($ctx->expression());
            if (is_array($arr) && array_key_exists($index, $arr)) {
                return $arr[$index];
            }
            // índice fuera de rango => valor por defecto es 0
            return 0;
        }

        // Llamada a función: primaryExpr '(' exp_list? ')'
        if ($childCount >= 3 && $ctx->getChild(1)->getText() === '(') {
            $name = $ctx->primaryExpr()->getText();
            $args    = [];
            $argRefs = []; // nombres de variables pasadas por referencia (&var)

            if ($ctx->exp_list()) {
                foreach ($ctx->exp_list()->expression() as $i => $exp) {
                    $expText = $exp->getText();
                    // Detectar paso por referencia: &varName
                    if (str_starts_with($expText, '&')) {
                        $varName    = substr($expText, 1);
                        $args[]     = $this->getVar($varName); // pasar el valor actual
                        $argRefs[$i] = $varName;               // guardar nombre para writeback
                    } else {
                        $args[] = $this->visit($exp);
                    }
                }
            }
            return $this->callFunction($name, $args, $argRefs);
        }

        // fmt.Println(...)
        if ($ctx->fmtPrintlnCall()) {
            return $this->visit($ctx->fmtPrintlnCall());
        }

        // Built-in call
        if ($ctx->builtinCall()) {
            return $this->visit($ctx->builtinCall());
        }

        // Array literal  — tiene que ir ANTES de literal e IDENTIFIER
        if ($ctx->arrayLiteral()) {
            return $this->visit($ctx->arrayLiteral());
        }

        // Literal
        if ($ctx->literal()) {
            return $this->visit($ctx->literal());
        }

        // Identificador
        if ($ctx->IDENTIFIER()) {
            $id = $ctx->IDENTIFIER()->getText();
            return $this->getVar($id);
        }

        // Expresión entre paréntesis
        if ($ctx->expression()) {
            return $this->visit($ctx->expression());
        }

        // NIL
        if ($ctx->NIL()) {
            return null;
        }

        return null;
    }

    /*
    |---------------------------------------------------
    | SLICE LITERAL HELPER
    | Parsea manualmente []tipo{v1,v2,...} cuando la gramática
    | no lo reconoce como arrayLiteral por falta de tamaño.
    |---------------------------------------------------
    */
    private function tryParseSliceLiteral($text)
    {
        // Detectar patrón []tipo{...}  o [N]tipo{...}
        if (!preg_match('/^\[(\d*)\](\w+)\{(.*)\}$/s', trim($text), $m)) {
            return null;
        }
        $inner = trim($m[3]);
        if ($inner === '') return [];

        // Separar elementos por coma (simplificado, funciona para literales planos)
        $parts = array_map('trim', explode(',', $inner));
        $result = [];
        foreach ($parts as $part) {
            if ($part === '') continue;
            if (is_numeric($part) && strpos($part, '.') !== false) {
                $result[] = floatval($part);
            } elseif (is_numeric($part)) {
                $result[] = intval($part);
            } elseif ($part === 'true') {
                $result[] = true;
            } elseif ($part === 'false') {
                $result[] = false;
            } else {
                $result[] = trim($part, '"\'');
            }
        }
        return $result;
    }

    public function visitArrayLiteral($ctx)
    {
        $elements = [];

        if ($ctx->elementList()) {
            foreach ($ctx->elementList()->element() as $el) {
                if ($el->arrayLiteral()) {
                    // Fila con tipo explícito: [2]int32{1,0}
                    $elements[] = $this->visit($el->arrayLiteral());
                } elseif ($el->getChildCount() >= 2 && $el->getChild(0)->getText() === '{') {
                    // Fila inline sin tipo: {1, 0} — alternativa '{' elementList '}'
                    $row = [];
                    if (method_exists($el, 'elementList') && $el->elementList()) {
                        foreach ($el->elementList()->element() as $inner) {
                            $row[] = $this->visit($inner->expression());
                        }
                    }
                    $elements[] = $row;
                } else {
                    $elements[] = $this->visit($el->expression());
                }
            }
        }

        return $elements;
    }

    /*
    |---------------------------------------------------
    | LITERALS
    |---------------------------------------------------
    */

    public function visitLiteral($ctx)
    {
        if ($ctx->INT_LITERAL())    return intval($ctx->getText());
        if ($ctx->FLOAT_LITERAL())  return floatval($ctx->getText());
        if ($ctx->STRING_LITERAL()) {
            $raw = substr($ctx->getText(), 1, -1); // quitar comillas
            // Procesar secuencias de escape
            return str_replace(
                ['\\n', '\\t', '\\r', '\\"', '\\\\'],
                ["\n",  "\t",  "\r",  '"',   "\\"],
                $raw
            );
        }
        if ($ctx->RUNE_LITERAL()) {
            $inner = substr($ctx->getText(), 1, -1);
            if (strlen($inner) >= 2 && $inner[0] === '\\') {
                switch ($inner[1]) {
                    case 'n':  return 10;
                    case 't':  return 9;
                    case 'r':  return 13;
                    case '0':  return 0;
                    case '\\': return 92;
                    case '\'': return 39;
                    default:   return ord($inner[1]);
                }
            }
            return ord($inner[0]);
        }
        if ($ctx->TRUE())           return true;
        if ($ctx->FALSE())          return false;

        return null;
    }

    /*
    |---------------------------------------------------
    | HELPERS
    |---------------------------------------------------
    */

    /**
     * Castea un valor PHP al tipo OLC correspondiente.
     */
    private function castToType($value, $type)
    {
        if ($type === null) return $value;

        switch ($type) {
            case 'int32':   return intval($value);
            case 'float32': return floatval($value);
            case 'bool':    return (bool)$value;
            case 'string':  return (string)$value;
            case 'rune':    return is_string($value) ? $value[0] : chr((int)$value);
            default:        return $value; // arrays u otros tipos compuestos
        }
    }

    /**
     * Valor por defecto segun el tipo.
     * Soporta tipos simples y arrays como [5]int32 o [3][3]int32.
     */
    private function defaultValue($type)
    {
        if ($type === null) return null;

        // Tipo array: [N]innerType  (e.g. [5]int32, [3][3]int32)
        if (preg_match('/^\[(\d+)\](.+)$/', $type, $m)) {
            $size      = (int)$m[1];
            $innerType = $m[2];
            $arr = [];
            for ($i = 0; $i < $size; $i++) {
                $arr[$i] = $this->defaultValue($innerType);
            }
            return $arr;
        }

        switch ($type) {
            case 'int32':   return 0;
            case 'float32': return 0.0;
            case 'bool':    return false;
            case 'string':  return "";
            case 'rune':    return 0;  // rune por defecto es el código 0, no el char nulo
            default:        return null;
        }
    }

    /**
     * Devuelve el nombre del tipo OLC de un valor PHP.
     */
    private function typeOf($value)
    {
        if (is_int($value))   return 'int32';
        if (is_float($value)) return 'float32';
        if (is_bool($value))  return 'bool';
        if (is_string($value) && strlen($value) === 1) return 'rune';
        if (is_string($value)) return 'string';
        if (is_array($value))  return 'array';
        return 'nil';
    }

    /**
     * Formatea un valor para mostrarlo en fmt.Println.
     */
    private function formatValue($val)
    {
        if (is_bool($val))  return $val ? 'true' : 'false';
        if (is_null($val))  return '<nil>';
        if (is_array($val)) return '[' . implode(' ', array_map([$this, 'formatValue'], $val)) . ']';
        return (string)$val;
    }
}
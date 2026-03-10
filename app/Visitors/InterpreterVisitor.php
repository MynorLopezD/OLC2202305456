<?php
namespace App\Visitors;
use ANTLR\OLCBaseVisitor;

class InterpreterVisitor extends OLCBaseVisitor
{
    private $output        = "";
    private $scopeStack    = [];
    private $functions     = [];
    private $symbolTable;
    private $errorManager;          // ← nuevo: para consultar errores sintácticos

    private $breakSignal    = false;
    private $continueSignal = false;
    private $returnSignal   = false;
    private $returnValue    = null;

    private $runtimeErrors = [];

    /**
     * @param $symbolTable  SymbolTable
     * @param $errorManager App\Services\ErrorManager|null
     */
    public function __construct($symbolTable, $errorManager = null)
    {
        $this->symbolTable  = $symbolTable;
        $this->errorManager = $errorManager;
        $this->scopeStack[] = [];
    }

    public function getOutput():        string { return $this->output; }
    public function getRuntimeErrors(): array  { return $this->runtimeErrors; }

    // ----------------------------------------------------------------
    // safeVisit
    // ----------------------------------------------------------------
    private function safeVisit($ctx, $fallback = null)
    {
        if ($ctx === null) return $fallback;
        try {
            return $this->visit($ctx);
        } catch (\Throwable $e) {
            $this->runtimeErrors[] = [
                'tipo'        => 'Semántico',
                'descripcion' => 'Error en ejecución: ' . $e->getMessage(),
                'linea'       => 0,
                'columna'     => 0,
            ];
            return $fallback;
        }
    }

    /**
     * Devuelve true si el ErrorManager ya registró un error sintáctico
     * en la línea indicada (±1 línea de tolerancia).
     */
    private function hasSyntaxErrorAt(int $line): bool
    {
        if (!$this->errorManager) return false;
        foreach ($this->errorManager->getAll() as $err) {
            if ($err['tipo'] === 'Sintáctico' && abs(($err['linea'] ?? 0) - $line) <= 1) {
                return true;
            }
        }
        return false;
    }

    // ----------------------------------------------------------------
    // SCOPE
    // ----------------------------------------------------------------
    private function pushScope(): void { $this->scopeStack[] = []; }
    private function popScope():  void { array_pop($this->scopeStack); }

    private function getVar($name)
    {
        for ($i = count($this->scopeStack) - 1; $i >= 0; $i--) {
            if (array_key_exists($name, $this->scopeStack[$i]))
                return $this->scopeStack[$i][$name]['value'];
        }
        return null;
    }

    private function getVarType($name)
    {
        for ($i = count($this->scopeStack) - 1; $i >= 0; $i--) {
            if (array_key_exists($name, $this->scopeStack[$i]))
                return $this->scopeStack[$i][$name]['type'] ?? null;
        }
        return null;
    }

    private function setVar($name, $value): void
    {
        for ($i = count($this->scopeStack) - 1; $i >= 0; $i--) {
            if (array_key_exists($name, $this->scopeStack[$i])) {
                $this->scopeStack[$i][$name]['value'] = $value;
                return;
            }
        }
        $top = count($this->scopeStack) - 1;
        $this->scopeStack[$top][$name] = ['value' => $value, 'type' => null];
    }

    private function declareVar($name, $value, $type = null): void
    {
        $top = count($this->scopeStack) - 1;
        $this->scopeStack[$top][$name] = ['value' => $value, 'type' => $type];
    }

    private function updateSymbolValue(string $name, $value): void
    {
        $symbols = &$this->symbolTable->getRef();
        for ($i = count($symbols) - 1; $i >= 0; $i--) {
            if ($symbols[$i]['id'] === $name) {
                $symbols[$i]['value'] = $this->formatValue($value);
                break;
            }
        }
    }

    // ----------------------------------------------------------------
    // ENTRY POINT
    // ----------------------------------------------------------------
    public function executeMain($tree): void
    {
        if ($tree === null) return;
        try {
            $this->visit($tree);
        } catch (\Throwable $e) {
            $this->runtimeErrors[] = [
                'tipo'        => 'Semántico',
                'descripcion' => 'Error fatal: ' . $e->getMessage(),
                'linea'       => 0,
                'columna'     => 0,
            ];
        }
    }

    // ----------------------------------------------------------------
    // PROGRAM
    // ----------------------------------------------------------------
    public function visitProgram($ctx): void
    {
        if (!$ctx) return;
        foreach ($ctx->declaration() as $decl) {
            if (!$decl) continue;
            $child = $decl->getChild(0);
            if ($child && method_exists($child, 'IDENTIFIER') && method_exists($child, 'block')) {
                try { $this->functions[$child->IDENTIFIER()->getText()] = $child; }
                catch (\Throwable $e) {}
            }
        }
        foreach ($ctx->declaration() as $decl) {
            $this->safeVisit($decl);
        }
    }

    public function visitDeclaration($ctx) { return $this->visitChildren($ctx); }

    // ----------------------------------------------------------------
    // FUNCTIONS
    // ----------------------------------------------------------------
    public function visitFunctionDcl($ctx): void
    {
        if (!$ctx) return;
        $name = $ctx->IDENTIFIER()->getText();
        $this->functions[$name] = $ctx;
        if ($name === 'main') {
            $this->pushScope();
            $this->safeVisit($ctx->block());
            $this->popScope();
        }
    }

    private function callFunction($name, $argValues, $argRefs = [])
    {
        if (!isset($this->functions[$name])) return null;
        $funcCtx = $this->functions[$name];
        $this->pushScope();

        if ($funcCtx->params()) {
            foreach ($funcCtx->params()->param() as $i => $param) {
                $this->declareVar($param->IDENTIFIER()->getText(), $argValues[$i] ?? null);
            }
        }

        $this->safeVisit($funcCtx->block());

        if (!empty($argRefs) && $funcCtx->params()) {
            foreach ($funcCtx->params()->param() as $i => $param) {
                $paramName = $param->IDENTIFIER()->getText();
                $paramType = $param->type()->getText();
                if (str_starts_with($paramType, '*') && isset($argRefs[$i])) {
                    $modifiedVal = $this->getVar($paramName);
                    $this->popScope();
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

    // ----------------------------------------------------------------
    // BLOCK
    // ----------------------------------------------------------------
    public function visitBlock($ctx): void
    {
        if (!$ctx) return;
        foreach ($ctx->declaration() as $decl) {
            if (!$decl) continue;
            $this->safeVisit($decl);
            if ($this->breakSignal || $this->continueSignal || $this->returnSignal) break;
        }
    }

    // ----------------------------------------------------------------
    // VARIABLES
    // ----------------------------------------------------------------
    public function visitVarDcl($ctx): void
    {
        if (!$ctx) return;
        $ids  = $ctx->id_list()->IDENTIFIER();
        $type = $ctx->type() ? $ctx->type()->getText() : null;

        foreach ($ids as $index => $idToken) {
            $id = $idToken->getText();
            if ($ctx->exp_list()) {
                $expNode = $ctx->exp_list()->expression($index);
                $value   = $this->safeVisit($expNode);
                $value   = $this->castToType($value, $type);
            } else {
                $value = $this->defaultValue($type);
            }
            $this->declareVar($id, $value, $type);
            $this->updateSymbolValue($id, $value);
        }
    }

    public function visitShortVarDcl($ctx): void
    {
        if (!$ctx) return;
        $ids  = $ctx->id_list()->IDENTIFIER();
        $exps = $ctx->exp_list()->expression();

        if (count($ids) > 1 && count($exps) === 1) {
            $value = $this->safeVisit($exps[0]);
            if (is_array($value) && !$this->isSlice($value)) {
                foreach ($ids as $i => $idToken) {
                    $v = $value[$i] ?? null;
                    $this->declareVar($idToken->getText(), $v, $this->inferType($v));
                    $this->updateSymbolValue($idToken->getText(), $v);
                }
                return;
            }
        }

        foreach ($ids as $index => $idToken) {
            $id  = $idToken->getText();
            $exp = $exps[$index] ?? null;
            if ($exp === null) { $this->declareVar($id, null); continue; }

            $value = $this->safeVisit($exp);
            if ($value === null) {
                $parsed = $this->tryParseSliceLiteral($exp->getText());
                if ($parsed !== null) $value = $parsed;
            }
            $type = $this->inferTypeFromExpr($exp, $value);
            $this->declareVar($id, $value, $type);
            $this->updateSymbolValue($id, $value);
        }
    }

    private function isSlice($arr): bool
    {
        if (count($arr) > 2) return true;
        foreach ($arr as $v) { if (is_array($v)) return true; }
        return false;
    }

    public function visitConstDcl($ctx): void
    {
        if (!$ctx) return;
        $id    = $ctx->IDENTIFIER()->getText();
        $type  = $ctx->type() ? $ctx->type()->getText() : null;
        $value = $this->castToType($this->safeVisit($ctx->expression()), $type);
        $this->declareVar($id, $value, $type);
        $this->updateSymbolValue($id, $value);
    }

    // ----------------------------------------------------------------
    // ASSIGNMENTS
    // ----------------------------------------------------------------
    public function visitAssignmentStmt($ctx): void
    {
        if (!$ctx) return;

        if ($ctx->getChildCount() == 2) {
            $op     = $ctx->getChild(1)->getText();
            $name   = $ctx->primaryExpr()->getText();
            $curr   = $this->getVar($name);
            $newVal = ($op === '++') ? $curr + 1 : $curr - 1;
            $this->setVar($name, $newVal);
            $this->updateSymbolValue($name, $newVal);
            return;
        }

        $primaryCtx = $ctx->primaryExpr();
        if (!$primaryCtx) return;
        $op    = $ctx->assignOp()->getText();
        $value = $this->safeVisit($ctx->expression());

        $indices = [];
        $current = $primaryCtx;
        while ($current && $current->getChildCount() === 4 && $current->getChild(1)->getText() === '[') {
            array_unshift($indices, (int)$this->safeVisit($current->expression(), 0));
            $current = $current->primaryExpr();
        }

        if (!empty($indices)) {
            $varName = $current ? $current->getText() : '';
            $arr     = $this->getVar($varName);
            if (!is_array($arr)) return;
            $ref = &$arr;
            for ($i = 0; $i < count($indices) - 1; $i++) $ref = &$ref[$indices[$i]];
            $lastIdx       = $indices[count($indices) - 1];
            $ref[$lastIdx] = $this->applyAssignOp($ref[$lastIdx] ?? 0, $op, $value);
            $this->setVar($varName, $arr);
            $this->updateSymbolValue($varName, $arr);
            return;
        }

        $name   = $primaryCtx->getText();
        $curr   = $this->getVar($name);
        $newVal = $this->applyAssignOp($curr, $op, $value);
        $this->setVar($name, $newVal);
        $this->updateSymbolValue($name, $newVal);
    }

    private function applyAssignOp($curr, $op, $value)
    {
        return match($op) {
            '='  => $value,
            '+=' => $curr + $value,
            '-=' => $curr - $value,
            '*=' => $curr * $value,
            '/=' => ($value != 0) ? intdiv((int)$curr, (int)$value) : 0,
            default => $value,
        };
    }

    // ----------------------------------------------------------------
    // IF — si hay error sintáctico en esa línea, no ejecutar el bloque
    // ----------------------------------------------------------------
    public function visitIfStmt($ctx): void
    {
        if (!$ctx) return;

        $line = $ctx->start ? $ctx->start->getLine() : 0;

        // Si ANTLR ya reportó error sintáctico en esta línea → omitir todo
        if ($this->hasSyntaxErrorAt($line)) {
            return;
        }

        $this->pushScope();
        if ($ctx->simpleStmt()) $this->safeVisit($ctx->simpleStmt());

        if (!$ctx->expression()) {
            $this->popScope();
            return;
        }

        $condition = $this->safeVisit($ctx->expression());
        if ($condition) {
            $this->safeVisit($ctx->block(0));
        } else {
            if ($ctx->ifStmt())     $this->safeVisit($ctx->ifStmt());
            elseif ($ctx->block(1)) $this->safeVisit($ctx->block(1));
        }
        $this->popScope();
    }

    // ----------------------------------------------------------------
    // SWITCH
    // ----------------------------------------------------------------
    public function visitSwitchStmt($ctx): void
    {
        if (!$ctx || !$ctx->expression()) return;
        $switchVal = $this->safeVisit($ctx->expression());
        $matched   = false;

        foreach ($ctx->caseClause() as $case) {
            if (!$case || !$case->exp_list()) continue;
            foreach ($case->exp_list()->expression() as $exp) {
                if ($this->safeVisit($exp) == $switchVal) {
                    $matched = true;
                    $this->pushScope();
                    foreach ($case->declaration() as $decl) {
                        $this->safeVisit($decl);
                        if ($this->breakSignal || $this->returnSignal) break;
                    }
                    $this->popScope();
                    $this->breakSignal = false;
                    break 2;
                }
            }
        }

        if (!$matched && $ctx->defaultClause()) {
            $this->pushScope();
            foreach ($ctx->defaultClause()->declaration() as $decl) {
                $this->safeVisit($decl);
                if ($this->breakSignal || $this->returnSignal) break;
            }
            $this->popScope();
            $this->breakSignal = false;
        }
    }

    // ----------------------------------------------------------------
    // FOR — si hay error sintáctico en esa línea, no ejecutar
    // ----------------------------------------------------------------
    public function visitForStmt($ctx): void
    {
        if (!$ctx) return;

        $line = $ctx->start ? $ctx->start->getLine() : 0;

        // Si ANTLR ya reportó error sintáctico en esta línea → omitir
        if ($this->hasSyntaxErrorAt($line)) {
            return;
        }

        // Detectar "for ; ; ; {}" — más de 2 puntos y coma en forClause
        if ($ctx->forClause()) {
            $clause     = $ctx->forClause();
            $semicolons = 0;
            if ($clause) {
                for ($i = 0; $i < $clause->getChildCount(); $i++) {
                    if ($clause->getChild($i)->getText() === ';') $semicolons++;
                }
            }
            if ($semicolons > 2) {
                $this->runtimeErrors[] = [
                    'tipo'        => 'Sintáctico',
                    'descripcion' => 'for mal formado: demasiados separadores (;)',
                    'linea'       => $line,
                    'columna'     => $ctx->start ? $ctx->start->getCharPositionInLine() : 0,
                ];
                return;
            }
        }

        $this->pushScope();
        $maxIter = 100000;

        if ($ctx->forClause()) {
            $clause     = $ctx->forClause();
            $allSimple  = $clause->simpleStmt() ?? [];
            $firstChild = $clause->getChild(0);
            $lastChild  = $clause->getChild($clause->getChildCount() - 1);
            $hasInit    = $firstChild && $firstChild->getText() !== ';';
            $hasPost    = $lastChild  && $lastChild->getText()  !== ';';

            $initStmt = ($hasInit && count($allSimple) > 0) ? $allSimple[0] : null;
            $postStmt = null;
            if ($hasPost && count($allSimple) > 0) {
                $postStmt = $allSimple[count($allSimple) - 1];
                if ($hasInit && count($allSimple) === 1) $postStmt = null;
            }

            if ($initStmt) $this->safeVisit($initStmt);

            for ($iter = 0; $iter < $maxIter; $iter++) {
                if ($clause->expression()) {
                    if (!$this->safeVisit($clause->expression())) break;
                }
                $this->safeVisit($ctx->block());
                if ($this->breakSignal)    { $this->breakSignal = false; break; }
                if ($this->continueSignal) { $this->continueSignal = false; }
                if ($this->returnSignal)   break;
                if ($postStmt) $this->safeVisit($postStmt);
            }

        } elseif ($ctx->expression()) {
            for ($iter = 0; $iter < $maxIter; $iter++) {
                if (!$this->safeVisit($ctx->expression())) break;
                $this->safeVisit($ctx->block());
                if ($this->breakSignal)    { $this->breakSignal = false; break; }
                if ($this->continueSignal) { $this->continueSignal = false; continue; }
                if ($this->returnSignal)   break;
            }

        } else {
            for ($iter = 0; $iter < $maxIter; $iter++) {
                $this->safeVisit($ctx->block());
                if ($this->breakSignal)    { $this->breakSignal = false; break; }
                if ($this->continueSignal) { $this->continueSignal = false; continue; }
                if ($this->returnSignal)   break;
            }
        }

        $this->popScope();
    }

    // ----------------------------------------------------------------
    // CONTROL DE FLUJO
    // ----------------------------------------------------------------
    public function visitBreakStmt($ctx):    void { $this->breakSignal    = true; }
    public function visitContinueStmt($ctx): void { $this->continueSignal = true; }

    public function visitReturnStmt($ctx): void
    {
        if (!$ctx) return;
        if ($ctx->exp_list()) {
            $exps = $ctx->exp_list()->expression();
            if (count($exps) === 1) {
                $this->returnValue = $this->safeVisit($exps[0]);
            } else {
                $values = [];
                foreach ($exps as $exp) $values[] = $this->safeVisit($exp);
                $this->returnValue = $values;
            }
        } else {
            $this->returnValue = null;
        }
        $this->returnSignal = true;
    }

    // ----------------------------------------------------------------
    // PRINTLN
    // ----------------------------------------------------------------
    public function visitFmtPrintlnCall($ctx): void
    {
        if (!$ctx) return;
        $values = [];
        if ($ctx->exp_list()) {
            foreach ($ctx->exp_list()->expression() as $exp) {
                $values[] = $this->formatValue($this->safeVisit($exp));
            }
        }
        $this->output .= implode(' ', $values) . "\n";
    }

    // ----------------------------------------------------------------
    // BUILT-INS
    // ----------------------------------------------------------------
    public function visitBuiltinCall($ctx)
    {
        if (!$ctx) return null;
        $first = $ctx->getChild(0)->getText();

        if ($first === 'len') {
            $val = $this->safeVisit($ctx->expression(0));
            return is_array($val) ? count($val) : (is_string($val) ? strlen($val) : 0);
        }
        if ($first === 'now') return date('Y-m-d H:i:s');
        if ($first === 'substr') {
            return substr(
                (string)$this->safeVisit($ctx->expression(0), ''),
                (int)$this->safeVisit($ctx->expression(1), 0),
                (int)$this->safeVisit($ctx->expression(2), 0)
            );
        }
        if ($first === 'typeOf') {
            $val        = $this->safeVisit($ctx->expression(0));
            $exprText   = trim($ctx->expression(0)->getText());
            $storedType = preg_match('/^\w+$/', $exprText) ? $this->getVarType($exprText) : null;
            return $this->typeOf($val, $storedType);
        }
        return null;
    }

    // ----------------------------------------------------------------
    // EXPRESSIONS
    // ----------------------------------------------------------------
    public function visitExprStmt($ctx)
    {
        if (!$ctx || !$ctx->expression()) return null;
        return $this->safeVisit($ctx->expression());
    }

    public function visitExpression($ctx)
    {
        if (!$ctx || !$ctx->logicalOrExpr()) return null;
        return $this->safeVisit($ctx->logicalOrExpr());
    }

    public function visitLogicalOrExpr($ctx)
    {
        if (!$ctx) return null;
        $result = $this->safeVisit($ctx->logicalAndExpr(0));
        for ($i = 1; $i < count($ctx->logicalAndExpr()); $i++) {
            $result = $result || $this->safeVisit($ctx->logicalAndExpr($i));
        }
        return $result;
    }

    public function visitLogicalAndExpr($ctx)
    {
        if (!$ctx) return null;
        $result = $this->safeVisit($ctx->equalityExpr(0));
        for ($i = 1; $i < count($ctx->equalityExpr()); $i++) {
            $result = $result && $this->safeVisit($ctx->equalityExpr($i));
        }
        return $result;
    }

    public function visitEqualityExpr($ctx)
    {
        if (!$ctx) return null;
        $result = $this->safeVisit($ctx->relationalExpr(0));
        for ($i = 1; $i < count($ctx->relationalExpr()); $i++) {
            $right = $this->safeVisit($ctx->relationalExpr($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();
            if (is_null($result) || is_null($right)) { $result = null; continue; }
            if ($op === '==') $result = ($result == $right);
            if ($op === '!=') $result = ($result != $right);
        }
        return $result;
    }

    public function visitRelationalExpr($ctx)
    {
        if (!$ctx) return null;
        $result = $this->safeVisit($ctx->additiveExpr(0));
        for ($i = 1; $i < count($ctx->additiveExpr()); $i++) {
            $right = $this->safeVisit($ctx->additiveExpr($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();
            if ($op === '>')  $result = $result > $right;
            if ($op === '>=') $result = $result >= $right;
            if ($op === '<')  $result = $result < $right;
            if ($op === '<=') $result = $result <= $right;
        }
        return $result;
    }

    public function visitAdditiveExpr($ctx)
    {
        if (!$ctx) return null;
        $result = $this->safeVisit($ctx->multiplicativeExpr(0));
        for ($i = 1; $i < count($ctx->multiplicativeExpr()); $i++) {
            $right = $this->safeVisit($ctx->multiplicativeExpr($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();
            if ($op === '+') $result += $right;
            if ($op === '-') $result -= $right;
        }
        return $result;
    }

    public function visitMultiplicativeExpr($ctx)
    {
        if (!$ctx) return null;
        $result = $this->safeVisit($ctx->unaryExpr(0));
        for ($i = 1; $i < count($ctx->unaryExpr()); $i++) {
            $right = $this->safeVisit($ctx->unaryExpr($i));
            $op    = $ctx->getChild(($i * 2) - 1)->getText();
            if ($op === '*') $result *= $right;
            if ($op === '/') $result = ($right != 0) ? intdiv((int)$result, (int)$right) : 0;
            if ($op === '%') $result %= $right;
        }
        return $result;
    }

    public function visitUnaryExpr($ctx)
    {
        if (!$ctx) return null;
        if ($ctx->getChildCount() == 2) {
            $op    = $ctx->getChild(0)->getText();
            $value = $this->safeVisit($ctx->unaryExpr());
            if ($op === '-') return -$value;
            if ($op === '!') return !$value;
            return $value;
        }
        return $this->safeVisit($ctx->primaryExpr());
    }

    // ----------------------------------------------------------------
    // PRIMARY EXPR
    // ----------------------------------------------------------------
    public function visitPrimaryExpr($ctx)
    {
        if (!$ctx) return null;
        $childCount = $ctx->getChildCount();

        if ($childCount === 4 && $ctx->getChild(1)->getText() === '[') {
            $arr   = $this->safeVisit($ctx->primaryExpr());
            $index = (int)$this->safeVisit($ctx->expression(), 0);
            return (is_array($arr) && array_key_exists($index, $arr)) ? $arr[$index] : 0;
        }

        if ($childCount >= 3 && $ctx->getChild(1)->getText() === '(') {
            $name    = $ctx->primaryExpr()->getText();
            $args    = [];
            $argRefs = [];
            if ($ctx->exp_list()) {
                foreach ($ctx->exp_list()->expression() as $i => $exp) {
                    $text = $exp->getText();
                    if (str_starts_with($text, '&')) {
                        $varName     = substr($text, 1);
                        $args[]      = $this->getVar($varName);
                        $argRefs[$i] = $varName;
                    } else {
                        $args[] = $this->safeVisit($exp);
                    }
                }
            }
            return $this->callFunction($name, $args, $argRefs);
        }

        if ($ctx->fmtPrintlnCall()) return $this->safeVisit($ctx->fmtPrintlnCall());
        if ($ctx->builtinCall())    return $this->safeVisit($ctx->builtinCall());
        if ($ctx->arrayLiteral())   return $this->safeVisit($ctx->arrayLiteral());
        if ($ctx->literal())        return $this->safeVisit($ctx->literal());
        if ($ctx->IDENTIFIER())     return $this->getVar($ctx->IDENTIFIER()->getText());
        if ($ctx->expression())     return $this->safeVisit($ctx->expression());
        if ($ctx->NIL())            return null;

        return null;
    }

    // ----------------------------------------------------------------
    // ARRAY LITERAL
    // ----------------------------------------------------------------
    private function tryParseSliceLiteral($text)
    {
        if (!preg_match('/^\[(\d*)\](\w+)\{(.*)\}$/s', trim($text), $m)) return null;
        $inner = trim($m[3]);
        if ($inner === '') return [];
        $result = [];
        foreach (array_map('trim', explode(',', $inner)) as $part) {
            if ($part === '') continue;
            if (is_numeric($part) && str_contains($part, '.')) $result[] = floatval($part);
            elseif (is_numeric($part)) $result[] = intval($part);
            elseif ($part === 'true')  $result[] = true;
            elseif ($part === 'false') $result[] = false;
            else $result[] = trim($part, '"\'');
        }
        return $result;
    }

    public function visitArrayLiteral($ctx)
    {
        if (!$ctx) return [];
        $elements = [];
        if ($ctx->elementList()) {
            foreach ($ctx->elementList()->element() as $el) {
                if (!$el) continue;
                if ($el->arrayLiteral()) {
                    $elements[] = $this->safeVisit($el->arrayLiteral());
                } elseif ($el->getChildCount() >= 2 && $el->getChild(0)->getText() === '{') {
                    $row = [];
                    if (method_exists($el, 'elementList') && $el->elementList()) {
                        foreach ($el->elementList()->element() as $inner) {
                            if ($inner && $inner->expression())
                                $row[] = $this->safeVisit($inner->expression());
                        }
                    }
                    $elements[] = $row;
                } else {
                    $elements[] = $this->safeVisit($el->expression());
                }
            }
        }
        return $elements;
    }

    // ----------------------------------------------------------------
    // LITERALS
    // ----------------------------------------------------------------
    public function visitLiteral($ctx)
    {
        if (!$ctx) return null;
        if ($ctx->INT_LITERAL())   return intval($ctx->getText());
        if ($ctx->FLOAT_LITERAL()) return floatval($ctx->getText());
        if ($ctx->STRING_LITERAL()) {
            $raw = substr($ctx->getText(), 1, -1);
            return str_replace(['\\n','\\t','\\r','\\"','\\\\'], ["\n","\t","\r",'"',"\\"], $raw);
        }
        if ($ctx->RUNE_LITERAL()) {
            $inner = substr($ctx->getText(), 1, -1);
            if (strlen($inner) >= 2 && $inner[0] === '\\') {
                return match($inner[1]) {
                    'n' => 10, 't' => 9, 'r' => 13, '0' => 0, '\\' => 92, "'" => 39,
                    default => ord($inner[1]),
                };
            }
            return ord($inner[0]);
        }
        if ($ctx->TRUE())  return true;
        if ($ctx->FALSE()) return false;
        return null;
    }

    // ----------------------------------------------------------------
    // HELPERS
    // ----------------------------------------------------------------
    private function castToType($value, $type)
    {
        if ($type === null) return $value;
        return match($type) {
            'int32'   => intval($value),
            'float32' => floatval($value),
            'bool'    => (bool)$value,
            'string'  => (string)$value,
            'rune'    => is_string($value) ? ord($value[0]) : (int)$value,
            default   => $value,
        };
    }

    private function defaultValue($type)
    {
        if ($type === null) return null;
        if (preg_match('/^\[(\d+)\](.+)$/', $type, $m)) {
            $arr = [];
            for ($i = 0; $i < (int)$m[1]; $i++) $arr[$i] = $this->defaultValue($m[2]);
            return $arr;
        }
        return match($type) {
            'int32'   => 0,  'float32' => 0.0, 'bool' => false,
            'string'  => '', 'rune'    => 0,   default => null,
        };
    }

    private function typeOf($value, $storedType = null): string
    {
        if ($storedType !== null) return $storedType;
        return $this->inferType($value);
    }

    private function inferType($value): string
    {
        if (is_bool($value))   return 'bool';
        if (is_int($value))    return 'int';
        if (is_float($value))  return 'float64';
        if (is_string($value)) return 'string';
        if (is_array($value))  return 'array';
        return 'nil';
    }

    private function inferTypeFromExpr($expCtx, $value): string
    {
        $text = trim($expCtx->getText());
        if (preg_match('/^(\[\d*\]\w+)\{/', $text, $m)) return $m[1];
        return $this->inferType($value);
    }

    private function formatValue($val): string
    {
        if (is_bool($val))  return $val ? 'true' : 'false';
        if (is_null($val))  return '<nil>';
        if (is_array($val)) return '[' . implode(' ', array_map([$this, 'formatValue'], $val)) . ']';
        return (string)$val;
    }
}
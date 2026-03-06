<?php

/*
 * Generated from antlr/grammar/OLC.g4 by ANTLR 4.13.1
 */

namespace ANTLR;
use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see OLCParser}.
 */
interface OLCListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see OLCParser::program()}.
	 * @param $context The parse tree.
	 */
	public function enterProgram(Context\ProgramContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::program()}.
	 * @param $context The parse tree.
	 */
	public function exitProgram(Context\ProgramContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::declaration()}.
	 * @param $context The parse tree.
	 */
	public function enterDeclaration(Context\DeclarationContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::declaration()}.
	 * @param $context The parse tree.
	 */
	public function exitDeclaration(Context\DeclarationContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::exprStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterExprStmt(Context\ExprStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::exprStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitExprStmt(Context\ExprStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::functionDcl()}.
	 * @param $context The parse tree.
	 */
	public function enterFunctionDcl(Context\FunctionDclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::functionDcl()}.
	 * @param $context The parse tree.
	 */
	public function exitFunctionDcl(Context\FunctionDclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::params()}.
	 * @param $context The parse tree.
	 */
	public function enterParams(Context\ParamsContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::params()}.
	 * @param $context The parse tree.
	 */
	public function exitParams(Context\ParamsContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::param()}.
	 * @param $context The parse tree.
	 */
	public function enterParam(Context\ParamContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::param()}.
	 * @param $context The parse tree.
	 */
	public function exitParam(Context\ParamContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::result()}.
	 * @param $context The parse tree.
	 */
	public function enterResult(Context\ResultContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::result()}.
	 * @param $context The parse tree.
	 */
	public function exitResult(Context\ResultContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::block()}.
	 * @param $context The parse tree.
	 */
	public function enterBlock(Context\BlockContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::block()}.
	 * @param $context The parse tree.
	 */
	public function exitBlock(Context\BlockContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::varDcl()}.
	 * @param $context The parse tree.
	 */
	public function enterVarDcl(Context\VarDclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::varDcl()}.
	 * @param $context The parse tree.
	 */
	public function exitVarDcl(Context\VarDclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::shortVarDcl()}.
	 * @param $context The parse tree.
	 */
	public function enterShortVarDcl(Context\ShortVarDclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::shortVarDcl()}.
	 * @param $context The parse tree.
	 */
	public function exitShortVarDcl(Context\ShortVarDclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::constDcl()}.
	 * @param $context The parse tree.
	 */
	public function enterConstDcl(Context\ConstDclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::constDcl()}.
	 * @param $context The parse tree.
	 */
	public function exitConstDcl(Context\ConstDclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::assignmentStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterAssignmentStmt(Context\AssignmentStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::assignmentStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitAssignmentStmt(Context\AssignmentStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::assignOp()}.
	 * @param $context The parse tree.
	 */
	public function enterAssignOp(Context\AssignOpContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::assignOp()}.
	 * @param $context The parse tree.
	 */
	public function exitAssignOp(Context\AssignOpContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterIfStmt(Context\IfStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitIfStmt(Context\IfStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::switchStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterSwitchStmt(Context\SwitchStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::switchStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitSwitchStmt(Context\SwitchStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::caseClause()}.
	 * @param $context The parse tree.
	 */
	public function enterCaseClause(Context\CaseClauseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::caseClause()}.
	 * @param $context The parse tree.
	 */
	public function exitCaseClause(Context\CaseClauseContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::defaultClause()}.
	 * @param $context The parse tree.
	 */
	public function enterDefaultClause(Context\DefaultClauseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::defaultClause()}.
	 * @param $context The parse tree.
	 */
	public function exitDefaultClause(Context\DefaultClauseContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForStmt(Context\ForStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForStmt(Context\ForStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::forClause()}.
	 * @param $context The parse tree.
	 */
	public function enterForClause(Context\ForClauseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::forClause()}.
	 * @param $context The parse tree.
	 */
	public function exitForClause(Context\ForClauseContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::breakStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterBreakStmt(Context\BreakStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::breakStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitBreakStmt(Context\BreakStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::continueStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterContinueStmt(Context\ContinueStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::continueStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitContinueStmt(Context\ContinueStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::returnStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterReturnStmt(Context\ReturnStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::returnStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitReturnStmt(Context\ReturnStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::simpleStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterSimpleStmt(Context\SimpleStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::simpleStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitSimpleStmt(Context\SimpleStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::id_list()}.
	 * @param $context The parse tree.
	 */
	public function enterId_list(Context\Id_listContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::id_list()}.
	 * @param $context The parse tree.
	 */
	public function exitId_list(Context\Id_listContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::exp_list()}.
	 * @param $context The parse tree.
	 */
	public function enterExp_list(Context\Exp_listContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::exp_list()}.
	 * @param $context The parse tree.
	 */
	public function exitExp_list(Context\Exp_listContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterExpression(Context\ExpressionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitExpression(Context\ExpressionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::logicalOrExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterLogicalOrExpr(Context\LogicalOrExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::logicalOrExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitLogicalOrExpr(Context\LogicalOrExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::logicalAndExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterLogicalAndExpr(Context\LogicalAndExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::logicalAndExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitLogicalAndExpr(Context\LogicalAndExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::equalityExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterEqualityExpr(Context\EqualityExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::equalityExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitEqualityExpr(Context\EqualityExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::relationalExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterRelationalExpr(Context\RelationalExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::relationalExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitRelationalExpr(Context\RelationalExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::additiveExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterAdditiveExpr(Context\AdditiveExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::additiveExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitAdditiveExpr(Context\AdditiveExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::multiplicativeExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterMultiplicativeExpr(Context\MultiplicativeExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::multiplicativeExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitMultiplicativeExpr(Context\MultiplicativeExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::unaryExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterUnaryExpr(Context\UnaryExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::unaryExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitUnaryExpr(Context\UnaryExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::primaryExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterPrimaryExpr(Context\PrimaryExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::primaryExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitPrimaryExpr(Context\PrimaryExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::fmtPrintlnCall()}.
	 * @param $context The parse tree.
	 */
	public function enterFmtPrintlnCall(Context\FmtPrintlnCallContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::fmtPrintlnCall()}.
	 * @param $context The parse tree.
	 */
	public function exitFmtPrintlnCall(Context\FmtPrintlnCallContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::builtinCall()}.
	 * @param $context The parse tree.
	 */
	public function enterBuiltinCall(Context\BuiltinCallContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::builtinCall()}.
	 * @param $context The parse tree.
	 */
	public function exitBuiltinCall(Context\BuiltinCallContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::literal()}.
	 * @param $context The parse tree.
	 */
	public function enterLiteral(Context\LiteralContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::literal()}.
	 * @param $context The parse tree.
	 */
	public function exitLiteral(Context\LiteralContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::elementList()}.
	 * @param $context The parse tree.
	 */
	public function enterElementList(Context\ElementListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::elementList()}.
	 * @param $context The parse tree.
	 */
	public function exitElementList(Context\ElementListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::element()}.
	 * @param $context The parse tree.
	 */
	public function enterElement(Context\ElementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::element()}.
	 * @param $context The parse tree.
	 */
	public function exitElement(Context\ElementContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::type()}.
	 * @param $context The parse tree.
	 */
	public function enterType(Context\TypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::type()}.
	 * @param $context The parse tree.
	 */
	public function exitType(Context\TypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::pointerType()}.
	 * @param $context The parse tree.
	 */
	public function enterPointerType(Context\PointerTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::pointerType()}.
	 * @param $context The parse tree.
	 */
	public function exitPointerType(Context\PointerTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::arrayType()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayType(Context\ArrayTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::arrayType()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayType(Context\ArrayTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see OLCParser::baseType()}.
	 * @param $context The parse tree.
	 */
	public function enterBaseType(Context\BaseTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::baseType()}.
	 * @param $context The parse tree.
	 */
	public function exitBaseType(Context\BaseTypeContext $context): void;
}
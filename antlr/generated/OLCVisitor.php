<?php

/*
 * Generated from antlr/grammar/OLC.g4 by ANTLR 4.13.1
 */

namespace ANTLR;

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see OLCParser}.
 */
interface OLCVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by {@see OLCParser::program()}.
	 *
	 * @param Context\ProgramContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitProgram(Context\ProgramContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::declaration()}.
	 *
	 * @param Context\DeclarationContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDeclaration(Context\DeclarationContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::functionDcl()}.
	 *
	 * @param Context\FunctionDclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFunctionDcl(Context\FunctionDclContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::params()}.
	 *
	 * @param Context\ParamsContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParams(Context\ParamsContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::param()}.
	 *
	 * @param Context\ParamContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParam(Context\ParamContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::result()}.
	 *
	 * @param Context\ResultContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitResult(Context\ResultContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::block()}.
	 *
	 * @param Context\BlockContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBlock(Context\BlockContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::varDcl()}.
	 *
	 * @param Context\VarDclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitVarDcl(Context\VarDclContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::shortVarDcl()}.
	 *
	 * @param Context\ShortVarDclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitShortVarDcl(Context\ShortVarDclContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::constDcl()}.
	 *
	 * @param Context\ConstDclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitConstDcl(Context\ConstDclContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::assignmentStmt()}.
	 *
	 * @param Context\AssignmentStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAssignmentStmt(Context\AssignmentStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::assignOp()}.
	 *
	 * @param Context\AssignOpContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAssignOp(Context\AssignOpContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::ifStmt()}.
	 *
	 * @param Context\IfStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIfStmt(Context\IfStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::switchStmt()}.
	 *
	 * @param Context\SwitchStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSwitchStmt(Context\SwitchStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::caseClause()}.
	 *
	 * @param Context\CaseClauseContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCaseClause(Context\CaseClauseContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::defaultClause()}.
	 *
	 * @param Context\DefaultClauseContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDefaultClause(Context\DefaultClauseContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::forStmt()}.
	 *
	 * @param Context\ForStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForStmt(Context\ForStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::forClause()}.
	 *
	 * @param Context\ForClauseContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForClause(Context\ForClauseContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::breakStmt()}.
	 *
	 * @param Context\BreakStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBreakStmt(Context\BreakStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::continueStmt()}.
	 *
	 * @param Context\ContinueStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitContinueStmt(Context\ContinueStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::returnStmt()}.
	 *
	 * @param Context\ReturnStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitReturnStmt(Context\ReturnStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::simpleStmt()}.
	 *
	 * @param Context\SimpleStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSimpleStmt(Context\SimpleStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::id_list()}.
	 *
	 * @param Context\Id_listContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitId_list(Context\Id_listContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::exp_list()}.
	 *
	 * @param Context\Exp_listContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExp_list(Context\Exp_listContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::expression()}.
	 *
	 * @param Context\ExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExpression(Context\ExpressionContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::logicalOrExpr()}.
	 *
	 * @param Context\LogicalOrExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLogicalOrExpr(Context\LogicalOrExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::logicalAndExpr()}.
	 *
	 * @param Context\LogicalAndExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLogicalAndExpr(Context\LogicalAndExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::equalityExpr()}.
	 *
	 * @param Context\EqualityExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitEqualityExpr(Context\EqualityExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::relationalExpr()}.
	 *
	 * @param Context\RelationalExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitRelationalExpr(Context\RelationalExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::additiveExpr()}.
	 *
	 * @param Context\AdditiveExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAdditiveExpr(Context\AdditiveExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::multiplicativeExpr()}.
	 *
	 * @param Context\MultiplicativeExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMultiplicativeExpr(Context\MultiplicativeExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::unaryExpr()}.
	 *
	 * @param Context\UnaryExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnaryExpr(Context\UnaryExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::primaryExpr()}.
	 *
	 * @param Context\PrimaryExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPrimaryExpr(Context\PrimaryExprContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::literal()}.
	 *
	 * @param Context\LiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLiteral(Context\LiteralContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::arrayLiteral()}.
	 *
	 * @param Context\ArrayLiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayLiteral(Context\ArrayLiteralContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::elementList()}.
	 *
	 * @param Context\ElementListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitElementList(Context\ElementListContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::element()}.
	 *
	 * @param Context\ElementContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitElement(Context\ElementContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::type()}.
	 *
	 * @param Context\TypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitType(Context\TypeContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::pointerType()}.
	 *
	 * @param Context\PointerTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPointerType(Context\PointerTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::arrayType()}.
	 *
	 * @param Context\ArrayTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayType(Context\ArrayTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see OLCParser::baseType()}.
	 *
	 * @param Context\BaseTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBaseType(Context\BaseTypeContext $context);
}
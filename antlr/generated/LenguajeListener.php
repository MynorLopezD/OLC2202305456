<?php

/*
 * Generated from antlr/grammar/Lenguaje.g4 by ANTLR 4.13.1
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see LenguajeParser}.
 */
interface LenguajeListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see LenguajeParser::prog()}.
	 * @param $context The parse tree.
	 */
	public function enterProg(Context\ProgContext $context): void;
	/**
	 * Exit a parse tree produced by {@see LenguajeParser::prog()}.
	 * @param $context The parse tree.
	 */
	public function exitProg(Context\ProgContext $context): void;
	/**
	 * Enter a parse tree produced by {@see LenguajeParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterExpr(Context\ExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see LenguajeParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitExpr(Context\ExprContext $context): void;
}
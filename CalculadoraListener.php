<?php

/*
 * Generated from Calculadora.g4 by ANTLR 4.13.1
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see CalculadoraParser}.
 */
interface CalculadoraListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see CalculadoraParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterExpr(Context\ExprContext $context): void;
	/**
	 * Exit a parse tree produced by {@see CalculadoraParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitExpr(Context\ExprContext $context): void;
}
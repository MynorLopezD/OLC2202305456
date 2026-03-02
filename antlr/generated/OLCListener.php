<?php

/*
 * Generated from antlr/grammar/OLC.g4 by ANTLR 4.13.1
 */

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
	 * Enter a parse tree produced by {@see OLCParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterStatement(Context\StatementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see OLCParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitStatement(Context\StatementContext $context): void;
}
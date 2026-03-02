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
	 * Visit a parse tree produced by {@see OLCParser::statement()}.
	 *
	 * @param Context\StatementContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitStatement(Context\StatementContext $context);
}
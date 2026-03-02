<?php

/*
 * Generated from antlr/grammar/OLC.g4 by ANTLR 4.13.1
 */


use Antlr\Antlr4\Runtime\Tree\AbstractParseTreeVisitor;

/**
 * This class provides an empty implementation of {@see OLCVisitor},
 * which can be extended to create a visitor which only needs to handle a subset
 * of the available methods.
 */
class OLCBaseVisitor extends AbstractParseTreeVisitor implements OLCVisitor
{
	/**
	 * {@inheritdoc}
	 *
	 * The default implementation returns the result of calling
	 * {@see self::visitChildren()} on `context`.
	 */
	public function visitProgram(Context\ProgramContext $context)
	{
	    return $this->visitChildren($context);
	}

	/**
	 * {@inheritdoc}
	 *
	 * The default implementation returns the result of calling
	 * {@see self::visitChildren()} on `context`.
	 */
	public function visitStatement(Context\StatementContext $context)
	{
	    return $this->visitChildren($context);
	}
}
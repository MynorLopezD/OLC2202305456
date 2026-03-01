<?php

/*
 * Generated from Calculadora.g4 by ANTLR 4.13.1
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class CalculadoraParser extends Parser
	{
		public const T__0 = 1, T__1 = 2, INT = 3, WS = 4;

		public const RULE_expr = 0;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'expr'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'+'", "'*'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, "INT", "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 4, 17, 2, 0, 7, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 
		    0, 1, 0, 5, 0, 12, 8, 0, 10, 0, 12, 0, 15, 9, 0, 1, 0, 0, 1, 0, 1, 
		    0, 0, 0, 17, 0, 2, 1, 0, 0, 0, 2, 3, 6, 0, -1, 0, 3, 4, 5, 3, 0, 0, 
		    4, 13, 1, 0, 0, 0, 5, 6, 10, 3, 0, 0, 6, 7, 5, 1, 0, 0, 7, 12, 3, 
		    0, 0, 4, 8, 9, 10, 2, 0, 0, 9, 10, 5, 2, 0, 0, 10, 12, 3, 0, 0, 3, 
		    11, 5, 1, 0, 0, 0, 11, 8, 1, 0, 0, 0, 12, 15, 1, 0, 0, 0, 13, 11, 
		    1, 0, 0, 0, 13, 14, 1, 0, 0, 0, 14, 1, 1, 0, 0, 0, 15, 13, 1, 0, 0, 
		    0, 2, 11, 13];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.13.1', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "Calculadora.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function expr(): Context\ExprContext
		{
			return $this->recursiveExpr(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveExpr(int $precedence): Context\ExprContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\ExprContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 0;
			$this->enterRecursionRule($localContext, 0, self::RULE_expr, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(3);
				$this->match(self::INT);
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(13);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(11);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 0, $this->ctx)) {
							case 1:
							    $localContext = new Context\ExprContext($parentContext, $parentState);
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expr);
							    $this->setState(5);

							    if (!($this->precpred($this->ctx, 3))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 3)");
							    }
							    $this->setState(6);
							    $this->match(self::T__0);
							    $this->setState(7);
							    $this->recursiveExpr(4);
							break;

							case 2:
							    $localContext = new Context\ExprContext($parentContext, $parentState);
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expr);
							    $this->setState(8);

							    if (!($this->precpred($this->ctx, 2))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
							    }
							    $this->setState(9);
							    $this->match(self::T__1);
							    $this->setState(10);
							    $this->recursiveExpr(3);
							break;
						} 
					}

					$this->setState(15);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex): bool
		{
			switch ($ruleIndex) {
					case 0:
						return $this->sempredExpr($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredExpr(?Context\ExprContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 3);

			    case 1:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}
	}
}

namespace Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use CalculadoraParser;
	use CalculadoraListener;

	class ExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return CalculadoraParser::RULE_expr;
	    }

	    public function INT(): ?TerminalNode
	    {
	        return $this->getToken(CalculadoraParser::INT, 0);
	    }

	    /**
	     * @return array<ExprContext>|ExprContext|null
	     */
	    public function expr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExprContext::class);
	    	}

	        return $this->getTypedRuleContext(ExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof CalculadoraListener) {
			    $listener->enterExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof CalculadoraListener) {
			    $listener->exitExpr($this);
		    }
		}
	} 
}
<?php

/*
 * Generated from antlr/grammar/OLC.g4 by ANTLR 4.13.1
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

	final class OLCParser extends Parser
	{
		public const IDENTIFIER = 1, INT32 = 2, FLOAT32 = 3, BOOL = 4, RUNE = 5, 
               STRING = 6, TRUE = 7, FALSE = 8, LINE_COMMENT = 9, BLOCK_COMMENT = 10, 
               WS = 11;

		public const RULE_program = 0, RULE_statement = 1;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'statement'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, null, "'int32'", "'float32'", "'bool'", "'rune'", "'string'", 
		    "'true'", "'false'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, "IDENTIFIER", "INT32", "FLOAT32", "BOOL", "RUNE", "STRING", 
		    "TRUE", "FALSE", "LINE_COMMENT", "BLOCK_COMMENT", "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 11, 15, 2, 0, 7, 0, 2, 1, 7, 1, 1, 0, 5, 0, 6, 8, 0, 10, 0, 12, 
		    0, 9, 9, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 2, 0, 2, 0, 0, 13, 
		    0, 7, 1, 0, 0, 0, 2, 12, 1, 0, 0, 0, 4, 6, 3, 2, 1, 0, 5, 4, 1, 0, 
		    0, 0, 6, 9, 1, 0, 0, 0, 7, 5, 1, 0, 0, 0, 7, 8, 1, 0, 0, 0, 8, 10, 
		    1, 0, 0, 0, 9, 7, 1, 0, 0, 0, 10, 11, 5, 0, 0, 1, 11, 1, 1, 0, 0, 
		    0, 12, 13, 5, 1, 0, 0, 13, 3, 1, 0, 0, 0, 1, 7];
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
			return "OLC.g4";
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
		public function program(): Context\ProgramContext
		{
		    $localContext = new Context\ProgramContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_program);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(7);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::IDENTIFIER) {
		        	$this->setState(4);
		        	$this->statement();
		        	$this->setState(9);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(10);
		        $this->match(self::EOF);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function statement(): Context\StatementContext
		{
		    $localContext = new Context\StatementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_statement);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(12);
		        $this->match(self::IDENTIFIER);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}
	}
}

namespace Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use OLCParser;
	use OLCVisitor;
	use OLCListener;

	class ProgramContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_program;
	    }

	    public function EOF(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::EOF, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterProgram($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitProgram($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitProgram($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StatementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_statement;
	    }

	    public function IDENTIFIER(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::IDENTIFIER, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterStatement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitStatement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitStatement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}
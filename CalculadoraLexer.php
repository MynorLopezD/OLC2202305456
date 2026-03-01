<?php

/*
 * Generated from Calculadora.g4 by ANTLR 4.13.1
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\LexerATNSimulator;
	use Antlr\Antlr4\Runtime\Lexer;
	use Antlr\Antlr4\Runtime\CharStream;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\VocabularyImpl;

	final class CalculadoraLexer extends Lexer
	{
		public const T__0 = 1, T__1 = 2, INT = 3, WS = 4;

		/**
		 * @var array<string>
		 */
		public const CHANNEL_NAMES = [
			'DEFAULT_TOKEN_CHANNEL', 'HIDDEN'
		];

		/**
		 * @var array<string>
		 */
		public const MODE_NAMES = [
			'DEFAULT_MODE'
		];

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'T__0', 'T__1', 'INT', 'WS'
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
			[4, 0, 4, 25, 6, -1, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 
		    1, 0, 1, 0, 1, 1, 1, 1, 1, 2, 4, 2, 15, 8, 2, 11, 2, 12, 2, 16, 1, 
		    3, 4, 3, 20, 8, 3, 11, 3, 12, 3, 21, 1, 3, 1, 3, 0, 0, 4, 1, 1, 3, 
		    2, 5, 3, 7, 4, 1, 0, 2, 1, 0, 48, 57, 3, 0, 9, 10, 13, 13, 32, 32, 
		    26, 0, 1, 1, 0, 0, 0, 0, 3, 1, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 7, 1, 
		    0, 0, 0, 1, 9, 1, 0, 0, 0, 3, 11, 1, 0, 0, 0, 5, 14, 1, 0, 0, 0, 7, 
		    19, 1, 0, 0, 0, 9, 10, 5, 43, 0, 0, 10, 2, 1, 0, 0, 0, 11, 12, 5, 
		    42, 0, 0, 12, 4, 1, 0, 0, 0, 13, 15, 7, 0, 0, 0, 14, 13, 1, 0, 0, 
		    0, 15, 16, 1, 0, 0, 0, 16, 14, 1, 0, 0, 0, 16, 17, 1, 0, 0, 0, 17, 
		    6, 1, 0, 0, 0, 18, 20, 7, 1, 0, 0, 19, 18, 1, 0, 0, 0, 20, 21, 1, 
		    0, 0, 0, 21, 19, 1, 0, 0, 0, 21, 22, 1, 0, 0, 0, 22, 23, 1, 0, 0, 
		    0, 23, 24, 6, 3, 0, 0, 24, 8, 1, 0, 0, 0, 3, 0, 16, 21, 1, 6, 0, 0];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;
		public function __construct(CharStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new LexerATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
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

		public static function vocabulary(): Vocabulary
		{
			static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
		}

		public function getGrammarFileName(): string
		{
			return 'Calculadora.g4';
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		/**
		 * @return array<string>
		 */
		public function getChannelNames(): array
		{
			return self::CHANNEL_NAMES;
		}

		/**
		 * @return array<string>
		 */
		public function getModeNames(): array
		{
			return self::MODE_NAMES;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
		{
			return self::vocabulary();
		}
	}
}
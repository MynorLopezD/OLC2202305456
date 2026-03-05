<?php

/*
 * Generated from antlr/grammar/OLC.g4 by ANTLR 4.13.1
 */

namespace ANTLR {
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
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, T__8 = 9, T__9 = 10, T__10 = 11, T__11 = 12, 
               T__12 = 13, T__13 = 14, T__14 = 15, T__15 = 16, T__16 = 17, 
               T__17 = 18, T__18 = 19, T__19 = 20, T__20 = 21, T__21 = 22, 
               T__22 = 23, T__23 = 24, T__24 = 25, T__25 = 26, T__26 = 27, 
               T__27 = 28, T__28 = 29, T__29 = 30, T__30 = 31, T__31 = 32, 
               T__32 = 33, FUNC = 34, VAR = 35, CONST = 36, IF = 37, ELSE = 38, 
               SWITCH = 39, CASE = 40, DEFAULT = 41, FOR = 42, BREAK = 43, 
               CONTINUE = 44, RETURN = 45, NIL = 46, FMT = 47, PRINTLN = 48, 
               LEN = 49, NOW = 50, SUBSTR = 51, TYPEOF = 52, INT32 = 53, 
               FLOAT32 = 54, BOOL = 55, RUNE = 56, STRING = 57, TRUE = 58, 
               FALSE = 59, IDENTIFIER = 60, INT_LITERAL = 61, FLOAT_LITERAL = 62, 
               STRING_LITERAL = 63, RUNE_LITERAL = 64, LINE_COMMENT = 65, 
               BLOCK_COMMENT = 66, WS = 67;

		public const RULE_program = 0, RULE_declaration = 1, RULE_functionDcl = 2, 
               RULE_params = 3, RULE_param = 4, RULE_result = 5, RULE_block = 6, 
               RULE_varDcl = 7, RULE_shortVarDcl = 8, RULE_constDcl = 9, 
               RULE_assignmentStmt = 10, RULE_assignOp = 11, RULE_ifStmt = 12, 
               RULE_switchStmt = 13, RULE_caseClause = 14, RULE_defaultClause = 15, 
               RULE_forStmt = 16, RULE_forClause = 17, RULE_breakStmt = 18, 
               RULE_continueStmt = 19, RULE_returnStmt = 20, RULE_simpleStmt = 21, 
               RULE_id_list = 22, RULE_exp_list = 23, RULE_expression = 24, 
               RULE_logicalOrExpr = 25, RULE_logicalAndExpr = 26, RULE_equalityExpr = 27, 
               RULE_relationalExpr = 28, RULE_additiveExpr = 29, RULE_multiplicativeExpr = 30, 
               RULE_unaryExpr = 31, RULE_primaryExpr = 32, RULE_fmtPrintlnCall = 33, 
               RULE_builtinCall = 34, RULE_literal = 35, RULE_arrayLiteral = 36, 
               RULE_elementList = 37, RULE_element = 38, RULE_type = 39, 
               RULE_pointerType = 40, RULE_arrayType = 41, RULE_baseType = 42;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'declaration', 'functionDcl', 'params', 'param', 'result', 
			'block', 'varDcl', 'shortVarDcl', 'constDcl', 'assignmentStmt', 'assignOp', 
			'ifStmt', 'switchStmt', 'caseClause', 'defaultClause', 'forStmt', 'forClause', 
			'breakStmt', 'continueStmt', 'returnStmt', 'simpleStmt', 'id_list', 'exp_list', 
			'expression', 'logicalOrExpr', 'logicalAndExpr', 'equalityExpr', 'relationalExpr', 
			'additiveExpr', 'multiplicativeExpr', 'unaryExpr', 'primaryExpr', 'fmtPrintlnCall', 
			'builtinCall', 'literal', 'arrayLiteral', 'elementList', 'element', 'type', 
			'pointerType', 'arrayType', 'baseType'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'('", "')'", "','", "'{'", "'}'", "'='", "':='", "'++'", "'--'", 
		    "'+='", "'-='", "'*='", "'/='", "';'", "':'", "'||'", "'&&'", "'=='", 
		    "'!='", "'>'", "'>='", "'<'", "'<='", "'+'", "'-'", "'*'", "'/'", 
		    "'%'", "'!'", "'&'", "'['", "']'", "'.'", "'func'", "'var'", "'const'", 
		    "'if'", "'else'", "'switch'", "'case'", "'default'", "'for'", "'break'", 
		    "'continue'", "'return'", "'nil'", "'fmt'", "'Println'", "'len'", 
		    "'now'", "'substr'", "'typeOf'", "'int32'", "'float32'", "'bool'", 
		    "'rune'", "'string'", "'true'", "'false'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, "FUNC", "VAR", "CONST", "IF", "ELSE", "SWITCH", "CASE", "DEFAULT", 
		    "FOR", "BREAK", "CONTINUE", "RETURN", "NIL", "FMT", "PRINTLN", "LEN", 
		    "NOW", "SUBSTR", "TYPEOF", "INT32", "FLOAT32", "BOOL", "RUNE", "STRING", 
		    "TRUE", "FALSE", "IDENTIFIER", "INT_LITERAL", "FLOAT_LITERAL", "STRING_LITERAL", 
		    "RUNE_LITERAL", "LINE_COMMENT", "BLOCK_COMMENT", "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 67, 447, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38, 
		    7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 1, 
		    0, 5, 0, 88, 8, 0, 10, 0, 12, 0, 91, 9, 0, 1, 0, 1, 0, 1, 1, 1, 1, 
		    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3, 1, 
		    107, 8, 1, 1, 2, 1, 2, 1, 2, 1, 2, 3, 2, 113, 8, 2, 1, 2, 1, 2, 3, 
		    2, 117, 8, 2, 1, 2, 1, 2, 1, 3, 1, 3, 1, 3, 5, 3, 124, 8, 3, 10, 3, 
		    12, 3, 127, 9, 3, 1, 4, 1, 4, 1, 4, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 
		    5, 5, 137, 8, 5, 10, 5, 12, 5, 140, 9, 5, 1, 5, 1, 5, 3, 5, 144, 8, 
		    5, 1, 6, 1, 6, 5, 6, 148, 8, 6, 10, 6, 12, 6, 151, 9, 6, 1, 6, 1, 
		    6, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 3, 
		    7, 165, 8, 7, 1, 8, 1, 8, 1, 8, 1, 8, 1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 
		    1, 9, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 3, 10, 184, 
		    8, 10, 1, 11, 1, 11, 1, 12, 1, 12, 1, 12, 1, 12, 3, 12, 192, 8, 12, 
		    1, 12, 1, 12, 1, 12, 1, 12, 1, 12, 3, 12, 199, 8, 12, 3, 12, 201, 
		    8, 12, 1, 13, 1, 13, 1, 13, 1, 13, 5, 13, 207, 8, 13, 10, 13, 12, 
		    13, 210, 9, 13, 1, 13, 3, 13, 213, 8, 13, 1, 13, 1, 13, 1, 14, 1, 
		    14, 1, 14, 1, 14, 5, 14, 221, 8, 14, 10, 14, 12, 14, 224, 9, 14, 1, 
		    15, 1, 15, 1, 15, 5, 15, 229, 8, 15, 10, 15, 12, 15, 232, 9, 15, 1, 
		    16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 
		    3, 16, 244, 8, 16, 1, 17, 3, 17, 247, 8, 17, 1, 17, 1, 17, 3, 17, 
		    251, 8, 17, 1, 17, 1, 17, 3, 17, 255, 8, 17, 1, 18, 1, 18, 1, 19, 
		    1, 19, 1, 20, 1, 20, 3, 20, 263, 8, 20, 1, 21, 1, 21, 3, 21, 267, 
		    8, 21, 1, 22, 1, 22, 1, 22, 5, 22, 272, 8, 22, 10, 22, 12, 22, 275, 
		    9, 22, 1, 23, 1, 23, 1, 23, 5, 23, 280, 8, 23, 10, 23, 12, 23, 283, 
		    9, 23, 1, 24, 1, 24, 1, 25, 1, 25, 1, 25, 5, 25, 290, 8, 25, 10, 25, 
		    12, 25, 293, 9, 25, 1, 26, 1, 26, 1, 26, 5, 26, 298, 8, 26, 10, 26, 
		    12, 26, 301, 9, 26, 1, 27, 1, 27, 1, 27, 5, 27, 306, 8, 27, 10, 27, 
		    12, 27, 309, 9, 27, 1, 28, 1, 28, 1, 28, 5, 28, 314, 8, 28, 10, 28, 
		    12, 28, 317, 9, 28, 1, 29, 1, 29, 1, 29, 5, 29, 322, 8, 29, 10, 29, 
		    12, 29, 325, 9, 29, 1, 30, 1, 30, 1, 30, 5, 30, 330, 8, 30, 10, 30, 
		    12, 30, 333, 9, 30, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 
		    1, 31, 1, 31, 3, 31, 344, 8, 31, 1, 32, 1, 32, 1, 32, 1, 32, 1, 32, 
		    1, 32, 1, 32, 1, 32, 1, 32, 1, 32, 1, 32, 3, 32, 357, 8, 32, 1, 32, 
		    1, 32, 1, 32, 1, 32, 1, 32, 1, 32, 1, 32, 1, 32, 3, 32, 367, 8, 32, 
		    1, 32, 5, 32, 370, 8, 32, 10, 32, 12, 32, 373, 9, 32, 1, 33, 1, 33, 
		    1, 33, 1, 33, 1, 33, 3, 33, 380, 8, 33, 1, 33, 1, 33, 1, 34, 1, 34, 
		    1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 
		    34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 
		    1, 34, 3, 34, 406, 8, 34, 1, 35, 1, 35, 1, 36, 1, 36, 1, 36, 3, 36, 
		    413, 8, 36, 1, 36, 1, 36, 1, 37, 1, 37, 1, 37, 5, 37, 420, 8, 37, 
		    10, 37, 12, 37, 423, 9, 37, 1, 37, 3, 37, 426, 8, 37, 1, 38, 1, 38, 
		    3, 38, 430, 8, 38, 1, 39, 1, 39, 1, 39, 3, 39, 435, 8, 39, 1, 40, 
		    1, 40, 1, 40, 1, 41, 1, 41, 1, 41, 1, 41, 1, 41, 1, 42, 1, 42, 1, 
		    42, 0, 1, 64, 43, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 
		    28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 50, 52, 54, 56, 58, 60, 
		    62, 64, 66, 68, 70, 72, 74, 76, 78, 80, 82, 84, 0, 8, 1, 0, 8, 9, 
		    2, 0, 6, 6, 10, 13, 1, 0, 18, 19, 1, 0, 20, 23, 1, 0, 24, 25, 1, 0, 
		    26, 28, 2, 0, 58, 59, 61, 64, 1, 0, 53, 57, 468, 0, 89, 1, 0, 0, 0, 
		    2, 106, 1, 0, 0, 0, 4, 108, 1, 0, 0, 0, 6, 120, 1, 0, 0, 0, 8, 128, 
		    1, 0, 0, 0, 10, 143, 1, 0, 0, 0, 12, 145, 1, 0, 0, 0, 14, 164, 1, 
		    0, 0, 0, 16, 166, 1, 0, 0, 0, 18, 170, 1, 0, 0, 0, 20, 183, 1, 0, 
		    0, 0, 22, 185, 1, 0, 0, 0, 24, 187, 1, 0, 0, 0, 26, 202, 1, 0, 0, 
		    0, 28, 216, 1, 0, 0, 0, 30, 225, 1, 0, 0, 0, 32, 243, 1, 0, 0, 0, 
		    34, 246, 1, 0, 0, 0, 36, 256, 1, 0, 0, 0, 38, 258, 1, 0, 0, 0, 40, 
		    260, 1, 0, 0, 0, 42, 266, 1, 0, 0, 0, 44, 268, 1, 0, 0, 0, 46, 276, 
		    1, 0, 0, 0, 48, 284, 1, 0, 0, 0, 50, 286, 1, 0, 0, 0, 52, 294, 1, 
		    0, 0, 0, 54, 302, 1, 0, 0, 0, 56, 310, 1, 0, 0, 0, 58, 318, 1, 0, 
		    0, 0, 60, 326, 1, 0, 0, 0, 62, 343, 1, 0, 0, 0, 64, 356, 1, 0, 0, 
		    0, 66, 374, 1, 0, 0, 0, 68, 405, 1, 0, 0, 0, 70, 407, 1, 0, 0, 0, 
		    72, 409, 1, 0, 0, 0, 74, 416, 1, 0, 0, 0, 76, 429, 1, 0, 0, 0, 78, 
		    434, 1, 0, 0, 0, 80, 436, 1, 0, 0, 0, 82, 439, 1, 0, 0, 0, 84, 444, 
		    1, 0, 0, 0, 86, 88, 3, 2, 1, 0, 87, 86, 1, 0, 0, 0, 88, 91, 1, 0, 
		    0, 0, 89, 87, 1, 0, 0, 0, 89, 90, 1, 0, 0, 0, 90, 92, 1, 0, 0, 0, 
		    91, 89, 1, 0, 0, 0, 92, 93, 5, 0, 0, 1, 93, 1, 1, 0, 0, 0, 94, 107, 
		    3, 14, 7, 0, 95, 107, 3, 16, 8, 0, 96, 107, 3, 18, 9, 0, 97, 107, 
		    3, 4, 2, 0, 98, 107, 3, 20, 10, 0, 99, 107, 3, 24, 12, 0, 100, 107, 
		    3, 26, 13, 0, 101, 107, 3, 32, 16, 0, 102, 107, 3, 36, 18, 0, 103, 
		    107, 3, 38, 19, 0, 104, 107, 3, 40, 20, 0, 105, 107, 3, 12, 6, 0, 
		    106, 94, 1, 0, 0, 0, 106, 95, 1, 0, 0, 0, 106, 96, 1, 0, 0, 0, 106, 
		    97, 1, 0, 0, 0, 106, 98, 1, 0, 0, 0, 106, 99, 1, 0, 0, 0, 106, 100, 
		    1, 0, 0, 0, 106, 101, 1, 0, 0, 0, 106, 102, 1, 0, 0, 0, 106, 103, 
		    1, 0, 0, 0, 106, 104, 1, 0, 0, 0, 106, 105, 1, 0, 0, 0, 107, 3, 1, 
		    0, 0, 0, 108, 109, 5, 34, 0, 0, 109, 110, 5, 60, 0, 0, 110, 112, 5, 
		    1, 0, 0, 111, 113, 3, 6, 3, 0, 112, 111, 1, 0, 0, 0, 112, 113, 1, 
		    0, 0, 0, 113, 114, 1, 0, 0, 0, 114, 116, 5, 2, 0, 0, 115, 117, 3, 
		    10, 5, 0, 116, 115, 1, 0, 0, 0, 116, 117, 1, 0, 0, 0, 117, 118, 1, 
		    0, 0, 0, 118, 119, 3, 12, 6, 0, 119, 5, 1, 0, 0, 0, 120, 125, 3, 8, 
		    4, 0, 121, 122, 5, 3, 0, 0, 122, 124, 3, 8, 4, 0, 123, 121, 1, 0, 
		    0, 0, 124, 127, 1, 0, 0, 0, 125, 123, 1, 0, 0, 0, 125, 126, 1, 0, 
		    0, 0, 126, 7, 1, 0, 0, 0, 127, 125, 1, 0, 0, 0, 128, 129, 5, 60, 0, 
		    0, 129, 130, 3, 78, 39, 0, 130, 9, 1, 0, 0, 0, 131, 144, 3, 78, 39, 
		    0, 132, 133, 5, 1, 0, 0, 133, 138, 3, 78, 39, 0, 134, 135, 5, 3, 0, 
		    0, 135, 137, 3, 78, 39, 0, 136, 134, 1, 0, 0, 0, 137, 140, 1, 0, 0, 
		    0, 138, 136, 1, 0, 0, 0, 138, 139, 1, 0, 0, 0, 139, 141, 1, 0, 0, 
		    0, 140, 138, 1, 0, 0, 0, 141, 142, 5, 2, 0, 0, 142, 144, 1, 0, 0, 
		    0, 143, 131, 1, 0, 0, 0, 143, 132, 1, 0, 0, 0, 144, 11, 1, 0, 0, 0, 
		    145, 149, 5, 4, 0, 0, 146, 148, 3, 2, 1, 0, 147, 146, 1, 0, 0, 0, 
		    148, 151, 1, 0, 0, 0, 149, 147, 1, 0, 0, 0, 149, 150, 1, 0, 0, 0, 
		    150, 152, 1, 0, 0, 0, 151, 149, 1, 0, 0, 0, 152, 153, 5, 5, 0, 0, 
		    153, 13, 1, 0, 0, 0, 154, 155, 5, 35, 0, 0, 155, 156, 3, 44, 22, 0, 
		    156, 157, 3, 78, 39, 0, 157, 165, 1, 0, 0, 0, 158, 159, 5, 35, 0, 
		    0, 159, 160, 3, 44, 22, 0, 160, 161, 3, 78, 39, 0, 161, 162, 5, 6, 
		    0, 0, 162, 163, 3, 46, 23, 0, 163, 165, 1, 0, 0, 0, 164, 154, 1, 0, 
		    0, 0, 164, 158, 1, 0, 0, 0, 165, 15, 1, 0, 0, 0, 166, 167, 3, 44, 
		    22, 0, 167, 168, 5, 7, 0, 0, 168, 169, 3, 46, 23, 0, 169, 17, 1, 0, 
		    0, 0, 170, 171, 5, 36, 0, 0, 171, 172, 5, 60, 0, 0, 172, 173, 3, 78, 
		    39, 0, 173, 174, 5, 6, 0, 0, 174, 175, 3, 48, 24, 0, 175, 19, 1, 0, 
		    0, 0, 176, 177, 3, 64, 32, 0, 177, 178, 3, 22, 11, 0, 178, 179, 3, 
		    48, 24, 0, 179, 184, 1, 0, 0, 0, 180, 181, 3, 64, 32, 0, 181, 182, 
		    7, 0, 0, 0, 182, 184, 1, 0, 0, 0, 183, 176, 1, 0, 0, 0, 183, 180, 
		    1, 0, 0, 0, 184, 21, 1, 0, 0, 0, 185, 186, 7, 1, 0, 0, 186, 23, 1, 
		    0, 0, 0, 187, 191, 5, 37, 0, 0, 188, 189, 3, 42, 21, 0, 189, 190, 
		    5, 14, 0, 0, 190, 192, 1, 0, 0, 0, 191, 188, 1, 0, 0, 0, 191, 192, 
		    1, 0, 0, 0, 192, 193, 1, 0, 0, 0, 193, 194, 3, 48, 24, 0, 194, 200, 
		    3, 12, 6, 0, 195, 198, 5, 38, 0, 0, 196, 199, 3, 24, 12, 0, 197, 199, 
		    3, 12, 6, 0, 198, 196, 1, 0, 0, 0, 198, 197, 1, 0, 0, 0, 199, 201, 
		    1, 0, 0, 0, 200, 195, 1, 0, 0, 0, 200, 201, 1, 0, 0, 0, 201, 25, 1, 
		    0, 0, 0, 202, 203, 5, 39, 0, 0, 203, 204, 3, 48, 24, 0, 204, 208, 
		    5, 4, 0, 0, 205, 207, 3, 28, 14, 0, 206, 205, 1, 0, 0, 0, 207, 210, 
		    1, 0, 0, 0, 208, 206, 1, 0, 0, 0, 208, 209, 1, 0, 0, 0, 209, 212, 
		    1, 0, 0, 0, 210, 208, 1, 0, 0, 0, 211, 213, 3, 30, 15, 0, 212, 211, 
		    1, 0, 0, 0, 212, 213, 1, 0, 0, 0, 213, 214, 1, 0, 0, 0, 214, 215, 
		    5, 5, 0, 0, 215, 27, 1, 0, 0, 0, 216, 217, 5, 40, 0, 0, 217, 218, 
		    3, 46, 23, 0, 218, 222, 5, 15, 0, 0, 219, 221, 3, 2, 1, 0, 220, 219, 
		    1, 0, 0, 0, 221, 224, 1, 0, 0, 0, 222, 220, 1, 0, 0, 0, 222, 223, 
		    1, 0, 0, 0, 223, 29, 1, 0, 0, 0, 224, 222, 1, 0, 0, 0, 225, 226, 5, 
		    41, 0, 0, 226, 230, 5, 15, 0, 0, 227, 229, 3, 2, 1, 0, 228, 227, 1, 
		    0, 0, 0, 229, 232, 1, 0, 0, 0, 230, 228, 1, 0, 0, 0, 230, 231, 1, 
		    0, 0, 0, 231, 31, 1, 0, 0, 0, 232, 230, 1, 0, 0, 0, 233, 234, 5, 42, 
		    0, 0, 234, 235, 3, 34, 17, 0, 235, 236, 3, 12, 6, 0, 236, 244, 1, 
		    0, 0, 0, 237, 238, 5, 42, 0, 0, 238, 239, 3, 48, 24, 0, 239, 240, 
		    3, 12, 6, 0, 240, 244, 1, 0, 0, 0, 241, 242, 5, 42, 0, 0, 242, 244, 
		    3, 12, 6, 0, 243, 233, 1, 0, 0, 0, 243, 237, 1, 0, 0, 0, 243, 241, 
		    1, 0, 0, 0, 244, 33, 1, 0, 0, 0, 245, 247, 3, 42, 21, 0, 246, 245, 
		    1, 0, 0, 0, 246, 247, 1, 0, 0, 0, 247, 248, 1, 0, 0, 0, 248, 250, 
		    5, 14, 0, 0, 249, 251, 3, 48, 24, 0, 250, 249, 1, 0, 0, 0, 250, 251, 
		    1, 0, 0, 0, 251, 252, 1, 0, 0, 0, 252, 254, 5, 14, 0, 0, 253, 255, 
		    3, 42, 21, 0, 254, 253, 1, 0, 0, 0, 254, 255, 1, 0, 0, 0, 255, 35, 
		    1, 0, 0, 0, 256, 257, 5, 43, 0, 0, 257, 37, 1, 0, 0, 0, 258, 259, 
		    5, 44, 0, 0, 259, 39, 1, 0, 0, 0, 260, 262, 5, 45, 0, 0, 261, 263, 
		    3, 46, 23, 0, 262, 261, 1, 0, 0, 0, 262, 263, 1, 0, 0, 0, 263, 41, 
		    1, 0, 0, 0, 264, 267, 3, 16, 8, 0, 265, 267, 3, 20, 10, 0, 266, 264, 
		    1, 0, 0, 0, 266, 265, 1, 0, 0, 0, 267, 43, 1, 0, 0, 0, 268, 273, 5, 
		    60, 0, 0, 269, 270, 5, 3, 0, 0, 270, 272, 5, 60, 0, 0, 271, 269, 1, 
		    0, 0, 0, 272, 275, 1, 0, 0, 0, 273, 271, 1, 0, 0, 0, 273, 274, 1, 
		    0, 0, 0, 274, 45, 1, 0, 0, 0, 275, 273, 1, 0, 0, 0, 276, 281, 3, 48, 
		    24, 0, 277, 278, 5, 3, 0, 0, 278, 280, 3, 48, 24, 0, 279, 277, 1, 
		    0, 0, 0, 280, 283, 1, 0, 0, 0, 281, 279, 1, 0, 0, 0, 281, 282, 1, 
		    0, 0, 0, 282, 47, 1, 0, 0, 0, 283, 281, 1, 0, 0, 0, 284, 285, 3, 50, 
		    25, 0, 285, 49, 1, 0, 0, 0, 286, 291, 3, 52, 26, 0, 287, 288, 5, 16, 
		    0, 0, 288, 290, 3, 52, 26, 0, 289, 287, 1, 0, 0, 0, 290, 293, 1, 0, 
		    0, 0, 291, 289, 1, 0, 0, 0, 291, 292, 1, 0, 0, 0, 292, 51, 1, 0, 0, 
		    0, 293, 291, 1, 0, 0, 0, 294, 299, 3, 54, 27, 0, 295, 296, 5, 17, 
		    0, 0, 296, 298, 3, 54, 27, 0, 297, 295, 1, 0, 0, 0, 298, 301, 1, 0, 
		    0, 0, 299, 297, 1, 0, 0, 0, 299, 300, 1, 0, 0, 0, 300, 53, 1, 0, 0, 
		    0, 301, 299, 1, 0, 0, 0, 302, 307, 3, 56, 28, 0, 303, 304, 7, 2, 0, 
		    0, 304, 306, 3, 56, 28, 0, 305, 303, 1, 0, 0, 0, 306, 309, 1, 0, 0, 
		    0, 307, 305, 1, 0, 0, 0, 307, 308, 1, 0, 0, 0, 308, 55, 1, 0, 0, 0, 
		    309, 307, 1, 0, 0, 0, 310, 315, 3, 58, 29, 0, 311, 312, 7, 3, 0, 0, 
		    312, 314, 3, 58, 29, 0, 313, 311, 1, 0, 0, 0, 314, 317, 1, 0, 0, 0, 
		    315, 313, 1, 0, 0, 0, 315, 316, 1, 0, 0, 0, 316, 57, 1, 0, 0, 0, 317, 
		    315, 1, 0, 0, 0, 318, 323, 3, 60, 30, 0, 319, 320, 7, 4, 0, 0, 320, 
		    322, 3, 60, 30, 0, 321, 319, 1, 0, 0, 0, 322, 325, 1, 0, 0, 0, 323, 
		    321, 1, 0, 0, 0, 323, 324, 1, 0, 0, 0, 324, 59, 1, 0, 0, 0, 325, 323, 
		    1, 0, 0, 0, 326, 331, 3, 62, 31, 0, 327, 328, 7, 5, 0, 0, 328, 330, 
		    3, 62, 31, 0, 329, 327, 1, 0, 0, 0, 330, 333, 1, 0, 0, 0, 331, 329, 
		    1, 0, 0, 0, 331, 332, 1, 0, 0, 0, 332, 61, 1, 0, 0, 0, 333, 331, 1, 
		    0, 0, 0, 334, 335, 5, 29, 0, 0, 335, 344, 3, 62, 31, 0, 336, 337, 
		    5, 25, 0, 0, 337, 344, 3, 62, 31, 0, 338, 339, 5, 26, 0, 0, 339, 344, 
		    3, 62, 31, 0, 340, 341, 5, 30, 0, 0, 341, 344, 3, 62, 31, 0, 342, 
		    344, 3, 64, 32, 0, 343, 334, 1, 0, 0, 0, 343, 336, 1, 0, 0, 0, 343, 
		    338, 1, 0, 0, 0, 343, 340, 1, 0, 0, 0, 343, 342, 1, 0, 0, 0, 344, 
		    63, 1, 0, 0, 0, 345, 346, 6, 32, -1, 0, 346, 357, 3, 70, 35, 0, 347, 
		    357, 5, 60, 0, 0, 348, 357, 5, 46, 0, 0, 349, 350, 5, 1, 0, 0, 350, 
		    351, 3, 48, 24, 0, 351, 352, 5, 2, 0, 0, 352, 357, 1, 0, 0, 0, 353, 
		    357, 3, 66, 33, 0, 354, 357, 3, 68, 34, 0, 355, 357, 3, 72, 36, 0, 
		    356, 345, 1, 0, 0, 0, 356, 347, 1, 0, 0, 0, 356, 348, 1, 0, 0, 0, 
		    356, 349, 1, 0, 0, 0, 356, 353, 1, 0, 0, 0, 356, 354, 1, 0, 0, 0, 
		    356, 355, 1, 0, 0, 0, 357, 371, 1, 0, 0, 0, 358, 359, 10, 5, 0, 0, 
		    359, 360, 5, 31, 0, 0, 360, 361, 3, 48, 24, 0, 361, 362, 5, 32, 0, 
		    0, 362, 370, 1, 0, 0, 0, 363, 364, 10, 4, 0, 0, 364, 366, 5, 1, 0, 
		    0, 365, 367, 3, 46, 23, 0, 366, 365, 1, 0, 0, 0, 366, 367, 1, 0, 0, 
		    0, 367, 368, 1, 0, 0, 0, 368, 370, 5, 2, 0, 0, 369, 358, 1, 0, 0, 
		    0, 369, 363, 1, 0, 0, 0, 370, 373, 1, 0, 0, 0, 371, 369, 1, 0, 0, 
		    0, 371, 372, 1, 0, 0, 0, 372, 65, 1, 0, 0, 0, 373, 371, 1, 0, 0, 0, 
		    374, 375, 5, 47, 0, 0, 375, 376, 5, 33, 0, 0, 376, 377, 5, 48, 0, 
		    0, 377, 379, 5, 1, 0, 0, 378, 380, 3, 46, 23, 0, 379, 378, 1, 0, 0, 
		    0, 379, 380, 1, 0, 0, 0, 380, 381, 1, 0, 0, 0, 381, 382, 5, 2, 0, 
		    0, 382, 67, 1, 0, 0, 0, 383, 384, 5, 49, 0, 0, 384, 385, 5, 1, 0, 
		    0, 385, 386, 3, 48, 24, 0, 386, 387, 5, 2, 0, 0, 387, 406, 1, 0, 0, 
		    0, 388, 389, 5, 50, 0, 0, 389, 390, 5, 1, 0, 0, 390, 406, 5, 2, 0, 
		    0, 391, 392, 5, 51, 0, 0, 392, 393, 5, 1, 0, 0, 393, 394, 3, 48, 24, 
		    0, 394, 395, 5, 3, 0, 0, 395, 396, 3, 48, 24, 0, 396, 397, 5, 3, 0, 
		    0, 397, 398, 3, 48, 24, 0, 398, 399, 5, 2, 0, 0, 399, 406, 1, 0, 0, 
		    0, 400, 401, 5, 52, 0, 0, 401, 402, 5, 1, 0, 0, 402, 403, 3, 48, 24, 
		    0, 403, 404, 5, 2, 0, 0, 404, 406, 1, 0, 0, 0, 405, 383, 1, 0, 0, 
		    0, 405, 388, 1, 0, 0, 0, 405, 391, 1, 0, 0, 0, 405, 400, 1, 0, 0, 
		    0, 406, 69, 1, 0, 0, 0, 407, 408, 7, 6, 0, 0, 408, 71, 1, 0, 0, 0, 
		    409, 410, 3, 78, 39, 0, 410, 412, 5, 4, 0, 0, 411, 413, 3, 74, 37, 
		    0, 412, 411, 1, 0, 0, 0, 412, 413, 1, 0, 0, 0, 413, 414, 1, 0, 0, 
		    0, 414, 415, 5, 5, 0, 0, 415, 73, 1, 0, 0, 0, 416, 421, 3, 76, 38, 
		    0, 417, 418, 5, 3, 0, 0, 418, 420, 3, 76, 38, 0, 419, 417, 1, 0, 0, 
		    0, 420, 423, 1, 0, 0, 0, 421, 419, 1, 0, 0, 0, 421, 422, 1, 0, 0, 
		    0, 422, 425, 1, 0, 0, 0, 423, 421, 1, 0, 0, 0, 424, 426, 5, 3, 0, 
		    0, 425, 424, 1, 0, 0, 0, 425, 426, 1, 0, 0, 0, 426, 75, 1, 0, 0, 0, 
		    427, 430, 3, 48, 24, 0, 428, 430, 3, 72, 36, 0, 429, 427, 1, 0, 0, 
		    0, 429, 428, 1, 0, 0, 0, 430, 77, 1, 0, 0, 0, 431, 435, 3, 80, 40, 
		    0, 432, 435, 3, 82, 41, 0, 433, 435, 3, 84, 42, 0, 434, 431, 1, 0, 
		    0, 0, 434, 432, 1, 0, 0, 0, 434, 433, 1, 0, 0, 0, 435, 79, 1, 0, 0, 
		    0, 436, 437, 5, 26, 0, 0, 437, 438, 3, 78, 39, 0, 438, 81, 1, 0, 0, 
		    0, 439, 440, 5, 31, 0, 0, 440, 441, 3, 48, 24, 0, 441, 442, 5, 32, 
		    0, 0, 442, 443, 3, 78, 39, 0, 443, 83, 1, 0, 0, 0, 444, 445, 7, 7, 
		    0, 0, 445, 85, 1, 0, 0, 0, 43, 89, 106, 112, 116, 125, 138, 143, 149, 
		    164, 183, 191, 198, 200, 208, 212, 222, 230, 243, 246, 250, 254, 262, 
		    266, 273, 281, 291, 299, 307, 315, 323, 331, 343, 356, 366, 369, 371, 
		    379, 405, 412, 421, 425, 429, 434];
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
		        $this->setState(89);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -142531677388791) !== 0)) {
		        	$this->setState(86);
		        	$this->declaration();
		        	$this->setState(91);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(92);
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
		public function declaration(): Context\DeclarationContext
		{
		    $localContext = new Context\DeclarationContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_declaration);

		    try {
		        $this->setState(106);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(94);
		        	    $this->varDcl();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(95);
		        	    $this->shortVarDcl();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(96);
		        	    $this->constDcl();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(97);
		        	    $this->functionDcl();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(98);
		        	    $this->assignmentStmt();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(99);
		        	    $this->ifStmt();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(100);
		        	    $this->switchStmt();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(101);
		        	    $this->forStmt();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(102);
		        	    $this->breakStmt();
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(103);
		        	    $this->continueStmt();
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(104);
		        	    $this->returnStmt();
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(105);
		        	    $this->block();
		        	break;
		        }
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
		public function functionDcl(): Context\FunctionDclContext
		{
		    $localContext = new Context\FunctionDclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_functionDcl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(108);
		        $this->match(self::FUNC);
		        $this->setState(109);
		        $this->match(self::IDENTIFIER);
		        $this->setState(110);
		        $this->match(self::T__0);
		        $this->setState(112);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::IDENTIFIER) {
		        	$this->setState(111);
		        	$this->params();
		        }
		        $this->setState(114);
		        $this->match(self::T__1);
		        $this->setState(116);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 279223179111563266) !== 0)) {
		        	$this->setState(115);
		        	$this->result();
		        }
		        $this->setState(118);
		        $this->block();
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
		public function params(): Context\ParamsContext
		{
		    $localContext = new Context\ParamsContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_params);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(120);
		        $this->param();
		        $this->setState(125);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(121);
		        	$this->match(self::T__2);
		        	$this->setState(122);
		        	$this->param();
		        	$this->setState(127);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
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
		public function param(): Context\ParamContext
		{
		    $localContext = new Context\ParamContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_param);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(128);
		        $this->match(self::IDENTIFIER);
		        $this->setState(129);
		        $this->type();
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
		public function result(): Context\ResultContext
		{
		    $localContext = new Context\ResultContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_result);

		    try {
		        $this->setState(143);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__25:
		            case self::T__30:
		            case self::INT32:
		            case self::FLOAT32:
		            case self::BOOL:
		            case self::RUNE:
		            case self::STRING:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(131);
		            	$this->type();
		            	break;

		            case self::T__0:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(132);
		            	$this->match(self::T__0);
		            	$this->setState(133);
		            	$this->type();
		            	$this->setState(138);
		            	$this->errorHandler->sync($this);

		            	$_la = $this->input->LA(1);
		            	while ($_la === self::T__2) {
		            		$this->setState(134);
		            		$this->match(self::T__2);
		            		$this->setState(135);
		            		$this->type();
		            		$this->setState(140);
		            		$this->errorHandler->sync($this);
		            		$_la = $this->input->LA(1);
		            	}
		            	$this->setState(141);
		            	$this->match(self::T__1);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
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
		public function block(): Context\BlockContext
		{
		    $localContext = new Context\BlockContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_block);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(145);
		        $this->match(self::T__3);
		        $this->setState(149);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -142531677388791) !== 0)) {
		        	$this->setState(146);
		        	$this->declaration();
		        	$this->setState(151);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(152);
		        $this->match(self::T__4);
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
		public function varDcl(): Context\VarDclContext
		{
		    $localContext = new Context\VarDclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_varDcl);

		    try {
		        $this->setState(164);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(154);
		        	    $this->match(self::VAR);
		        	    $this->setState(155);
		        	    $this->id_list();
		        	    $this->setState(156);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(158);
		        	    $this->match(self::VAR);
		        	    $this->setState(159);
		        	    $this->id_list();
		        	    $this->setState(160);
		        	    $this->type();
		        	    $this->setState(161);
		        	    $this->match(self::T__5);
		        	    $this->setState(162);
		        	    $this->exp_list();
		        	break;
		        }
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
		public function shortVarDcl(): Context\ShortVarDclContext
		{
		    $localContext = new Context\ShortVarDclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_shortVarDcl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(166);
		        $this->id_list();
		        $this->setState(167);
		        $this->match(self::T__6);
		        $this->setState(168);
		        $this->exp_list();
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
		public function constDcl(): Context\ConstDclContext
		{
		    $localContext = new Context\ConstDclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_constDcl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(170);
		        $this->match(self::CONST);
		        $this->setState(171);
		        $this->match(self::IDENTIFIER);
		        $this->setState(172);
		        $this->type();
		        $this->setState(173);
		        $this->match(self::T__5);
		        $this->setState(174);
		        $this->expression();
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
		public function assignmentStmt(): Context\AssignmentStmtContext
		{
		    $localContext = new Context\AssignmentStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_assignmentStmt);

		    try {
		        $this->setState(183);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 9, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(176);
		        	    $this->recursivePrimaryExpr(0);
		        	    $this->setState(177);
		        	    $this->assignOp();
		        	    $this->setState(178);
		        	    $this->expression();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(180);
		        	    $this->recursivePrimaryExpr(0);
		        	    $this->setState(181);

		        	    $_la = $this->input->LA(1);

		        	    if (!($_la === self::T__7 || $_la === self::T__8)) {
		        	    $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	break;
		        }
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
		public function assignOp(): Context\AssignOpContext
		{
		    $localContext = new Context\AssignOpContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_assignOp);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(185);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 15424) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
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
		public function ifStmt(): Context\IfStmtContext
		{
		    $localContext = new Context\IfStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_ifStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(187);
		        $this->match(self::IF);
		        $this->setState(191);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 10, $this->ctx)) {
		            case 1:
		        	    $this->setState(188);
		        	    $this->simpleStmt();
		        	    $this->setState(189);
		        	    $this->match(self::T__13);
		        	break;
		        }
		        $this->setState(193);
		        $this->expression();
		        $this->setState(194);
		        $this->block();
		        $this->setState(200);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(195);
		        	$this->match(self::ELSE);
		        	$this->setState(198);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::IF:
		        	    	$this->setState(196);
		        	    	$this->ifStmt();
		        	    	break;

		        	    case self::T__3:
		        	    	$this->setState(197);
		        	    	$this->block();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        }
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
		public function switchStmt(): Context\SwitchStmtContext
		{
		    $localContext = new Context\SwitchStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_switchStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(202);
		        $this->match(self::SWITCH);
		        $this->setState(203);
		        $this->expression();
		        $this->setState(204);
		        $this->match(self::T__3);
		        $this->setState(208);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::CASE) {
		        	$this->setState(205);
		        	$this->caseClause();
		        	$this->setState(210);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(212);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::DEFAULT) {
		        	$this->setState(211);
		        	$this->defaultClause();
		        }
		        $this->setState(214);
		        $this->match(self::T__4);
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
		public function caseClause(): Context\CaseClauseContext
		{
		    $localContext = new Context\CaseClauseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 28, self::RULE_caseClause);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(216);
		        $this->match(self::CASE);
		        $this->setState(217);
		        $this->exp_list();
		        $this->setState(218);
		        $this->match(self::T__14);
		        $this->setState(222);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -142531677388791) !== 0)) {
		        	$this->setState(219);
		        	$this->declaration();
		        	$this->setState(224);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
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
		public function defaultClause(): Context\DefaultClauseContext
		{
		    $localContext = new Context\DefaultClauseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 30, self::RULE_defaultClause);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(225);
		        $this->match(self::DEFAULT);
		        $this->setState(226);
		        $this->match(self::T__14);
		        $this->setState(230);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -142531677388791) !== 0)) {
		        	$this->setState(227);
		        	$this->declaration();
		        	$this->setState(232);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
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
		public function forStmt(): Context\ForStmtContext
		{
		    $localContext = new Context\ForStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 32, self::RULE_forStmt);

		    try {
		        $this->setState(243);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 17, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(233);
		        	    $this->match(self::FOR);
		        	    $this->setState(234);
		        	    $this->forClause();
		        	    $this->setState(235);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(237);
		        	    $this->match(self::FOR);
		        	    $this->setState(238);
		        	    $this->expression();
		        	    $this->setState(239);
		        	    $this->block();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(241);
		        	    $this->match(self::FOR);
		        	    $this->setState(242);
		        	    $this->block();
		        	break;
		        }
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
		public function forClause(): Context\ForClauseContext
		{
		    $localContext = new Context\ForClauseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_forClause);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(246);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175920753147903) !== 0)) {
		        	$this->setState(245);
		        	$this->simpleStmt();
		        }
		        $this->setState(248);
		        $this->match(self::T__13);
		        $this->setState(250);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175919931064319) !== 0)) {
		        	$this->setState(249);
		        	$this->expression();
		        }
		        $this->setState(252);
		        $this->match(self::T__13);
		        $this->setState(254);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175920753147903) !== 0)) {
		        	$this->setState(253);
		        	$this->simpleStmt();
		        }
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
		public function breakStmt(): Context\BreakStmtContext
		{
		    $localContext = new Context\BreakStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 36, self::RULE_breakStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(256);
		        $this->match(self::BREAK);
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
		public function continueStmt(): Context\ContinueStmtContext
		{
		    $localContext = new Context\ContinueStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 38, self::RULE_continueStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(258);
		        $this->match(self::CONTINUE);
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
		public function returnStmt(): Context\ReturnStmtContext
		{
		    $localContext = new Context\ReturnStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 40, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(260);
		        $this->match(self::RETURN);
		        $this->setState(262);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 21, $this->ctx)) {
		            case 1:
		        	    $this->setState(261);
		        	    $this->exp_list();
		        	break;
		        }
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
		public function simpleStmt(): Context\SimpleStmtContext
		{
		    $localContext = new Context\SimpleStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 42, self::RULE_simpleStmt);

		    try {
		        $this->setState(266);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 22, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(264);
		        	    $this->shortVarDcl();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(265);
		        	    $this->assignmentStmt();
		        	break;
		        }
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
		public function id_list(): Context\Id_listContext
		{
		    $localContext = new Context\Id_listContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 44, self::RULE_id_list);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(268);
		        $this->match(self::IDENTIFIER);
		        $this->setState(273);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(269);
		        	$this->match(self::T__2);
		        	$this->setState(270);
		        	$this->match(self::IDENTIFIER);
		        	$this->setState(275);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
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
		public function exp_list(): Context\Exp_listContext
		{
		    $localContext = new Context\Exp_listContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 46, self::RULE_exp_list);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(276);
		        $this->expression();
		        $this->setState(281);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(277);
		        	$this->match(self::T__2);
		        	$this->setState(278);
		        	$this->expression();
		        	$this->setState(283);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
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
		public function expression(): Context\ExpressionContext
		{
		    $localContext = new Context\ExpressionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 48, self::RULE_expression);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(284);
		        $this->logicalOrExpr();
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
		public function logicalOrExpr(): Context\LogicalOrExprContext
		{
		    $localContext = new Context\LogicalOrExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 50, self::RULE_logicalOrExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(286);
		        $this->logicalAndExpr();
		        $this->setState(291);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__15) {
		        	$this->setState(287);
		        	$this->match(self::T__15);
		        	$this->setState(288);
		        	$this->logicalAndExpr();
		        	$this->setState(293);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
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
		public function logicalAndExpr(): Context\LogicalAndExprContext
		{
		    $localContext = new Context\LogicalAndExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 52, self::RULE_logicalAndExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(294);
		        $this->equalityExpr();
		        $this->setState(299);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__16) {
		        	$this->setState(295);
		        	$this->match(self::T__16);
		        	$this->setState(296);
		        	$this->equalityExpr();
		        	$this->setState(301);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
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
		public function equalityExpr(): Context\EqualityExprContext
		{
		    $localContext = new Context\EqualityExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 54, self::RULE_equalityExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(302);
		        $this->relationalExpr();
		        $this->setState(307);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__17 || $_la === self::T__18) {
		        	$this->setState(303);

		        	$_la = $this->input->LA(1);

		        	if (!($_la === self::T__17 || $_la === self::T__18)) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(304);
		        	$this->relationalExpr();
		        	$this->setState(309);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
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
		public function relationalExpr(): Context\RelationalExprContext
		{
		    $localContext = new Context\RelationalExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 56, self::RULE_relationalExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(310);
		        $this->additiveExpr();
		        $this->setState(315);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 15728640) !== 0)) {
		        	$this->setState(311);

		        	$_la = $this->input->LA(1);

		        	if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 15728640) !== 0))) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(312);
		        	$this->additiveExpr();
		        	$this->setState(317);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
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
		public function additiveExpr(): Context\AdditiveExprContext
		{
		    $localContext = new Context\AdditiveExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 58, self::RULE_additiveExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(318);
		        $this->multiplicativeExpr();
		        $this->setState(323);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__23 || $_la === self::T__24) {
		        	$this->setState(319);

		        	$_la = $this->input->LA(1);

		        	if (!($_la === self::T__23 || $_la === self::T__24)) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(320);
		        	$this->multiplicativeExpr();
		        	$this->setState(325);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
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
		public function multiplicativeExpr(): Context\MultiplicativeExprContext
		{
		    $localContext = new Context\MultiplicativeExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 60, self::RULE_multiplicativeExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(326);
		        $this->unaryExpr();
		        $this->setState(331);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 30, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(327);

		        		$_la = $this->input->LA(1);

		        		if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 469762048) !== 0))) {
		        		$this->errorHandler->recoverInline($this);
		        		} else {
		        			if ($this->input->LA(1) === Token::EOF) {
		        			    $this->matchedEOF = true;
		        		    }

		        			$this->errorHandler->reportMatch($this);
		        			$this->consume();
		        		}
		        		$this->setState(328);
		        		$this->unaryExpr(); 
		        	}

		        	$this->setState(333);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 30, $this->ctx);
		        }
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
		public function unaryExpr(): Context\UnaryExprContext
		{
		    $localContext = new Context\UnaryExprContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 62, self::RULE_unaryExpr);

		    try {
		        $this->setState(343);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 31, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(334);
		        	    $this->match(self::T__28);
		        	    $this->setState(335);
		        	    $this->unaryExpr();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(336);
		        	    $this->match(self::T__24);
		        	    $this->setState(337);
		        	    $this->unaryExpr();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(338);
		        	    $this->match(self::T__25);
		        	    $this->setState(339);
		        	    $this->unaryExpr();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(340);
		        	    $this->match(self::T__29);
		        	    $this->setState(341);
		        	    $this->unaryExpr();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(342);
		        	    $this->recursivePrimaryExpr(0);
		        	break;
		        }
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
		public function primaryExpr(): Context\PrimaryExprContext
		{
			return $this->recursivePrimaryExpr(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursivePrimaryExpr(int $precedence): Context\PrimaryExprContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\PrimaryExprContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 64;
			$this->enterRecursionRule($localContext, 64, self::RULE_primaryExpr, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(356);
				$this->errorHandler->sync($this);

				switch ($this->input->LA(1)) {
				    case self::TRUE:
				    case self::FALSE:
				    case self::INT_LITERAL:
				    case self::FLOAT_LITERAL:
				    case self::STRING_LITERAL:
				    case self::RUNE_LITERAL:
				    	$this->setState(346);
				    	$this->literal();
				    	break;

				    case self::IDENTIFIER:
				    	$this->setState(347);
				    	$this->match(self::IDENTIFIER);
				    	break;

				    case self::NIL:
				    	$this->setState(348);
				    	$this->match(self::NIL);
				    	break;

				    case self::T__0:
				    	$this->setState(349);
				    	$this->match(self::T__0);
				    	$this->setState(350);
				    	$this->expression();
				    	$this->setState(351);
				    	$this->match(self::T__1);
				    	break;

				    case self::FMT:
				    	$this->setState(353);
				    	$this->fmtPrintlnCall();
				    	break;

				    case self::LEN:
				    case self::NOW:
				    case self::SUBSTR:
				    case self::TYPEOF:
				    	$this->setState(354);
				    	$this->builtinCall();
				    	break;

				    case self::T__25:
				    case self::T__30:
				    case self::INT32:
				    case self::FLOAT32:
				    case self::BOOL:
				    case self::RUNE:
				    case self::STRING:
				    	$this->setState(355);
				    	$this->arrayLiteral();
				    	break;

				default:
					throw new NoViableAltException($this);
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(371);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 35, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(369);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 34, $this->ctx)) {
							case 1:
							    $localContext = new Context\PrimaryExprContext($parentContext, $parentState);
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_primaryExpr);
							    $this->setState(358);

							    if (!($this->precpred($this->ctx, 5))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 5)");
							    }
							    $this->setState(359);
							    $this->match(self::T__30);
							    $this->setState(360);
							    $this->expression();
							    $this->setState(361);
							    $this->match(self::T__31);
							break;

							case 2:
							    $localContext = new Context\PrimaryExprContext($parentContext, $parentState);
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_primaryExpr);
							    $this->setState(363);

							    if (!($this->precpred($this->ctx, 4))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 4)");
							    }
							    $this->setState(364);
							    $this->match(self::T__0);
							    $this->setState(366);
							    $this->errorHandler->sync($this);
							    $_la = $this->input->LA(1);

							    if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175919931064319) !== 0)) {
							    	$this->setState(365);
							    	$this->exp_list();
							    }
							    $this->setState(368);
							    $this->match(self::T__1);
							break;
						} 
					}

					$this->setState(373);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 35, $this->ctx);
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

		/**
		 * @throws RecognitionException
		 */
		public function fmtPrintlnCall(): Context\FmtPrintlnCallContext
		{
		    $localContext = new Context\FmtPrintlnCallContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 66, self::RULE_fmtPrintlnCall);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(374);
		        $this->match(self::FMT);
		        $this->setState(375);
		        $this->match(self::T__32);
		        $this->setState(376);
		        $this->match(self::PRINTLN);
		        $this->setState(377);
		        $this->match(self::T__0);
		        $this->setState(379);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175919931064319) !== 0)) {
		        	$this->setState(378);
		        	$this->exp_list();
		        }
		        $this->setState(381);
		        $this->match(self::T__1);
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
		public function builtinCall(): Context\BuiltinCallContext
		{
		    $localContext = new Context\BuiltinCallContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 68, self::RULE_builtinCall);

		    try {
		        $this->setState(405);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::LEN:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(383);
		            	$this->match(self::LEN);
		            	$this->setState(384);
		            	$this->match(self::T__0);
		            	$this->setState(385);
		            	$this->expression();
		            	$this->setState(386);
		            	$this->match(self::T__1);
		            	break;

		            case self::NOW:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(388);
		            	$this->match(self::NOW);
		            	$this->setState(389);
		            	$this->match(self::T__0);
		            	$this->setState(390);
		            	$this->match(self::T__1);
		            	break;

		            case self::SUBSTR:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(391);
		            	$this->match(self::SUBSTR);
		            	$this->setState(392);
		            	$this->match(self::T__0);
		            	$this->setState(393);
		            	$this->expression();
		            	$this->setState(394);
		            	$this->match(self::T__2);
		            	$this->setState(395);
		            	$this->expression();
		            	$this->setState(396);
		            	$this->match(self::T__2);
		            	$this->setState(397);
		            	$this->expression();
		            	$this->setState(398);
		            	$this->match(self::T__1);
		            	break;

		            case self::TYPEOF:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(400);
		            	$this->match(self::TYPEOF);
		            	$this->setState(401);
		            	$this->match(self::T__0);
		            	$this->setState(402);
		            	$this->expression();
		            	$this->setState(403);
		            	$this->match(self::T__1);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
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
		public function literal(): Context\LiteralContext
		{
		    $localContext = new Context\LiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 70, self::RULE_literal);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(407);

		        $_la = $this->input->LA(1);

		        if (!((((($_la - 58)) & ~0x3f) === 0 && ((1 << ($_la - 58)) & 123) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
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
		public function arrayLiteral(): Context\ArrayLiteralContext
		{
		    $localContext = new Context\ArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 72, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(409);
		        $this->type();
		        $this->setState(410);
		        $this->match(self::T__3);
		        $this->setState(412);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175919931064319) !== 0)) {
		        	$this->setState(411);
		        	$this->elementList();
		        }
		        $this->setState(414);
		        $this->match(self::T__4);
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
		public function elementList(): Context\ElementListContext
		{
		    $localContext = new Context\ElementListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 74, self::RULE_elementList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(416);
		        $this->element();
		        $this->setState(421);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 39, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(417);
		        		$this->match(self::T__2);
		        		$this->setState(418);
		        		$this->element(); 
		        	}

		        	$this->setState(423);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 39, $this->ctx);
		        }
		        $this->setState(425);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__2) {
		        	$this->setState(424);
		        	$this->match(self::T__2);
		        }
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
		public function element(): Context\ElementContext
		{
		    $localContext = new Context\ElementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 76, self::RULE_element);

		    try {
		        $this->setState(429);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 41, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(427);
		        	    $this->expression();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(428);
		        	    $this->arrayLiteral();
		        	break;
		        }
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
		public function type(): Context\TypeContext
		{
		    $localContext = new Context\TypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 78, self::RULE_type);

		    try {
		        $this->setState(434);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__25:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(431);
		            	$this->pointerType();
		            	break;

		            case self::T__30:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(432);
		            	$this->arrayType();
		            	break;

		            case self::INT32:
		            case self::FLOAT32:
		            case self::BOOL:
		            case self::RUNE:
		            case self::STRING:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(433);
		            	$this->baseType();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
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
		public function pointerType(): Context\PointerTypeContext
		{
		    $localContext = new Context\PointerTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 80, self::RULE_pointerType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(436);
		        $this->match(self::T__25);
		        $this->setState(437);
		        $this->type();
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
		public function arrayType(): Context\ArrayTypeContext
		{
		    $localContext = new Context\ArrayTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 82, self::RULE_arrayType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(439);
		        $this->match(self::T__30);
		        $this->setState(440);
		        $this->expression();
		        $this->setState(441);
		        $this->match(self::T__31);
		        $this->setState(442);
		        $this->type();
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
		public function baseType(): Context\BaseTypeContext
		{
		    $localContext = new Context\BaseTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 84, self::RULE_baseType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(444);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 279223176896970752) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex): bool
		{
			switch ($ruleIndex) {
					case 32:
						return $this->sempredPrimaryExpr($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredPrimaryExpr(?Context\PrimaryExprContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 5);

			    case 1:
			        return $this->precpred($this->ctx, 4);
			}

			return true;
		}
	}
}

namespace ANTLR\Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use ANTLR\OLCParser;
	use ANTLR\OLCVisitor;
	use ANTLR\OLCListener;

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
	     * @return array<DeclarationContext>|DeclarationContext|null
	     */
	    public function declaration(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(DeclarationContext::class);
	    	}

	        return $this->getTypedRuleContext(DeclarationContext::class, $index);
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

	class DeclarationContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_declaration;
	    }

	    public function varDcl(): ?VarDclContext
	    {
	    	return $this->getTypedRuleContext(VarDclContext::class, 0);
	    }

	    public function shortVarDcl(): ?ShortVarDclContext
	    {
	    	return $this->getTypedRuleContext(ShortVarDclContext::class, 0);
	    }

	    public function constDcl(): ?ConstDclContext
	    {
	    	return $this->getTypedRuleContext(ConstDclContext::class, 0);
	    }

	    public function functionDcl(): ?FunctionDclContext
	    {
	    	return $this->getTypedRuleContext(FunctionDclContext::class, 0);
	    }

	    public function assignmentStmt(): ?AssignmentStmtContext
	    {
	    	return $this->getTypedRuleContext(AssignmentStmtContext::class, 0);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

	    public function switchStmt(): ?SwitchStmtContext
	    {
	    	return $this->getTypedRuleContext(SwitchStmtContext::class, 0);
	    }

	    public function forStmt(): ?ForStmtContext
	    {
	    	return $this->getTypedRuleContext(ForStmtContext::class, 0);
	    }

	    public function breakStmt(): ?BreakStmtContext
	    {
	    	return $this->getTypedRuleContext(BreakStmtContext::class, 0);
	    }

	    public function continueStmt(): ?ContinueStmtContext
	    {
	    	return $this->getTypedRuleContext(ContinueStmtContext::class, 0);
	    }

	    public function returnStmt(): ?ReturnStmtContext
	    {
	    	return $this->getTypedRuleContext(ReturnStmtContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterDeclaration($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitDeclaration($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitDeclaration($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FunctionDclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_functionDcl;
	    }

	    public function FUNC(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::FUNC, 0);
	    }

	    public function IDENTIFIER(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::IDENTIFIER, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function params(): ?ParamsContext
	    {
	    	return $this->getTypedRuleContext(ParamsContext::class, 0);
	    }

	    public function result(): ?ResultContext
	    {
	    	return $this->getTypedRuleContext(ResultContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterFunctionDcl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitFunctionDcl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitFunctionDcl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParamsContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_params;
	    }

	    /**
	     * @return array<ParamContext>|ParamContext|null
	     */
	    public function param(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ParamContext::class);
	    	}

	        return $this->getTypedRuleContext(ParamContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterParams($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitParams($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitParams($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParamContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_param;
	    }

	    public function IDENTIFIER(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::IDENTIFIER, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterParam($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitParam($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitParam($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ResultContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_result;
	    }

	    /**
	     * @return array<TypeContext>|TypeContext|null
	     */
	    public function type(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterResult($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitResult($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitResult($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BlockContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_block;
	    }

	    /**
	     * @return array<DeclarationContext>|DeclarationContext|null
	     */
	    public function declaration(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(DeclarationContext::class);
	    	}

	        return $this->getTypedRuleContext(DeclarationContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterBlock($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitBlock($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitBlock($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class VarDclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_varDcl;
	    }

	    public function VAR(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::VAR, 0);
	    }

	    public function id_list(): ?Id_listContext
	    {
	    	return $this->getTypedRuleContext(Id_listContext::class, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function exp_list(): ?Exp_listContext
	    {
	    	return $this->getTypedRuleContext(Exp_listContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterVarDcl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitVarDcl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitVarDcl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ShortVarDclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_shortVarDcl;
	    }

	    public function id_list(): ?Id_listContext
	    {
	    	return $this->getTypedRuleContext(Id_listContext::class, 0);
	    }

	    public function exp_list(): ?Exp_listContext
	    {
	    	return $this->getTypedRuleContext(Exp_listContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterShortVarDcl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitShortVarDcl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitShortVarDcl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ConstDclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_constDcl;
	    }

	    public function CONST(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::CONST, 0);
	    }

	    public function IDENTIFIER(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::IDENTIFIER, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterConstDcl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitConstDcl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitConstDcl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssignmentStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_assignmentStmt;
	    }

	    public function primaryExpr(): ?PrimaryExprContext
	    {
	    	return $this->getTypedRuleContext(PrimaryExprContext::class, 0);
	    }

	    public function assignOp(): ?AssignOpContext
	    {
	    	return $this->getTypedRuleContext(AssignOpContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterAssignmentStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitAssignmentStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitAssignmentStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssignOpContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_assignOp;
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterAssignOp($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitAssignOp($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitAssignOp($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IfStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_ifStmt;
	    }

	    public function IF(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::IF, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    /**
	     * @return array<BlockContext>|BlockContext|null
	     */
	    public function block(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(BlockContext::class);
	    	}

	        return $this->getTypedRuleContext(BlockContext::class, $index);
	    }

	    public function simpleStmt(): ?SimpleStmtContext
	    {
	    	return $this->getTypedRuleContext(SimpleStmtContext::class, 0);
	    }

	    public function ELSE(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::ELSE, 0);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterIfStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitIfStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitIfStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SwitchStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_switchStmt;
	    }

	    public function SWITCH(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::SWITCH, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    /**
	     * @return array<CaseClauseContext>|CaseClauseContext|null
	     */
	    public function caseClause(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(CaseClauseContext::class);
	    	}

	        return $this->getTypedRuleContext(CaseClauseContext::class, $index);
	    }

	    public function defaultClause(): ?DefaultClauseContext
	    {
	    	return $this->getTypedRuleContext(DefaultClauseContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterSwitchStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitSwitchStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitSwitchStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CaseClauseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_caseClause;
	    }

	    public function CASE(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::CASE, 0);
	    }

	    public function exp_list(): ?Exp_listContext
	    {
	    	return $this->getTypedRuleContext(Exp_listContext::class, 0);
	    }

	    /**
	     * @return array<DeclarationContext>|DeclarationContext|null
	     */
	    public function declaration(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(DeclarationContext::class);
	    	}

	        return $this->getTypedRuleContext(DeclarationContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterCaseClause($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitCaseClause($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitCaseClause($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DefaultClauseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_defaultClause;
	    }

	    public function DEFAULT(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::DEFAULT, 0);
	    }

	    /**
	     * @return array<DeclarationContext>|DeclarationContext|null
	     */
	    public function declaration(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(DeclarationContext::class);
	    	}

	        return $this->getTypedRuleContext(DeclarationContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterDefaultClause($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitDefaultClause($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitDefaultClause($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_forStmt;
	    }

	    public function FOR(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::FOR, 0);
	    }

	    public function forClause(): ?ForClauseContext
	    {
	    	return $this->getTypedRuleContext(ForClauseContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterForStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitForStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitForStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForClauseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_forClause;
	    }

	    /**
	     * @return array<SimpleStmtContext>|SimpleStmtContext|null
	     */
	    public function simpleStmt(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(SimpleStmtContext::class);
	    	}

	        return $this->getTypedRuleContext(SimpleStmtContext::class, $index);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterForClause($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitForClause($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitForClause($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BreakStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_breakStmt;
	    }

	    public function BREAK(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::BREAK, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterBreakStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitBreakStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitBreakStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ContinueStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_continueStmt;
	    }

	    public function CONTINUE(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::CONTINUE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterContinueStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitContinueStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitContinueStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ReturnStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_returnStmt;
	    }

	    public function RETURN(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::RETURN, 0);
	    }

	    public function exp_list(): ?Exp_listContext
	    {
	    	return $this->getTypedRuleContext(Exp_listContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterReturnStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitReturnStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitReturnStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SimpleStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_simpleStmt;
	    }

	    public function shortVarDcl(): ?ShortVarDclContext
	    {
	    	return $this->getTypedRuleContext(ShortVarDclContext::class, 0);
	    }

	    public function assignmentStmt(): ?AssignmentStmtContext
	    {
	    	return $this->getTypedRuleContext(AssignmentStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterSimpleStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitSimpleStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitSimpleStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class Id_listContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_id_list;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function IDENTIFIER(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(OLCParser::IDENTIFIER);
	    	}

	        return $this->getToken(OLCParser::IDENTIFIER, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterId_list($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitId_list($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitId_list($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class Exp_listContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_exp_list;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterExp_list($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitExp_list($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitExp_list($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_expression;
	    }

	    public function logicalOrExpr(): ?LogicalOrExprContext
	    {
	    	return $this->getTypedRuleContext(LogicalOrExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterExpression($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitExpression($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicalOrExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_logicalOrExpr;
	    }

	    /**
	     * @return array<LogicalAndExprContext>|LogicalAndExprContext|null
	     */
	    public function logicalAndExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(LogicalAndExprContext::class);
	    	}

	        return $this->getTypedRuleContext(LogicalAndExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterLogicalOrExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitLogicalOrExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitLogicalOrExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicalAndExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_logicalAndExpr;
	    }

	    /**
	     * @return array<EqualityExprContext>|EqualityExprContext|null
	     */
	    public function equalityExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(EqualityExprContext::class);
	    	}

	        return $this->getTypedRuleContext(EqualityExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterLogicalAndExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitLogicalAndExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitLogicalAndExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class EqualityExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_equalityExpr;
	    }

	    /**
	     * @return array<RelationalExprContext>|RelationalExprContext|null
	     */
	    public function relationalExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(RelationalExprContext::class);
	    	}

	        return $this->getTypedRuleContext(RelationalExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterEqualityExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitEqualityExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitEqualityExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class RelationalExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_relationalExpr;
	    }

	    /**
	     * @return array<AdditiveExprContext>|AdditiveExprContext|null
	     */
	    public function additiveExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(AdditiveExprContext::class);
	    	}

	        return $this->getTypedRuleContext(AdditiveExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterRelationalExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitRelationalExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitRelationalExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AdditiveExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_additiveExpr;
	    }

	    /**
	     * @return array<MultiplicativeExprContext>|MultiplicativeExprContext|null
	     */
	    public function multiplicativeExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(MultiplicativeExprContext::class);
	    	}

	        return $this->getTypedRuleContext(MultiplicativeExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterAdditiveExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitAdditiveExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitAdditiveExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MultiplicativeExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_multiplicativeExpr;
	    }

	    /**
	     * @return array<UnaryExprContext>|UnaryExprContext|null
	     */
	    public function unaryExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(UnaryExprContext::class);
	    	}

	        return $this->getTypedRuleContext(UnaryExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterMultiplicativeExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitMultiplicativeExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitMultiplicativeExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class UnaryExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_unaryExpr;
	    }

	    public function unaryExpr(): ?UnaryExprContext
	    {
	    	return $this->getTypedRuleContext(UnaryExprContext::class, 0);
	    }

	    public function primaryExpr(): ?PrimaryExprContext
	    {
	    	return $this->getTypedRuleContext(PrimaryExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterUnaryExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitUnaryExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitUnaryExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PrimaryExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_primaryExpr;
	    }

	    public function literal(): ?LiteralContext
	    {
	    	return $this->getTypedRuleContext(LiteralContext::class, 0);
	    }

	    public function IDENTIFIER(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::IDENTIFIER, 0);
	    }

	    public function NIL(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::NIL, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function fmtPrintlnCall(): ?FmtPrintlnCallContext
	    {
	    	return $this->getTypedRuleContext(FmtPrintlnCallContext::class, 0);
	    }

	    public function builtinCall(): ?BuiltinCallContext
	    {
	    	return $this->getTypedRuleContext(BuiltinCallContext::class, 0);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

	    public function primaryExpr(): ?PrimaryExprContext
	    {
	    	return $this->getTypedRuleContext(PrimaryExprContext::class, 0);
	    }

	    public function exp_list(): ?Exp_listContext
	    {
	    	return $this->getTypedRuleContext(Exp_listContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterPrimaryExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitPrimaryExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitPrimaryExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FmtPrintlnCallContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_fmtPrintlnCall;
	    }

	    public function FMT(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::FMT, 0);
	    }

	    public function PRINTLN(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::PRINTLN, 0);
	    }

	    public function exp_list(): ?Exp_listContext
	    {
	    	return $this->getTypedRuleContext(Exp_listContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterFmtPrintlnCall($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitFmtPrintlnCall($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitFmtPrintlnCall($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BuiltinCallContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_builtinCall;
	    }

	    public function LEN(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::LEN, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function NOW(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::NOW, 0);
	    }

	    public function SUBSTR(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::SUBSTR, 0);
	    }

	    public function TYPEOF(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::TYPEOF, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterBuiltinCall($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitBuiltinCall($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitBuiltinCall($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_literal;
	    }

	    public function INT_LITERAL(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::INT_LITERAL, 0);
	    }

	    public function FLOAT_LITERAL(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::FLOAT_LITERAL, 0);
	    }

	    public function STRING_LITERAL(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::STRING_LITERAL, 0);
	    }

	    public function RUNE_LITERAL(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::RUNE_LITERAL, 0);
	    }

	    public function TRUE(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::TRUE, 0);
	    }

	    public function FALSE(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::FALSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_arrayLiteral;
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function elementList(): ?ElementListContext
	    {
	    	return $this->getTypedRuleContext(ElementListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterArrayLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitArrayLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ElementListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_elementList;
	    }

	    /**
	     * @return array<ElementContext>|ElementContext|null
	     */
	    public function element(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ElementContext::class);
	    	}

	        return $this->getTypedRuleContext(ElementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterElementList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitElementList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitElementList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ElementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_element;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterElement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitElement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitElement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_type;
	    }

	    public function pointerType(): ?PointerTypeContext
	    {
	    	return $this->getTypedRuleContext(PointerTypeContext::class, 0);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function baseType(): ?BaseTypeContext
	    {
	    	return $this->getTypedRuleContext(BaseTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PointerTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_pointerType;
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterPointerType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitPointerType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitPointerType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_arrayType;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitArrayType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BaseTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_baseType;
	    }

	    public function INT32(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::INT32, 0);
	    }

	    public function FLOAT32(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::FLOAT32, 0);
	    }

	    public function BOOL(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::BOOL, 0);
	    }

	    public function RUNE(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::RUNE, 0);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(OLCParser::STRING, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterBaseType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitBaseType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitBaseType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}
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

		public const RULE_program = 0, RULE_declaration = 1, RULE_exprStmt = 2, 
               RULE_functionDcl = 3, RULE_params = 4, RULE_param = 5, RULE_result = 6, 
               RULE_block = 7, RULE_varDcl = 8, RULE_shortVarDcl = 9, RULE_constDcl = 10, 
               RULE_assignmentStmt = 11, RULE_assignOp = 12, RULE_ifStmt = 13, 
               RULE_switchStmt = 14, RULE_caseClause = 15, RULE_defaultClause = 16, 
               RULE_forStmt = 17, RULE_forClause = 18, RULE_breakStmt = 19, 
               RULE_continueStmt = 20, RULE_returnStmt = 21, RULE_simpleStmt = 22, 
               RULE_id_list = 23, RULE_exp_list = 24, RULE_expression = 25, 
               RULE_logicalOrExpr = 26, RULE_logicalAndExpr = 27, RULE_equalityExpr = 28, 
               RULE_relationalExpr = 29, RULE_additiveExpr = 30, RULE_multiplicativeExpr = 31, 
               RULE_unaryExpr = 32, RULE_primaryExpr = 33, RULE_fmtPrintlnCall = 34, 
               RULE_builtinCall = 35, RULE_literal = 36, RULE_arrayLiteral = 37, 
               RULE_elementList = 38, RULE_element = 39, RULE_type = 40, 
               RULE_pointerType = 41, RULE_arrayType = 42, RULE_baseType = 43;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'declaration', 'exprStmt', 'functionDcl', 'params', 'param', 
			'result', 'block', 'varDcl', 'shortVarDcl', 'constDcl', 'assignmentStmt', 
			'assignOp', 'ifStmt', 'switchStmt', 'caseClause', 'defaultClause', 'forStmt', 
			'forClause', 'breakStmt', 'continueStmt', 'returnStmt', 'simpleStmt', 
			'id_list', 'exp_list', 'expression', 'logicalOrExpr', 'logicalAndExpr', 
			'equalityExpr', 'relationalExpr', 'additiveExpr', 'multiplicativeExpr', 
			'unaryExpr', 'primaryExpr', 'fmtPrintlnCall', 'builtinCall', 'literal', 
			'arrayLiteral', 'elementList', 'element', 'type', 'pointerType', 'arrayType', 
			'baseType'
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
			[4, 1, 67, 459, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38, 
		    7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 2, 
		    43, 7, 43, 1, 0, 5, 0, 90, 8, 0, 10, 0, 12, 0, 93, 9, 0, 1, 0, 1, 
		    0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 
		    1, 1, 1, 1, 1, 3, 1, 110, 8, 1, 1, 2, 1, 2, 1, 3, 1, 3, 1, 3, 1, 3, 
		    3, 3, 118, 8, 3, 1, 3, 1, 3, 3, 3, 122, 8, 3, 1, 3, 1, 3, 1, 4, 1, 
		    4, 1, 4, 5, 4, 129, 8, 4, 10, 4, 12, 4, 132, 9, 4, 1, 5, 1, 5, 1, 
		    5, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 5, 6, 142, 8, 6, 10, 6, 12, 6, 145, 
		    9, 6, 1, 6, 1, 6, 3, 6, 149, 8, 6, 1, 7, 1, 7, 5, 7, 153, 8, 7, 10, 
		    7, 12, 7, 156, 9, 7, 1, 7, 1, 7, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 
		    8, 1, 8, 1, 8, 1, 8, 1, 8, 3, 8, 170, 8, 8, 1, 9, 1, 9, 1, 9, 1, 9, 
		    1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 11, 1, 11, 1, 11, 1, 
		    11, 1, 11, 1, 11, 1, 11, 3, 11, 189, 8, 11, 1, 12, 1, 12, 1, 13, 1, 
		    13, 1, 13, 1, 13, 3, 13, 197, 8, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 
		    13, 3, 13, 204, 8, 13, 3, 13, 206, 8, 13, 1, 14, 1, 14, 1, 14, 1, 
		    14, 5, 14, 212, 8, 14, 10, 14, 12, 14, 215, 9, 14, 1, 14, 3, 14, 218, 
		    8, 14, 1, 14, 1, 14, 1, 15, 1, 15, 1, 15, 1, 15, 5, 15, 226, 8, 15, 
		    10, 15, 12, 15, 229, 9, 15, 1, 16, 1, 16, 1, 16, 5, 16, 234, 8, 16, 
		    10, 16, 12, 16, 237, 9, 16, 1, 17, 1, 17, 1, 17, 1, 17, 1, 17, 1, 
		    17, 1, 17, 1, 17, 1, 17, 1, 17, 3, 17, 249, 8, 17, 1, 18, 3, 18, 252, 
		    8, 18, 1, 18, 1, 18, 3, 18, 256, 8, 18, 1, 18, 1, 18, 3, 18, 260, 
		    8, 18, 1, 19, 1, 19, 1, 20, 1, 20, 1, 21, 1, 21, 3, 21, 268, 8, 21, 
		    1, 22, 1, 22, 3, 22, 272, 8, 22, 1, 23, 1, 23, 1, 23, 5, 23, 277, 
		    8, 23, 10, 23, 12, 23, 280, 9, 23, 1, 24, 1, 24, 1, 24, 5, 24, 285, 
		    8, 24, 10, 24, 12, 24, 288, 9, 24, 1, 25, 1, 25, 1, 26, 1, 26, 1, 
		    26, 5, 26, 295, 8, 26, 10, 26, 12, 26, 298, 9, 26, 1, 27, 1, 27, 1, 
		    27, 5, 27, 303, 8, 27, 10, 27, 12, 27, 306, 9, 27, 1, 28, 1, 28, 1, 
		    28, 5, 28, 311, 8, 28, 10, 28, 12, 28, 314, 9, 28, 1, 29, 1, 29, 1, 
		    29, 5, 29, 319, 8, 29, 10, 29, 12, 29, 322, 9, 29, 1, 30, 1, 30, 1, 
		    30, 5, 30, 327, 8, 30, 10, 30, 12, 30, 330, 9, 30, 1, 31, 1, 31, 1, 
		    31, 5, 31, 335, 8, 31, 10, 31, 12, 31, 338, 9, 31, 1, 32, 1, 32, 1, 
		    32, 1, 32, 1, 32, 1, 32, 1, 32, 1, 32, 1, 32, 3, 32, 349, 8, 32, 1, 
		    33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 
		    1, 33, 3, 33, 362, 8, 33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 
		    1, 33, 1, 33, 3, 33, 372, 8, 33, 1, 33, 5, 33, 375, 8, 33, 10, 33, 
		    12, 33, 378, 9, 33, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 3, 34, 385, 
		    8, 34, 1, 34, 1, 34, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 
		    35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 
		    1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 1, 35, 3, 35, 411, 8, 35, 1, 36, 
		    1, 36, 1, 37, 1, 37, 1, 37, 3, 37, 418, 8, 37, 1, 37, 1, 37, 1, 38, 
		    1, 38, 1, 38, 5, 38, 425, 8, 38, 10, 38, 12, 38, 428, 9, 38, 1, 38, 
		    3, 38, 431, 8, 38, 1, 39, 1, 39, 1, 39, 1, 39, 3, 39, 437, 8, 39, 
		    1, 39, 3, 39, 440, 8, 39, 1, 40, 1, 40, 1, 40, 3, 40, 445, 8, 40, 
		    1, 41, 1, 41, 1, 41, 1, 42, 1, 42, 3, 42, 452, 8, 42, 1, 42, 1, 42, 
		    1, 42, 1, 43, 1, 43, 1, 43, 0, 1, 66, 44, 0, 2, 4, 6, 8, 10, 12, 14, 
		    16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 
		    50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 80, 82, 
		    84, 86, 0, 8, 1, 0, 8, 9, 2, 0, 6, 6, 10, 13, 1, 0, 18, 19, 1, 0, 
		    20, 23, 1, 0, 24, 25, 1, 0, 26, 28, 2, 0, 58, 59, 61, 64, 1, 0, 53, 
		    57, 483, 0, 91, 1, 0, 0, 0, 2, 109, 1, 0, 0, 0, 4, 111, 1, 0, 0, 0, 
		    6, 113, 1, 0, 0, 0, 8, 125, 1, 0, 0, 0, 10, 133, 1, 0, 0, 0, 12, 148, 
		    1, 0, 0, 0, 14, 150, 1, 0, 0, 0, 16, 169, 1, 0, 0, 0, 18, 171, 1, 
		    0, 0, 0, 20, 175, 1, 0, 0, 0, 22, 188, 1, 0, 0, 0, 24, 190, 1, 0, 
		    0, 0, 26, 192, 1, 0, 0, 0, 28, 207, 1, 0, 0, 0, 30, 221, 1, 0, 0, 
		    0, 32, 230, 1, 0, 0, 0, 34, 248, 1, 0, 0, 0, 36, 251, 1, 0, 0, 0, 
		    38, 261, 1, 0, 0, 0, 40, 263, 1, 0, 0, 0, 42, 265, 1, 0, 0, 0, 44, 
		    271, 1, 0, 0, 0, 46, 273, 1, 0, 0, 0, 48, 281, 1, 0, 0, 0, 50, 289, 
		    1, 0, 0, 0, 52, 291, 1, 0, 0, 0, 54, 299, 1, 0, 0, 0, 56, 307, 1, 
		    0, 0, 0, 58, 315, 1, 0, 0, 0, 60, 323, 1, 0, 0, 0, 62, 331, 1, 0, 
		    0, 0, 64, 348, 1, 0, 0, 0, 66, 361, 1, 0, 0, 0, 68, 379, 1, 0, 0, 
		    0, 70, 410, 1, 0, 0, 0, 72, 412, 1, 0, 0, 0, 74, 414, 1, 0, 0, 0, 
		    76, 421, 1, 0, 0, 0, 78, 439, 1, 0, 0, 0, 80, 444, 1, 0, 0, 0, 82, 
		    446, 1, 0, 0, 0, 84, 449, 1, 0, 0, 0, 86, 456, 1, 0, 0, 0, 88, 90, 
		    3, 2, 1, 0, 89, 88, 1, 0, 0, 0, 90, 93, 1, 0, 0, 0, 91, 89, 1, 0, 
		    0, 0, 91, 92, 1, 0, 0, 0, 92, 94, 1, 0, 0, 0, 93, 91, 1, 0, 0, 0, 
		    94, 95, 5, 0, 0, 1, 95, 1, 1, 0, 0, 0, 96, 110, 3, 16, 8, 0, 97, 110, 
		    3, 18, 9, 0, 98, 110, 3, 20, 10, 0, 99, 110, 3, 6, 3, 0, 100, 110, 
		    3, 22, 11, 0, 101, 110, 3, 4, 2, 0, 102, 110, 3, 26, 13, 0, 103, 110, 
		    3, 28, 14, 0, 104, 110, 3, 34, 17, 0, 105, 110, 3, 38, 19, 0, 106, 
		    110, 3, 40, 20, 0, 107, 110, 3, 42, 21, 0, 108, 110, 3, 14, 7, 0, 
		    109, 96, 1, 0, 0, 0, 109, 97, 1, 0, 0, 0, 109, 98, 1, 0, 0, 0, 109, 
		    99, 1, 0, 0, 0, 109, 100, 1, 0, 0, 0, 109, 101, 1, 0, 0, 0, 109, 102, 
		    1, 0, 0, 0, 109, 103, 1, 0, 0, 0, 109, 104, 1, 0, 0, 0, 109, 105, 
		    1, 0, 0, 0, 109, 106, 1, 0, 0, 0, 109, 107, 1, 0, 0, 0, 109, 108, 
		    1, 0, 0, 0, 110, 3, 1, 0, 0, 0, 111, 112, 3, 50, 25, 0, 112, 5, 1, 
		    0, 0, 0, 113, 114, 5, 34, 0, 0, 114, 115, 5, 60, 0, 0, 115, 117, 5, 
		    1, 0, 0, 116, 118, 3, 8, 4, 0, 117, 116, 1, 0, 0, 0, 117, 118, 1, 
		    0, 0, 0, 118, 119, 1, 0, 0, 0, 119, 121, 5, 2, 0, 0, 120, 122, 3, 
		    12, 6, 0, 121, 120, 1, 0, 0, 0, 121, 122, 1, 0, 0, 0, 122, 123, 1, 
		    0, 0, 0, 123, 124, 3, 14, 7, 0, 124, 7, 1, 0, 0, 0, 125, 130, 3, 10, 
		    5, 0, 126, 127, 5, 3, 0, 0, 127, 129, 3, 10, 5, 0, 128, 126, 1, 0, 
		    0, 0, 129, 132, 1, 0, 0, 0, 130, 128, 1, 0, 0, 0, 130, 131, 1, 0, 
		    0, 0, 131, 9, 1, 0, 0, 0, 132, 130, 1, 0, 0, 0, 133, 134, 5, 60, 0, 
		    0, 134, 135, 3, 80, 40, 0, 135, 11, 1, 0, 0, 0, 136, 149, 3, 80, 40, 
		    0, 137, 138, 5, 1, 0, 0, 138, 143, 3, 80, 40, 0, 139, 140, 5, 3, 0, 
		    0, 140, 142, 3, 80, 40, 0, 141, 139, 1, 0, 0, 0, 142, 145, 1, 0, 0, 
		    0, 143, 141, 1, 0, 0, 0, 143, 144, 1, 0, 0, 0, 144, 146, 1, 0, 0, 
		    0, 145, 143, 1, 0, 0, 0, 146, 147, 5, 2, 0, 0, 147, 149, 1, 0, 0, 
		    0, 148, 136, 1, 0, 0, 0, 148, 137, 1, 0, 0, 0, 149, 13, 1, 0, 0, 0, 
		    150, 154, 5, 4, 0, 0, 151, 153, 3, 2, 1, 0, 152, 151, 1, 0, 0, 0, 
		    153, 156, 1, 0, 0, 0, 154, 152, 1, 0, 0, 0, 154, 155, 1, 0, 0, 0, 
		    155, 157, 1, 0, 0, 0, 156, 154, 1, 0, 0, 0, 157, 158, 5, 5, 0, 0, 
		    158, 15, 1, 0, 0, 0, 159, 160, 5, 35, 0, 0, 160, 161, 3, 46, 23, 0, 
		    161, 162, 3, 80, 40, 0, 162, 170, 1, 0, 0, 0, 163, 164, 5, 35, 0, 
		    0, 164, 165, 3, 46, 23, 0, 165, 166, 3, 80, 40, 0, 166, 167, 5, 6, 
		    0, 0, 167, 168, 3, 48, 24, 0, 168, 170, 1, 0, 0, 0, 169, 159, 1, 0, 
		    0, 0, 169, 163, 1, 0, 0, 0, 170, 17, 1, 0, 0, 0, 171, 172, 3, 46, 
		    23, 0, 172, 173, 5, 7, 0, 0, 173, 174, 3, 48, 24, 0, 174, 19, 1, 0, 
		    0, 0, 175, 176, 5, 36, 0, 0, 176, 177, 5, 60, 0, 0, 177, 178, 3, 80, 
		    40, 0, 178, 179, 5, 6, 0, 0, 179, 180, 3, 50, 25, 0, 180, 21, 1, 0, 
		    0, 0, 181, 182, 3, 66, 33, 0, 182, 183, 3, 24, 12, 0, 183, 184, 3, 
		    50, 25, 0, 184, 189, 1, 0, 0, 0, 185, 186, 3, 66, 33, 0, 186, 187, 
		    7, 0, 0, 0, 187, 189, 1, 0, 0, 0, 188, 181, 1, 0, 0, 0, 188, 185, 
		    1, 0, 0, 0, 189, 23, 1, 0, 0, 0, 190, 191, 7, 1, 0, 0, 191, 25, 1, 
		    0, 0, 0, 192, 196, 5, 37, 0, 0, 193, 194, 3, 44, 22, 0, 194, 195, 
		    5, 14, 0, 0, 195, 197, 1, 0, 0, 0, 196, 193, 1, 0, 0, 0, 196, 197, 
		    1, 0, 0, 0, 197, 198, 1, 0, 0, 0, 198, 199, 3, 50, 25, 0, 199, 205, 
		    3, 14, 7, 0, 200, 203, 5, 38, 0, 0, 201, 204, 3, 26, 13, 0, 202, 204, 
		    3, 14, 7, 0, 203, 201, 1, 0, 0, 0, 203, 202, 1, 0, 0, 0, 204, 206, 
		    1, 0, 0, 0, 205, 200, 1, 0, 0, 0, 205, 206, 1, 0, 0, 0, 206, 27, 1, 
		    0, 0, 0, 207, 208, 5, 39, 0, 0, 208, 209, 3, 50, 25, 0, 209, 213, 
		    5, 4, 0, 0, 210, 212, 3, 30, 15, 0, 211, 210, 1, 0, 0, 0, 212, 215, 
		    1, 0, 0, 0, 213, 211, 1, 0, 0, 0, 213, 214, 1, 0, 0, 0, 214, 217, 
		    1, 0, 0, 0, 215, 213, 1, 0, 0, 0, 216, 218, 3, 32, 16, 0, 217, 216, 
		    1, 0, 0, 0, 217, 218, 1, 0, 0, 0, 218, 219, 1, 0, 0, 0, 219, 220, 
		    5, 5, 0, 0, 220, 29, 1, 0, 0, 0, 221, 222, 5, 40, 0, 0, 222, 223, 
		    3, 48, 24, 0, 223, 227, 5, 15, 0, 0, 224, 226, 3, 2, 1, 0, 225, 224, 
		    1, 0, 0, 0, 226, 229, 1, 0, 0, 0, 227, 225, 1, 0, 0, 0, 227, 228, 
		    1, 0, 0, 0, 228, 31, 1, 0, 0, 0, 229, 227, 1, 0, 0, 0, 230, 231, 5, 
		    41, 0, 0, 231, 235, 5, 15, 0, 0, 232, 234, 3, 2, 1, 0, 233, 232, 1, 
		    0, 0, 0, 234, 237, 1, 0, 0, 0, 235, 233, 1, 0, 0, 0, 235, 236, 1, 
		    0, 0, 0, 236, 33, 1, 0, 0, 0, 237, 235, 1, 0, 0, 0, 238, 239, 5, 42, 
		    0, 0, 239, 240, 3, 36, 18, 0, 240, 241, 3, 14, 7, 0, 241, 249, 1, 
		    0, 0, 0, 242, 243, 5, 42, 0, 0, 243, 244, 3, 50, 25, 0, 244, 245, 
		    3, 14, 7, 0, 245, 249, 1, 0, 0, 0, 246, 247, 5, 42, 0, 0, 247, 249, 
		    3, 14, 7, 0, 248, 238, 1, 0, 0, 0, 248, 242, 1, 0, 0, 0, 248, 246, 
		    1, 0, 0, 0, 249, 35, 1, 0, 0, 0, 250, 252, 3, 44, 22, 0, 251, 250, 
		    1, 0, 0, 0, 251, 252, 1, 0, 0, 0, 252, 253, 1, 0, 0, 0, 253, 255, 
		    5, 14, 0, 0, 254, 256, 3, 50, 25, 0, 255, 254, 1, 0, 0, 0, 255, 256, 
		    1, 0, 0, 0, 256, 257, 1, 0, 0, 0, 257, 259, 5, 14, 0, 0, 258, 260, 
		    3, 44, 22, 0, 259, 258, 1, 0, 0, 0, 259, 260, 1, 0, 0, 0, 260, 37, 
		    1, 0, 0, 0, 261, 262, 5, 43, 0, 0, 262, 39, 1, 0, 0, 0, 263, 264, 
		    5, 44, 0, 0, 264, 41, 1, 0, 0, 0, 265, 267, 5, 45, 0, 0, 266, 268, 
		    3, 48, 24, 0, 267, 266, 1, 0, 0, 0, 267, 268, 1, 0, 0, 0, 268, 43, 
		    1, 0, 0, 0, 269, 272, 3, 18, 9, 0, 270, 272, 3, 22, 11, 0, 271, 269, 
		    1, 0, 0, 0, 271, 270, 1, 0, 0, 0, 272, 45, 1, 0, 0, 0, 273, 278, 5, 
		    60, 0, 0, 274, 275, 5, 3, 0, 0, 275, 277, 5, 60, 0, 0, 276, 274, 1, 
		    0, 0, 0, 277, 280, 1, 0, 0, 0, 278, 276, 1, 0, 0, 0, 278, 279, 1, 
		    0, 0, 0, 279, 47, 1, 0, 0, 0, 280, 278, 1, 0, 0, 0, 281, 286, 3, 50, 
		    25, 0, 282, 283, 5, 3, 0, 0, 283, 285, 3, 50, 25, 0, 284, 282, 1, 
		    0, 0, 0, 285, 288, 1, 0, 0, 0, 286, 284, 1, 0, 0, 0, 286, 287, 1, 
		    0, 0, 0, 287, 49, 1, 0, 0, 0, 288, 286, 1, 0, 0, 0, 289, 290, 3, 52, 
		    26, 0, 290, 51, 1, 0, 0, 0, 291, 296, 3, 54, 27, 0, 292, 293, 5, 16, 
		    0, 0, 293, 295, 3, 54, 27, 0, 294, 292, 1, 0, 0, 0, 295, 298, 1, 0, 
		    0, 0, 296, 294, 1, 0, 0, 0, 296, 297, 1, 0, 0, 0, 297, 53, 1, 0, 0, 
		    0, 298, 296, 1, 0, 0, 0, 299, 304, 3, 56, 28, 0, 300, 301, 5, 17, 
		    0, 0, 301, 303, 3, 56, 28, 0, 302, 300, 1, 0, 0, 0, 303, 306, 1, 0, 
		    0, 0, 304, 302, 1, 0, 0, 0, 304, 305, 1, 0, 0, 0, 305, 55, 1, 0, 0, 
		    0, 306, 304, 1, 0, 0, 0, 307, 312, 3, 58, 29, 0, 308, 309, 7, 2, 0, 
		    0, 309, 311, 3, 58, 29, 0, 310, 308, 1, 0, 0, 0, 311, 314, 1, 0, 0, 
		    0, 312, 310, 1, 0, 0, 0, 312, 313, 1, 0, 0, 0, 313, 57, 1, 0, 0, 0, 
		    314, 312, 1, 0, 0, 0, 315, 320, 3, 60, 30, 0, 316, 317, 7, 3, 0, 0, 
		    317, 319, 3, 60, 30, 0, 318, 316, 1, 0, 0, 0, 319, 322, 1, 0, 0, 0, 
		    320, 318, 1, 0, 0, 0, 320, 321, 1, 0, 0, 0, 321, 59, 1, 0, 0, 0, 322, 
		    320, 1, 0, 0, 0, 323, 328, 3, 62, 31, 0, 324, 325, 7, 4, 0, 0, 325, 
		    327, 3, 62, 31, 0, 326, 324, 1, 0, 0, 0, 327, 330, 1, 0, 0, 0, 328, 
		    326, 1, 0, 0, 0, 328, 329, 1, 0, 0, 0, 329, 61, 1, 0, 0, 0, 330, 328, 
		    1, 0, 0, 0, 331, 336, 3, 64, 32, 0, 332, 333, 7, 5, 0, 0, 333, 335, 
		    3, 64, 32, 0, 334, 332, 1, 0, 0, 0, 335, 338, 1, 0, 0, 0, 336, 334, 
		    1, 0, 0, 0, 336, 337, 1, 0, 0, 0, 337, 63, 1, 0, 0, 0, 338, 336, 1, 
		    0, 0, 0, 339, 340, 5, 29, 0, 0, 340, 349, 3, 64, 32, 0, 341, 342, 
		    5, 25, 0, 0, 342, 349, 3, 64, 32, 0, 343, 344, 5, 26, 0, 0, 344, 349, 
		    3, 64, 32, 0, 345, 346, 5, 30, 0, 0, 346, 349, 3, 64, 32, 0, 347, 
		    349, 3, 66, 33, 0, 348, 339, 1, 0, 0, 0, 348, 341, 1, 0, 0, 0, 348, 
		    343, 1, 0, 0, 0, 348, 345, 1, 0, 0, 0, 348, 347, 1, 0, 0, 0, 349, 
		    65, 1, 0, 0, 0, 350, 351, 6, 33, -1, 0, 351, 362, 3, 72, 36, 0, 352, 
		    362, 5, 60, 0, 0, 353, 362, 5, 46, 0, 0, 354, 355, 5, 1, 0, 0, 355, 
		    356, 3, 50, 25, 0, 356, 357, 5, 2, 0, 0, 357, 362, 1, 0, 0, 0, 358, 
		    362, 3, 68, 34, 0, 359, 362, 3, 70, 35, 0, 360, 362, 3, 74, 37, 0, 
		    361, 350, 1, 0, 0, 0, 361, 352, 1, 0, 0, 0, 361, 353, 1, 0, 0, 0, 
		    361, 354, 1, 0, 0, 0, 361, 358, 1, 0, 0, 0, 361, 359, 1, 0, 0, 0, 
		    361, 360, 1, 0, 0, 0, 362, 376, 1, 0, 0, 0, 363, 364, 10, 5, 0, 0, 
		    364, 365, 5, 31, 0, 0, 365, 366, 3, 50, 25, 0, 366, 367, 5, 32, 0, 
		    0, 367, 375, 1, 0, 0, 0, 368, 369, 10, 4, 0, 0, 369, 371, 5, 1, 0, 
		    0, 370, 372, 3, 48, 24, 0, 371, 370, 1, 0, 0, 0, 371, 372, 1, 0, 0, 
		    0, 372, 373, 1, 0, 0, 0, 373, 375, 5, 2, 0, 0, 374, 363, 1, 0, 0, 
		    0, 374, 368, 1, 0, 0, 0, 375, 378, 1, 0, 0, 0, 376, 374, 1, 0, 0, 
		    0, 376, 377, 1, 0, 0, 0, 377, 67, 1, 0, 0, 0, 378, 376, 1, 0, 0, 0, 
		    379, 380, 5, 47, 0, 0, 380, 381, 5, 33, 0, 0, 381, 382, 5, 48, 0, 
		    0, 382, 384, 5, 1, 0, 0, 383, 385, 3, 48, 24, 0, 384, 383, 1, 0, 0, 
		    0, 384, 385, 1, 0, 0, 0, 385, 386, 1, 0, 0, 0, 386, 387, 5, 2, 0, 
		    0, 387, 69, 1, 0, 0, 0, 388, 389, 5, 49, 0, 0, 389, 390, 5, 1, 0, 
		    0, 390, 391, 3, 50, 25, 0, 391, 392, 5, 2, 0, 0, 392, 411, 1, 0, 0, 
		    0, 393, 394, 5, 50, 0, 0, 394, 395, 5, 1, 0, 0, 395, 411, 5, 2, 0, 
		    0, 396, 397, 5, 51, 0, 0, 397, 398, 5, 1, 0, 0, 398, 399, 3, 50, 25, 
		    0, 399, 400, 5, 3, 0, 0, 400, 401, 3, 50, 25, 0, 401, 402, 5, 3, 0, 
		    0, 402, 403, 3, 50, 25, 0, 403, 404, 5, 2, 0, 0, 404, 411, 1, 0, 0, 
		    0, 405, 406, 5, 52, 0, 0, 406, 407, 5, 1, 0, 0, 407, 408, 3, 50, 25, 
		    0, 408, 409, 5, 2, 0, 0, 409, 411, 1, 0, 0, 0, 410, 388, 1, 0, 0, 
		    0, 410, 393, 1, 0, 0, 0, 410, 396, 1, 0, 0, 0, 410, 405, 1, 0, 0, 
		    0, 411, 71, 1, 0, 0, 0, 412, 413, 7, 6, 0, 0, 413, 73, 1, 0, 0, 0, 
		    414, 415, 3, 80, 40, 0, 415, 417, 5, 4, 0, 0, 416, 418, 3, 76, 38, 
		    0, 417, 416, 1, 0, 0, 0, 417, 418, 1, 0, 0, 0, 418, 419, 1, 0, 0, 
		    0, 419, 420, 5, 5, 0, 0, 420, 75, 1, 0, 0, 0, 421, 426, 3, 78, 39, 
		    0, 422, 423, 5, 3, 0, 0, 423, 425, 3, 78, 39, 0, 424, 422, 1, 0, 0, 
		    0, 425, 428, 1, 0, 0, 0, 426, 424, 1, 0, 0, 0, 426, 427, 1, 0, 0, 
		    0, 427, 430, 1, 0, 0, 0, 428, 426, 1, 0, 0, 0, 429, 431, 5, 3, 0, 
		    0, 430, 429, 1, 0, 0, 0, 430, 431, 1, 0, 0, 0, 431, 77, 1, 0, 0, 0, 
		    432, 440, 3, 50, 25, 0, 433, 440, 3, 74, 37, 0, 434, 436, 5, 4, 0, 
		    0, 435, 437, 3, 76, 38, 0, 436, 435, 1, 0, 0, 0, 436, 437, 1, 0, 0, 
		    0, 437, 438, 1, 0, 0, 0, 438, 440, 5, 5, 0, 0, 439, 432, 1, 0, 0, 
		    0, 439, 433, 1, 0, 0, 0, 439, 434, 1, 0, 0, 0, 440, 79, 1, 0, 0, 0, 
		    441, 445, 3, 82, 41, 0, 442, 445, 3, 84, 42, 0, 443, 445, 3, 86, 43, 
		    0, 444, 441, 1, 0, 0, 0, 444, 442, 1, 0, 0, 0, 444, 443, 1, 0, 0, 
		    0, 445, 81, 1, 0, 0, 0, 446, 447, 5, 26, 0, 0, 447, 448, 3, 80, 40, 
		    0, 448, 83, 1, 0, 0, 0, 449, 451, 5, 31, 0, 0, 450, 452, 3, 50, 25, 
		    0, 451, 450, 1, 0, 0, 0, 451, 452, 1, 0, 0, 0, 452, 453, 1, 0, 0, 
		    0, 453, 454, 5, 32, 0, 0, 454, 455, 3, 80, 40, 0, 455, 85, 1, 0, 0, 
		    0, 456, 457, 7, 7, 0, 0, 457, 87, 1, 0, 0, 0, 45, 91, 109, 117, 121, 
		    130, 143, 148, 154, 169, 188, 196, 203, 205, 213, 217, 227, 235, 248, 
		    251, 255, 259, 267, 271, 278, 286, 296, 304, 312, 320, 328, 336, 348, 
		    361, 371, 374, 376, 384, 410, 417, 426, 430, 436, 439, 444, 451];
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
		        $this->setState(91);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -142530855305207) !== 0)) {
		        	$this->setState(88);
		        	$this->declaration();
		        	$this->setState(93);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(94);
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
		        $this->setState(109);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(96);
		        	    $this->varDcl();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(97);
		        	    $this->shortVarDcl();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(98);
		        	    $this->constDcl();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(99);
		        	    $this->functionDcl();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(100);
		        	    $this->assignmentStmt();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(101);
		        	    $this->exprStmt();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(102);
		        	    $this->ifStmt();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(103);
		        	    $this->switchStmt();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(104);
		        	    $this->forStmt();
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(105);
		        	    $this->breakStmt();
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(106);
		        	    $this->continueStmt();
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(107);
		        	    $this->returnStmt();
		        	break;

		        	case 13:
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(108);
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
		public function exprStmt(): Context\ExprStmtContext
		{
		    $localContext = new Context\ExprStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_exprStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(111);
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
		public function functionDcl(): Context\FunctionDclContext
		{
		    $localContext = new Context\FunctionDclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_functionDcl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(113);
		        $this->match(self::FUNC);
		        $this->setState(114);
		        $this->match(self::IDENTIFIER);
		        $this->setState(115);
		        $this->match(self::T__0);
		        $this->setState(117);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::IDENTIFIER) {
		        	$this->setState(116);
		        	$this->params();
		        }
		        $this->setState(119);
		        $this->match(self::T__1);
		        $this->setState(121);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 279223179111563266) !== 0)) {
		        	$this->setState(120);
		        	$this->result();
		        }
		        $this->setState(123);
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

		    $this->enterRule($localContext, 8, self::RULE_params);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(125);
		        $this->param();
		        $this->setState(130);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(126);
		        	$this->match(self::T__2);
		        	$this->setState(127);
		        	$this->param();
		        	$this->setState(132);
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

		    $this->enterRule($localContext, 10, self::RULE_param);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(133);
		        $this->match(self::IDENTIFIER);
		        $this->setState(134);
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

		    $this->enterRule($localContext, 12, self::RULE_result);

		    try {
		        $this->setState(148);
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
		            	$this->setState(136);
		            	$this->type();
		            	break;

		            case self::T__0:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(137);
		            	$this->match(self::T__0);
		            	$this->setState(138);
		            	$this->type();
		            	$this->setState(143);
		            	$this->errorHandler->sync($this);

		            	$_la = $this->input->LA(1);
		            	while ($_la === self::T__2) {
		            		$this->setState(139);
		            		$this->match(self::T__2);
		            		$this->setState(140);
		            		$this->type();
		            		$this->setState(145);
		            		$this->errorHandler->sync($this);
		            		$_la = $this->input->LA(1);
		            	}
		            	$this->setState(146);
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

		    $this->enterRule($localContext, 14, self::RULE_block);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(150);
		        $this->match(self::T__3);
		        $this->setState(154);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -142530855305207) !== 0)) {
		        	$this->setState(151);
		        	$this->declaration();
		        	$this->setState(156);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(157);
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

		    $this->enterRule($localContext, 16, self::RULE_varDcl);

		    try {
		        $this->setState(169);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(159);
		        	    $this->match(self::VAR);
		        	    $this->setState(160);
		        	    $this->id_list();
		        	    $this->setState(161);
		        	    $this->type();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(163);
		        	    $this->match(self::VAR);
		        	    $this->setState(164);
		        	    $this->id_list();
		        	    $this->setState(165);
		        	    $this->type();
		        	    $this->setState(166);
		        	    $this->match(self::T__5);
		        	    $this->setState(167);
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

		    $this->enterRule($localContext, 18, self::RULE_shortVarDcl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(171);
		        $this->id_list();
		        $this->setState(172);
		        $this->match(self::T__6);
		        $this->setState(173);
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

		    $this->enterRule($localContext, 20, self::RULE_constDcl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(175);
		        $this->match(self::CONST);
		        $this->setState(176);
		        $this->match(self::IDENTIFIER);
		        $this->setState(177);
		        $this->type();
		        $this->setState(178);
		        $this->match(self::T__5);
		        $this->setState(179);
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

		    $this->enterRule($localContext, 22, self::RULE_assignmentStmt);

		    try {
		        $this->setState(188);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 9, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(181);
		        	    $this->recursivePrimaryExpr(0);
		        	    $this->setState(182);
		        	    $this->assignOp();
		        	    $this->setState(183);
		        	    $this->expression();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(185);
		        	    $this->recursivePrimaryExpr(0);
		        	    $this->setState(186);

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

		    $this->enterRule($localContext, 24, self::RULE_assignOp);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(190);

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

		    $this->enterRule($localContext, 26, self::RULE_ifStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(192);
		        $this->match(self::IF);
		        $this->setState(196);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 10, $this->ctx)) {
		            case 1:
		        	    $this->setState(193);
		        	    $this->simpleStmt();
		        	    $this->setState(194);
		        	    $this->match(self::T__13);
		        	break;
		        }
		        $this->setState(198);
		        $this->expression();
		        $this->setState(199);
		        $this->block();
		        $this->setState(205);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(200);
		        	$this->match(self::ELSE);
		        	$this->setState(203);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::IF:
		        	    	$this->setState(201);
		        	    	$this->ifStmt();
		        	    	break;

		        	    case self::T__3:
		        	    	$this->setState(202);
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

		    $this->enterRule($localContext, 28, self::RULE_switchStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(207);
		        $this->match(self::SWITCH);
		        $this->setState(208);
		        $this->expression();
		        $this->setState(209);
		        $this->match(self::T__3);
		        $this->setState(213);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::CASE) {
		        	$this->setState(210);
		        	$this->caseClause();
		        	$this->setState(215);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(217);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::DEFAULT) {
		        	$this->setState(216);
		        	$this->defaultClause();
		        }
		        $this->setState(219);
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

		    $this->enterRule($localContext, 30, self::RULE_caseClause);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(221);
		        $this->match(self::CASE);
		        $this->setState(222);
		        $this->exp_list();
		        $this->setState(223);
		        $this->match(self::T__14);
		        $this->setState(227);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -142530855305207) !== 0)) {
		        	$this->setState(224);
		        	$this->declaration();
		        	$this->setState(229);
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

		    $this->enterRule($localContext, 32, self::RULE_defaultClause);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(230);
		        $this->match(self::DEFAULT);
		        $this->setState(231);
		        $this->match(self::T__14);
		        $this->setState(235);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -142530855305207) !== 0)) {
		        	$this->setState(232);
		        	$this->declaration();
		        	$this->setState(237);
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

		    $this->enterRule($localContext, 34, self::RULE_forStmt);

		    try {
		        $this->setState(248);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 17, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(238);
		        	    $this->match(self::FOR);
		        	    $this->setState(239);
		        	    $this->forClause();
		        	    $this->setState(240);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(242);
		        	    $this->match(self::FOR);
		        	    $this->setState(243);
		        	    $this->expression();
		        	    $this->setState(244);
		        	    $this->block();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(246);
		        	    $this->match(self::FOR);
		        	    $this->setState(247);
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

		    $this->enterRule($localContext, 36, self::RULE_forClause);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(251);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175920753147903) !== 0)) {
		        	$this->setState(250);
		        	$this->simpleStmt();
		        }
		        $this->setState(253);
		        $this->match(self::T__13);
		        $this->setState(255);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175919931064319) !== 0)) {
		        	$this->setState(254);
		        	$this->expression();
		        }
		        $this->setState(257);
		        $this->match(self::T__13);
		        $this->setState(259);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175920753147903) !== 0)) {
		        	$this->setState(258);
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

		    $this->enterRule($localContext, 38, self::RULE_breakStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(261);
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

		    $this->enterRule($localContext, 40, self::RULE_continueStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(263);
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

		    $this->enterRule($localContext, 42, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(265);
		        $this->match(self::RETURN);
		        $this->setState(267);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 21, $this->ctx)) {
		            case 1:
		        	    $this->setState(266);
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

		    $this->enterRule($localContext, 44, self::RULE_simpleStmt);

		    try {
		        $this->setState(271);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 22, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(269);
		        	    $this->shortVarDcl();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(270);
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

		    $this->enterRule($localContext, 46, self::RULE_id_list);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(273);
		        $this->match(self::IDENTIFIER);
		        $this->setState(278);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(274);
		        	$this->match(self::T__2);
		        	$this->setState(275);
		        	$this->match(self::IDENTIFIER);
		        	$this->setState(280);
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

		    $this->enterRule($localContext, 48, self::RULE_exp_list);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(281);
		        $this->expression();
		        $this->setState(286);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(282);
		        	$this->match(self::T__2);
		        	$this->setState(283);
		        	$this->expression();
		        	$this->setState(288);
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

		    $this->enterRule($localContext, 50, self::RULE_expression);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(289);
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

		    $this->enterRule($localContext, 52, self::RULE_logicalOrExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(291);
		        $this->logicalAndExpr();
		        $this->setState(296);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__15) {
		        	$this->setState(292);
		        	$this->match(self::T__15);
		        	$this->setState(293);
		        	$this->logicalAndExpr();
		        	$this->setState(298);
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

		    $this->enterRule($localContext, 54, self::RULE_logicalAndExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(299);
		        $this->equalityExpr();
		        $this->setState(304);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__16) {
		        	$this->setState(300);
		        	$this->match(self::T__16);
		        	$this->setState(301);
		        	$this->equalityExpr();
		        	$this->setState(306);
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

		    $this->enterRule($localContext, 56, self::RULE_equalityExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(307);
		        $this->relationalExpr();
		        $this->setState(312);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__17 || $_la === self::T__18) {
		        	$this->setState(308);

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
		        	$this->setState(309);
		        	$this->relationalExpr();
		        	$this->setState(314);
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

		    $this->enterRule($localContext, 58, self::RULE_relationalExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(315);
		        $this->additiveExpr();
		        $this->setState(320);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 15728640) !== 0)) {
		        	$this->setState(316);

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
		        	$this->setState(317);
		        	$this->additiveExpr();
		        	$this->setState(322);
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

		    $this->enterRule($localContext, 60, self::RULE_additiveExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(323);
		        $this->multiplicativeExpr();
		        $this->setState(328);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 29, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(324);

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
		        		$this->setState(325);
		        		$this->multiplicativeExpr(); 
		        	}

		        	$this->setState(330);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 29, $this->ctx);
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

		    $this->enterRule($localContext, 62, self::RULE_multiplicativeExpr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(331);
		        $this->unaryExpr();
		        $this->setState(336);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 30, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(332);

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
		        		$this->setState(333);
		        		$this->unaryExpr(); 
		        	}

		        	$this->setState(338);
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

		    $this->enterRule($localContext, 64, self::RULE_unaryExpr);

		    try {
		        $this->setState(348);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 31, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(339);
		        	    $this->match(self::T__28);
		        	    $this->setState(340);
		        	    $this->unaryExpr();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(341);
		        	    $this->match(self::T__24);
		        	    $this->setState(342);
		        	    $this->unaryExpr();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(343);
		        	    $this->match(self::T__25);
		        	    $this->setState(344);
		        	    $this->unaryExpr();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(345);
		        	    $this->match(self::T__29);
		        	    $this->setState(346);
		        	    $this->unaryExpr();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(347);
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
			$startState = 66;
			$this->enterRecursionRule($localContext, 66, self::RULE_primaryExpr, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(361);
				$this->errorHandler->sync($this);

				switch ($this->input->LA(1)) {
				    case self::TRUE:
				    case self::FALSE:
				    case self::INT_LITERAL:
				    case self::FLOAT_LITERAL:
				    case self::STRING_LITERAL:
				    case self::RUNE_LITERAL:
				    	$this->setState(351);
				    	$this->literal();
				    	break;

				    case self::IDENTIFIER:
				    	$this->setState(352);
				    	$this->match(self::IDENTIFIER);
				    	break;

				    case self::NIL:
				    	$this->setState(353);
				    	$this->match(self::NIL);
				    	break;

				    case self::T__0:
				    	$this->setState(354);
				    	$this->match(self::T__0);
				    	$this->setState(355);
				    	$this->expression();
				    	$this->setState(356);
				    	$this->match(self::T__1);
				    	break;

				    case self::FMT:
				    	$this->setState(358);
				    	$this->fmtPrintlnCall();
				    	break;

				    case self::LEN:
				    case self::NOW:
				    case self::SUBSTR:
				    case self::TYPEOF:
				    	$this->setState(359);
				    	$this->builtinCall();
				    	break;

				    case self::T__25:
				    case self::T__30:
				    case self::INT32:
				    case self::FLOAT32:
				    case self::BOOL:
				    case self::RUNE:
				    case self::STRING:
				    	$this->setState(360);
				    	$this->arrayLiteral();
				    	break;

				default:
					throw new NoViableAltException($this);
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(376);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 35, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(374);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 34, $this->ctx)) {
							case 1:
							    $localContext = new Context\PrimaryExprContext($parentContext, $parentState);
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_primaryExpr);
							    $this->setState(363);

							    if (!($this->precpred($this->ctx, 5))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 5)");
							    }
							    $this->setState(364);
							    $this->match(self::T__30);
							    $this->setState(365);
							    $this->expression();
							    $this->setState(366);
							    $this->match(self::T__31);
							break;

							case 2:
							    $localContext = new Context\PrimaryExprContext($parentContext, $parentState);
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_primaryExpr);
							    $this->setState(368);

							    if (!($this->precpred($this->ctx, 4))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 4)");
							    }
							    $this->setState(369);
							    $this->match(self::T__0);
							    $this->setState(371);
							    $this->errorHandler->sync($this);
							    $_la = $this->input->LA(1);

							    if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175919931064319) !== 0)) {
							    	$this->setState(370);
							    	$this->exp_list();
							    }
							    $this->setState(373);
							    $this->match(self::T__1);
							break;
						} 
					}

					$this->setState(378);
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

		    $this->enterRule($localContext, 68, self::RULE_fmtPrintlnCall);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(379);
		        $this->match(self::FMT);
		        $this->setState(380);
		        $this->match(self::T__32);
		        $this->setState(381);
		        $this->match(self::PRINTLN);
		        $this->setState(382);
		        $this->match(self::T__0);
		        $this->setState(384);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175919931064319) !== 0)) {
		        	$this->setState(383);
		        	$this->exp_list();
		        }
		        $this->setState(386);
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

		    $this->enterRule($localContext, 70, self::RULE_builtinCall);

		    try {
		        $this->setState(410);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::LEN:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(388);
		            	$this->match(self::LEN);
		            	$this->setState(389);
		            	$this->match(self::T__0);
		            	$this->setState(390);
		            	$this->expression();
		            	$this->setState(391);
		            	$this->match(self::T__1);
		            	break;

		            case self::NOW:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(393);
		            	$this->match(self::NOW);
		            	$this->setState(394);
		            	$this->match(self::T__0);
		            	$this->setState(395);
		            	$this->match(self::T__1);
		            	break;

		            case self::SUBSTR:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(396);
		            	$this->match(self::SUBSTR);
		            	$this->setState(397);
		            	$this->match(self::T__0);
		            	$this->setState(398);
		            	$this->expression();
		            	$this->setState(399);
		            	$this->match(self::T__2);
		            	$this->setState(400);
		            	$this->expression();
		            	$this->setState(401);
		            	$this->match(self::T__2);
		            	$this->setState(402);
		            	$this->expression();
		            	$this->setState(403);
		            	$this->match(self::T__1);
		            	break;

		            case self::TYPEOF:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(405);
		            	$this->match(self::TYPEOF);
		            	$this->setState(406);
		            	$this->match(self::T__0);
		            	$this->setState(407);
		            	$this->expression();
		            	$this->setState(408);
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

		    $this->enterRule($localContext, 72, self::RULE_literal);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(412);

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

		    $this->enterRule($localContext, 74, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(414);
		        $this->type();
		        $this->setState(415);
		        $this->match(self::T__3);
		        $this->setState(417);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175919931064311) !== 0)) {
		        	$this->setState(416);
		        	$this->elementList();
		        }
		        $this->setState(419);
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

		    $this->enterRule($localContext, 76, self::RULE_elementList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(421);
		        $this->element();
		        $this->setState(426);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 39, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(422);
		        		$this->match(self::T__2);
		        		$this->setState(423);
		        		$this->element(); 
		        	}

		        	$this->setState(428);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 39, $this->ctx);
		        }
		        $this->setState(430);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__2) {
		        	$this->setState(429);
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

		    $this->enterRule($localContext, 78, self::RULE_element);

		    try {
		        $this->setState(439);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 42, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(432);
		        	    $this->expression();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(433);
		        	    $this->arrayLiteral();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(434);
		        	    $this->match(self::T__3);
		        	    $this->setState(436);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175919931064311) !== 0)) {
		        	    	$this->setState(435);
		        	    	$this->elementList();
		        	    }
		        	    $this->setState(438);
		        	    $this->match(self::T__4);
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

		    $this->enterRule($localContext, 80, self::RULE_type);

		    try {
		        $this->setState(444);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__25:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(441);
		            	$this->pointerType();
		            	break;

		            case self::T__30:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(442);
		            	$this->arrayType();
		            	break;

		            case self::INT32:
		            case self::FLOAT32:
		            case self::BOOL:
		            case self::RUNE:
		            case self::STRING:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(443);
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

		    $this->enterRule($localContext, 82, self::RULE_pointerType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(446);
		        $this->match(self::T__25);
		        $this->setState(447);
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

		    $this->enterRule($localContext, 84, self::RULE_arrayType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(449);
		        $this->match(self::T__30);
		        $this->setState(451);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ((((($_la - 1)) & ~0x3f) === 0 && ((1 << ($_la - 1)) & -175919931064319) !== 0)) {
		        	$this->setState(450);
		        	$this->expression();
		        }
		        $this->setState(453);
		        $this->match(self::T__31);
		        $this->setState(454);
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

		    $this->enterRule($localContext, 86, self::RULE_baseType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(456);

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
					case 33:
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

	    public function exprStmt(): ?ExprStmtContext
	    {
	    	return $this->getTypedRuleContext(ExprStmtContext::class, 0);
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

	class ExprStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return OLCParser::RULE_exprStmt;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->enterExprStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof OLCListener) {
			    $listener->exitExprStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof OLCVisitor) {
			    return $visitor->visitExprStmt($this);
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

	    public function elementList(): ?ElementListContext
	    {
	    	return $this->getTypedRuleContext(ElementListContext::class, 0);
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
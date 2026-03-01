<?php

require 'vendor/autoload.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;

$input = new InputStream("3+5");

$lexer = new CalculadoraLexer($input);
$tokens = new CommonTokenStream($lexer);
$parser = new CalculadoraParser($tokens);

$tree = $parser->expr();

echo $tree->toStringTree($parser);
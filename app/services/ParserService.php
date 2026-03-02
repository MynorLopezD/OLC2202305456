<?php

namespace App\Services;

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Generated\LenguajeLexer;
use Antlr\Generated\LenguajeParser;

class ParserService
{
    public function analizar($entrada)
    {
        $input = new InputStream($entrada);

        $lexer = new LenguajeLexer($input);
        $tokens = new CommonTokenStream($lexer);

        $parser = new LenguajeParser($tokens);

        $tree = $parser->prog();

        return $tree->toStringTree($parser);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;

use ANTLR\OLCLexer;
use ANTLR\OLCParser;

class CompilerController extends Controller
{
    public function analizar(Request $request)
    {
        $codigo = $request->input('codigo');

        try {

            // ✅ CREACIÓN CORRECTA DEL INPUT
            $input = InputStream::fromString($codigo);

            $lexer = new OLCLexer($input);
            $tokens = new CommonTokenStream($lexer);

            $parser = new OLCParser($tokens);

            $tree = $parser->program();

            return response()->json([
                "resultado" => $tree->toStringTree($parser->getRuleNames())
            ]);

        } catch (\Exception $e) {

            return response()->json([
                "resultado" => "Error:\n" . $e->getMessage()
            ]);
        }
    }
}
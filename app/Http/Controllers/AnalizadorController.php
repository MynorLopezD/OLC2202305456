<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ParserService;

class AnalizadorController extends Controller
{
    public function analizar(Request $request)
    {
        $parser = new ParserService();

        $resultado =
            $parser->analizar($request->input('codigo'));

        return response()->json([
            "resultado" => $resultado
        ]);
    }
}
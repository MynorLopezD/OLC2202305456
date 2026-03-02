<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompilerController extends Controller
{
    public function analizar(Request $request)
    {
        $codigo = $request->input('codigo');

        // TEMPORAL (ANTLR vendrá después)
        return response()->json([
            "resultado" => "Código recibido correctamente:\n" . $codigo
        ]);
    }
}
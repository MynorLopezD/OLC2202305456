<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InterpreterService;

class CompilerController extends Controller
{

    public function analizar(Request $request)
    {

        $codigo = $request->input('codigo');

        try {

            $interpreter = new InterpreterService();

            $result = $interpreter->run($codigo);

            return response()->json([
                "resultado"=>$result["output"],
                "errores"=>$result["errors"],
                "tabla"=>$result["symbols"]
            ]);

        } catch (\Exception $e) {

            return response()->json([
                "resultado"=>"Error: ".$e->getMessage()
            ]);
        }
    }

}
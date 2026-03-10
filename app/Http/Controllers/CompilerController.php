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
            $result      = $interpreter->run($codigo);

            // Guardar en sesión para que la vista de reportes los consuma
            session([
                'errores'  => $result['errors']  ?? [],
                'simbolos' => $result['symbols'] ?? [],
                'output'   => $result['output']  ?? '',
            ]);

            return response()->json([
                "resultado" => $result["output"],
                "errores"   => $result["errors"],
                "tabla"     => $result["symbols"],
            ]);

        } catch (\Exception $e) {

            return response()->json([
                "resultado" => "Error: " . $e->getMessage(),
                "errores"   => [],
                "tabla"     => [],
            ]);
        }
    }

    /**
     * Muestra la vista de reportes (errores + tabla de símbolos).
     * Los datos vienen de la sesión que pobló analizar().
     */
    public function reportes()
    {
        return view('reportes');
    }
}
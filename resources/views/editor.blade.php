@extends('layouts.app')

@section('content')

    @push('styles')
        <style>
            body {
                background: #f4f6f9;
            }

            #editor {
                height: 350px;
                font-family: monospace;
            }

            #console {
                height: 200px;
                background: black;
                color: #00ff00;
                font-family: monospace;
                overflow-y: auto;
                padding: 10px;
            }

            .panel-title {
                font-weight: bold;
                margin-bottom: 10px;
            }

            #console {
                height: 200px;
                background: black;
                color: #00ff00;
                font-family: monospace;
                overflow-y: auto;
                padding: 10px;
                white-space: pre-wrap;
                /* <-- agrega esto */
            }
        </style>
    @endpush


    <div class="p-3">

        <!-- ========================= -->
        <!-- Barra de acciones -->
        <!-- ========================= -->
        <div class="card mb-3">
            <div class="card-body d-flex flex-wrap gap-2">

                <button class="btn btn-secondary" onclick="nuevo()">
                    Nuevo / Limpiar
                </button>

                <input type="file" id="fileInput" hidden onchange="cargarArchivo(event)">

                <button class="btn btn-primary" onclick="document.getElementById('fileInput').click()">
                    Cargar archivo
                </button>

                <button class="btn btn-success" onclick="guardarCodigo()">
                    Guardar código
                </button>

                <button class="btn btn-warning" onclick="ejecutar()">
                    Ejecutar / Analizar
                </button>

                <button class="btn btn-danger" onclick="limpiarConsola()">
                    Limpiar consola
                </button>

            </div>
        </div>


        <div class="row">

            <!-- ========================= -->
            <!-- Editor -->
            <!-- ========================= -->
            <div class="col-md-8">

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="panel-title">
                            Panel de edición de código
                        </div>

                        <textarea id="editor" class="form-control" placeholder="Escriba su código aquí..."></textarea>
                    </div>
                </div>


                <!-- ========================= -->
                <!-- Consola -->
                <!-- ========================= -->
                <div class="card">
                    <div class="card-body">

                        <div class="panel-title">
                            Consola de salida
                        </div>

                        <div id="console"></div>

                    </div>
                </div>

            </div>


            <!-- ========================= -->
            <!-- Panel Reportes -->
            <!-- ========================= -->
            <div class="col-md-4">

                <div class="card">
                    <div class="card-body">

                        <div class="panel-title">
                            Panel de reportes
                        </div>

                        <p class="text-muted small mb-3">
                            Ejecuta el código primero para generar los reportes.
                        </p>

                        <button id="btnReportes" class="btn btn-outline-info w-100 mb-2" disabled onclick="abrirReportes()">
                            📊 Ver errores y tabla de símbolos
                        </button>

                        <button id="btnResultado" class="btn btn-outline-primary w-100 mb-2" disabled
                            onclick="descargar('resultado.txt')">
                            ↓ Descargar resultado
                        </button>

                        <button id="btnCSVErrores" class="btn btn-outline-danger w-100 mb-2" disabled
                            onclick="descargarJSON('errores')">
                            ↓ Descargar errores (JSON)
                        </button>

                        <button id="btnCSVSimbolos" class="btn btn-outline-success w-100" disabled
                            onclick="descargarJSON('simbolos')">
                            ↓ Descargar tabla símbolos (JSON)
                        </button>

                    </div>
                </div>

            </div>

        </div>

    </div>


@endsection


@push('scripts')
<script>

    // Almacena el último resultado del análisis en memoria
    let ultimoResultado = null;

    function nuevo() {
        document.getElementById('editor').value = '';
        limpiarConsola();
    }

    function limpiarConsola() {
        document.getElementById('console').innerText = '';
    }

    function cargarArchivo(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload  = e => document.getElementById('editor').value = e.target.result;
        reader.readAsText(file);
    }

    function guardarCodigo() {
        const contenido = document.getElementById('editor').value;
        const blob = new Blob([contenido], { type: 'text/plain' });
        const a    = document.createElement('a');
        a.href     = URL.createObjectURL(blob);
        a.download = 'codigo.txt';
        a.click();
    }

    async function ejecutar() {
        limpiarConsola();

        const codigo = document.getElementById('editor').value;
        const token  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const consola = document.getElementById('console');
        consola.innerText += '> Enviando código al servidor...\n';

        try {
            const response = await fetch('/analizar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept':       'application/json',
                    'X-CSRF-TOKEN': token,
                },
                body: JSON.stringify({ codigo }),
            });

            const data = await response.json();
            ultimoResultado = data;

            // Mostrar output en consola
            consola.innerText += data.resultado ?? '';

            // Activar botones de reporte
            document.getElementById('btnReportes').disabled    = false;
            document.getElementById('btnResultado').disabled   = false;
            document.getElementById('btnCSVErrores').disabled  = false;
            document.getElementById('btnCSVSimbolos').disabled = false;

            // Mostrar resumen rápido de errores
            const nErr = (data.errores ?? []).length;
            if (nErr > 0) {
                consola.innerText += `\n⚠ ${nErr} error(es) detectado(s). Ver reporte para detalles.\n`;
            }

        } catch (error) {
            console.error(error);
            consola.innerText += 'Error al conectar con el backend.\n';
        }
    }

    /**
     * Abre la vista de reportes en una nueva pestaña.
     * Los datos ya están en sesión (los guardó analizar() en el servidor).
     */
    function abrirReportes() {
        window.open('/reportes', '_blank');
    }

    function descargar(nombre) {
        const contenido = document.getElementById('console').innerText;
        const blob = new Blob([contenido], { type: 'text/plain' });
        const a    = document.createElement('a');
        a.href     = URL.createObjectURL(blob);
        a.download = nombre;
        a.click();
    }

    function descargarJSON(tipo) {
        if (!ultimoResultado) return;
        const datos = tipo === 'errores' ? ultimoResultado.errores : ultimoResultado.tabla;
        const blob  = new Blob([JSON.stringify(datos, null, 2)], { type: 'application/json' });
        const a     = document.createElement('a');
        a.href      = URL.createObjectURL(blob);
        a.download  = `${tipo}.json`;
        a.click();
    }

</script>
@endpush
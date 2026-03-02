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

            <button class="btn btn-primary"
                onclick="document.getElementById('fileInput').click()">
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

                    <textarea id="editor"
                        class="form-control"
                        placeholder="Escriba su código aquí..."></textarea>
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

                    <button id="btnResultado"
                        class="btn btn-outline-primary w-100 mb-2"
                        disabled
                        onclick="descargar('resultado.txt')">
                        Descargar resultado
                    </button>

                    <button id="btnErrores"
                        class="btn btn-outline-danger w-100 mb-2"
                        disabled
                        onclick="descargar('errores.txt')">
                        Descargar errores
                    </button>

                    <button id="btnTabla"
                        class="btn btn-outline-success w-100"
                        disabled
                        onclick="descargar('tabla_simbolos.txt')">
                        Descargar tabla de símbolos
                    </button>

                </div>
            </div>

        </div>

    </div>

</div>


@endsection


@push('scripts')
<script>

    function nuevo() {
        document.getElementById('editor').value = '';
        limpiarConsola();
    }

    function limpiarConsola() {
        document.getElementById('console').innerHTML = '';
    }

    function cargarArchivo(event) {

        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();

        reader.onload = e =>
            document.getElementById('editor').value =
                e.target.result;

        reader.readAsText(file);
    }

    function guardarCodigo() {

        const contenido =
            document.getElementById('editor').value;

        const blob =
            new Blob([contenido], { type: 'text/plain' });

        const a = document.createElement('a');

        a.href = URL.createObjectURL(blob);
        a.download = 'codigo.txt';
        a.click();
    }


    async function ejecutar() {

        limpiarConsola();

        const codigo =
            document.getElementById('editor').value;

        const token =
            document.querySelector(
                'meta[name="csrf-token"]'
            ).getAttribute('content');

        document.getElementById('console')
            .innerHTML += '> Enviando código al servidor...<br>';

        try {

            const response = await fetch('/analizar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ codigo })
            });

            const data = await response.json();

            document.getElementById('console')
                .innerHTML += data.resultado + '<br>';

        } catch (error) {

            console.error(error);

            document.getElementById('console')
                .innerHTML += 'Error al conectar con el backend';
        }
    }


    function descargar(nombre) {

        const contenido =
            document.getElementById('console').innerText;

        const blob =
            new Blob([contenido], { type: 'text/plain' });

        const a = document.createElement('a');

        a.href = URL.createObjectURL(blob);
        a.download = nombre;
        a.click();
    }

</script>
@endpush
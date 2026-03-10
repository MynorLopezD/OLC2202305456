@extends('layouts.app')

@section('content')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Syne:wght@400;600;700;800&display=swap');

    :root {
        --bg:        #0d0f14;
        --surface:   #13161e;
        --border:    #1f2433;
        --accent:    #4f8ef7;
        --accent2:   #a78bfa;
        --success:   #34d399;
        --warn:      #fbbf24;
        --danger:    #f87171;
        --text:      #e2e8f0;
        --muted:     #64748b;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        background: var(--bg);
        color: var(--text);
        font-family: 'Syne', sans-serif;
        min-height: 100vh;
    }

    /* ── HEADER ── */
    .rpt-header {
        background: linear-gradient(135deg, #0d0f14 0%, #13161e 60%, #1a1033 100%);
        border-bottom: 1px solid var(--border);
        padding: 28px 40px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .rpt-title {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .rpt-title .icon {
        width: 44px; height: 44px;
        background: linear-gradient(135deg, var(--accent), var(--accent2));
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px;
    }

    .rpt-title h1 {
        font-size: 22px;
        font-weight: 800;
        letter-spacing: -0.5px;
        color: var(--text);
    }

    .rpt-title span {
        font-size: 13px;
        color: var(--muted);
        font-family: 'JetBrains Mono', monospace;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 10px;
        color: var(--text);
        font-family: 'Syne', sans-serif;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
        transition: all .2s;
    }
    .back-btn:hover {
        border-color: var(--accent);
        color: var(--accent);
        background: rgba(79,142,247,.08);
    }

    /* ── STATS BAR ── */
    .stats-bar {
        display: flex;
        gap: 16px;
        padding: 20px 40px;
        flex-wrap: wrap;
    }

    .stat-card {
        flex: 1; min-width: 140px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 14px;
        transition: border-color .2s;
    }
    .stat-card:hover { border-color: var(--accent); }

    .stat-dot {
        width: 12px; height: 12px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .stat-info .num {
        font-size: 26px;
        font-weight: 800;
        line-height: 1;
        font-family: 'JetBrains Mono', monospace;
    }
    .stat-info .label {
        font-size: 12px;
        color: var(--muted);
        margin-top: 3px;
        font-weight: 600;
        letter-spacing: .5px;
        text-transform: uppercase;
    }

    /* ── MAIN CONTENT ── */
    .rpt-body { padding: 0 40px 40px; }

    /* ── SECTION ── */
    .section {
        margin-bottom: 40px;
        animation: fadeUp .4s ease both;
    }
    .section:nth-child(2) { animation-delay: .1s; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
        gap: 12px;
        flex-wrap: wrap;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 700;
    }

    .section-title .badge {
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-family: 'JetBrains Mono', monospace;
        font-weight: 600;
    }

    .badge-errors  { background: rgba(248,113,113,.15); color: var(--danger); border: 1px solid rgba(248,113,113,.3); }
    .badge-symbols { background: rgba(52,211,153,.15);  color: var(--success); border: 1px solid rgba(52,211,153,.3); }
    .badge-zero    { background: rgba(100,116,139,.15); color: var(--muted);   border: 1px solid rgba(100,116,139,.3); }

    /* ── EMPTY STATE ── */
    .empty-state {
        background: var(--surface);
        border: 1px dashed var(--border);
        border-radius: 16px;
        padding: 48px;
        text-align: center;
        color: var(--muted);
    }
    .empty-state .empty-icon { font-size: 40px; margin-bottom: 12px; }
    .empty-state p { font-size: 14px; }

    /* ── TABLE ── */
    .table-wrap {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13.5px;
    }

    thead {
        background: rgba(79,142,247,.06);
        border-bottom: 1px solid var(--border);
    }

    thead th {
        padding: 13px 18px;
        text-align: left;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--muted);
        white-space: nowrap;
    }

    tbody tr {
        border-bottom: 1px solid rgba(31,36,51,.8);
        transition: background .15s;
    }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: rgba(79,142,247,.04); }

    tbody td {
        padding: 13px 18px;
        font-family: 'JetBrains Mono', monospace;
        font-size: 13px;
        vertical-align: middle;
    }

    /* ── TIPO BADGE ── */
    .tipo-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 3px 10px;
        border-radius: 6px;
        font-size: 11.5px;
        font-weight: 700;
        white-space: nowrap;
    }

    .tipo-lexico    { background: rgba(251,191,36,.1);  color: var(--warn);    border: 1px solid rgba(251,191,36,.25); }
    .tipo-sintactico{ background: rgba(248,113,113,.1); color: var(--danger);  border: 1px solid rgba(248,113,113,.25);}
    .tipo-semantico { background: rgba(167,139,250,.1); color: var(--accent2); border: 1px solid rgba(167,139,250,.25);}
    .tipo-funcion   { background: rgba(79,142,247,.1);  color: var(--accent);  border: 1px solid rgba(79,142,247,.25); }
    .tipo-variable  { background: rgba(52,211,153,.1);  color: var(--success); border: 1px solid rgba(52,211,153,.25); }
    .tipo-constante { background: rgba(251,191,36,.1);  color: var(--warn);    border: 1px solid rgba(251,191,36,.25); }
    .tipo-arreglo   { background: rgba(167,139,250,.1); color: var(--accent2); border: 1px solid rgba(167,139,250,.25);}
    .tipo-default   { background: rgba(100,116,139,.1); color: var(--muted);   border: 1px solid rgba(100,116,139,.25);}

    /* ── LOCATION PILL ── */
    .loc {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 2px 8px;
        background: rgba(31,36,51,.8);
        border: 1px solid var(--border);
        border-radius: 5px;
        font-size: 12px;
        color: var(--muted);
    }

    .loc-accent { color: var(--accent); }

    /* ── NUMBER CELL ── */
    .num-cell {
        color: var(--muted);
        font-size: 12px;
        width: 40px;
    }

    /* ── VALUE CELL ── */
    .val-cell {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: var(--success);
    }
    .val-null { color: var(--muted); font-style: italic; }

    /* ── SCOPE CELL ── */
    .scope-cell { color: var(--accent2); }

    /* ── DESCRIPTION CELL ── */
    .desc-cell { color: var(--text); max-width: 340px; }

    /* ── SEARCH BAR ── */
    .search-wrap {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .search-input {
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 7px 14px;
        color: var(--text);
        font-family: 'JetBrains Mono', monospace;
        font-size: 13px;
        outline: none;
        width: 200px;
        transition: border-color .2s;
    }
    .search-input:focus { border-color: var(--accent); }
    .search-input::placeholder { color: var(--muted); }

    /* ── EXPORT BTN ── */
    .export-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 14px;
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--muted);
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all .2s;
    }
    .export-btn:hover { border-color: var(--success); color: var(--success); }

    /* ── NO ERRORS BANNER ── */
    .success-banner {
        display: flex;
        align-items: center;
        gap: 14px;
        background: rgba(52,211,153,.06);
        border: 1px solid rgba(52,211,153,.2);
        border-radius: 14px;
        padding: 18px 24px;
        color: var(--success);
        font-weight: 600;
        font-size: 14px;
    }
    .success-banner .icon { font-size: 24px; }

    @media (max-width: 768px) {
        .rpt-header, .stats-bar, .rpt-body { padding-left: 16px; padding-right: 16px; }
        .search-input { width: 140px; }
        table { font-size: 12px; }
        tbody td, thead th { padding: 10px 12px; }
    }
</style>
@endpush

{{-- ================================================================ --}}
{{-- HEADER                                                            --}}
{{-- ================================================================ --}}
<div class="rpt-header">
    <div class="rpt-title">
        <div class="icon">📊</div>
        <div>
            <h1>Reportes del Análisis</h1>
            <span>OLC Interpreter · Fase léxica, sintáctica y semántica</span>
        </div>
    </div>
    <a href="{{ url('/') }}" class="back-btn">
        ← Volver al editor
    </a>
</div>

{{-- ================================================================ --}}
{{-- STATS BAR                                                          --}}
{{-- ================================================================ --}}
@php
    $errores  = session('errores',  []);
    $simbolos = session('simbolos', []);
    $totalLex = collect($errores)->where('tipo', 'Léxico')->count();
    $totalSin = collect($errores)->where('tipo', 'Sintáctico')->count();
    $totalSem = collect($errores)->where('tipo', 'Semántico')->count();
@endphp

<div class="stats-bar">
    <div class="stat-card">
        <div class="stat-dot" style="background:var(--warn)"></div>
        <div class="stat-info">
            <div class="num" style="color:var(--warn)">{{ $totalLex }}</div>
            <div class="label">Léxicos</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-dot" style="background:var(--danger)"></div>
        <div class="stat-info">
            <div class="num" style="color:var(--danger)">{{ $totalSin }}</div>
            <div class="label">Sintácticos</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-dot" style="background:var(--accent2)"></div>
        <div class="stat-info">
            <div class="num" style="color:var(--accent2)">{{ $totalSem }}</div>
            <div class="label">Semánticos</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-dot" style="background:var(--success)"></div>
        <div class="stat-info">
            <div class="num" style="color:var(--success)">{{ count($simbolos) }}</div>
            <div class="label">Símbolos</div>
        </div>
    </div>
</div>

{{-- ================================================================ --}}
{{-- BODY                                                               --}}
{{-- ================================================================ --}}
<div class="rpt-body">

    {{-- ── 1. REPORTE DE ERRORES ── --}}
    <div class="section">
        <div class="section-header">
            <div class="section-title">
                <span>🔴</span>
                <span>Reporte de Errores</span>
                @if(count($errores) > 0)
                    <span class="badge badge-errors">{{ count($errores) }} errores</span>
                @else
                    <span class="badge badge-zero">Sin errores</span>
                @endif
            </div>
            <div class="search-wrap">
                @if(count($errores) > 0)
                    <input type="text"
                           class="search-input"
                           id="searchErrors"
                           placeholder="Filtrar errores..."
                           oninput="filterTable('errorsTable', this.value)">
                    <button class="export-btn" onclick="exportCSV('errorsTable', 'errores.csv')">
                        ↓ CSV
                    </button>
                @endif
            </div>
        </div>

        @if(count($errores) === 0)
            <div class="success-banner">
                <span class="icon">✅</span>
                <span>¡Sin errores detectados! El código pasó todas las fases de análisis correctamente.</span>
            </div>
        @else
            <div class="table-wrap">
                <table id="errorsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th>Línea</th>
                            <th>Columna</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($errores as $i => $err)
                        <tr>
                            <td class="num-cell">{{ $i + 1 }}</td>
                            <td>
                                @php
                                    $tipo = strtolower($err['tipo'] ?? '');
                                    $cls  = match($tipo) {
                                        'léxico'     => 'tipo-lexico',
                                        'sintáctico' => 'tipo-sintactico',
                                        'semántico'  => 'tipo-semantico',
                                        default      => 'tipo-default',
                                    };
                                    $ico = match($tipo) {
                                        'léxico'     => '⚡',
                                        'sintáctico' => '🔧',
                                        'semántico'  => '🔎',
                                        default      => '⚠',
                                    };
                                @endphp
                                <span class="tipo-badge {{ $cls }}">{{ $ico }} {{ $err['tipo'] ?? '—' }}</span>
                            </td>
                            <td class="desc-cell">{{ $err['descripcion'] ?? $err['message'] ?? '—' }}</td>
                            <td>
                                <span class="loc">
                                    <span class="loc-accent">L</span>{{ $err['linea'] ?? $err['line'] ?? '?' }}
                                </span>
                            </td>
                            <td>
                                <span class="loc">
                                    <span class="loc-accent">C</span>{{ $err['columna'] ?? $err['column'] ?? '?' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- ── 2. TABLA DE SÍMBOLOS ── --}}
    <div class="section">
        <div class="section-header">
            <div class="section-title">
                <span>🟢</span>
                <span>Tabla de Símbolos</span>
                @if(count($simbolos) > 0)
                    <span class="badge badge-symbols">{{ count($simbolos) }} símbolos</span>
                @else
                    <span class="badge badge-zero">Vacía</span>
                @endif
            </div>
            <div class="search-wrap">
                @if(count($simbolos) > 0)
                    <input type="text"
                           class="search-input"
                           id="searchSymbols"
                           placeholder="Filtrar símbolos..."
                           oninput="filterTable('symbolsTable', this.value)">
                    <button class="export-btn" onclick="exportCSV('symbolsTable', 'simbolos.csv')">
                        ↓ CSV
                    </button>
                @endif
            </div>
        </div>

        @if(count($simbolos) === 0)
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <p>No hay símbolos registrados. Ejecuta un análisis primero.</p>
            </div>
        @else
            <div class="table-wrap">
                <table id="symbolsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Identificador</th>
                            <th>Tipo</th>
                            <th>Ámbito</th>
                            <th>Valor</th>
                            <th>Línea</th>
                            <th>Columna</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($simbolos as $i => $sym)
                        <tr>
                            <td class="num-cell">{{ $i + 1 }}</td>
                            <td style="color:var(--text); font-weight:600">{{ $sym['id'] ?? '—' }}</td>
                            <td>
                                @php
                                    $t   = strtolower($sym['type'] ?? '');
                                    $cls = match(true) {
                                        str_contains($t, 'func')    => 'tipo-funcion',
                                        str_contains($t, 'int')     => 'tipo-variable',
                                        str_contains($t, 'float')   => 'tipo-variable',
                                        str_contains($t, 'bool')    => 'tipo-variable',
                                        str_contains($t, 'string')  => 'tipo-variable',
                                        str_contains($t, 'rune')    => 'tipo-variable',
                                        str_contains($t, 'const')   => 'tipo-constante',
                                        str_contains($t, 'array')   => 'tipo-arreglo',
                                        str_contains($t, '[')       => 'tipo-arreglo',
                                        default                     => 'tipo-default',
                                    };
                                @endphp
                                <span class="tipo-badge {{ $cls }}">{{ $sym['type'] ?? '—' }}</span>
                            </td>
                            <td class="scope-cell">{{ $sym['scope'] ?? '—' }}</td>
                            <td>
                                @if(isset($sym['value']) && $sym['value'] !== null)
                                    <span class="val-cell">{{ is_array($sym['value']) ? json_encode($sym['value']) : $sym['value'] }}</span>
                                @else
                                    <span class="val-null">—</span>
                                @endif
                            </td>
                            <td>
                                <span class="loc">
                                    <span class="loc-accent">L</span>{{ $sym['line'] ?? '?' }}
                                </span>
                            </td>
                            <td>
                                <span class="loc">
                                    <span class="loc-accent">C</span>{{ $sym['column'] ?? '?' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>

@endsection

@push('scripts')
<script>
    /**
     * Filtra las filas de una tabla según el texto ingresado.
     */
    function filterTable(tableId, query) {
        const q   = query.toLowerCase().trim();
        const tbl = document.getElementById(tableId);
        if (!tbl) return;

        tbl.querySelectorAll('tbody tr').forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = (!q || text.includes(q)) ? '' : 'none';
        });
    }

    /**
     * Exporta una tabla HTML como archivo CSV.
     */
    function exportCSV(tableId, filename) {
        const tbl  = document.getElementById(tableId);
        if (!tbl) return;

        const rows = [...tbl.querySelectorAll('tr')];
        const csv  = rows.map(row =>
            [...row.querySelectorAll('th, td')]
                .map(cell => `"${cell.textContent.trim().replace(/"/g, '""')}"`)
                .join(',')
        ).join('\n');

        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const a    = document.createElement('a');
        a.href     = URL.createObjectURL(blob);
        a.download = filename;
        a.click();
    }
</script>
@endpush
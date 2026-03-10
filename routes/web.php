<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompilerController;

Route::post('/analizar',
    [CompilerController::class, 'analizar']);

Route::get('/', function () {
    return view('editor');
});

Route::get('/reportes', [CompilerController::class, 'reportes'])->name('reportes');

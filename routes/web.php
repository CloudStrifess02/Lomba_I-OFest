<?php

use App\Http\Controllers\DiagnosisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});

Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis.index');
Route::post('/diagnosis/analyze', [DiagnosisController::class, 'analyze'])->name('diagnosis.analyze');
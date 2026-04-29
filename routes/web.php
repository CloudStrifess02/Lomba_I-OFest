<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DiagnosisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis.index');
Route::post('/diagnosis/analyze', [DiagnosisController::class, 'analyze'])->name('diagnosis.analyze');
Route::get('/book-technician', [BookingController::class, 'index'])->name('booking.index');
    
    // Proses simpan booking
    Route::post('/book-technician', [BookingController::class, 'store'])->name('booking.store');
    
    // Halaman sukses
    Route::get('/booking/success/{booking_id}', [BookingController::class, 'success'])->name('booking.success');

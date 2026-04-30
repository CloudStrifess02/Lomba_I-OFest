<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DiagnosisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');

// Login
Route::get('/login',  [LoginController::class,    'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,    'login']);

// Register
Route::get('/register',  [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

// Google OAuth
Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::fallback(function () {
    return redirect()->route('home');
});

Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis.index');
Route::post('/diagnosis/analyze', [DiagnosisController::class, 'analyze'])->name('diagnosis.analyze');
Route::get('/book-technician', [BookingController::class, 'index'])->name('booking.index');
Route::post('/book-technician', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/success/{booking_id}', [BookingController::class, 'success'])->name('booking.success');
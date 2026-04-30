<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ── PUBLIC ──────────────────────────────────────────────────────────────────
Route::get('/', function () {
    return view('user.home');
})->name('home');

// Terms & Privacy (required by register form)
Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');


// ── AUTH ─────────────────────────────────────────────────────────────────────

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


// ── PROTECTED ────────────────────────────────────────────────────────────────
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        // Mengarahkan ke file home.blade.php sesuai permintaan Anda
        return view('user.home'); 
    })->name('dashboard');

});


// ── FALLBACK ─────────────────────────────────────────────────────────────────
Route::fallback(function () {
    return redirect()->route('home');
});
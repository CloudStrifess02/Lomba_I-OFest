<?php

use App\Http\Controllers\MarketplaceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FixoraHubController;

Route::get('/', function () {
    return view('user.home');
});

Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');
Route::get('/marketplace/{id}', [MarketplaceController::class, 'show'])->name('marketplace.detail');
Route::get('/fixora-hub', [FixoraHubController::class, 'index'])->name('fixora-hub.index');
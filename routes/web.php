<?php

use App\Http\Controllers\MarketplaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});

Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');
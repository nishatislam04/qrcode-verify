<?php

use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('index');
})->name('index');

Route::get('/qrcode', [QrCodeController::class, 'index'])->name('qrcode');

Route::get('/qrcode/{qrcode}', [QrCodeController::class, 'show'])->name('qrcode.show');

Route::get('/verify', function () {
    return Inertia::render('verify/index');
})->name('verify');

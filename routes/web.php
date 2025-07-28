<?php

use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('index');
})->name('index');

Route::get('/qrcode', [QrCodeController::class, 'index'])->name('qrcode');

Route::get('/qrcode/{qrcode}', [QrCodeController::class, 'show'])->name('qrcode.show');

Route::get('/verify/{qrcode}', [QrCodeController::class, 'verify'])->name('verify');

Route::post('/qrcode/register', [QrCodeController::class, 'register'])->name('qrcode.register');

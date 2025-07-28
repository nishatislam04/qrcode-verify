<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('index');
})->name('index');

Route::get('/verify', function () {
    return Inertia::render('verify/index');
})->name('verify');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

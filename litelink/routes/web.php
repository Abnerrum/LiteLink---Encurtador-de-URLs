<?php

use App\Http\Controllers\UrlShortenerController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', [UrlShortenerController::class, 'index'])->name('home');

// Encurtar URL (POST do formulário)
Route::post('/shorten', [UrlShortenerController::class, 'shorten'])->name('shorten');

// Redirecionamento pelo código
Route::get('/{code}', [UrlShortenerController::class, 'redirect'])
    ->name('redirect')
    ->where('code', '[a-zA-Z0-9]{5,10}');

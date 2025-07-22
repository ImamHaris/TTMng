<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('auth/login', [LoginController::class, 'postlogin'])->name('postlogin')->middleware("throttle:5,2");
Route::get('/verif/{username}', [LoginController::class, 'verif'])->name('verif');
Route::post('/verif-store', [LoginController::class, 'verifStore'])->name('verifStore');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/downloadvideo/{encodedUrl}', [HomeController::class, 'downloadVideo'])->name('downloadVideo');
    Route::post('/find', [HomeController::class, 'find'])->name('find');
});

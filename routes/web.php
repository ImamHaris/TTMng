<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('auth/login', [LoginController::class, 'postlogin'])->name('postlogin')->middleware("throttle:5,2");
Route::get('/verif/{username}', [LoginController::class, 'verif'])->name('verif');
Route::post('/verif-store', [LoginController::class, 'verifStore'])->name('verifStore');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/getHomeData', [HomeController::class, 'getHomeData'])->name('getHomeData');
    Route::post('/downloadvideo/{encodedUrl}/{username}', [HomeController::class, 'downloadVideo'])->name('downloadVideo');
    Route::post('/find', [HomeController::class, 'find'])->name('find');
    Route::get('/notifications/latest', [HomeController::class, 'latest'])->name('notifications.latest');
    
    Route::middleware(['auth', 'role:Admin'])->group(function () {
        Route::controller(HomeController::class)->group(function () {
            Route::prefix('admin')->group(function () {
                Route::get('/user', 'listUser')->name('listUser');
                Route::post('/user/update/{id}', 'updateUser')->name('updateUser');
                Route::get('/homefyp', 'listHomeFyp')->name('listHomeFyp');
                Route::post('/homefyp/update', 'updateHomeFyp')->name('updateHomeFyp');
            });
        });
    });
});

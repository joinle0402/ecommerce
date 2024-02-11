<?php

use App\Http\Controllers\Administrator\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\AuthController;
use App\Http\Controllers\Administrator\IndexController;

Route::redirect('/', '/login');
Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('login', [AuthController::class, 'onLogin'])->name('auth.onLogin');

Route::middleware('auth')->group(function () {
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');
        Route::resource('user', UserController::class);
    });
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});


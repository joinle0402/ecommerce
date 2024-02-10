<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\IndexController;

Route::redirect('/', '/admin/dashboard');
Route::get('/admin/dashboard', [IndexController::class, 'index'])->name('administrator.dashboard');

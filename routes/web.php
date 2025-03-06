<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register.form');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');
});

Route::get('/', function () {
    return view('welcome');
});

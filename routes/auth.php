<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Authentification routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login-auth');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'create'])->name('register-create');
});

Route::get('/profile/edit', [AuthController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile', [AuthController::class, 'update'])->name('profile.update')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

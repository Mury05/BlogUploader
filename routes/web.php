<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentification routes
Route::get('/login',[AuthController::class, 'index'])->name('login')->middleware('guest');;
Route::post('/login',[AuthController::class, 'authenticate'])->name('login-auth')->middleware('guest');;
Route::get('/register',[RegisterController::class, 'index'])->name('register')->middleware('guest');;
Route::post('/register',[RegisterController::class, 'create'])->name('register-create')->middleware('guest');;
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Articles routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles/create', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('articles.show');

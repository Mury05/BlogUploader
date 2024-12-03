<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// Articles routes
Route::get('/', [ArticleController::class, 'index']);

Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/create', [ArticleController::class, 'create'])->name('create')->middleware('auth');
    Route::get('/{id}', [ArticleController::class, 'show'])->name('show');

    Route::middleware('auth')->group(function () {
        Route::post('/create', [ArticleController::class, 'store'])->name('store');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('edit');
        Route::put('/{article}/edit', [ArticleController::class, 'update'])->name('update');
        Route::delete('/{article}/delete', [ArticleController::class, 'destroy'])->name('delete');
    });
});

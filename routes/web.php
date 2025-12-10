<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create'); // Маршрут формы
Route::post('articles', [ArticleController::class, 'store'])->name('articles.store'); // Маршрут обработчика данных формы
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

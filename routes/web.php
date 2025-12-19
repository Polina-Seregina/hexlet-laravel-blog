<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;


Route::get('about', [PageController::class, 'about'])
    ->name('about');

Route::get('articles', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('articles/create', [ArticleController::class, 'create'])
    ->name('articles.create'); // Маршрут формы

Route::post('articles', [ArticleController::class, 'store'])
    ->name('articles.store'); // Маршрут обработчика данных формы

Route::get('articles/{id}', [ArticleController::class, 'show'])
    ->name('articles.show');

Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])
    ->name('article.edit');

Route::patch('articles/{id}', [ArticleController::class, 'update'])
    ->name('article.update');

Route::delete('articles/{id}', [ArticleController::class, 'destroy'])
  ->name('articles.destroy');

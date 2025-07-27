<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    // Авторы
    Route::get('/authors', [AuthorController::class, 'index']);
    Route::post('/authors', [AuthorController::class, 'store']);

    // Новости
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/by/id/{id}', [NewsController::class, 'show']);

    Route::post('/news', [NewsController::class, 'store']);
    Route::get('/news/search', [NewsController::class, 'search']);

    Route::get('/authors/{id}/news', [NewsController::class, 'byAuthor']);
    Route::get('/categories/{id}/news', [NewsController::class, 'byCategory']);

    // Рубрики
    Route::post('/categories', [CategoryController::class, 'store']);
});


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

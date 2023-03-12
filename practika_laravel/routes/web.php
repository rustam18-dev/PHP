<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
Route::resource('article', ArticleController::class)->except(['show']);
Route::resource('category', CategoryController::class)->except(['show']);
});

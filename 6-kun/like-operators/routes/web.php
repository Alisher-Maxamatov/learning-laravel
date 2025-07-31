<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/search1', [ProductController::class, 'searchTask1'])->name('search.task1');
Route::get('/search2', [ProductController::class, 'searchTask2'])->name('search.task2');

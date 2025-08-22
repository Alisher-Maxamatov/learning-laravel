<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/photos/create', [\App\Http\Controllers\PhotoController::class, 'create'])->name('photos.create');
Route::post('/photos', [\App\Http\Controllers\PhotoController::class, 'store'])->name('photos.store');
Route::get('/photos/{photo}', [\App\Http\Controllers\PhotoController::class, 'show'])->name('photos.show');

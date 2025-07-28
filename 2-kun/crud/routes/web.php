<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('companies',\App\Http\Controllers\CompaniesController::class)->middleware('auth');

Auth::routes();


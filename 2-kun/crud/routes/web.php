<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('companies',\App\Http\Controllers\CompaniesController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

//Student controller
Route::get('/student', [\App\Http\Controllers\StudentsController::class, 'index'])->name('student.index');

Route::get('/student/create', [\App\Http\Controllers\StudentsController::class, 'create'])->name('student.create');
Route::post('/students', [\App\Http\Controllers\StudentsController::class, 'store'])->name('student.store');

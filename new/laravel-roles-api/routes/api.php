<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;


Route::post('/register', [\App\Http\Controllers\AuthController::class,'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class,'login']);

// user o'zi register qiladi.
//Admin yaratilgan login qilish uchun email admin@example.com parol: parol123
//Moderator uchun email moderator@example.com parol: parol123.

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/tasks',[\App\Http\Controllers\TaskController::class,'index']);
    Route::post('/tasks',[\App\Http\Controllers\TaskController::class,'store']);
    Route::get('/tasks/{task}',[\App\Http\Controllers\TaskController::class,'show']);
    Route::put('/tasks/{task}',[\App\Http\Controllers\TaskController::class,'update']);
    Route::delete('/tasks/{task}',[\App\Http\Controllers\TaskController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});

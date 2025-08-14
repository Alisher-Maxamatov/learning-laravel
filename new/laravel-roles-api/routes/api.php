<?php
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [\App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class,'login']);

// user o'zi register qiladi.
//Admin yaratilgan login qilish uchun email admin@example.com parol: parol123
//Moderator uchun email moderator@example.com parol: parol123.

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/tasks',[\App\Http\Controllers\Api\TaskController::class,'index']);
    Route::post('/tasks',[\App\Http\Controllers\Api\TaskController::class,'store']);
    Route::get('/tasks/{task}',[\App\Http\Controllers\Api\TaskController::class,'show']);
    Route::put('/tasks/{task}',[\App\Http\Controllers\Api\TaskController::class,'update']);
    Route::delete('/tasks/{task}',[\App\Http\Controllers\Api\TaskController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});

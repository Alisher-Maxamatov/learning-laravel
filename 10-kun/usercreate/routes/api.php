<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('/register',[\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login',[\App\Http\Controllers\Api\AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function (){
    Route::post('logout',[AuthController::class,'logout']);
    Route::apiResource('tasks',TaskController::class);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/getusers", [\App\Http\Controllers\MuserController::class,'get_all_user']);
Route::post("/create",[\App\Http\Controllers\MuserController::class,'create_user']);
Route::delete('/delete/{id}',[\App\Http\Controllers\MuserController::class,'delete_user']);

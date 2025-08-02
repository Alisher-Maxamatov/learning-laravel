<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeskController;

// Route::get('/hello', function () {
//     return response()->json(['message' => 'API ishlayapti!']);
// });

Route::get('/desks', [DeskController::class, 'index']);
Route::get('/desks/{id}', [DeskController::class, 'show']);
Route::resource('desks', DeskController::class);

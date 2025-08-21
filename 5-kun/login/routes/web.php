<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Admin
Route::get('/admin/upload', [UploadController::class, 'showImageUpload'])
    ->middleware(['auth', 'admin'])->name('admin.upload');
Route::post('/admin/upload-image', [UploadController::class, 'uploadImage'])
    ->middleware(['auth', 'admin'])->name('upload.image');

// SuperAdmin
Route::get('/superadmin/upload', [UploadController::class, 'showFileUpload'])
    ->middleware(['auth', 'superadmin'])->name('superadmin.upload');
Route::post('/superadmin/upload-file', [UploadController::class, 'uploadFile'])
    ->middleware(['auth', 'superadmin'])->name('upload.file');

// Fayl o'chirish
Route::delete('/upload/{id}', [UploadController::class, 'deleteFile'])
    ->middleware(['auth'])->name('upload.delete');

<?php

use App\Http\Controllers\ProfileController;
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


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin/tasks', \App\Http\Controllers\TaskController::class);
});


Route::middleware(['auth', 'role:moderator'])->group(function () {
    Route::get('moderator/tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('moderator.tasks.index');

    Route::get('moderator/tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('moderator.tasks.index');
    Route::get('moderator/tasks/{task}/edit', [\App\Http\Controllers\TaskController::class, 'edit'])->name('moderator.tasks.edit');
    Route::get('moderator/tasks/{task}/update', [\App\Http\Controllers\TaskController::class, 'update'])->name('moderator.tasks.update');

    Route::get('moderator/tasks/create', function () {
        return back()->with('error', "Moderator vazifa yarata olmaydi!");
    });
    Route::delete('moderator/tasks/{task}', function (){
        return back()->with('error', "Moderator vazifalarni o'chira olmaydi");
    });
});

require __DIR__ . '/auth.php';

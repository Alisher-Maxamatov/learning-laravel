<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'deleteProduct'])->name('products.delete');
    Route::get('/admin/products/export', [AdminController::class, 'export'])->name('products.export');
    Route::post('/admin/products/import', [AdminController::class, 'import'])->name('products.import');


    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'categories'])->name('categories');
    Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'createCategory'])->name('categories.create');
    Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'storeCategory'])->name('categories.store');
    Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'editCategory'])->name('categories.edit');
    Route::put('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('categories.update');
    Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('categories.delete');

    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');

    Route::post('/order/{product}', [CustomerController::class, 'placeOrder'])
        ->name('order.place');
});
Route::get('/', [CustomerController::class, 'show'])->name('home');
Route::get('/customer.index', [CustomerController::class,'index'])->name('customer.index');
Route::post('/order/{product}', [CustomerController::class, 'placeOrder'])->name('order.place');
Route::get('/my-orders', [CustomerController::class, 'myOrders'])->name('customer.orders');




require __DIR__ . '/auth.php';

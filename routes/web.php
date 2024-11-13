<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StockLevelController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Route for home and dashboard
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route for dash with ProductController
Route::get('/dash', [ProductController::class, 'dash'])->name('dash');

// Middleware group for authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Controller routes for different resources
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


// Define route for editing a product
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Define route for deleting a product
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/stock-levels', [StockLevelController::class, 'index'])->name('stock-levels.index');
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Additional static pages
Route::get('/about', function () {
    return view('about');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/contacts', function () {
    return view('contacts');
});

// Authentication routes
require __DIR__.'/auth.php';



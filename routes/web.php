<?php
 
use Illuminate\Support\Facades\Route; 

Route::get('/', function () {
    return view('welcome');
});

// Define routes for products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
// Add more routes as needed (e.g., create, edit, delete)

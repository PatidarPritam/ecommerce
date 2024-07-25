<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});


// routes/web.php

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/view/{id}',[ProductController::class,'view'])->name('views');

// Route to add a product to the cart
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');

// Route to view the cart
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');

// Route to remove a product from the cart
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Route to clear the entire cart
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
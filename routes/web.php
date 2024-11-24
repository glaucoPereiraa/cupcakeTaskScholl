<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CupcakeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('cupcakes', [CupcakeController::class, 'index'])->name('cupcakes.index');
    Route::get('/cupcakes/{cupcake}', [CupcakeController::class, 'show'])->name('cupcakes.show');

    Route::post('/carrinho/{cupcake}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/carrinho', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/carrinho/{cupcake}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
});

require __DIR__.'/auth.php';

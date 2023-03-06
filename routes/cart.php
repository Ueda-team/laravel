<?php

use App\Http\Controllers\Cart\Cart;
use Illuminate\Support\Facades\Route;

Route::get('/cart', [Cart::class, 'index'])->name('cart');

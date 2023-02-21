<?php

use App\Http\Controllers\Dm\Dm;
use Illuminate\Support\Facades\Route;

Route::get('/dm', [Dm::class, 'index'])->name('dm');

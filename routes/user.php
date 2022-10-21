<?php

use App\Http\Controllers\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/user/{id?}', [UserIndex::class, 'index'])->name('user');

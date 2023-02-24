<?php

use App\Http\Controllers\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/users/{id?}', [UserIndex::class, 'index'])->name('user');

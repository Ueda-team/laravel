<?php

use App\Http\Controllers\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/user/{id?}', [UserIndex::class, 'index'])->name('user');

Route::get('/user/{id?}/works', [UserIndex::class, 'work'])->name('work');

Route::get('/user/work/add', [UserIndex::class, 'work_add'])->name('work_post');

Route::post('/user/work/add', [UserIndex::class, 'work_post']);

Route::get('/user/auction/add', [UserIndex::class, 'auction_add'])->name('acution_post');

Route::post('/user/auction/add', [UserIndex::class, 'auction_post']);

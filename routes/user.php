<?php

use App\Http\Controllers\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/user/{id?}', [UserIndex::class, 'index'])->name('user');

Route::get('/user/{id?}/works', [UserIndex::class, 'work'])->name('work');

Route::get('/user/{id?}/work/post', [UserIndex::class, 'work_post'])->name('work_post');

Route::post('/user/{id?}/work/post', [UserIndex::class, 'work_post_']);

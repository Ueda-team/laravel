<?php

use App\Http\Controllers\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/users/{id?}', [UserIndex::class, 'index'])->name('user');

Route::post('/user/follow', [UserIndex::class, 'follow'])->name('user-follow');
Route::post('/user/unfollow', [UserIndex::class, 'unfollow'])->name('user-unfollow');

Route::get('/user/follow-list', [UserIndex::class, 'followList'])->name('follow-list');

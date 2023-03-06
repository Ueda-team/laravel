<?php

use App\Http\Controllers\news\NewsController;
use App\Http\Controllers\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/news/{id?}', [NewsController::class, 'index'])->name('news');

Route::get('news/list', [NewsController::class, 'newsall']);

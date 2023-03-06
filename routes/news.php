<?php

use App\Http\Controllers\News\NewsIndex;
use Illuminate\Support\Facades\Route;

Route::get('/news/{id?}', [NewsIndex::class, 'index'])->name('news');

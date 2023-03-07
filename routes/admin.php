<?php

use App\Http\Controllers\Admin\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [Admin::class, 'index'])->name('admin');

Route::get('/admin/news', [Admin::class, 'news'])->name('admin_news');
Route::post('/admin/news/post', [Admin::class, 'news_post'])->name('admin_news_post');

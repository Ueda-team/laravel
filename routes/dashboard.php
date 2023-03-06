<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [Dashboard::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/works', [Dashboard::class, 'work'])->name('dashboard-work');

Route::get('/dashboard/work/add', [Dashboard::class, 'work_add'])->name('work_add');

Route::post('/dashboard/work/add', [Dashboard::class, 'work_post']);

Route::get('/dashboard/auction/add', [Dashboard::class, 'auction_add'])->name('auction_add');

Route::post('/dashboard/auction/add', [Dashboard::class, 'auction_post']);

Route::post('/dashboard/tag', [Dashboard::class, 'tag']);

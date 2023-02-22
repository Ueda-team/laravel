<?php

use App\Http\Controllers\Dm\DmIndex;
use Illuminate\Support\Facades\Route;

Route::get('/dm', [DmIndex::class, 'index'])->name('dm');

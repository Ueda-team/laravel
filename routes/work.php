<?php

use App\Http\Controllers\Work\WorkIndex;
use Illuminate\Support\Facades\Route;

Route::get('/work/{id?}', [WorkIndex::class, 'index']);

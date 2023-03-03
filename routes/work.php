<?php

use App\Http\Controllers\work\WorkIndex;
use Illuminate\Support\Facades\Route;

Route::get('/work/{id?}', [WorkIndex::class, 'index']);

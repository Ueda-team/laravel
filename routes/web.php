<?php

use App\Http\Controllers\Home\Home;
use App\Http\Controllers\User\UserIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Home::class, 'index'])->name('home');

Route::get('/user/work-all', [UserIndex::class, 'work_all']);

require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/dm.php';
require __DIR__.'/auction.php';
require __DIR__.'/search.php';
require __DIR__.'/news.php';

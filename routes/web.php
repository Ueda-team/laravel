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
date_default_timezone_set('Asia/Tokyo');
Route::get('/', [Home::class, 'index'])->name('home');

Route::get('/user/work-all', [UserIndex::class, 'work_all']);

require __DIR__.'/company.php';
require __DIR__.'/admin.php';

require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/dm.php';
require __DIR__.'/auction.php';
require __DIR__.'/work.php';
require __DIR__.'/search.php';
require __DIR__.'/setting.php';
require __DIR__.'/cart.php';
require __DIR__.'/news.php';

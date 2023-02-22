<?php

use App\Http\Controllers\Home\Home;
use App\Http\Controllers\User\UserIndex;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('cloudflare_r2_upload', function(){
    $filename = 'logo.png';
    $path = storage_path('app/images/'. $filename);
    $content = file_get_contents($path);
    $result = Storage::disk('r2_avatar')->put($filename, $content); // 👈 ここでアップロード
    dd($result);
});

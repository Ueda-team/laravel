<?php


use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('search/illust', [SearchController::class, 'illust']);

Route::get('search/comic', [SearchController::class, 'comic']);

Route::get('search/design', [SearchController::class, 'design']);

Route::get('search/webcreate', [SearchController::class, 'webcreate']);

Route::get('search/webdesign', [SearchController::class, 'webdesign']);

Route::get('search/movie', [SearchController::class, 'movie']);

Route::get('search/programing', [SearchController::class, 'programing']);

<?php

use App\Http\Controllers\setting\Account;
use App\Http\Controllers\setting\Mail;
use App\Http\Controllers\setting\Notification;
use App\Http\Controllers\setting\Password;
use App\Http\Controllers\setting\Setting;
use Illuminate\Support\Facades\Route;

Route::get('/setting', [Setting::class, 'index'])->name('setting');

Route::get('/setting/account', [Account::class, 'index'])->name('setting-account');
Route::post('/setting/account/avatar-change', [Account::class, 'avatarChange'])->name('setting-account-avatar-change');
Route::post('/setting/account/username-change', [Account::class, 'usernameChange'])->name('setting-account-username-change');
Route::post('/setting/account/userid-change', [Account::class, 'useridChange'])->name('setting-account-id-change');

Route::get('/setting/mail', [Mail::class, 'index'])->name('setting-mail');

Route::get('/setting/password', [Password::class, 'index'])->name('setting-password');

Route::get('/setting/notification', [Notification::class, 'index'])->name('setting-notification');

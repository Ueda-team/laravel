<?php

use App\Http\Controllers\Setting\Account;
use App\Http\Controllers\Setting\Email;
use App\Http\Controllers\Setting\Notification;
use App\Http\Controllers\Setting\Password;
use App\Http\Controllers\Setting\Setting;
use Illuminate\Support\Facades\Route;

Route::get('/setting', [Setting::class, 'index'])->name('setting');

Route::get('/setting/account', [Account::class, 'index'])->name('setting-account');
Route::post('/setting/account/avatar-change', [Account::class, 'avatarChange'])->name('setting-account-avatar-change');
Route::post('/setting/account/username-change', [Account::class, 'usernameChange'])->name('setting-account-username-change');
Route::post('/setting/account/userid-change', [Account::class, 'useridChange'])->name('setting-account-id-change');
Route::post('/setting/account/description-change', [Account::class, 'descriptionChange'])->name('setting-account-description-change');

Route::get('/setting/email', [Email::class, 'index'])->name('setting-email');
Route::post('/setting/email/change', [Email::class, 'emailChange'])->name('setting-email-change');

Route::get('/setting/password', [Password::class, 'index'])->name('setting-password');
Route::post('/setting/password/change', [Password::class, 'passwordChange'])->name('setting-password-change');

Route::get('/setting/notification', [Notification::class, 'index'])->name('setting-notification');

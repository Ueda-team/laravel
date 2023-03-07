<?php

use App\Http\Controllers\Auction\AuctionIndex;
use App\Http\Controllers\Auction\Bid;
use App\Http\Controllers\Auction\ListIndex;
use App\Http\Controllers\Auction\PromptDecision;
use Illuminate\Support\Facades\Route;

Route::get('/auctions', [ListIndex::class, 'index'])->name('auctions');

Route::get('/auction/{id?}', [AuctionIndex::class, 'index']);

Route::post('/auction/bid/', [Bid::class, 'post'])->name('bid');
Route::post('/auction/pd/', [PromptDecision::class, 'post'])->name('pd');

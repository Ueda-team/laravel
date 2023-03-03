<?php

namespace App\Http\Controllers\Auction;

use App\Http\Controllers\Controller;
use App\Models\Auction_buy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Bid extends Controller
{
    public function post(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = request('id');
        $auction_buy = new Auction_buy();
        $auction_buy->create([
            'auction_id' => $id,
            'user_id' => Auth::user()->id,
            'price' => $request['price']
        ]);
        return back()->with('bid', true);
    }
}

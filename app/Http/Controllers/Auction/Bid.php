<?php

namespace App\Http\Controllers\Auction;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Auction_buy;
use App\Models\Claim;
use App\Models\Work;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Bid extends Controller
{
    public function post(Request $request): RedirectResponse
    {
        if(!Auth::check()) return redirect()->route('login');
        $id = request('id');
        $auction = Auction::where('id', $id)->first();
        $work = Work::where('auction_id', $id)->first();
        $auction_buy = new Auction_buy();
        $auction_buy->create([
            'auction_id' => $id,
            'user_id' => Auth::user()->id,
            'price' => $request['price']
        ]);
        if($auction->max_price <= $request['price']){
            $claim = new Claim();
            $claim->create([
                'user_id' => Auth::user()->id,
                'work_id' => $work->id,
                'price' => $auction->max_price,
                'isPaid' => false
            ]);
            $auction->status = false;
            $auction->save();
        }
        return back()->with('bid', true);
    }
}

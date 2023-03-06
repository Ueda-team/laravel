<?php

namespace App\Http\Controllers\Auction;

use App\Http\Controllers\Controller;
use App\Models\Auction_buy;
use App\Models\Claim;
use App\Models\User;
use App\Models\Work;
use App\Models\Auction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PromptDecision extends Controller
{
    public function post(): RedirectResponse
    {
        if(!Auth::check()) return redirect()->route('login');
        $id = request('id');
        $auction = Auction::where('id', $id)->first();
        $work = Work::where('auction_id', $id)->first();
        $auction_buy = new Auction_buy();
        $auction_buy->create([
            'auction_id' => $id,
            'user_id' => Auth::user()->id,
            'price' => $auction->max_price
        ]);
        $claim = new Claim();
        $claim->create([
            'user_id' => Auth::user()->id,
            'work_id' => $work->id,
            'price' => $auction->max_price,
            'isPaid' => false
        ]);
        $auction->status = false;
        $auction->save();
        return back()->with('bid', true);
    }
}

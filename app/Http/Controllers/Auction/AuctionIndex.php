<?php

namespace App\Http\Controllers\Auction;

use App\Http\Controllers\Controller;
use App\Models\Auction_buy;
use App\Models\User;
use App\Models\Work;
use App\Models\Auction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class AuctionIndex extends Controller
{
    public function index($id=""): Factory|View|Application
    {
        $auction = Auction::where('id', $id)->first();
        $work = Work::where('auction_id', $auction->id)->first();
        if($auction && $work){
            $user = User::where('id', $work->user_id)->first();
            $count = Auction_buy::count();
            $bid = (bool)request('bid');
            if($count === 0){
                $price = $auction->start_price;
                $isBid = false;
            }else{
                $price = Auction_buy::max('price');
                $isBid = (bool)Auction_buy::where([
                    ['user_id', '=', $user->id],
                    ['price', '=', $price],
                ])->first();
            }
            return view('auction.index', ['auction' => $auction, 'work' => $work, 'count' => $count, 'price' => $price, 'user' => $user, 'isBid' => $isBid, 'bid' => $bid]);
        }else{
            return view('auction.notFound');
        }
    }
}

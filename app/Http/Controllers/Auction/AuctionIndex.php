<?php

namespace App\Http\Controllers\Auction;

use App\Http\Controllers\Controller;
use App\Models\Auction_buy;
use App\Models\User;
use App\Models\Work;
use App\Models\Auction;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class AuctionIndex extends Controller
{
    public function index($id=""): Factory|View|Application
    {
        $work = Work::where('id', $id)->first();
        if($work){
            $auction = Auction::where('id', $work->auction_id)->first();
            if($auction){
                $user = User::where('id', $work->user_id)->first();
                $count = Auction_buy::where('auction_id', $auction->id)->count();
                $bid = (bool)request('bid');
                $isEnd = new DateTime($auction->end_date) > new DateTime('now');
                if($count === 0){
                    $price = $auction->start_price;
                    $isBid = false;
                }else{
                    $price = Auction_buy::max('price');
                    $isBid = (bool)Auction_buy::where([
                        ['user_id', '=', $user->id],
                        ['auction_id', '=', $auction->id],
                        ['price', '=', $price],
                    ])->first();
                }
                return view('auction.index', ['auction' => $auction, 'work' => $work, 'count' => $count, 'price' => $price, 'user' => $user, 'isBid' => $isBid, 'bid' => $bid, 'isEnd' => $isEnd]);
            }else{
                return view('auction.notFound');
            }
        }else{
            return view('auction.notFound');
        }

    }
}

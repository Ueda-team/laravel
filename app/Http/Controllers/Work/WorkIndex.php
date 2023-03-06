<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use App\Models\Auction_buy;
use App\Models\User;
use App\Models\Work;
use App\Models\Auction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;


class WorkIndex extends Controller
{
    public function index($id=""): View|Factory|Redirector|Application|RedirectResponse
    {
        $work = Work::where('id', $id)->first();
        if($work){
            if($work->auction_id !== 0) return redirect('/auction/' . $id);
            $user = User::where('id', $work->user_id)->first();
            return view('work.index', ['work' => $work, 'user' => $user]);
        }else{
            return view('auction.notFound');
        }
    }
}

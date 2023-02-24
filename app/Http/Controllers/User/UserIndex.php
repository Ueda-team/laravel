<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Lib\R2;
use App\Models\User;
use App\Models\PersonalInformation;
use App\Models\Work;
use App\Models\Auction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserIndex extends Controller
{
    public function index($id=""): Factory|View|Application
    {
        $user = User::where('user_id', $id)->first();
        if($user){
            $card = R2::card_get($user->card);
            $avatar = R2::avatar_get($user->avatar);
            return view('user.user', ['user' => $user, 'card' => $card, 'avatar' => $avatar]);
        }else{
            return view('user.list');
        }
    }
}

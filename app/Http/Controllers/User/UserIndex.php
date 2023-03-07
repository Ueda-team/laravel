<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Lib\R2;
use App\Models\Auction_buy;
use App\Models\Follow;
use App\Models\User;
use App\Models\UserDescription;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserIndex extends Controller
{
    public function index($id=""): Factory|View|Application
    {
        $user = User::where('user_id', $id)->first();
        if($user){
            $article = UserDescription::where('user_id', $user->id)->first();
            $article->description = Markdown::convert($article->description)->getContent();
            $card = empty($user->card) ? '' : R2::card_get($user->card);
            $avatar = R2::avatar_get($user->avatar);
            $follower = Follow::where('follow', $user->id)->count();
            if($user->id === Auth::user()->id){
                $isFollow = -1;
            }else{
                $isFollow = Follow::where([
                    ['follow', '=', $user->id],
                    ['follower', '=', Auth::check() ? Auth::user()->id : null],
                ])->count();
            }
            return view('user.user', ['user' => $user, 'article' => $article, 'follower' => $follower, 'isFollow' => $isFollow, 'card' => $card, 'avatar' => $avatar]);
        }else{
            return view('user.list');
        }
    }

    public function followList()
    {
        if(!Auth::check()) return redirect()->route('login');
        $follow = Follow::where('follower', Auth::user()->id)->get();
        $userList = [];
        foreach ($follow as $user){
            $userList[] = User::where('id', $user->follow)->first();
        }
        return view('user.followList', ['userList' => $userList]);
    }

    public function follow(): RedirectResponse
    {
        if(!Auth::check()) return redirect()->route('login');
        $user_id = request('user_id');
        Follow::updateOrCreate(
            ['follow' => $user_id, 'follower' => Auth::user()->id],
            ['follow' => $user_id, 'follower' => Auth::user()->id]
        );
        return back();
    }

    public function unfollow(): RedirectResponse
    {
        if(!Auth::check()) return redirect()->route('login');
        $user_id = request('user_id');
        Follow::where([
            ['follow', '=', $user_id],
            ['follower', '=', Auth::check() ? Auth::user()->id : null],
        ])->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Lib\R2;
use App\Models\User;
use App\Models\UserDescription;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use GrahamCampbell\Markdown\Facades\Markdown;


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
            return view('user.user', ['user' => $user, 'article' => $article, 'card' => $card, 'avatar' => $avatar]);
        }else{
            return view('user.list');
        }
    }
}

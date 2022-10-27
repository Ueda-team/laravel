<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class UserIndex extends Controller
{
    public function index($id=""): Factory|View|Application
    {
        $user = User::where('user_id', $id)->first();
        if($user){
            return view('user.user', ['user' => $user]);
        }else{
            if(Auth::check()){
                return view('user.user', ['user' => Auth::user()]);
            }
            return view('auth.login');
        }

    }
}

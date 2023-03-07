<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Lib\R2;
use App\Models\UserDescription;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Account extends Controller
{
    public function index(): View|Factory|Application|RedirectResponse
    {
        if(!Auth::check()) return redirect()->route('login');
        $user = Auth::user();
        $userDescription = UserDescription::where('user_id', $user->id)->first();
        return view('setting.account', ['title' => 'プロフィール', 'user' => $user, 'userDescription' => $userDescription]);
    }

    public function avatarChange(Request $request)
    {
        $user = Auth::user();
        do {
            $ran_id = $user->id . Str::random(7);
        } while (R2::avatar_exists($ran_id));
        $avatar = $request->file('file');
        $path = isset($avatar) && R2::avatar_put($avatar, $ran_id);
        if($path){
            $user->avatar = $ran_id;
            $user->save();
            return back()->with('change', true);
        }else{
            return back()->with('change', false);
        }
    }

    public function usernameChange(Request $request)
    {
        $user = Auth::user();
        $user->user_name = $request['username'];
        $user->save();
        return back()->with('change', true);
    }

    public function useridChange(Request $request)
    {
        $user = Auth::user();
        $user->user_id = $request['userid'];
        $user->save();
        return back()->with('change', true);
    }

    public function descriptionChange(Request $request)
    {
        $userDescription = UserDescription::where('user_id', Auth::user()->id)->first();
        $userDescription->description = $request['description'];
        $userDescription->save();
        return back()->with('change', true);
    }
}

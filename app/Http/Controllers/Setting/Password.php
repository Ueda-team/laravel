<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Password extends Controller
{
    public function index(): Factory|View|Application
    {
        $user = Auth::user();
        return view('setting.password', ['title' => 'パスワード', 'user' => $user]);
    }

    public function passwordChange(Request $request): RedirectResponse
    {
        $user = Auth::user();
        if(Hash::check($request['now_password'], $user->password) && $request['new_password'] == $request['new2_password']){
            $user->password = Hash::make($request['new_password']);
            $user->save();
            return back()->with('change', true);
        }else{
            return back()->with('change', false);
        }
    }
}

<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Email extends Controller
{
    public function index(): Factory|View|Application
    {
        $user = Auth::user();
        return view('setting.email', ['title' => 'メールアドレス', 'user' => $user]);
    }

    public function emailChange(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $user->email = $request['email'];
        $user->save();
        return back()->with('change', true);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\News;
use App\Models\PersonalInformation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{
    public function index(): View|Factory|Application|RedirectResponse
    {
        if(!Auth::check()) return redirect()->route('login');
        if(!PersonalInformation::where('user_id', Auth::user()->id)->first()->admin) return redirect()->route('home');

        return view('admin.index', []);
    }

    public function news(): View|Factory|Application|RedirectResponse
    {
        return view('admin.news', []);
    }

    public function news_post(Request $request): View|Factory|Application|RedirectResponse
    {
        $news = new News();
        $news->create([
            'title' => $request['title'],
            'detail' => $request['detail']
        ]);
        return back()->with('change', true);
    }
}

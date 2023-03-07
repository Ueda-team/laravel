<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class NewsIndex extends Controller
{
    public function index($id=""): View|Factory|Application|RedirectResponse
    {
        $news = News::where('id', $id)->first();
        if($news){
            return view('news.index', ['news' => $news]);
        }else{
            $news = News::all();
            return view('news.list', ['news' => $news]);
        }
    }
}

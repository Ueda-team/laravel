<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\PersonalInformation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    public function index($id=""): Factory|View|Application
    {
        $news = News::Where('id', $id)->first();
        if($news){
            return view('news.index', ['news' => $news]);
        }else{
            return view('news.list', ['news' => News::all()]);
        }
    }

    public function newsall(): Factory|View|Application
    {
        $newsall = DB::table('news')->get();
        return view('news.list', ['news' => $newsall]);
    }
}



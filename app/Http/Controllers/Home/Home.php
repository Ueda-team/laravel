<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Work;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function index(): Factory|View|Application
    {
        $categories = Category::all();
        $lists = [];
        foreach ($categories as $category){
            $lists[] = Work::where([
                ['category_id', '=', $category->id],
                ['auction_id', '=', 0],
            ])->orderBy('preview', 'desc')->take(4)->get();
        }
        return view('welcome', ['categories' => $categories, 'lists' => $lists]);
    }
}

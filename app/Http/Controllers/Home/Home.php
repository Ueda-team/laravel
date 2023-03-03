<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Work;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class Home extends Controller
{
    public function index(): Factory|View|Application
    {
        $categories = Category::all();
        $lists = [];
        foreach ($categories as $category){
            $lists[] = Work::where('category_id', $category->id)->orderBy('preview', 'desc')->take(10)->get();
        }
        return view('welcome', ['categories' => $categories, 'lists' => $lists]);
    }
}

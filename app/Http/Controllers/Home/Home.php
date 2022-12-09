<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class Home extends Controller
{
    public function index(): Factory|View|Application
    {
        $categories = Category::all();
        return view('welcome', ['categories' => $categories]);
    }
}



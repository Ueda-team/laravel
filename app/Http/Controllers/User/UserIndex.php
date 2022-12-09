<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Work;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
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

    public function work($id=""): Factory|View|Application
    {
        $works = Work::where('user_id', Auth::user()->id)->get();
        return view('user.work', ['works' => $works]);
    }

    public function work_post(): Factory|View|Application
    {
        $categories = Category::all();
        $sort = [];
        $sort[] = '選択してください';
        foreach ($categories as $category){
            $sort[] = $category->name;
        }
        return view('user.work-post', ['categories' => $sort]);
    }

    public function work_post_(Request $request): Application|Factory|View
    {
        $title = $request['title'];
        $outline = $request['outline'];
        $price = $request['price'];
        $tag = $request['tag'];
        $file = $request['file'];
        $category = $request['category'];
        $work = new Work();
        $model = $work->create([
            'title' => $title,
            'outline' => $outline,
            'price' => $price,
            'tag' => $tag,
            'file' => $file,
            'category_id' => $category,
            'preview' => 0,
            'url' => '',
            'user_id' => Auth::user()->id,
            'auction_id' => 0,
            'buy_id' => 0
        ]);
        return view('user.work-ok', ['work' => $model]);
    }

    public function work_all(): Factory|View|Application
    {
        $works = Work::get();
        return view('user.work-all', ['works' => $works]);
    }
}

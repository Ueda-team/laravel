<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
        return view('user.work');
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

    public function work_post_(Request $request): RedirectResponse
    {
        var_dump($request['title']);
        exit();
    }
}

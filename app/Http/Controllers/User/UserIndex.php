<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserIndex extends Controller
{
    public function index($id): Factory|View|Application
    {
        $user = User::where('user_id', $id)->first();
        return view('user.user', ['user' => $user]);
    }
}

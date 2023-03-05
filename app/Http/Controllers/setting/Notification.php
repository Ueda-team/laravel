<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class Notification extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('setting.index');
    }
}

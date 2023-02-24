<?php

namespace App\Http\Controllers\Dm;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Dm extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    Public function index(): Factory|View|Application
    {
        return view('dm.index', ['user' => Auth::user()]);
    }
}

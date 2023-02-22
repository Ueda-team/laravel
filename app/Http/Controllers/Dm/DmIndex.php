<?php

namespace App\Http\Controllers\Dm;

use App\Models\Dm;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class DmIndex extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    Public function index(): Factory|View|Application
    {
        $dm = Dm::where('user_id', Auth::user()->id)->get();
        return view('dm.index', ['user' => Auth::user(), 'dm' => $dm]);
    }
}

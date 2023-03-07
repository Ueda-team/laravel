<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class Cart extends Controller
{
    public function index(): View|Factory|Application|RedirectResponse
    {
        if(!Auth::check()) return redirect()->route('login');
        $user = Auth::user();
        $cart = Claim::where([
            ['user_id', '=', $user->id],
            ['isPaid', '=', false],
        ])->get();
        return view('cart.index', ['user' => $user, 'cart' => $cart]);
    }
}

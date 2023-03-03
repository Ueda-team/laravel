<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function illust()
    {
        return view('search.illust');
    }

    public function comic()
    {
        return view('search.comic');
    }

    public  function  design()
    {
        return view('search.design');
    }

    public function  webcreate()
    {
        return view('search.webcreate');
    }

    public function  webdesign()
    {
        return view('search.webdesign');
    }

    public function  movie()
    {
        return view('search.movie');
    }

    public function  programing()
    {
        return view('search/programing');
    }
}

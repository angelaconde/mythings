<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LandingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) {
            return view('collection');
        } else {
            return view('info');
        }
    }
}

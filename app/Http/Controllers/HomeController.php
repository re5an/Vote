<?php

namespace App\Http\Controllers;

use App\Pole;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$poles = Pole::all();
//    	dd($poles);
        return view('home', ['poles' => $poles]);
//        return view('home',$poles);
    }
}

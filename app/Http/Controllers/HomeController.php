<?php

namespace App\Http\Controllers;

use App\Poll;
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
    	$polls = Poll::all();
//    	dd($polls);
        return view('home', ['polls' => $polls]);
//        return view('home',$polls);
    }
}

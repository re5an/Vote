<?php

namespace App\Http\Controllers;

use App\Pole;
use App\User;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    //
	public function index(User $user, Pole $pole) {
		$questions = $pole->questions();
		dd($questions);
		return view('vote')->with('questions');
	}
}

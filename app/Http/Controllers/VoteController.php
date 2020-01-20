<?php

namespace App\Http\Controllers;

use App\Pole;
use App\User;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    //
	public function index(User $user, Pole $pole) {
//		$questions = \App\Pole::with('questions')->get();
		$questions = $pole->questions()->get();
//		$questions = $pole->load('questions');
//		dd($questions);
		return view('vote', ['questions' => $questions, 'pole' => $pole]);
//		return view('vote')->with('questions' , $questions, 'pole' , $pole);
	}

	public function submitVote(Request $request) {
		dd($request);
	}
}

<?php

namespace App\Http\Controllers;

use App\Poll;
use App\User;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    //
	public function index(User $user, poll $poll) {
//		$questions = \App\Poll::with('questions')->get();
		$questions = $poll->questions()->get();
//		$questions = $poll->load('questions');
//		dd($questions);
		return view('vote', ['questions' => $questions, 'poll' => $poll]);
//		return view('vote')->with('questions' , $questions, 'poll' , $poll);
	}

	public function submitVote(Request $request) {
		dd($request);
		$poll = new Poll();
	}
}

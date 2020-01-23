<?php

namespace App\Http\Controllers;

use App\Poll;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
		$inputs = $request->input();
//		$inputs->shift();
		$questions_id = array_keys($inputs);
		$answers = [];
//		array_shift($inputs);
//		array_shift($questions_id);

//		$inputs = array_slice($inputs,1);

//		$questionCount = count($inputs);

//		dd($inputs);
//		for ($i=1; $i < $questionCount; $i++)
//		{
//			$answers[] = $inputs[$i];
//		}

		foreach ($inputs as $question=>$answer)
		{
			if ($question != '_token'){

				$answers[$question] = $this->intAnswer($answer);
			}
		}

//		dd($answers);
		$user_id = \Auth::id();
		foreach ($answers as $question=>$answer){
			DB::table('user_questions')->insert(
				['user_id' => ($user_id), 'question_id' => $question, 'answer'=>$answer]
			);
			echo $question.'=>'.$answer;
			echo "<br><hr>";
//			dd($vote[0]);
//			$user->questions()->attach([$request['id'] => [$question_id => $request['answer']]]);
		}

	}

	public function intAnswer($ans) {
		switch ($ans){
			case 'agree':
				$intAns = 2;
				break;
			case 'notAgree':
				$intAns = 0;
				break;
			default:
				$intAns = 1;
		}
		return $intAns;
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pole extends Model
{
    //
	public function questions(  ) {
		return $this->hasMany('App\Question');
//		return $this->hasMany('Question::class');
	}
}

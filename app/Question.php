<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function users()
    {
    	return $this->belongsToMany(User::class , 'user_questions')->withPivot('answer');
    }

	public function poll(  ) {
		return $this->belongsTo('Poll::class');
    }
}

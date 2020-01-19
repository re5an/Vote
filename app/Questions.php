<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    public function users()
    {
    	return $this->belongsToMany(User::class , 'user_questions')->withPivot('answer');
    }

	public function pole(  ) {
		return $this->belongsTo('Pole::class');
    }
}

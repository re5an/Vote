<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use 'App/Questions1';

class Pole extends Model
{
    //
	public function questions(  ) {
		return $this->hasMany('App/Questions');
//		return $this->hasMany('Questions::class');
	}
}

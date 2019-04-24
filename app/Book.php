<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{


	public function categorie()
	{
		return $this->belongsToMany('App\Category');
	} 

}

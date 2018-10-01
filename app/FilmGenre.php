<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
	protected $table = 'film_genre';

	public function genre() {
		return $this->belongsTo('App\Genre');
	}

	public function film() {
		return $this->belongsTo('App\Film');
	}
}

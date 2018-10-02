<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
	protected $fillable = ['name', 'description', 'release_date', 'rating', 'country', 'photo', 'ticket_price'];

    public function genres()
	{
		return $this->belongsToMany('App\Genre', 'film_genre', 'film_id', 'genre_id');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public static function boot()
	{
		parent::boot();

		static::creating(function ($model) {
			$model->slug = str_slug($model->name);
		});
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}
}

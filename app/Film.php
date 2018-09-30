<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function genres()
	{
		return $this->belongsToMany(Genre::class);
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

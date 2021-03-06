<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	//
	protected $fillable = ['id', 'name', 'slug', 'created_at', 'updated_at'];

    /**
     * Генерация слага
     *
     */	
	public static function boot()
	{
		parent::boot();

		static::saving(function($genre) {
			$genre->slug = str_slug($genre->name);

			return true;
		});
	}

    /**
     * Отношение к книгам
     *
     */	
	public function books()
	{
		return $this->belongsToMany('App\Book');
	}
}

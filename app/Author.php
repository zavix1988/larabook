<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $fillable = ['name', 'birthyear', 'slug', 'created_at', 'updated_at'];
    

    /**
     * Генерация слага
     *
     */
	public static function boot()
	{
	    parent::boot();

	    static::saving(function($author) {
	        $author->slug = str_slug($author->name.'-'.$author->birthyear);

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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $fillable = ['name', 'birthyear', 'slug', 'created_at', 'updated_at'];
    //

	public static function boot()
	{
	    parent::boot();

	    static::saving(function($author) {
	        $author->slug = str_slug($author->name.'-'.rand(1900, 2018));

	        return true;
	    });
	}

    public function books()
    {
    	return $this->belongsToMany('App\Book');
    }
}

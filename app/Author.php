<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $fillable = ['name', 'slug', 'alive', 'created_at', 'updated_at'];
    //

	public static function boot()
	{
	    parent::boot();

	    static::saving(function($author) {
	        $author->slug = str_slug($author->name);

	        return true;
	    });
	}
    
    public function books()
    {
    	return $this->belongsToMany('App\Book');
    }
}

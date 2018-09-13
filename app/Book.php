<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = ['name', 'price', 'pages', 'pubyear', 'description', 'slug', 'lang', 'created_at', 'updated_at'];
    //

    public static function boot()
    {
        parent::boot();

        static::saving(function($book) {
            $book->slug = str_slug($book->name.'-'.rand(1900, 2018));
            return true;
        });
    }
    public function authors()
    {
    	return $this->belongsToMany('App\Author');
    }

    public function genres()
    {
    	return $this->belongsToMany('App\Genre');
    }
}

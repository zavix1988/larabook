<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = ['name', 'price', 'pages', 'slug', 'lang', 'created_at', 'updated_at'];
    //
    public function authors()
    {
    	return $this->belongsToMany('App\Author');
    }

    public function genres()
    {
    	return $this->belongsToMany('App\Genre');
    }
}

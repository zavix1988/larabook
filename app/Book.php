<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = ['name', 'price', 'pages', 'pubyear', 'description', 'slug', 'lang', 'created_at', 'updated_at'];
    
    /**
     * Генерация слага
     *
     */ 
    public static function boot()
    {
        parent::boot();

        static::saving(function($book) {
            $book->slug = str_slug($book->name.'-'.$book->pubyear);
            return true;
        });
    }

    /**
     * Отношение к авторам и жанрам
     *
     */ 
    public function authors()
    {
    	return $this->belongsToMany('App\Author');
    }

    public function genres()
    {
    	return $this->belongsToMany('App\Genre');
    }
}

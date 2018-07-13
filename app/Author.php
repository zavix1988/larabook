<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $fillable = ['name', 'slug', 'alive', 'created_at', 'updated_at'];
    //
    public function books()
    {
    	return $this->belongsToMany('App\Book');
    }
}

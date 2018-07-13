<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $fillable = ['id', 'name', 'slug', 'created_at', 'updated_at'];
    
    public function books()
    {
		return $this->belongsToMany('App\Book');
    }
}

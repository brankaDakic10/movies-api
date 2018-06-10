<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // public $timestamps = false;    // 

    protected $fillable = [
        'title', 'director', 'imageUrl',
         'duration', 'releaseDate', 'genre'
    ];
    public static function search($term)
    {
        return self::where('name', 'LIKE', '%'.$term.'%')->get();
        
    }
    

}

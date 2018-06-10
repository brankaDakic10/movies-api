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

    public static function search($term, $skip, $take)
    {
        return self::where('title', 'LIKE', '%'.$term.'%')
        ->skip($skip)->take($take)->get();
    }


}

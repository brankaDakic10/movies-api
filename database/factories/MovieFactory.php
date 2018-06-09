<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    
        // collection so we can use random method
    // $values = collect([
    //     'Action',
    //     'Comedy',
    //     'Drama',
    //     'Horror',
    //     'Western',
    //     'Thriller',
    //     'Animation',
    //     'Documentary'
    // ]);

    return [
        'title' => $faker->text(30),
        'director' => $faker->name,
        'imageUrl' => $faker->imageUrl(),
        'duration' => $faker->numberBetween(60, 200),
        'releaseDate' => $faker->date(),
        'genre'=>$faker->text(10)

        // 'genres' => $values->random(3)
    ];


});

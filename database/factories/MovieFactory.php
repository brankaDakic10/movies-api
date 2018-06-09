<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    
        // collection so we can use random method
    $values = collect([
        'Action',
        'Comedy',
        'Drama',
        'Horror',
        'Western',
        'Thriller',
        'Animation',
        'Documentary'
    ]);

    return [
        'title' => $faker->text(30),
        'director' => $faker->name,
        'image_url' => $faker->imageUrl(),
        'duration' => $faker->numberBetween(60, 200),
        'release_date' => $faker->date(),
        'genres' => $values->random(3)
    ];


});

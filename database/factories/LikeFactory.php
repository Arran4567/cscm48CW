<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        //
         'likes' => $faker->numberBetween($min = 0, $max = 100),
         'dislikes' => $faker->numberBetween($min = 0, $max = 100),
         'user_id' => App\User::inRandomOrder()->first()->id,
         'post_id' => App\Post::inRandomOrder()->first()->id,
    ];
});

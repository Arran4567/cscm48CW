<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'body' => $faker->realText(50),
        'likes' => $faker->numberBetween($min = 0, $max = 100),
        'dislikes' => $faker->numberBetween($min = 0, $max = 100),
        'post_id' => App\Post::inRandomOrder()->first()->id,
    ];
});

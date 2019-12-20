<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $id = App\User::inRandomOrder()->first()->id;
    return [
        //
        'body' => $faker->realText(50),
        'user_id' => $id,
        'user_name' => App\User::findOrFail($id)->name,
        'post_id' => App\Post::inRandomOrder()->first()->id,
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        /**
         * Blog only needs a title.
         * So this will generate a random string of maximum length 20 to act as a title.
         */

         'title' => $faker->realText(20),
    ];
});

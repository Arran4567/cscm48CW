<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        /**
         * Posts will contain a title, body and the ability to have an image.
         * The title will be a random string of maximum length 20.
         * The body is a random string of max length 200.
         * The image will be a random url for an image from faker.
         * 
         * The blog_id is a random id from the blogs table.
         */

         'title' => $faker->realText(20),
         'body' => $faker->realText(200),
         'img_url' => $faker->imageURL($width = 640, $height = 480),
         'user_id' => App\User::inRandomOrder()->first()->id,
         'blog_id' => App\Blog::inRandomOrder()->first()->id,
    ];
});

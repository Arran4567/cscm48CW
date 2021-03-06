<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * This will use the factory to create 100 random posts.
         */

        factory(App\Post::class, 40)->create();
    }
}

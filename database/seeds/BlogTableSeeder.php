<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * This will use the factory to create 10 random blogs.
         */

         factory(App\Blog::class, 10)->create();
    }
}

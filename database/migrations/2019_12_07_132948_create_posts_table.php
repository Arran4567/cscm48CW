<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            /**
             * The posts table will be able to Store:
             * An id, which is gotten by increment.
             * A title.
             * An image URL.
             * A body of text.
             */
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('img_url');
            $table->string('body');
            $table->timestamps();

            /**
             * The table will also store a "blog_id" which is used to form a
             * relationship with the blog table.
             */

            $table->bigInteger('blog_id')->unsigned();
            $table->foreign('blog_id')->references('id')->on('blogs')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * Get the posts on the blog.
     */

     public function posts(){
         return $this->hasMany('App\Post');
     }
}

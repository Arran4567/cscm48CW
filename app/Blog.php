<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * Get the posts on the blog.
     */

    public function user(){
        return $this->belongsTo('App\User');
    }

     public function posts(){
         return $this->hasMany('App\Post');
     }
}

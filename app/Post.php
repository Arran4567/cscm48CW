<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Get the blog this post belongs to.
     */

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function blog(){
        return $this->belongsTo('App\Blog');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
}

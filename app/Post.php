<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Get the blog this post belongs to.
     */

    public function blog(){
        return $this->belongsTo('App\Blog');
    }
}

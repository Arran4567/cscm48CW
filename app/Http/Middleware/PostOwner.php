<?php

namespace App\Http\Middleware;

use Closure;
use App\Post;

class PostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $post = Post::findOrFail($request->route('id'));
        if( $request->user()->id == $post->user_id ){
            return $next($request);
        }else{
            return response("This is not your post. You cannot edit or delete any content here.");
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Blog;

class BlogOwner
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
        $blog = Blog::findOrFail($request->route('id'));
        if( $request->user()->id == $blog->user_id ){
            return $next($request);
        }else{
            return response("This is not your blog. You cannot post or edit any content here.");
        }
    }
}

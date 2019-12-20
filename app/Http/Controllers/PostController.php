<?php

namespace App\Http\Controllers;

use App\Post;
use App\Blog;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $blog = Blog::findOrFail($id);
        return view('posts.create', ['blog' => $blog]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:70',
            'img_url' => 'Nullable|url',
            'body' => 'required|max:300',
            'blog_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->img_url = $validatedData['img_url'];
        $post->body = $validatedData['body'];
        $post->blog_id = $validatedData['blog_id'];
        $post->user_id = $validatedData['user_id'];
        
        $post->save();

        session()->flash('message', 'Post Created Successfully!');
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:70',
            'img_url' => 'Nullable|url',
            'body' => 'required|max:300',
            'blog_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->img_url = $validatedData['img_url'];
        $post->body = $validatedData['body'];
        $post->blog_id = $validatedData['blog_id'];
        $post->user_id = $validatedData['user_id'];
        
        $post->save();

        session()->flash('message', 'Post Created Successfully!');
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('blogs.show', ['id' => $post->blog_id])->with('message', 'Post was deleted.');
    }
}

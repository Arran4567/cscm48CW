<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $data = Blog::paginate(5);
        return view('blogs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogs.create');
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
            'description' => 'required|max:100',
            'user_id' => 'required|integer',
        ]);

        $blog = new Blog;
        $blog->title = $validatedData['title'];
        $blog->description = $validatedData['description'];
        $blog->user_id = $validatedData['user_id'];
        
        $blog->save();

        session()->flash('message', 'Blog Created Successfully!');
        return view('blogs.show', ['blog' => $blog]);
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
        $blog = Blog::findOrFail($id);
        return view('blogs.show', ['blog' => $blog]);
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
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', ['blog' => $blog]);
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
            'description' => 'required|max:100',
            'user_id' => 'required|integer',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $validatedData['title'];
        $blog->description = $validatedData['description'];
        $blog->user_id = $validatedData['user_id'];
        
        $blog->save();

        session()->flash('message', 'Blog Updated Successfully!');
        return view('blogs.show', ['blog' => $blog]);
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
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('message', 'Blog was deleted.');
    }
}

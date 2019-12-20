@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <p>This page contains all posts:</p>
    <ul>
        @foreach ($posts as $post)
            <li>
                {{ $post->title }}
                <button class="btn btn-danger" onclick="window.location.replace('{{  route('posts.edit', ['id' => $post->id]) }}')">Edit</button>
                <form method="POST" action="{{route('posts.destroy', ['id' =>  $post->id])}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
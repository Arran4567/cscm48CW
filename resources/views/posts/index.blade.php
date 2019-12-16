@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <p>This page contains all posts:</p>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
@endsection
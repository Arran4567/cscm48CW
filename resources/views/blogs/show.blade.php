@extends('layouts.app')

@section('title', 'Blog details')

@section('content')
    <p>These are {{$blog->title}}'s details:</p>
    <ul>
        <li>ID: {{$blog->id}}</li>
        <li>Title: {{$blog->title}}</li>
        <ul>
        @foreach ($blog->posts as $post)
            <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{$post->title}}</a></li>
        @endforeach
        </ul>
    </ul>
    <a href="{{  route('posts.create', ['id' => $blog->id]) }}">Create Post</a>
@endsection

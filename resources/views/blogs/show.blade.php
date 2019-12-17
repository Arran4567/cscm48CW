@extends('layouts.app')

@section('title', 'Blog details')

@section('content')
    <p>These are {{$blog->title}}'s details:</p>
    <ul>
        <li>Title: {{$blog->title}}</li>
        <li>Description: {{$blog->description}}</li>
        <li>Author: {{ $blog->user->name }}</li>
        <ul>
        @foreach ($blog->posts as $post)
            <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{$post->title}}</a></li>
        @endforeach
        </ul>
    </ul>
    <input class="button" type="button" onclick="window.location.replace('{{  route('posts.create', ['id' => $blog->id]) }}')" value="Create Post" />
@endsection

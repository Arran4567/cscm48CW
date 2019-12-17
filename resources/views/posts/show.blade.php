@extends('layouts.app')

@section('title', 'Post details')

@section('content')
    <p>These are {{$post->title}}'s details:</p>
    <ul>
        <li>ID: {{$post->id}}</li>
        <li>Title: {{$post->title}}</li>
        <li>Body: {{$post->body}}</li>
        @if(!empty($post->img_url))
            <li>Image: <img src='{{$post->img_url}}' width='320' height='240' alt='Image for post: {{$post->title}}'></li>
        @endif
    </ul>
@endsection

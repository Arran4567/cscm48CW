@extends('layouts.app')

@section('title', 'Post details')

@section('content')
    <p>These are {{$post->title}}'s details:</p>
    <ul>
        <li>ID: {{$post->id}}</li>
        <li>Title: {{$post->title}}</li>
        <li>Body: {{$post->body}}</li>
    </ul>
@endsection

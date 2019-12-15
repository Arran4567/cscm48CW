@extends('layouts.app')

@section('title', 'Blog details')

@section('content')
    <p>These are {{$blog->title}}'s details:</p>
    <ul>
        <li>ID: {{$blog->id}}</li>
        <li>Title: {{$blog->title}}</li>
    </ul>
@endsection

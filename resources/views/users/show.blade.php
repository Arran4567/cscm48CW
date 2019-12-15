@extends('layouts.app')

@section('title', 'User details')

@section('content')
    <p>These are {{$user->name}}'s details:</p>
    <ul>
        <li>ID: {{$user->id}}</li>
        <li>Name: {{$user->name}}</li>
        <li>Email: {{$user->email}}</li>
        <li>Blogs: </li>
        <ul>
        @foreach ($user->blogs as $blog)
            <li><a href="{{ route('blogs.show', ['id' => $blog->id]) }}">{{$blog->title}}</a></li>
        @endforeach
        </ul>
    </ul>
@endsection

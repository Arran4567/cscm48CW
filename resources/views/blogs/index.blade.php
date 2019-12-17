@extends('layouts.app')

@section('title', 'All Blogs')

@section('content')
    <p>This page contains all blogs:</p>
    <ul>
        @foreach ($blogs as $blog)
            <li><a href="{{ route('blogs.show', ['id' => $blog->id]) }}">{{$blog->title}}</a></li>
        @endforeach
    </ul>
    <input class="button" type="button" onclick="window.location.replace('{{  route('blogs.create') }}')" value="Create Blog" />
@endsection

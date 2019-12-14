@extends('layouts.app')

@section('title', 'All Blogs')

@section('content')
    <p>This page contains all blogs:</p>
    <ul>
        @foreach ($blogs as $blog)
            <li>{{ $blog->title }}</li>
        @endforeach
    </ul>
@endsection

@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>
    <p>Body: <input type="text" name="body" value="{{ old('body') }}"></p>
    <p>Image URL: <input type="text" name="img_url" value="{{ old('img_url') }}"></p>
    <input type="hidden" value="{{ $blog->id }}" name="blog_id">
    <input type="hidden" value="{{ $blog->user_id }}" name="user_id">
    <input type="submit" value="Submit">
    <input class="button" type="button" onclick="window.location.replace('{{ route('blogs.show', ['id' => $blog->id]) }}')" value="Cancel" />
</form>
@endsection

@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}">
    @csrf
    @method('PUT')
    <p>Title: <input type="text" name="title" value="{{ $post->title }}"></p>
    <p>Body: <input type="text" name="description" value="{{ $post->body }}"></p>
    <p>Image URL: <input type="text" name="img_url" value="{{ $post->img_url }}"></p>
    <input type="hidden" value="{{ $post->blog->id }}" name="blog_id">
    <input type="hidden" value="{{ $post->blog->user_id }}" name="user_id">
    <input type="submit" value="Submit">
    <input class="button" type="button" onclick="window.location.replace('{{ route('posts.index') }}')" value="Cancel" />
</form>
@endsection

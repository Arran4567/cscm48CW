@extends('layouts.app')

@section('title', 'Edit Blog')

@section('content')
<form method="POST" action="{{ route('blogs.update', ['id' => $blog->id]) }}">
    @csrf
    @method('PUT')
    <p>Title: <input type="text" name="title" value="{{ $blog->title }}"></p>
    <p>Description: <input type="text" name="description" value="{{ $blog->description }}"></p>
    <input type="hidden" value="{{Auth::id()}}" name="user_id">
    <input type="submit" value="Submit">
    <input class="button" type="button" onclick="window.location.replace('{{ route('blogs.index') }}')" value="Cancel" />
</form>
@endsection

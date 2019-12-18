@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<form method="POST" action="{{ route('blogs.store') }}">
    @csrf
    <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>
    <p>Description: <input type="text" name="description" value="{{ old('description') }}"></p>
<input type="hidden" value="{{Auth::id()}}" name="user_id">
    <input type="submit" value="Submit">
    <input class="button" type="button" onclick="window.location.replace('{{ route('blogs.index') }}')" value="Cancel" />
</form>
@endsection

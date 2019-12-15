@extends('layouts.app')

@section('title', 'All Users')

@section('content')
    <p>This page contains all users:</p>
    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route('users.show', ['id' => $user->id]) }}">{{$user->name}}</a></li>
        @endforeach
    </ul>
<a href="{{ route('users.create')}}">Create User</a>
@endsection

@extends('layouts.app')

@section('title', 'All Users')

@section('content')
    <p>This page contains all users:</p>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
@endsection

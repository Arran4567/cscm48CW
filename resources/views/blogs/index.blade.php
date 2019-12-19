@extends('layouts.app')

@section('title', 'All Blogs')

@section('content')
    <p>This page contains all blogs:</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Blog Title</th>
                <th width="300px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data) && $data->count())
                @foreach($data as $blog)
                    <tr>
                        <td>
                            <a href="{{ route('blogs.show', ['id' => $blog ->id]) }}"><h3>{{ $blog->title }}</h3></a>
                            <p>{{$blog->description}} By: {{$blog->user->name}}</p>
                        </td>
                            @if($blog->user_id == Auth::id())
                                <td>
                                    <button class="btn btn-danger" onclick="window.location.replace('{{  route('blogs.edit', ['id' => $blog->id]) }}')">Edit</button>
                                    <form method="POST" action="{{route('blogs.destroy', ['id' =>  $blog->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                <button class="btn btn-danger" disabled>Edit</button>
                                <button class="btn btn-danger" disabled>Delete</button>
                                </td>
                            @endif
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>
   
    {!! $data->links() !!}
    <input class="button" type="button" onclick="window.location.replace('{{  route('blogs.create') }}')" value="Create Blog" />
@endsection

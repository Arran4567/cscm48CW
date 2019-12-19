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
                @foreach($data as $value)
                    <tr>
                        <td><a href="{{ route('blogs.show', ['id' => $value ->id]) }}">{{ $value->title }}</a></td>
                            @if($value->user_id == Auth::id())
                                <td>
                                    <table>
                                        <tr>
                                            <form method="POST" action="{{route('blogs.destroy', ['id' =>  $value->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </tr>
                                        <tr>
                                            <form method="POST" action="{{route('blogs.edit', ['id' =>  $value->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Edit</button>
                                            </form>
                                        </tr>
                                    </table>
                                    
                                </td>
                            @else
                                <td>
                                <button class="btn btn-danger" disabled>Delete</button>
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

@extends('layouts.app')

@section('title', 'Post details')

@section('content')
    <p>These are {{$post->title}}'s details:</p>
    <ul>
        <li>ID: {{$post->id}}</li>
        <li>Title: {{$post->title}}</li>
        <li>Body: {{$post->body}}</li>
        @if(!empty($post->img_url))
            <li>Image: <img src='{{$post->img_url}}' width='320' height='240' alt='Image for post: {{$post->title}}'></li>
        @endif
    </ul>
@endsection

@section('comments')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <h2>Comments</h2>

    <div id="root">
        <ul>
            <li v-for="comment in comments">@{{ comment.body }}</li>
        </ul>
    </div>
    <script>
        var app = new Vue({
            el: "#root",
            data: {
                comments: [],
            },
            mounted() {
                axios.get("{{route('api.comments.index')}}")
                .then(response => {
                    //handle success
                    console.log(response)
                    this.comments = response.data;
                })
                .catch(response => {
                    //handle errors
                    console.log(response);
                })
            }
        });
    </script>
@endsection


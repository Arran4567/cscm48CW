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
            <li v-for="comment in comments">
                <a>@{{ comment.body }}</a>
                <br/>
                Posted By: @{{comment.user_id}}
            </li>
        </ul>
        <br/>
        <h3>New comment</h3>
        <input type="text" id="input" v-model="newCommentBody">
        <button @click="createComment">Post</button>
    </div>
    <script>
        var app = new Vue({
            el: "#root",
            data: {
                comments: [],
                newCommentBody: '',
            },
            mounted() {
                axios.get("{{route('api.comments.show', ['id' => $post->id])}}")
                .then(response => {
                    //handle success
                    this.comments = response.data;
                })
                .catch(response => {
                    //handle errors
                    console.log(response);
                })
            },
            methods: {
                createComment: function(){
                    axios.post("{{route('api.comments.store')}}", {
                        body: this.newCommentBody,
                        post_id: {{$post->id}},
                        user_id: {{Auth::id()}},
                    })
                    .then(response => {
                        //handle success
                        console.log(response.data)
                        this.comments.push(response.data);
                        this.newCommentBody = '';
                    })
                    .catch(response => {
                        //handles errors
                        console.log(response);
                    })
                },
            }
        })
    </script>
@endsection


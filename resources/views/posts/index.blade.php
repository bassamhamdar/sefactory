@extends('main')
@section('title', '| All Posts')
@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong>{{Session::get('success')}}
    </div>
@endif
<div class="container">
  <div class="row">
  <div class="col-md-12">
  <div class="jumbotron">
  <h1 class="text-center">Welcome to blog !</h1>
  </div>
  </div>
  </div>

<div class="row">
    <div class="col-md-10">
        <h1>All Posts</h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('posts.create')}}" class="btn btn-lg btn-block btn-primary" style="margin-top:18px">Create New Post</a>
    </div>
    <hr>
</div>

<!-- <div class="row">
    <div class="col-md-16">
        <table class="table">
            <thead>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>

            </thead>

            <tbody>
            
            @foreach($posts as $post)
                <tr>
                <th>{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{substr($post->body, 0, 10)}}{{strlen($post->body) > 10 ? "...": ""}}</td>
                <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-default">View</a> <a href="{{route('posts.edit', $post->id)}}" class="btn btn-default">Edit</a></td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
        <div class="text-center">
        {!! $posts->links(); !!}

        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-md-12">
        <div class="post">
            @foreach($posts as $post)
            <h3>{{$post->title}}</h3>
            <p>{{substr($post->body, 0, 500)}}{{strlen($post->body) > 500 ? "...": ""}}</p>
            <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">read more</a>
            @endforeach
        </div>
        <div class="text-center">
        {!! $posts->links(); !!}
        </div>
    </div>
</div>





@endsection
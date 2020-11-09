@extends('main')
@section('title', '| View Post')
@section('content')

    <p class="lead">Post:</p>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong>{{Session::get('success')}}
    </div>
    @endif

    <div class="row">
        <div class="col-md-8">
        <div class="well">
        <h1>{{$post->title}}</h1>
        <p class="lead">{{$post->body}}</p>
        </div>
        </div>
        <div class="col-sm-4">
            <div class="well">
            <div class="row">
            <div class="col-sm-4">
            {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=>"btn btn-primary btn-block")) !!}

            </div>
            <div class="col-sm-4">
            {!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE'])!!}
            {!! Form::submit('Delete', ['class'=>'btn btn-primary btn-block'])!!}
            {!! Form::close() !!}
            </div>
            </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            @foreach($post->comments as $comment)
            <div class="well">
            <div class="comment">
                <p><b>Name:</b> {{$comment->name}}</p>
                <p>Comment:<br/>{{$comment->comment}}</p>
            </div>
            </div>
            @endforeach
        </div>
    </div>


  <div class="row">
        <div class="comment-form">
            {!! Form::open(array('route'=>['comments.store', $post->id]))!!} 
            <div class="row">
                <div class="col-sm-4">
            {{ Form::label('name','Name:')}} 
            {{ Form::text('name', null, array('class'=>'form-control'))}} 
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
            {{ Form::label('email','Email:')}}
            {{ Form::text('email',null, array('class'=>'form-control'))}}
                </div>
            </div>  
            <div class="row">
                <div class="col-md-6">
            {{ Form::label('comment','Comment:')}}  
            {{ Form::textarea('comment',null, array('class'=>'form-control', 'rows'=>'5'))}}
                </div>
                <div class="col-sm-4">
            {{ Form::submit('Comment', array('class'=>'btn btn-primary', 'style'=>'margin-top:20px;'))}}
                </div>
            </div>

            {!! Form::close()!!}
        
        </div>
    </div>
    

@endsection

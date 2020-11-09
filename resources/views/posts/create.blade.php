@extends('main')
@section('title', '| create New Post')
@section('content')

@if( count($errors)>0)
    <div class="alert alert-success" role="alert">
        <strong>Errors:</strong>
        <ul>
        @foreach($errors->all() as $error)
          <li> {{$error}} </li>
        @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        {!! Form:: open(array('route'=>'posts.store','files'=>true))!!} <!--  this wil route to post controller@store -->
            {{ Form::label('title','Title:')}} <!-- the first argument is 'title' is used to match title column in the db table -->
            {{ Form::text('title', null, array('class'=>'form-control'))}} <!-- the array class form control is for css only -->
<br>
            {{ Form::label('featured_image','Upload Image:')}}
            {{ Form::file('featured_image')}}
<br>
            {{ Form::label('body','Post Body:')}}
            {{ Form::textarea('body',null, array('class'=>'form-control'))}}
<br>
            {{ Form::submit('Create Post', array('class'=>'btn btn-success btn btn-success btn-block', 'style'=>'margin-top:20px;'))}}
        {!! Form::close()!!}
        <hr>
    </div>
</div>



@endsection
    <!-- <form> -->
<!-- <div class="form-group">
                <label name="title">title:</label>
                <input id= "title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label name="Post Body">Post Body:</label>
                <textarea id= "Post Body" name="Post Body" class="form-control">write here...</textarea>
            </div>
            <input type="submit" value="Create Post" class="btn btn-success">
        </form> -->
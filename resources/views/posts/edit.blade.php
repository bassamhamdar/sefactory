@extends('main')
@section('title', '| View Post')
@section('content')
<h1>Edit your post</h1>
<div class="row">
<!-- {!! Form:: open(array('route'=>'posts.store'))!!}  this wil route to post controller@store -->

{!! Form::model($post, ["route" => ['posts.update', $post->id], 'method'=>'PUT'])!!} <!-- this will make the post editabel and will connect to update-->
        <div class="col-md-8">
        {{ Form::text('title', null, ["class"=>'form-control'])}}
        <br>
        {{ Form::textarea('body',null, ["class"=>'form-control'])}}
        </div>
        <div class="col-md-4">
            <div class="well">
            <div class="row">
            <div class="col-sm-6">
            {!! Html::linkRoute('posts.show', 'Cancle', array($post->id), array('class'=>"btn btn-primary btn-block")) !!}

            </div>
            <div class="col-sm-6">
            {{ Form::submit('save Changes', array('class'=>"btn btn-primary btn-block"))}}
            </div>
            </div>
            </div>
        </div>
{!! Form:: close()!!}
</div>





@endsection
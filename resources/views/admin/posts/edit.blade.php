@extends('layouts.admin')

@section('content')

<div class="container-fluid img-thmbnail">
<h1 class="text-primary">Edit Post</h1><hr>

<div class="col-md-9">
@include('includes.form_error_handler')


{!!Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true])!!}



<div class='form-group'>
{!! Form::label('title', 'Title:') !!}
{!! Form::text('title',null,['class'=>'form-control']) !!}
</div>

<div class='form-group'>
{!! Form::label('category_id', 'Category:') !!}
{!! Form::select('category_id',[''=>'Choose Category']+$categories,null,['class'=>'form-control']) !!}
</div>

<div class='form-group'>
{!! Form::label('photo_id', 'Upload File:') !!}
{!! Form::file('photo_id',['class'=>'']) !!}
</div>


<div class='form-group'>
{!! Form::label('body', 'Description:') !!}
{!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>

<div class='form-group'>
{!! Form::submit('Edit Post',['class'=>'form-control btn btn-info ']) !!}
</div>

{!!Form::open(['method'=>'DELETE','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

<div class='form-group'>
{!! Form::submit('Delete Post',['class'=>'form-control btn btn-danger']) !!}
</div>
{!! Form::close() !!}


{!! Form::close() !!}
</div>

<div class="col-md-3">
<img src="{{$post->photo ? $post->photo->path : '/images/Not_Available.jpg'}}" alt="" class="img-responsive img-thumbnail">

</div>
</div>

@stop
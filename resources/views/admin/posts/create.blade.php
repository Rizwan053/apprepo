@extends('layouts.admin')

@section('content')
@include('includes.tinyeditor')

<div class="container-fluid img-thmbnail">
<h1 class="text-primary">Create Post</h1>
@include('includes.form_error_handler')

{!!Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true])!!}



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
{!! Form::submit('Create Post',['class'=>'form-control btn btn-success']) !!}
</div>



{!! Form::close() !!}

</div>

@stop
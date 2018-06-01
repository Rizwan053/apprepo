@extends('layouts.admin')

@section('content')
<div class="container img-thumbnail">

<h1 class="text-primary">Create Category</h1>
{!!Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store','files'=>true]) !!}
<div class='form-group'>
{!! Form::label('name', 'Name of Category:') !!}
{!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
<div class='form-group'>
{!! Form::submit('Create Category',['class'=>'form-control btn btn-primary']) !!}
</div>
{!! Form::close() !!}
</div>

@stop
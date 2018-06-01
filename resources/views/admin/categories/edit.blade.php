@extends('layouts.admin')

@section('content')

<div class="container img-thumbnail">
<h2 class="text-primary">Edit Category</h2>

    
{!!Form::model($categories,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$categories->id]]) !!}
<div class='form-group'>
{!! Form::label('name', 'Name of Category:') !!}
{!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
<div class='form-group'>
{!! Form::submit('Update Category',['class'=>'form-control btn btn-primary']) !!}
</div>
{!! Form::close() !!}




{!!Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$categories->id]]) !!}

<div class='form-group'>
{!! Form::submit('Delete Category',['class'=>'form-control btn btn-danger']) !!}
</div>
{!! Form::close() !!}
</div>
@stop
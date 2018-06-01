@extends('layouts.admin')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

@stop

@section('content')

<div class="container img-thumbnail">
<h1 class="text-primary">Upload Media</h1>
{!!Form::open(['method'=>'POST','action'=>'AdminMediasController@store','class'=>'dropzone','files'=>true]) !!}
{{-- <div class='form-group'>
{!! Form::label('path', 'Upload File:') !!}
{!! Form::file('path',null,['class'=>'form-control']) !!}
</div>
<div class='form-group'>
{!! Form::submit('Upload File',['class'=>'form-control btn btn-primary']) !!}
</div> --}}
{!! Form::close() !!}

</div>

@stop

@section('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>

@stop
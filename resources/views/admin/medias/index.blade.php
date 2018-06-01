@extends('layouts.admin')

@section('content')

<div class=container>
<h2>Media</h2>
<p>Total Media on this Application:</p>  


@if($photos)
<table class=table table-hover>

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Created</th>
<th>Delete</th>
</tr>
</thead>

<tbody>
@foreach($photos as $photo)    
<tr>
<td>{{$photo->id ? $photo->id : 'Not Available'}}</td>
<td><img width=50 height=50 src="{{$photo ? $photo->path : '/images/Not_Available.jpg'}}" alt=""></td>
<td>{{$photo->created_at ? $photo->created_at->diffForhumans(): 'Not Available'}}</td>
<td>
{!!Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}

<div class='form-group'>
{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
</div>
{!! Form::close() !!}


</td>
</tr>
@endforeach
</tbody>
</table>

@endif
</div>

@stop
@extends('layouts.admin')

@section('content')

<div class='container img-thumbnail'>
<h2>Comments</h2>
<p>All Comment on this Application:</p>

@if(count($comments)>0)
<table class=table table-hover>
<thead>
<tr>
<th>ID</th>
<th>Post ID</th>
<th>Email</th>
<th>Status</th>
<th>Body</th>
<th>View</th>
<th>Delete</th>
</tr>
</thead>
<tbody>

    @foreach($comments as $comment)

<tr>
<td>{{$comment->id ? $comment->id : 'Not Available'}}</td>
<td>{{$comment->post_id ? $comment->post_id : 'Not Available'}}</td>
<td>{{$comment->email ? $comment->email : 'Not Available'}}</td>
<td>
@if($comment->is_active ==1)
{!!Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
<input type="hidden" name="is_active" value="0">
<div class='form-group'>
{!! Form::submit('Approved',['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}

@else 
{!!Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
<input type="hidden" name="is_active" value="1">
<div class='form-group'>
{!! Form::submit('Un-Approved',['class'=>'btn btn-danger']) !!}
</div>
{!! Form::close() !!}

@endif
</td>
<td>{{$comment->body ? $comment->body : 'Not Available'}}</td>
<td><a href="{{route('home.post', $comment->post_id)}}" class="btn btn-info">View</a></td>
<td>
{!!Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}

<div class='form-group'>
{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
</div>
{!! Form::close() !!}

</td>

</tr>
@endforeach
</tbody>
</table>
@else
<h1 class="text-primary">No Comments Available</h1>
@endif
</div>

@stop
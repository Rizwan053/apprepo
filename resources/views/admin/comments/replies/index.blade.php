@extends('layouts.admin')

@section('content')

<div class='container img-thumbnail'>
<h2>Repliess</h2>
<p>All Replies on this Application:</p>

@if(count($repliess)>0)
<table class=table table-hover>
<thead>
<tr>
<th>ID</th>
<th>Comment ID</th>
<th>Email</th>
<th>Status</th>
<th>Body</th>
<th>View</th>
<th>Delete</th>
</tr>
</thead>
<tbody>

    @foreach($repliess as $replies)

<tr>
<td>{{$replies->id ? $replies->id : 'Not Available'}}</td>
<td>{{$replies->comment_id ? $replies->comment_id : 'Not Available'}}</td>
<td>{{$replies->email ? $replies->email : 'Not Available'}}</td>
<td>
@if($replies->is_active ==1)
{!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$replies->id]]) !!}
<input type="hidden" name="is_active" value="0">
<div class='form-group'>
{!! Form::submit('Approved',['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}

@else 
{!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$replies->id]]) !!}
<input type="hidden" name="is_active" value="1">
<div class='form-group'>
{!! Form::submit('Un-Approved',['class'=>'btn btn-danger']) !!}
</div>
{!! Form::close() !!}

@endif
</td>
<td>{{$replies->body ? $replies->body : 'Not Available'}}</td>
<td><a href="{{route('home.post', $replies->post_id)}}" class="btn btn-info">View</a></td>
<td>
{!!Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$replies->id]]) !!}

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
<h1 class="text-primary">No repliess Available</h1>
@endif
</div>

@stop
@extends('layouts.admin')

@section('content')

<div class="container img-thumbnail">
<h2>Posts</h2>
<p>Total Post Available:</p>  
<table class=table table-hover>
<thead>
<tr>
<th>ID</th>
<th>Photo</th>

<th>User</th>
<th>Category</th>
<th>Title</th>
<th>Body</th>
<th>Created At</th>
<th>Updated At</th>
</tr>
</thead>
<tbody>    
@if($posts)
@foreach($posts as $post)
<tr>
<td>{{$post->id ? $post->id : 'Not Available'}}</td>
<td><img width=50 height=50 src="{{$post->photo ? $post->photo->path : '/images/Not_Available.jpg'}}" alt=""></td>

<td>{{$post->user->name ? $post->user->name : 'Not Available'}}</td>
<td>{{$post->category ? $post->category->name : 'Not Available'}}</td>
<td>{{$post->title ? $post->title : 'Not Available'}}</td>
<td>{{$post->body ? $post->body : 'Not Available'}}</td>
<td>{{$post->created_at ? $post->created_at->diffForhumans() : 'Not Available'}}</td>
<td>{{$post->updated_at ? $post->updated_at->diffForhumans() : 'Not Available'}}</td>
</tr>
@endforeach
@endif
</tbody>

</table>
</div>


@stop
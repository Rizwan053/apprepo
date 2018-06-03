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
<th>View Post</th>
<th>Created At</th>
<th>Updated At</th>
</tr>
</thead>
<a href="{{route('admin.posts.create')}}" class="btn btn-primary">Add New Post</a>    
<tbody>
@if($posts)
@foreach($posts as $post)

<tr>
<td><a href="{{route('admin.posts.edit',$post->id)}}">
{{$post->id ? $post->id : 'Not Available'}}</a></td>


<td><img width=50 height=50 src="{{$post->photo ? $post->photo->path : '/images/Not_Available.jpg'}}" alt=""></td>

<td>{{$post->user->name ? $post->user->name : 'Not Available'}}</td>
<td>{{$post->category ? $post->category->name : 'Not Available'}}</td>
<td><a href="{{route('admin.posts.edit',$post->id)}}">
{{$post->title ? $post->title : 'Not Available'}}</a></td>
<td>{{$post->body ? str_limit($post->body,20) : 'Not Available'}}</td>
<td><a href="{{route('home.post',$post->slug)}}" class="btn btn-success">View</a></td>
{{-- <td><a href="{{route('admin.comment.show',$post->id)}}" class="btn btn-success">View</a></td> --}}
<td>{{$post->created_at ? $post->created_at->diffForhumans() : 'Not Available'}}</td>
<td>{{$post->updated_at ? $post->updated_at->diffForhumans() : 'Not Available'}}</td>
</tr>
@endforeach
@endif
</tbody>

</table>
</div>

<div class="row">
    <div class="col-sm-6 col-sm-offset-5">
        {{$posts->render()}}

    </div>
</div>
@stop
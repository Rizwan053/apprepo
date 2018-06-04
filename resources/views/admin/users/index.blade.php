@extends('layouts.admin')

@section('content')

<div class="container img-thumbnail">

@if(Session::has('deleted_user'))

<p class="alert-danger">{{session('deleted_user')}}</p>

@endif


  <h2>Users Table</h2>
  <p>User That Register to this Application</p>       
<a class="btn btn-primary" href="users/create">Add New User</a>     
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>User Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        
      </tr>
    </thead>
    <tbody>

@if($users)
@foreach($users as $user)
      <tr>
      <td>{{$user->id ? $user->id : 'Not Available'}}</td>
      <td><img width=50 height=50 src="{{$user->photo ? $user->photo->path:'/images/Not_Available.jpg'}}"></td>
      <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name ? $user->name : 'Not Available'}}</a></td>
      <td>{{$user->email ? $user->email : 'Not Available'}}</td>
      <td>{{$user->role_id ? $user->role->name : 'Not Available'}}</td>
      <td>
        
          {{$user->is_active==1 ? 'Active': 'Not Active' }}
        
        </td>
      <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'Not Available'}}</td>
      <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : 'Not Available'}}</td>


      
@endforeach
@endif       
    
    </tbody>
  </table>
</div>


@stop

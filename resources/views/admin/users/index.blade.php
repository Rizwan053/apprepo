@extends('layouts.admin')

@section('content')

<div class="container">
  <h2>Users Table</h2>
  <p>User That Register to this Application</p>       
<a class="btn btn-primary" href="users/create">Add New User</a>     
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
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
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->role->name}}</td>
      <td>
        
          {{$user->is_active==1 ? 'Active': 'Not Active' }}
        
        </td>
      <td>{{$user->created_at->diffForHumans()}}</td>
      <td>{{$user->updated_at->diffForHumans()}}</td>


      
@endforeach
@endif       
    
    </tbody>
  </table>
</div>


@stop

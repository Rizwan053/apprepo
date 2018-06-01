@extends('layouts.admin')

@section('content')
<div class="container img-thumbnail">
<h1 class="text-primary">Edit User</h1>
@include('includes.form_error_handler')

<br>


<div class="col-sm-9">

{!!Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
<div class='form-group'>
{!! Form::label('name', 'Name:') !!}
{!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
<div class='form-group'>
{!! Form::label('email', 'Email:') !!}
{!! Form::email('email',null,['class'=>'form-control']) !!}
</div>
<div class='form-group'>
{!! Form::label('password', 'Password:') !!}
{!! Form::password('password',['class'=>'form-control']) !!}
</div>
<div class='form-group'>
{!! Form::label('photo_id', 'Upload File:') !!}
{!! Form::file('photo_id',null,['class'=>'']) !!}
</div>
<div class='form-group'>
{!! Form::label('role_id', 'Role:') !!}
{!! Form::select('role_id',[''=>'Choose Role'] + $roles ,null,['class'=>'form-control']) !!}
</div>

<div class='form-group'>
{!! Form::label('is_active', 'Status:') !!}
{!! Form::select('is_active',array(''=>'Choose Status',1=>'Active', 0=>'Not Active'),null,['class'=>'form-control']) !!}
</div>

<div class='form-group'>
{!! Form::submit('Edit User',['class'=>' form-control btn btn-primary']) !!}
</div>





{!! Form::close() !!}

{!!Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]])!!}
<div class='form-group'>
{!! Form::submit('Delete User',['class'=>'form-control btn btn-danger']) !!}
</div>
{!! Form::close() !!}

</div>



<div class="col-sm-3">
<img  src="{{$user->photo ? $user->photo->path:'/images/Not_Available.jpg'}}" alt="user_img" class="img-responsive img-rounded ">
</div>




</div>
@endsection


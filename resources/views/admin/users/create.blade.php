@extends('layouts.admin')

@section('content')
<div class="wrapper">
<h1 class="text-primary">Add New User</h1>
{!!Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
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
{!! Form::label('file', 'Upload File:') !!}
{!! Form::file('file',['class'=>'']) !!}
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
{!! Form::submit('Create User',['class'=>'form-control btn btn-primary']) !!}
</div>
{!! Form::close() !!}




</div>
@include('includes.form_error_handler')
@endsection

{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New User</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

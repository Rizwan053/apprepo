@extends('layouts.admin')

@section('content')

<div class="container img-thumbnail">
<h2>Categories</h2>
<p>Total Categories Available:</p>  

{{-- <div class="col-md-6"> --}}
    
{!!Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store','files'=>true]) !!}
<div class='form-group'>
{!! Form::label('name', 'Name of Category:') !!}
{!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
<div class='form-group'>
{!! Form::submit('Create Category',['class'=>'form-control btn btn-primary']) !!}
</div>
{!! Form::close() !!}


{{-- </div> --}}



{{-- <div class="col-md-6"> --}}

 @if($categories)


            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'Not Available'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif

{{-- </div> --}}


</div>
@stop
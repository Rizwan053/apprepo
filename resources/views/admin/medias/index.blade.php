@extends('layouts.admin')

@section('content')

<div class=container>
<h2>Media</h2>
<p>Total Media on this Application:</p>  


@if($photos)
<form class="form-inline" action="/delete/media" method="post">
    {{csrf_field()}}
    {{method_field('delete')}}
    <div class="form-group">
        <select name="checkBoxArray" id="" class='form-control'>
            <option value="delete">Delete</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary">
    </div>
<table class=table table-hover>

<thead>
<tr>
<th><input type="checkbox" id="options"></th>
<th>ID</th>
<th>Media</th>
<th>Created</th>
<th>Delete</th>
</tr>
</thead>

<tbody>
@foreach($photos as $photo)    
<tr>
<td><input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="checkBoxes"></td>
    
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
</form>


@endif
</div>



@stop

@section('scripts')
<script>
    $(document).ready(function(){
        $('#options').click(function(){
            if(this.checked){
            $('.checkBoxes').each(function(){
               this.checked = true;
            });
            }else{
                $('.checkBoxes').each(function(){
               this.checked = false;
            });
                
            }
        });
    });
</script>

@stop
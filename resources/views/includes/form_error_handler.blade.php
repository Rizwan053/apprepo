@if(count($errors)>0)
<div class="alert-danger">
<ul>
    @foreach($errors->all() as $error)
<li>{{strtoupper($error)}}</li>
    @endforeach
</ul>
</div>
@endif
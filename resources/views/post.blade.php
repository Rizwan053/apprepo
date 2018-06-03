@extends('layouts.blog-post')

@section('content')

@if($post)
 <!-- Title -->
<h1>{{$post->title ? $post->title : 'Title'}}</h1>

                <!-- Author -->
                <p class="lead">
                By <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="far fa-clock"></span> Posted  {{$post->created_at ? $post->created_at->format('d M Y') : 'Not Available'}}</p>

                <hr>

                <!-- Preview Image -->
                <img class='img-responsive' src="{{$post->photo ? $post->photo->path : '/images/Not_Available.jpg'}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->body ? $post->body : 'Not Available'}}</p>

@endif

@if(Session::has('comment_message'))
<p class="alert-success">{{session('comment_message')}}</p>


@endif
@if(Auth::check())

 <div class="well">
                    <h4>Leave a Comment:</h4>
                    {!!Form::open(['method'=>'POST','action'=>'PostCommentsController@store','files'=>true]) !!}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                   

                    <div class='form-group'>
                    
                    {!! Form::label('body', 'Message:') !!}
                    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
                    </div>
                    <div class='form-group'>
                    {!! Form::submit('Comment',['class'=>'form-control btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
</div>
@endif

                <hr>

                <!-- Posted Comments -->
                    <h2 class="bg- text text-center">All Comments</h2>
                
@if(count($post->comments)>0 )
@foreach($post->comments as $comment)
@if($comment->is_active == 1)
                    
                <!-- Comment -->
                <div class="media">
                                <hr>

                    <a class="pull-left" href="#">

                        <img height=64 class="media-object" src="{{$comment->photo}}" alt="img.jpg">
                    </a>

                   

                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->format('d M Y')}}</small>
                        </h4>
                        {{$comment->body}}


<hr>
<div class="comment-reply-container">
<button class="toggle-reply form-control btn btn-primary pull-right">Reply</button>
<div class="comment-reply">

                            {!!Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply',]) !!}
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <div class='form-group'>

                            {!! Form::label('body', 'Message:') !!}
                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>2]) !!}
                            </div>
                            <div class='form-group'>
                            {!! Form::submit('Submit',['class'=>' btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
</div>                    
</div>                    

<hr>
<h2 class="bg-s text text-center">All Replies</h2>

@if(count($comment->replies)>0 )
@foreach($comment->replies as $reply)
@if($reply->is_active == 1)
                            <div class="media">
                                <hr>
                            <a class="pull-left" href="#">
                                <img height=64 class="media-object" src="{{$reply->photo}}" alt="">
                            </a>

                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->format('d M Y')}}</small>
                                </h4>
                                {{$reply->body}}

                            </div>
                            
                        </div>
@endif
@endforeach                
@endif                        
                </div>
            <hr>
                
         </div>
            



@endif
@endforeach                
@endif               
@stop




@section('scripts')

<script>

        $(".comment-reply-container .toggle-reply").click(function(){


            $(this).next().slideToggle("slow");




        });




    </script>
@stop


{{-- @section('categories')
@if($post)
 <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">

@foreach($post as $posts)

                            <li><a href="#">{{$posts->title}}</a>
                                </li>
@endforeach
                                
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>


@endif

@stop --}}
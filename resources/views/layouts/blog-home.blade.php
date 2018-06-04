<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Application</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/libs/blog-post.css" rel="stylesheet">
    <link href="/css/libs/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    @include('includes.front_nav')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
@if($posts)
@foreach($posts as $post)
                <!-- First Blog Post -->
                <h2>
                    <a href="{{route('home.post',$post->slug)}}">{{$post->title ? $post->title : ''}}</a>
                </h2>
                <p class="lead">
                    by <a href="#">{{$post->user ? $post->user->name : ''}}</a>
                </p>
                <p><span class="far fa-clock"></span> Posted on {{$post->created_at ? $post->created_at->format('d M Y') : ''}}</p>
                <hr>
               <a href="{{route('home.post',$post->slug)}}"> <img height= 100 class="img-responsive" src="{{$post->photo ? $post->photo->path : ''}}" alt=""></a>
                <hr>
                <p>{{$post->body ? str_limit($post->body,100) : ''}}</p>
            <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="fas fa-chevron-right"></span></a>

                <hr>
@endforeach
@endif
                <!-- Second Blog Post -->
               
                <hr>

                <!-- Pager -->
               {{$posts->render()}}

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
             @include('includes.front_sidebar')

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
  <script src="js/libs/jquery.js"></script>
<script src="js/libs/bootstrap.js"></script>
<script src="js/libs/scripts.js"></script>


</body>

</html>

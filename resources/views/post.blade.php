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
                <p class="lead">{!!$post->body ? $post->body : 'Not Available'!!}</p>

@endif



<hr>
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://myapp-4.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//myapp-4.disqus.com/count.js" async></script>         
@stop



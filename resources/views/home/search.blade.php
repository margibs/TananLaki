
@extends('home.layout')

@section('content')
<div class="homeViewWrapper">

  <!-- Posts
  ============================================= -->
  <div id="posts" class="small-thumbs">
  <div class="grid">
    <div class="grid-sizer"></div>    



    @foreach($posts as $post)

      <div class="grid-item">             
          <div class="details">
            <span class="categorySpan">  <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" style="color:#fff;">  {{$post->name}} </a></span> &nbsp; <span class="dateSpan"> </span>      
            <p> <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}"> {{$post->title}} </a> </p>          
          </div>
          <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">
             <img src="{{url('uploads')}}/{{$post->feat_image_url}}" alt="">
          </a>      
      </div>

    @endforeach 

  </div>
  
  </div>
  <!-- #posts end -->



@foreach ($users as $user) 
	{{$user->name}}
@endforeach

{!! $users->appends(Request::only('q'))->render() !!}


</div>

@endsection
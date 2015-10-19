
@extends('home.layout')

@section('content')

<style>
  .postcontent{
    margin-top: 0;
    margin-bottom: 15px;
  }
  .searchText{
    font-family: Oswald;
    font-weight: 500;
    font-size: 20px;
    margin-top: 15px;    
    color: #7D7D7D;
  }
  .searchText i{
    position: relative;
    top: -2px;
    margin-right: 2px;
    font-size: 18px;
  }
</style>

<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <!-- LEFT START -->
    <div class="left single">

        <h2 class="searchText"> <i class="fa fa-search"></i> Search Results: </h2>

        <div class="posts">
            <div class="row no-gutters">

         @foreach($posts as $post)

              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="postcontent">
                  <div class="overlay">
                    <span><a href="{{url('')}}/{{$post->cat_slug}}">  {{$post->name}} </a></span>
                    <h2><a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">  {{$post->title}}  </a> </h2>
                  </div>
                  <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">  <img src="{{url('uploads')}}/{{$post->feat_image_url}}" alt="" class="initImage"> </a>
                </div>
              </div>            
          
          @endforeach 
          </div>
          {!! $posts->appends(Request::only('q'))->render() !!}
        </div>

    </div>
</div>

@endsection
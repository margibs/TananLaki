@extends('home.layout')
@section('content')

<style>
  .mainPostWrapper{
    background-color: #ececec;
    padding: 0;
  }
  body{
    background-color: #ececec;
  }
  .single-post img{
  	width: auto;
  }
  .single-post, .singleViewWrapper {
    padding: 0;
  }
  .single-title{
  	    margin-bottom: 15px;
        padding: 5px 40px 25px 40px;
        background-color: #fff;
        -moz-box-shadow: 0 -1px 20px -3px #C7C7C7;
        -webkit-box-shadow: 0 -1px 20px -3px #C7C7C7;
        box-shadow: 0 -1px 20px -3px #C7C7C7; 
        border-bottom: none!important;
        overflow: hidden;
  }
  .postcontent {
    width: 100%;
}
</style>

     @foreach($posts as $post)
 <div class="single-title" style="padding:0;">

      <div class="entry-title" style=" padding: 10px 60px; ">

           <h2 style="
                padding-bottom: 0;
                margin-top: 20px;
                font-size: 24px;
                margin-bottom: 0;
                line-height: 30px;
                font-family: Roboto;
               ">  <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">{{$post->title}} </a> </h2>

               <div class="social-sharing" data-permalink="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" style="padding: 10px 0 0 0;">                      
                                <a target="_blank" href="http://www.facebook.com/sharer.php?u={{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" class="share-facebook">
                                  <span class="icon icon-facebook" aria-hidden="true"></span>
                                  <span class="share-title">Share</span>
                                  
                                </a>

                                <!-- https://dev.twitter.com/docs/intents -->
                                <a target="_blank" href="http://twitter.com/share?url={{url('')}}/{{$post->cat_slug}}/{{$post->slug}}text={{$post->title}}&text=" class="share-twitter">
                                  <span class="icon icon-twitter" aria-hidden="true"></span>
                                  <span class="share-title">Tweet</span>
                                  
                                </a>

                              
                </div>

      </div>

      <div class="clearfix"></div>

      <div class="singleViewWrapper" style="padding:0!important;">      

        <div class="postcontent nobottommargin clearfix">

            <div class="single-post nobottommargin">

                <!-- Single Post
                ============================================= -->
                <div class="entry clearfix">                                                                                  

        	          <!-- Post Single -->
                    <div class="clearfix"></div>                                                                      

                    <!-- Entry Content
                    ============================================= -->
                    <div class="entry-content notopmargin newContent" style="text-align:center;    width: 80%;
    margin: 0 auto;">
                        <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">{!! $post->content !!}</a>
                        <p style="margin-bottom:10px!important;margin-bottom: 10px!important;
    font-family: Roboto!important;
    font-size: 16px!important;"> {{$post->introduction}} </p>
                        <div class="clear"></div>

                     </div>

                </div><!-- .entry end -->   

                        <div class="clear"></div>
            
            </div>
          </div>
  </div>


<a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" target="_blank" style="
    text-align: center;
    display: block;
    padding: 10px 15px;
    font-size: 16px;
    margin: 15px auto 0 auto;
    color: #B70808;
    background-color: #F3F3F3;
    border-top: 1px solid #DEDEDE;
    font-weight: 700;
    "> <i class="icon-line2-bubble"></i>  
                                    <!-- <span class="fb-comments-count fb_comments_count_zero" data-href="http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" fb-xfbml-state="rendered"><span class="fb_comments_count">0</span> --> </span> View Comments </a>


</div>
@endforeach 

@endsection
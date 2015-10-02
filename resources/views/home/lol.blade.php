@extends('home.layout')
@section('content')

<style>
  .mainPostWrapper{
    background-color: #ececec;
    padding: 0 0 0 15px;
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
  }
  .postcontent {
    width: 100%;
}
</style>

     @foreach($posts as $post)
 <div class="single-title">

      <div class="entry-title">

           <h2 style="
    padding-bottom: 15px;
    border-bottom: 1px solid #DADADA;
    margin-top: 20px;
    font-size: 24px;
    margin-bottom: 10px;
    line-height: 30px;
    font-family: Roboto;
               ">  <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">{{$post->title}} </a> </h2>

       <div class="social-sharing" data-permalink="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" style="padding: 10px 0 0 0;">
                        <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u={{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" class="share-facebook">
                          <span class="icon icon-facebook" aria-hidden="true"></span>
                          <span class="share-title">Share</span>
                          
                        </a>

                        <!-- https://dev.twitter.com/docs/intents -->
                        <a target="_blank" href="http://twitter.com/share?url={{url('')}}/{{$post->cat_slug}}/{{$post->slug}}text={{$post->title}}" class="share-twitter">
                          <span class="icon icon-twitter" aria-hidden="true"></span>
                          <span class="share-title">Tweet</span>
                          
                        </a>

                        <a style="color: #6C6868; font-weight: 300; font-size: 17px; position: relative; top: 4px;">  
                        <i class="icon-line2-bubble"></i>  
                            <span class="fb-comments-count fb_comments_count_zero" data-href="http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" fb-xfbml-state="rendered"><span class="fb_comments_count">0</span> Comments </span>      
                        </a>
            </div>

      </div>

      <div class="clearfix"></div>

      <div class="singleViewWrapper" style="padding-bottom:0!important;">      

        <div class="postcontent nobottommargin clearfix">

            <div class="single-post nobottommargin">

                <!-- Single Post
                ============================================= -->
                <div class="entry clearfix">                                                                                  

        	          <!-- Post Single -->
                    <div class="clearfix"></div>                                                                      

                    <!-- Entry Content
                    ============================================= -->
                    <div class="entry-content notopmargin newContent" style="text-align:center;">
                        {!! $post->content !!}
                        <p style="margin-bottom:10px!important;"> {{$post->introduction}} </p>
                        <div class="clear"></div>

                     </div>

                </div><!-- .entry end -->   

                        <div class="clear"></div>
            
            </div>
          </div>
  </div>



</div>
@endforeach 

@endsection
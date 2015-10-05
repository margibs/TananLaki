@extends('home.layout')
@section('lol_content')

<style>
  #defaultBlogView{
    display: none;
  }
  .sidebarTitle{
        width: 105%;
  }
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
    width: 95%;
  }
  .entry-title{
     padding: 10px 40px;
  }
  @media screen and (max-width: 991px){
    .entry-content{
          width: 100%!important;
    }
  }
  @media screen and (max-width: 768px){
    .entry-title{
      padding: 10px 20px;
    }
  }
  img, video{
    max-width: 100%;
    height: auto;
  }
</style>

     @foreach($posts as $post)
 <div class="single-title" style="padding:0;">

      <div class="entry-title">

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

            <div class="single-post nobottommargin" style="padding:0 10px;">

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


<script>
  $(document).ready(function(){
    // This function will be executed when the user scrolls the page.
    $(window).scroll(function(e) {
        // Get the position of the location where the scroller starts.
        var scroller_anchor = $(".scroller_anchor").offset().top;
        
        // Check if the user has scrolled and the current position is after the scroller start location and if its not already fixed at the top 
        if ($(this).scrollTop() >= scroller_anchor && $('.scroller').css('position') != 'fixed') 
        {    // Change the CSS of the scroller to hilight it and fix it at the top of the screen.
            $('.scroller').css({                              
                'position': 'fixed',
                'top': '0px'
            });
            // Changing the height of the scroller anchor to that of scroller so that there is no change in the overall height of the page.
            $('.scroller_anchor').css('height', '50px');
        } 
        else if ($(this).scrollTop() < scroller_anchor && $('.scroller').css('position') != 'relative') 
        {    // If the user has scrolled back to the location above the scroller anchor place it back into the content.
            
            // Change the height of the scroller anchor to 0 and now we will be adding the scroller back to the content.
            $('.scroller_anchor').css('height', '0px');
            
            // Change the CSS and put it back to its original position.
            $('.scroller').css({                          
                'position': 'relative'
            });
        }
    });
});

</script>

@endsection
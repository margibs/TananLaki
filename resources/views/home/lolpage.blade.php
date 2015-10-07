@extends('home.layout')
@section('lol_content')
                         
<?php
$url =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<style>
  #defaultBlogView{
    display: none;
  }
  .sidebarTitle{
        width: 105%;
  }
  .single-title{
    padding-bottom: 10px;
    border-bottom: none!important;
  }
  .single-post img{
    width: auto;
  }
  .nextPost{
        text-align: right;
    margin-top: 50px;
  }
  .arrow_box {
  position: relative;
  background: #B70808;
  margin-right: 30px;
  font-size: 20px;
  padding: 15px;    
  color: #fff;
  font-family: Oswald;
  float: right;
  max-width: 400px;
  white-space: nowrap;
  text-overflow: ellipsis;

  border-top-left-radius: 2px;
  border-bottom-left-radius: 2px;
  transition:background 0.2s ease;
}
.arrow_box:hover{
  cursor: pointer;
}
 .arrow_box a{
  color: #fff;
 }
.arrow_box span{
    border-right: 1px solid #E27272;
    margin-right: 10px;
    padding-right: 10px;
    text-transform: uppercase;
    font-size: 15px;
    font-family: Roboto;
    font-weight: 700;
    color: #D26D6D;
    position: relative;

    top: -2px;
}
.arrow_box:after {
  left: 100%;
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-color: rgba(136, 183, 213, 0);
  border-left-color: #B70808;
  border-width: 30px;
  margin-top: -30px;
}
 img, video{
    max-width: 100%;
    height: auto;
  }
  .mainPostWrapper{
    background-color: #ececec;
    padding: 0;
  }
  body{
    background-color: #ececec;
  }
  .entry-title h2{
       padding-bottom:0;margin-top: 20px;    font-family: Roboto;
      font-size: 30px;
      line-height: 35px;
    }
  @media  screen and (max-width: 991px){ 
    .postcontent{
      width: 98%!important;
    }
    .entry-title h2{
        margin-top: 45px;
        margin-bottom: 5px;
        font-size: 30px !important;
    }
    .padRight0 {
      padding-right: 15px;
    }
    .singleViewWrapper{
      padding-top:  0;
    }
  }
</style>


    <div class="single-title">

      <div class="entry-title">

             <h2>  {{$post->title}} </h2>

            <div class="social-sharing" data-permalink="<?php echo $actual_link ?>">         
                <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link ?>" class="share-facebook">
                  <span class="icon icon-facebook" aria-hidden="true"></span>
                  <span class="share-title">Share</span>
                  <span class="share-count">0</span>
                </a>
           
                <a target="_blank" href="http://twitter.com/share?url=<?php echo $actual_link ?>&amp;text={{$post->title}}&amp;" class="share-twitter">
                  <span class="icon icon-twitter" aria-hidden="true"></span>
                  <span class="share-title">Tweet</span>
                  <span class="share-count">0</span>
                </a>

                <a style="color: #6C6868; font-weight: 300; font-size: 17px; position: relative; top: 4px;">  
                    <i class="icon-line2-bubble"></i>  
                    <span class="fb-comments-count fb_comments_count_zero" data-href="http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" fb-xfbml-state="rendered"><span class="fb_comments_count">0</span> Comments </span>      
                </a>

            </div>

      </div>

    </div>

    <div class="singleViewWrapper" style="padding-bottom:0!important;">
    
          <meta name="csrf-token" content="ZMHnRoC655h03IBwA0VMiZZqdmNGOU8JkoQELOgu">

          <div class="postcontent nobottommargin clearfix" style="width: 100%; margin: 0;">
             
              <div class="single-post nobottommargin" style="padding: 0;">

                    <!-- Single Post
                    ============================================= -->
                    <div class="entry clearfix">                                                                                  

                            <div class="entry-content notopmargin newContent">                       
                                
                                  <div class="entry-title">
                
                                        <div style="text-align:center;">
                                            {!! $post->content !!} 
                                            <p style="margin-bottom:10px!important;"> {{$post->introduction}} </p>
                                        </div>
              
                                        @if($next_post != null)

                                          <div class="nextPost">
                                               <div class="arrow_box">                                          
                                                    <a href="{{url('')}}/{{ $next_post->cat_slug }}/{{ $next_post->slug }}"><span> Next </span> {{ $next_post->title }}</a>                              
                                              </div>
                                          </div>

                                        @endif          

                                  </div>             
                   
                            </div><!-- .entry-title end -->
      
                    </div><!-- .entry end -->   

                </div>

            </div>
    </div>

                      
                  <div class="singleViewWrapper">  
                      <div class="postcontent nobottommargin clearfix"  style="width: 100%; margin: 0;">
                          <div class="single-post nobottommargin" style="padding:0;">

                                    <h4 class="relatedText"> What do you think? </h4>

                                    <div id="mydiv">
                                      <fb:comments href="http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" num_posts="10" width="739" fb-xfbml-state="rendered" class="fb_iframe_widget"><span style="height: 175px; width: 735px;"><iframe id="f3e54f9c6c" name="f160508a1" scrolling="no" title="Facebook Social Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=907091149365288&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6brUqVNoWO3.js%3Fversion%3D41%23cb%3Df1c75308ac%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff2b9b8308%26relation%3Dparent.parent&amp;href=http%3A%2F%2Flocalhost%2Falllad%2Fpublic%2Fnews%2Fcara-delevingne-says-she-prefers-being-naked-to-wearing-clothes&amp;locale=en_US&amp;numposts=10&amp;sdk=joey&amp;version=v2.2&amp;width=739" style="border: none; overflow: hidden; height: 175px; width: 735px;"></iframe></span></fb:comments>
                                    </div>
                                    <script>
                                    var mydiv = document.getElementById("mydiv");  
                                    mydiv.innerHTML = "<fb:comments href='" + document.location.href + "' num_posts='10' width='739'></fb:comments>";  
                                    FB.XFBML.parse(mydiv);  
                                    </script>
                                                         
                          </div>
                      </div><!-- .postcontent end -->
                  </div>      

                    

@endsection
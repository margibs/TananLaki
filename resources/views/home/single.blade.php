@extends('home.layout')

@section('fb_og')
<meta property="og:type" content="website">
  <meta property="og:image" content="{{ url('uploads') }}/{{ $post->feat_image_url }}"/>
  <link rel="image_src" href="{{ url('uploads') }}/{{ $post->feat_image_url }}"/>
  <meta property="og:title" content="{{$post->title}}" />
@endsection

@section('content')



<?php
$url =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
?>

<style>
  .single-post img{
    width: auto;
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
  display: block;
  width: 100%;
  overflow: hidden;
 }
 .arrow_box img{
    float: right;
    margin-top: -47px;
    position: relative;
    z-index: 2;
    top: 7px;
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
  body{
    background-color: #ececec;
  }
  .mainPostWrapper{
   background-color: #D6D6D6;
    padding-left: 15px;
  }
  @media screen and (max-width: 991px){
    .mainPostWrapper{
      padding: 0;
    }
  }
</style>

<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<div class="bigOuter">
  <div class="bigInner">
    <img id="featIMG" src="{{ url('uploads') }}/{{ $post->feat_image_url }}" alt="">
  </div>
</div>

    <div class="single-title">

      <!-- Entry Title
      ============================================= -->
      <div class="entry-title">
          <h2>{{$post->title}}</h2>
      </div><!-- .entry-title end -->

          <!-- Entry Meta
      ============================================= -->
      <ul class="entry-meta clearfix">
          <li> <a href="{{url('')}}/{{$post->cat_slug}}" class="red">{{$post->cat_name}}</a></li>
          <li><i class="icon-line2-clock"></i> {{ date( 'jS F Y', strtotime($post->created_at) ) }}</li>     
          <li><i class="icon-line2-bubble"></i> {{-- $comment_count --}} 
                <span class="fb-comments-count" data-href="<?php echo $actual_link ?>">0</span>      
           </li>                                                       

          <!-- <li><a href="#"><i class="icon-comments"></i> 0 Comments</a></li>          -->
      </ul><!-- .entry-meta end -->

    </div>

  <div class="clearfix"></div>

  


  <div class="singleViewWrapper" style="padding-bottom:0!important;">

        <div class="social-sharing" data-permalink="<?php echo $actual_link ?>">
            <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
            <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link ?>" class="share-facebook">
              <span class="icon icon-facebook" aria-hidden="true"></span>
              <span class="share-title">Share</span>
              <span class="share-count">0</span>
            </a>

            <!-- https://dev.twitter.com/docs/intents -->
            <a target="_blank" href="http://twitter.com/share?url=<?php echo $actual_link ?>&amp;text={{$post->title}}&amp;" class="share-twitter">
              <span class="icon icon-twitter" aria-hidden="true"></span>
              <span class="share-title">Tweet</span>
              <span class="share-count">0</span>
            </a>
        </div>
  
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Post Content -->

        <!-- ============================================= -->
        <div class="postcontent nobottommargin clearfix">

            <div class="single-post nobottommargin">

                <!-- Single Post
                ============================================= -->
                <div class="entry clearfix">                                                                                  

        	          <!-- Post Single -->
                    <div class="clearfix"></div>                                  
                        
                    <!-- Entry Image
                    ============================================= -->
                   <!--  <div class="entry-image">
                        <a href="#"><img src="{{url('uploads')}}/{{$post->feat_image_url}}" alt=""></a>
                    </div> -->
                    <!-- .entry-image end -->

                    <!-- Entry Content
                    ============================================= -->
                    <div class="entry-content notopmargin newContent">
                        
                        <p style="font-weight:bold!important;"> {{$post->introduction}} </p>

                        {!! $post->content !!}

                        <!-- Post Single - Content End -->

                        <div class="clear"></div>

                     </div>
                    
                    @if($next_post != null)
                     <div class="nextPost">
                         <div class="arrow_box">                                          
                              <a href="{{url('')}}/{{ $next_post->cat_slug }}/{{ $next_post->slug }}"><span> Next </span> {{ $next_post->title }} <img src="{{ asset('images/elipssis.jpg') }}" alt="" />  </a>                                                                                                                           
                        </div>
                    </div>
                    @endif

                    <div class="social-sharing socialsharebottom" data-permalink="<?php echo $actual_link ?>">
                      <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
                      <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link ?>" class="share-facebook">
                        <span class="icon icon-facebook" aria-hidden="true"></span>
                        <span class="share-title">Share</span>
                        <span class="share-count">0</span>
                      </a>

                      <!-- https://dev.twitter.com/docs/intents -->
                      <a target="_blank" href="http://twitter.com/share?url=<?php echo $actual_link ?>&amp;text={{$post->title}}&amp;" class="share-twitter">
                        <span class="icon icon-twitter" aria-hidden="true"></span>
                        <span class="share-title">Tweet</span>
                        <span class="share-count">0</span>
                      </a>
                  </div>

                    <div class="clearfix"></div>
                </div><!-- .entry end -->   
            </div>
          </div>
  </div>

                  <div class="singleViewWrapper">  
                      <div class="postcontent nobottommargin clearfix">
                        <div class="single-post nobottommargin">
           
								  
							             <!-- Post Author Info ============================================= -->
                         <!--  <div class="panel panel-default authorBox">          
                              <div class="panel-body">
                                  <div class="author-image">
                                      <img src="@if($post->avatar == '')http://accounts-cdn.9gag.com/media/default-avatar/1_37_100_v0.jpg @else {{$post->avatar}} @endif" alt="" class="img-circle">
                                  </div>
                                  <h3 class="panel-title">By <span><a href="#" style="color: #B70808;">{{$post->name}}</a></span></h3>                              
                                  {{$post->description}}
                              </div>
                          </div> -->
                          <!-- Post Single - Author End -->

                          
                        <h4 class="relatedText"> From around the web </h4>
                            <div id="contentclick24950"></div>
                            <script type="text/javascript">
                                (function() {
                                    var data =
                                    {
                                        pub_id: "8270",w_id: "24950",pw: "f3bd01bc302bca", cbust: (new Date()).getTime()
                                    };
                              if (typeof widgetCheck24950 === 'undefined')   {
                                    var u="";
                                    for(var key in data){u+=key+"="+data[key]+"&"}
                                    u=u.substring(0,u.length-1);    
                                    var a = document.createElement("script");
                                    a.type= 'text/javascript';
                                    a.src = "https://api.contentclick.co.uk/pub_serve.php?" + u;
                                    a.async = true;   
                                    document.getElementById("contentclick24950").appendChild(a);
                              window.widgetCheck24950 = "set";
                              }
                                })();   
                            </script>
                          
                            <h4 class="relatedText" style="margin-top: 20px;">Related Posts</h4>
                            <div class="row">                        
                              <div class="related-posts clearfix" style="margin-bottom:0;">

                                @foreach($related_posts as $related_post)

                                  <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 nobottommargin remPadR relateWrapper">
                                      
                                      <a href="{{url('')}}/{{$related_post->cat_slug}}/{{$related_post->slug}}" style="display:block; overflow: hidden;">
                                       <img src="{{url('uploads')}}/{{$related_post->feat_image_url}}" alt="Blog Single"  style="width:100%; border-bottom: 3px solid rgb(183, 8, 8);">
                                      </a>

                                      <h4 style="line-height: 22px; font-weight: 600; font-size: 16px; margin-top: 8px;"><a href="{{url('')}}/{{$related_post->cat_slug}}/{{$related_post->slug}}"  style="color: #000; font-weight: 500; font-size: 17px !important; font-family: Oswald;" >{{$related_post->title}}</a></h4>    

                                  </div>

                                  @endforeach

                              </div>
                            </div>

              						<h4 class="relatedText"> What do you think? </h4>

                          <div id="mydiv">
                          <div></div>
                          </div>
                          <script>
                          $(document).ready(function(){
                            var mydiv = document.getElementById("mydiv");  
                            mydiv.innerHTML = "<fb:comments href='" + document.location.href + "' num_posts='10' width='739'></fb:comments>";  
                            FB.XFBML.parse(mydiv);  
                          });
                          </script>
                  </div>

                  </div><!-- .postcontent end -->
                  </div>      

<script>
$(document).ready(function(){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
        post_id = '{{$post->id}}',
        parent = 0;
});

function fbShare(title, descr, winWidth, winHeight) {      

  var url  = window.location.href;
  var title = $(".entry-title h2").text();
  var image = $('#featIMG').attr('src');
  var winTop = (screen.height / 2) - (winHeight / 2);
  var winLeft = (screen.width / 2) - (winWidth / 2);
  window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,scrollbars=1,status=0,width=' + winWidth + ',height=' + winHeight);
}
</script>


@endsection

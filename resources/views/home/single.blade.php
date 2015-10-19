@extends('home.layout')

@section('fb_og')
<meta property="og:type" content="website">
<meta property="og:image" content="{{ url('uploads') }}/{{ $post->feat_image_url }}"/>
<link rel="image_src" href="{{ url('uploads') }}/{{ $post->feat_image_url }}"/>
<meta property="og:title" content="{{$post->title}}" />
@endsection

@section('content')

<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<style>
    .single{
      padding-top: 0;
      padding-right: 0;
      margin-top: -1px;
    }
    body{
      background-color: #ECECEC;
    }
    .left{
      padding-left: 15px;
    }   
</style>



 <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

      <!-- LEFT START -->
      <div class="left single">
  
          <div class="bigOuter">
            <div class="bigInner">
              <img src="{{ url('uploads') }}/{{ $post->feat_image_url }}" alt="">
            </div>
          </div>
          <div class="singleheadcontent">
            <h1> {{$post->title}} </h1>
            <ul class="meta">
                <li> <a href="{{url('')}}/{{$post->cat_slug}}" class="red"> {{$post->cat_name}} </a></li>
                <li><i class="icon-line2-clock"></i> 6th October 2015</li>     
                <li><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="<?php echo $actual_link ?>">0</span>   
                 </li>                                                       
            </ul>
           
          </div>
          <div class="singlebodycontent">
          
          <div class="sharecountbox">
           <div id="demo1" data-url="<?php echo $actual_link ?>" data-text="" data-lol='{{$post->id}}' data-title="share"></div>
           <span class="capt"> Shares </span>
           </div>


            <div class="social-sharing" data-permalink="<?php echo $actual_link ?>">                  
                <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link ?>" class="share-facebook">
                  <span class="fa fa-facebook" aria-hidden="true"></span>
                  <span class="share-title">Share</span>
                  <span class="share-count">0</span>
                </a>
              
                <a target="_blank" href="http://twitter.com/share?url=<?php echo $actual_link ?>&amp;text={{$post->title}}&amp;" class="share-twitter">
                  <span class="fa fa-twitter" aria-hidden="true"></span>
                  <span class="share-title">Tweet</span>
                  <span class="share-count">0</span>
                </a>
            </div>


            <div style="clear:both;"></div>


            
              <p><b> {{$post->introduction}}  </b></p>
              {!! $post->content !!}

               @if($posts_poll_answers2 != 0)
                <div class="pollwrapper">
                  <div class="inner">
                    <span class="total"> 1,000+ VOTES SO FAR </span>
                    <h2>
                    @if($posts_poll != null)
                     {{$posts_poll->poll_question}}
                    @endif
                    </h2>

                    <!-- <div class="optionbox">
                      <ul>
                        @foreach($posts_poll_answers as $posts_poll_answer)
                        <li> <a href=""> <div class="round">&nbsp;</div> {{$posts_poll_answer->poll_answer}} </a> </li>
                        @endforeach
                      </ul>
                    </div> -->

                    <div class="optionbox2">
                      <ul>
                      @foreach($posts_poll_answers as $posts_poll_answer)
                         @if(count($posts_poll_answers) == 2)
                            <li> <a href="" class="yes"> {{$posts_poll_answer->poll_answer}} </a> </li>
                         @else
                            <li> <a href=""> <div class="round">&nbsp;</div> {{$posts_poll_answer->poll_answer}} </a> </li>
                         @endif
                      @endforeach                                          
                      </ul>
                    </div>

                  </div>
                </div>
                @endif


                <div class="pollwrapper">
                  <div class="inner">
                    <span class="total"> 1,000+ VOTES SO FAR </span>
                    <h2> ISIS Leader Might Have Just Been Blown Up In An Air Strike </h2>
       
                    <div class="optionbox3">
                      <p> Yes - 78% </p>
                      <div class="votebar">
                        <div class="votecount"></div>
                      </div>
                      <br />
                      <p> No - 78% </p>
                      <div class="votebar">
                        <div class="votecount"></div>
                      </div>

                    </div>

                  </div>
                </div>


                <div class="clearfix"></div>

              @if($next_post != null)
               <div class="nextPost">
                   <div class="arrow_box">                                          
                        <a href="{{url('')}}/{{ $next_post->cat_slug }}/{{ $next_post->slug }}"><span> Next </span> {{ $next_post->title }} <img src="{{ asset('images/elipssis.jpg') }}" alt="" />  </a>                                                                                                                           
                  </div>
              </div>
              @endif

              <div class="social-sharing" data-permalink="<?php echo $actual_link ?>">                  
                <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link ?>" class="share-facebook">
                  <span class="fa fa-facebook" aria-hidden="true"></span>
                  <span class="share-title">Share</span>
                  <span class="share-count">0</span>
                </a>
              
                <a target="_blank" href="http://twitter.com/share?url=<?php echo $actual_link ?>&amp;text={{$post->title}}&amp;" class="share-twitter">
                  <span class="fa fa-twitter" aria-hidden="true"></span>
                  <span class="share-title">Tweet</span>
                  <span class="share-count">0</span>
                </a>
            </div>
            
            <div class="clearfix"></div>

           

                       <h4 class="relatedText" style="margin-top: 35px;"> From around the web </h4>
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

                              <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 relateWrapper">
                                  
                                  <a href="{{url('')}}/{{$related_post->cat_slug}}/{{$related_post->slug}}">
                                   <img src="{{url('uploads')}}/{{$related_post->feat_image_url}}" alt="Blog Single"  style="width:100%; border-bottom: 3px solid rgb(183, 8, 8);">
                                  </a>

                                  <h4><a href="{{url('')}}/{{$related_post->cat_slug}}/{{$related_post->slug}}">{{$related_post->title}}</a></h4>    

                              </div>

                              @endforeach

                              

                          </div>
                        </div>
                        
                        <div>                         
                          <script src="//go.padstm.com/?id=411724"></script>
                        </div>


                      <h4 class="relatedText" style="margin-top: 30px;"> What do you think? </h4>

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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{ asset('js/jquery.sharrre.js') }}"></script>
  <script>
      $(document).ready(function(){

          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
              post_id = '{{$post->id}}',
              parent = 0;

              $('#demo1').sharrre({
                share: {
                  googlePlus: true,
                  facebook: true,
                  twitter: true
                },
                buttons: {
                  googlePlus: {size: 'tall', annotation:'bubble'},
                  facebook: {layout: 'box_count'},
                  twitter: {count: 'vertical', via: '_JulienH'}
                },
                // hover: function(api, options){
                //   $(api.element).find('.buttons').show();
                // },
                // hide: function(api, options){
                //   $(api.element).find('.buttons').hide();
                // },
                enableTracking: true
              });


        $('p iframe').wrap( "<div class='video-container'></div>");

      });

     
  </script>

      </div>
 </div>

@endsection

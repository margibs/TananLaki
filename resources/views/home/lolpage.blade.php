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
    body{
      background-color: #ECECEC;
    }
    .single{
      padding-top: 0;
      padding-right: 0;
      margin-top: -1px;
    }
    .bgwhite video, .bgwhite img{
      width: auto;
    }
    .lolstream{
      padding-bottom: 20px;
    }
    .lolstreamtitle{
      margin-bottom: 0;
    }    
    .social-sharing{
      padding-bottom: 0;
      padding-top: 23px;
    }
    .relatedText{      
      text-align: left;      
    }
    .left{      
      border-right: 1px solid #ECECEC;
      background-color: transparent;
    }
</style>

<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-md-offset-1 col-lg-offset-1">
  <div class="left single">


      <div class="posts">

              <div class="bgwhite">                          

                    <div class="loldetails">
                      <h2 class="lolstreamtitle"> {{$post->title}} </h2>                          

                        <div class="sharecountbox" style="margin-top: 15px;">
                               <div id="demo1" data-url="<?php echo $actual_link ?>" data-text="" data-lol="{{$post->id}}" data-title="share"></div>
                               <span class="capt"> Shares </span>
                              </div>

                   
                        <div class="social-sharing" data-permalink="<?php echo $actual_link ?>">                  
                            <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link ?>" class="share-facebook">
                              <span class="fa fa-facebook" aria-hidden="true"></span>
                              <span class="share-title">Share</span>
                              <span class="share-count">0</span>
                            </a>
                          
                            <a target="_blank" href="http://twitter.com/share?url=<?php echo $actual_link ?>&amp;text={{$post->title}}" class="share-twitter">
                              <span class="fa fa-twitter" aria-hidden="true"></span>
                              <span class="share-title">Tweet</span>
                              <span class="share-count">0</span>
                            </a>
                        </div>
                        
                    </div>

                    <div class="lolstream">
                       {!! $post->content !!} 
                        <p class="desc"> {{$post->introduction}} </p>
      
                        <div style="text-align:left;margin-bottom:30px;">
                            @if($next_post != null)
                             <div class="nextPost">
                                 <div class="arrow_box">                                          
                                      <a href="{{url('')}}/{{ $next_post->cat_slug }}/{{ $next_post->slug }}"><span> Next </span> {{ $next_post->title }} 
                                      <!-- <img src="{{ asset('images/elipssis.jpg') }}" alt="" />   -->
                                      </a>                                                                                                                           
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
                      </div>
                  
                        <h4 class="relatedText"> What do you think? </h4>

                        <div id="mydiv">
                          <fb:comments href="http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" num_posts="10" width="739" fb-xfbml-state="rendered" class="fb_iframe_widget"><span style="height: 175px; width: 735px;"><iframe id="f3e54f9c6c" name="f160508a1" scrolling="no" title="Facebook Social Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=907091149365288&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6brUqVNoWO3.js%3Fversion%3D41%23cb%3Df1c75308ac%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff2b9b8308%26relation%3Dparent.parent&amp;href=http%3A%2F%2Flocalhost%2Falllad%2Fpublic%2Fnews%2Fcara-delevingne-says-she-prefers-being-naked-to-wearing-clothes&amp;locale=en_US&amp;numposts=10&amp;sdk=joey&amp;version=v2.2&amp;width=739" style="border: none; overflow: hidden; height: 175px; width: 735px;"></iframe></span></fb:comments>
                        </div>
                        <script>
                        var mydiv = document.getElementById("mydiv");  
                        mydiv.innerHTML = "<fb:comments href='" + document.location.href + "' num_posts='10' width='600'></fb:comments>";  
                        FB.XFBML.parse(mydiv);  
                        </script>            
        
                    </div>

                    </div>                    
      </div>

  </div>
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

    });

   
</script>

@endsection
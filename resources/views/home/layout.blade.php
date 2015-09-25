
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AllLad" />

    @yield('fb_og')

    <!-- Stylesheets
    ============================================= -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css"> -->
    
    <!--  <link rel="stylesheet" href="{{url('')}}/{{ elixir('css/all.css') }}" type="text/css" />  -->
  
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />     
    <link rel="stylesheet" href="{{ asset('style.css') }}" type="text/css" />           
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" type="text/css" />             
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />    
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css" /> 
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('myStyle.css') }}" type="text/css" />


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js"></script>
    -->
    <script type="text/javascript" src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.1/isotope.pkgd.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Document Title
    ============================================= -->
    <title> ALLLAD </title>
  
</head>

<body class="stretched no-transition">
<div id="fb-root"></div>

<script>
  window.fbAsyncInit = function() {

    FB.init({
      appId      : '809770709118677',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.2' // use version 2.2
    });

    FB.getLoginStatus(function(response) {
      // statusChangeCallback(response);
      // console.log('getLoginStatus');
      // console.log(response.status);

      if(response.status == 'connected')
      {
        testAPI();
      }
      
    });

  };



  // Load the SDK asynchronously
  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      // console.log('Successful login for: ' + response.email);

      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

      $.ajax({ 
            type: 'post',
            url: "{{url('login/auto_login')}}",
            data: {_token: CSRF_TOKEN,'email' : response.email}, 
            success: function(response)
            {

              if(response == 'true')
              {
                location.reload();
              }
              
            }
          });
    });
  }
</script>



    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header" class="dark floating-header" data-sticky-class="dark" style="background:#000 url( {{ asset('images/blackboard.jpg') }} ) top center;">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="{{ url('/') }}" class="standard-logo" data-dark-logo="{{ asset('images/logo.png') }}"><img src="{{ asset('images/logo.png') }}" alt="Alllad Logo"></a>
                        <a href="{{ url('/') }}" class="retina-logo" data-dark-logo="{{ asset('images/logo.png') }}"><img src="{{ asset('images/logo.png') }}" alt="Alllad Logo"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" class="dark">

                        <ul>
                            @foreach($categories as $category)
                                <li class="current"><a href="{{url('')}}/{{$category->slug}}" style="line-height: 56px;"><div>{{$category->name}}</div></a></li>
                            @endforeach
                            <li  class="showLogin"><a href="#"><i class="icon-lock"></i> Login </a></li>
                        </ul>


                        <!-- Top Search
                        ============================================= -->
                        <div id="top-search">



                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="{{url('search')}}" method="get">
                                <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                            </form>

                        </div>
                        <!-- #top-search end -->

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->
        

        <div class="clearfix"></div>

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap padding40">
          
                
                <div class="container clearfix">

                    <div class="row">

                      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 padRight0">                    
                         <div class="mainPostWrapper">
                            @yield('content')
                          </div>
                      </div>
                                          
                      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 padLeft0 padRight0" style="background-color: #F7F7F7;margin-top: 10px;">            

                          <div class="sidebarHead">
                            <h5 class="sidebarTitle">Latest Articles</h5>
                          </div>
                          
                          <div style="background-color:#f7f7f7;">                            
                            @foreach($side_bar_posts as $side_bar_post)
                              <div class="trendingWrapper">
                                    <!-- <a href="{{url('')}}/@if($side_bar_post->name != ''){{strtolower($side_bar_post->name)}}@else{{strtolower($side_bar_post->categories2->name)}}@endif/{{$side_bar_post->slug}}">
                                        <img src="{{url('uploads')}}/{{$side_bar_post->feat_image_url}}" alt="">                                   
                                    </a> -->
                                      <p>
                                          <a href="{{url('')}}/@if($side_bar_post->name != ''){{strtolower($side_bar_post->name)}}@else{{strtolower($side_bar_post->categories2->name)}}@endif/{{$side_bar_post->slug}}">  {{$side_bar_post->title}}</a>
                                      </p>
                              </div> 
                            @endforeach
                          </div>
                            

                          <br />                         
                          <div class="socials">
                            <div>
                              <div class="fb-page" data-href="https://www.facebook.com/allladmag" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/allladmag"><a href="https://www.facebook.com/allladmag">Facebook</a></blockquote></div></div>
                            </div>                        

                            <div class="wrappers">
                              <a class="twitter-follow-button" href="https://twitter.com/allladmag" data-size="large" data-show-count="true"> Follow @AllladMag </a>
                            </div>                           
                          
                            <!--<script src="https://apis.google.com/js/platform.js" async defer></script>
                            <div class="g-follow" data-href="https://plus.google.com/103370989220278330207" data-height="24" data-annotation="bubble" data-rel="author"></div>
                            <div style="margin:15px;"></div>-->
                             <div class="wrappers">
                              <script src="https://apis.google.com/js/platform.js"></script>                          
                              <div class="g-ytsubscribe" data-channelid="UCMt-_Kfo450vmpFeHJt3tIw" data-layout="full" data-count="default"></div>
                             </div>
                            </div>

                          </div>

                      </div>

                    </div>

                </div>

            </div>

        </section><!-- #content end -->

     

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

        <!-- Footer
        ============================================= -->
        <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        Copyrights © 2015 All Rights Reserved.<br>
                        <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
                            <a href="https://www.facebook.com/allladmag" class="social-icon si-small si-borderless si-facebook" target="_blank">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="https://twitter.com/allladmag" class="social-icon si-small si-borderless si-twitter" target="_blank">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="https://plus.google.com/u/0/b/106998885981169968912/106998885981169968912/about/p/pub" class="social-icon si-small si-borderless si-gplus" target="_blank">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>
                            <a href="#" class="social-icon si-small si-borderless si-email2">
                                <i class="icon-email2"></i>
                                <i class="icon-email2"></i>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

    <!-- Footer Scripts
    ============================================= -->    
    <script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('js/jquery.sharrre.js') }}"></script> -->

    <script>
       $(document).ready( function() {

        // $('.grid').isotope({
        //   layoutMode : 'masonry'
        // })

        // $('.grid').isotope({
        //   itemSelector: '.grid-item',
        //   percentPosition: true,
        //   masonry: {
        //     // use outer width of grid-sizer for columnWidth
        //     columnWidth: '.grid-sizer'
        //   }
        // })

        // init Isotope
        var $grid = $('.grid').isotope({
          itemSelector: '.grid-item',
          percentPosition: true,
          masonry: {
            // use outer width of grid-sizer for columnWidth
            columnWidth: '.grid-sizer'
          }
        });
        // layout Isotope after each image loads
        $grid.imagesLoaded().progress( function() {
          $grid.isotope('layout');
        });
                
        // var $grid = $('.grid').masonry({

        //   itemSelector: '.grid-item',
        //   columnWidth: 270
           
        //   // itemSelector: '.grid-item',
        //   // columnWidth: '.grid-sizer',
        //   // percentPosition: true
           
        // });
        // $grid.imagesLoaded().progress( function() {
        //   $grid.masonry('layout');
        // });
        

      

      });


      window.twttr = (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0],
        t = window.twttr || {};
      if (d.getElementById(id)) return t;
      js = d.createElement(s);
      js.id = id;
      js.src = "https://platform.twitter.com/widgets.js";
      fjs.parentNode.insertBefore(js, fjs);
     
      t._e = [];
      t.ready = function(f) {
        t._e.push(f);
      };
     
      return t;
      }(document, "script", "twitter-wjs"));
    </script>

</body>
</html>

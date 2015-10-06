
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AllLad" />
    <meta name="propeller" content="18cbecba5946cbcf8014a1a9c091968e" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    @yield('fb_og')

    <!-- Stylesheets
    ============================================= -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css"> -->
    
    <!--  <link rel="stylesheet" href="{{url('')}}/{{ elixir('css/all.css') }}" type="text/css" />  -->
  
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />     
    <link rel="stylesheet" href="{{ asset('style.css') }}" type="text/css" />           
    <link rel="stylesheet" href="{{ asset('css/social-buttons.css') }}" type="text/css" /> 
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
    <script type="text/javascript" src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.1/isotope.pkgd.min.js"></script>
    -->
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Document Title
    ============================================= -->
    <title> ALLLAD </title>


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-57877931-12', 'auto');
      ga('send', 'pageview');

    </script>

  
</head>

<body class="stretched no-transition">
<div id="fb-root"></div>

<script>
  // Load the SDK asynchronously
  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

  window.fbAsyncInit = function() {

    FB.init({
      appId      : '907091149365288',
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
                      

                      <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-md-offset-1 col-lg-offset-1 padRight0">                    
                          <div class="mainPostWrapper">
                            @yield('lol_content')
                          </div>
                      </div>

                      <div id="defaultBlogView" class="col-xs-12 col-sm-12 col-md-9 col-lg-9 padRight0">                    
                          <div class="mainPostWrapper">
                            @yield('content')
                          </div>
                      </div>
                                          
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 padLeft0 padRight0" style="background-color: #F7F7F7;">            
                          
                                    <div class="socials">
                                        <div class="wrappers">
                                          <h2> Like Us on facebook! </h2>
                                          <div class="fb-page" data-href="https://www.facebook.com/AllLad-716294001804336" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/allladmag"><a href="https://www.facebook.com/allladmag">Facebook</a></blockquote></div></div>
                                        </div>                        

                                        <div class="wrappers">
                                        <h2> Follow us on Twitter! </h2>
                                          <a class="twitter-follow-button" href="https://twitter.com/allladmag" data-size="large" data-show-count="true"> Follow @AllladMag </a>
                                        </div>                           
                                                        

                                        <div class="sidebarHead">
                                          <h5 class="sidebarTitle"> You've Missed </h5>
                                        </div>
                          
                                    <div style="background-color:#f7f7f7;padding-bottom: 10px;">                            
                                      @foreach($side_bar_posts as $side_bar_post)
                                        <div class="trendingWrapper">
                                              <a href="{{url('')}}/{{strtolower($side_bar_post->cat_slug)}}/{{$side_bar_post->slug}}">
                                                  <img src="{{url('uploads')}}/{{$side_bar_post->feat_image_url}}" alt="">              
                                                <p>
                                                   {{$side_bar_post->title}}
                                                </p>
                                              </a> 
                                        </div> 
                                      @endforeach
                                    </div>

                                    <br />
 
                                    <!-- This div is used to indicate the original position of the scrollable fixed div. -->
                                    <div class="scroller_anchor"></div>
                                     
                                    <!-- This div will be displayed as fixed bar at the top of the page, when user scrolls -->
                                    <div class="scroller">                                       
                                        <div id="contentclick25571"></div>
                                        <script type="text/javascript">
                                            (function() {
                                                var data =
                                                {
                                                    pub_id: "8270",w_id: "25571",pw: "531edb2f13f216", cbust: (new Date()).getTime()
                                                };
                                         if (typeof widgetCheck25571 === 'undefined')   {
                                                var u="";
                                                for(var key in data){u+=key+"="+data[key]+"&"}
                                                u=u.substring(0,u.length-1);  
                                                var a = document.createElement("script");
                                                a.type= 'text/javascript';
                                                a.src = "https://api.contentclick.co.uk/pub_serve.php?" + u;
                                                a.async = true;  
                                                document.getElementById("contentclick25571").appendChild(a);
                                         window.widgetCheck25571 = "set";
                                         }
                                            })();  
                                        </script>
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
                            <a href="https://www.facebook.com/AllLad-716294001804336" class="social-icon si-small si-borderless si-facebook" target="_blank">
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
    <script type="text/javascript" src="{{ asset('js/social-buttons.js') }}"></script>

    <script>
       $(document).ready( function() {

        // This function will be executed when the user scrolls the page.
        $(window).scroll(function(e) {
            // Get the position of the location where the scroller starts.
            var scroller_anchor = $(".scroller_anchor").offset().top;
            
            // Check if the user has scrolled and the current position is after the scroller start location and if its not already fixed at the top 
            if ($(this).scrollTop() >= scroller_anchor && $('.scroller').css('position') != 'fixed') 
            {    // Change the CSS of the scroller to hilight it and fix it at the top of the screen.
                $('.scroller').css({                              
                    'position': 'fixed',
                    'top': '0px',              
                    'margin-top': '60px'
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
        // var $grid = $('.grid').isotope({
        //   itemSelector: '.grid-item',
        //   percentPosition: true,
        //   masonry: {
        //     // use outer width of grid-sizer for columnWidth
        //     columnWidth: '.grid-sizer'
        //   }
        // });
        // // layout Isotope after each image loads
        // $grid.imagesLoaded().progress( function() {
        //   $grid.isotope('layout');
        // });
                
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


<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AllLad" />
    <meta name="propeller" content="18cbecba5946cbcf8014a1a9c091968e" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible">    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    @yield('fb_og')

    <!-- Stylesheets
    ============================================= -->
    <link rel="stylesheet" href="{{url('')}}/{{ elixir('css/all.css') }}" type="text/css" />
<!--     <link rel="stylesheet" href="{{ asset('css/reset.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grid12.css') }}">
    <link rel="stylesheet" href="{{ asset('css/social-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('myStyle.css') }}">
 -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>        
    <script type="text/javascript">
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='/js/jquery.js' type='text/javascript'%3E%3C/script%3E"));
    }
    </script>
    -->
    
    <script src="{{ asset('js/jquery.js') }}"></script>       
    <script src="{{ asset('js/jquery.sharrre.js') }}"></script>       
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>   

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
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=809770709118677";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</script>
  
 
  <!-- <nav class="pushy pushy-left">
   <ul>        
      @foreach($categories as $category)
          <li><a href="{{url('')}}/{{$category->slug}}"> {{$category->name}} </a></li>
      @endforeach              
    </ul>  
  </nav> -->

  <div class="menuoverlay overlay-hugeinc">
    <button type="button" class="overlay-close">Close</button>
    <div class="search">
      <a href=""><i class="fa fa-search"></i></a>
      <form action="{{url('search')}}" method="get">
        <input type="text" name="q" placeholder="Search">
      </form>
    </div>
    <nav>      
      <ul>
        <li><a href="{{ url('/') }}"> Home </a></li>
        @foreach($categories as $category)
          <li><a href="{{url('')}}/{{$category->slug}}"> {{$category->name}} </a></li>
        @endforeach   
    </nav>
  </div>

  <header>
    <div class="container">
      <div class="row no-gutters">
        <div class="col-xs-12">
           <div id="trigger-overlay" class="menu-btn"> <i class="fa fa-bars"></i> </div>
           <a href="{{ url('/') }}"> <img src="http://alllad.com/images/logo.png" alt=""> </a>            
             <div class="searchbox">
               <a href=""> <i class="fa fa-search"></i> </a>
               <form action="{{url('search')}}" method="get">
                <input type="text" name="q" />
              </form>
             </div>
             <ul>        
                @foreach($categories as $category)
                    <li><a href="{{url('')}}/{{$category->slug}}"> {{$category->name}} </a></li>
                @endforeach              
              </ul>  

        </div>
      </div>
    </div>
     
  </header>


  <!-- Site Overlay -->
  <div class="site-overlay"></div>

  <div id="wrapper">
    <div class="container paddingtop">
      <div class="row no-gutters">
       
         
          @yield('lol_content')
          @yield('content')             
    

          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 hidden-xs hidden-sm">

            <!-- RIGHT START -->
            <div class="right">

                

              <!-- @if(!Request::is('lol*')) 
                <div class="scroller_anchor"></div>
                <div class="scroller"> 
              @endif  -->   
                  <div class="socials">
                    <h2> Follow us on Twitter! </h2>
                    <a class="twitter-follow-button" href="https://twitter.com/allladmag" data-size="large" data-show-count="true"> Follow @AllladMag </a>
                  </div>   

                  <div class="socials" style="padding-top: 10px;">
                    <h2> Like us on Facebook! </h2>
                    <div class="fb-page fbBig" data-href="https://www.facebook.com/AllLad-716294001804336" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/allladmag"><a href="https://www.facebook.com/allladmag">ALLLAD</a></blockquote></div></div>                    
                  </div>

                       
                  <div class="missed">
                    <h2> You've Missed </h2>  
                    <ul>
                    @foreach($side_bar_posts as $side_bar_post)
                      <li> 
                        <a href="{{url('')}}/{{strtolower($side_bar_post->cat_slug)}}/{{$side_bar_post->slug}}">
                        <img src="{{url('uploads')}}/{{$side_bar_post->thumb_feature_image}}" alt="">
                        {{$side_bar_post->title}} </a>
                      </li>
                    @endforeach                      
                    </ul>
                  </div>
                
                @if(Request::is('lol*')) 
                  <div class="scroller_anchor"></div>
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
                  
              @endif  

            
             <!--  @if(!Request::is('lol*'))  -->
                </div>
              <!-- @endif -->
                


              </div>
            </div>
      </div>
    </div>

    <div class="container-fluid" style="background-color: #000;margin-top: -1px;">
        <div class="container">
            <div class="row">
              <div class="col-xs-12">
               <footer>
                  <ul>
                    <li> <a> ALLLAD &copy; 2015 </a> </li>
                    <li> <a href=""> Contacts </a> </li>
                    <li> <a href=""> Privacy </a> </li>
                    <li> <a href=""> About </a> </li>
                  </ul>
                </footer> 
              </div>  
            </div>
        </div>
    </div>
  </div>


  <a href="#0" class="cd-top"> <i class="fa fa-angle-up"></i> </a>
  
  <script src="{{ asset('js/myJs.js') }}" async></script>
  <script src="{{ asset('js/social-buttons.js') }}" async></script>
  <!--<script src="{{ asset('js/pushy.min.js') }}"></script>-->
  <script src="{{ asset('js/classie.js') }}" async></script>
  <script src="{{ asset('js/demo1.js') }}" async></script>

  <script>
      // Back to top           
      var offset = 300,            
      //offset_opacity = 1200,            
      scroll_top_duration = 700,           
      $back_to_top = $('.cd-top');

      $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        // if( $(this).scrollTop() > offset_opacity ) { 
        //   $back_to_top.addClass('cd-fade-out');
        // }
      });

      //smooth scroll to top
      $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
          scrollTop: 0 ,
          }, scroll_top_duration
        );
      });
  </script>


</body>
</html>

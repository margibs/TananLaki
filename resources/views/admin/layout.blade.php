
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Lilotime" />

    <!-- Stylesheets
    ============================================= -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />
     
    <link rel="stylesheet" href="{{ asset('nexuspress/canvasStyle.css') }}" type="text/css" /> 
    <link rel="stylesheet" href="{{ asset('nexuspress/nexuspress.css') }}" type="text/css" />   
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" type="text/css" /> 

    <link rel="stylesheet" href="{{ asset('css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="{{ asset('nexuspress/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.uploadfile.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('nexuspress/js/plugins.js') }}"></script>

    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    <!-- Document Title
    ============================================= -->
    <title> ALLLAD </title>

</head>

<body class="stretched side-header no-transition">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">
        
          <!-- Header
        ============================================= -->
        <header id="header" class="no-sticky">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo" class="nobottomborder">
                        <a href="index.html" class="standard-logo" data-dark-logo="{{ asset('images/NB-logo-dark.jpg') }}"><img src="{{ asset('images/NB-logo-dark.jpg') }}" alt=""></a>
                        <a href="index.html" class="retina-logo" data-dark-logo="{{ asset('images/NB-logo-dark.jpg') }}{{ asset('images/NB-logo-dark.jpg') }}"><img src="{{ asset('images/NB-logo-dark.jpg') }}" alt=""></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">

                        <ul>
                             <li class="
                                 @if(Request::is('admin/posts*')){{'current'}}
                                 @endif">
                                <a>Post </a>

                                 <ul>
                                    <li><a href="{{ url('/admin/new_post') }}"><div> <i class="icon-line-square-plus"></i> Add New </div></a> </li>
                                    <li><a href="{{ url('/admin/posts') }}"><div> <i class="icon-paperclip"></i> Posts </div></a> </li> 
                                    <li><a href="{{ url('/admin/drafts') }}"><div> <i class="icon-line-marquee"></i> Drafts </div></a> </li> 
                                </ul>

                            </li>   
                            <li><a href="{{ url('admin/categories') }}"> Category </a></li>
                           <li class=" @if(Request::is('admin/links*')){{'current'}}@endif">
                                    <a>Widget</a>
                                     <ul>
                                        <li><a href="{{ url('/admin/links') }}"><div> <i class="icon-link"></i> All Links </div></a> </li> 
                                        <li><a href="{{ url('/admin/new_link') }}"><div> <i class="icon-line-square-plus"></i> Add New </div></a> </li>                                    
                                    </ul>
                            </li>
                            <li><a href="{{ url('admin/media_gallery') }}"> Gallery </a></li>
                            <li><a href="{{ url('admin/comments') }}"> Comments </a></li>
                            <li><a href="{{ url('admin/users') }}"> Users </a></li>
                        </ul>

                    </nav><!-- #primary-menu end -->

                    <div class="externalLinks">
                        <a href="{{ url('/')}}"> View Site </a> | <a href="#"> Logout </a>
                    </div>
                  
                </div>

            </div>

        </header><!-- #header end -->


        <!-- Content
        ============================================= -->
        <section id="content">

           <div class="content-wrap">

                <div class="container clearfix">
                    <div class="one_fourth nobottommargin col_last">
                        
                        @yield('content')
                
                    </div>

                </div> 
                
            </div>


        </section><!-- #content end -->

    </div><!-- #wrapper end -->


<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ asset('nexuspress/js/functions.js') }}"></script>
</body>
</html>




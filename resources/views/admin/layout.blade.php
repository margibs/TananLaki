
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

    <link rel="stylesheet" href="{{ asset('css/typeahead.tagging.css') }}" type="text/css" />

    @yield('header_links')
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="{{ asset('nexuspress/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.uploadfile.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('nexuspress/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/typeahead.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/typeahead.tagging.js') }}"></script>    

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
                    ============================================= 
                  

                    <div id="logo" class="nobottomborder">
                        <a href="index.html" class="standard-logo" data-dark-logo="{{ asset('images/NB-logo-dark.jpg') }}"><img src="{{ asset('images/NB-logo-dark.jpg') }}" alt=""></a>
                        <a href="index.html" class="retina-logo" data-dark-logo="{{ asset('images/NB-logo-dark.jpg') }}{{ asset('images/NB-logo-dark.jpg') }}"><img src="{{ asset('images/NB-logo-dark.jpg') }}" alt=""></a>
                    </div>

                      -->
                    
                    <!-- #logo end -->

                   <h2 style=
"
color: rgb(255, 255, 255);
display: block;
background: #0C0C0C   none repeat scroll 0% 0%;
text-align: center;
padding: 4px 0;
margin-bottom: 0;
font-weight: 400;
font-family: Oswald;

"> NexusPress </h2>

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">
                        <p> Main Menu </p>
                        <ul>
                             <li class="
                                 @if(Request::is('admin/posts*')){{'current'}}
                                 @endif">
                                <a><i class="icon-line-paper-stack"></i> Post </a>

                                 <ul>
                                    <li><a href="{{ url('/admin/new_post') }}"><div> <i class="icon-line-square-plus"></i> Add New </div></a> </li>
                                    <li><a href="{{ url('/admin/posts') }}"><div> <i class="icon-paperclip"></i> Posts </div></a> </li> 
                                    <li><a href="{{ url('/admin/drafts') }}"><div> <i class="icon-line-marquee"></i> Drafts </div></a> </li> 
                                    <li><a href="{{ url('/admin/trash') }}"><div> <i class="icon-trash"></i> Trash </div></a> </li> 
                                </ul>

                            </li>   
                          <li class="
                                 @if(Request::is('admin/categories*')){{'current'}}
                                 @endif"><a href="{{ url('admin/categories') }}"> <i class="icon-line-layers"></i> Category </a></li>
                           <li class=" @if(Request::is('admin/links*')){{'current'}}@endif">
                                    <a> <i class="icon-line-layout"></i> Widget</a>
                                     <ul>
                                        <li><a href="{{ url('/admin/links') }}"><div> <i class="icon-link"></i> All Links </div></a> </li> 
                                        <li><a href="{{ url('/admin/new_link') }}"><div> <i class="icon-line-square-plus"></i> Add New </div></a> </li>                                    
                                    </ul>
                            </li>

                            <li class="
                                 @if(Request::is('admin/media_gallery*')){{'current'}}
                                 @endif"><a href="{{ url('admin/media_gallery') }}"> <i class="icon-line-image"></i> Media Gallery </a></li>
                            <li class="
                                 @if(Request::is('admin/comments*')){{'current'}}
                                 @endif"><a href="{{ url('admin/comments') }}"> <i class="icon-line-speech-bubble"></i> Comments </a></li>
                            <li class="
                                 @if(Request::is('admin/users*')){{'current'}}
                                 @endif"><a href="{{ url('admin/users') }}"> <i class="icon-line-head"></i> Users </a></li>

                        </ul>

                        <p> Settings </p>

                        <ul>
                             <li class="
                                 @if(Request::is('admin/settings*')) 
                                    current 
                                 @endif">
                                 <a href="{{ url('admin/settings') }}"> <i class="icon-line2-settings"></i> General </a>
                            </li>
                        </ul>

                    </nav><!-- #primary-menu end -->            
                  
                </div>

            </div>

        </header><!-- #header end -->


        <!-- Content
        ============================================= -->
        <section id="content">

           <div class="content-wrap">

                <div class="container clearfix">

                    <div class="topmostMenu">
                        <div class="pull-left">
                            <ul class="nav nav-pills quickList">                               
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    Add New <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/admin/new_post') }}"> <i class="icon-line-paper-stack"></i> Post </a></li>
                                        <li><a href="{{ url('/admin/categories') }}"> <i class="icon-line-layers"></i> Category </a></li>
                                        <li><a href="{{ url('/admin/new_link') }}"> <i class="icon-link"></i> Links </a></li>                    
                                    </ul>
                                </li>
                            </ul>
                           
                         </div>

                         <div class="externalLinks">
                            <ul>                
                                <li><input id="adminSearch" type="text" placeholder="Search..." /></li>
                                <li><a href="{{ url('/') }}" target="_blank" data-tooltip="tooltip" title="Open Site"> <i class="icon-world"></i></a></li>
                                <li><a href="{{ url('/logout') }}" data-tooltip="tooltip" title="Logout"> <i class="icon-signout"></i></a></li>                                                
                            </ul> 
                         </div>
                         
                         <div class="pageTitle">  
                            <h2> @if(Request::is('admin')) Dashboard 
                                 @elseif (Request::is('admin/posts*')) <i class="icon-line-paper-stack"></i> Posts 
                                 @elseif (Request::is('admin/drafts*')) <i class="icon-line-paper"></i> Drafts 
                                 @elseif (Request::is('admin/trash*')) <i class="icon-line-trash"></i> Trash 
                                 @elseif (Request::is('admin/new_post*')) <i class="icon-line-paper-stack"></i> Add New Post
                                 @elseif (Request::is('admin/categories*')) <i class="icon-line-layers"></i> Categories 
                                 @elseif (Request::is('admin/links*')) <i class="icon-line-layout"></i> Widgets                                  
                                 @elseif (Request::is('admin/new_link*')) <i class="icon-line-layout"></i> Add New Widget
                                 @elseif (Request::is('admin/edit_link*')) <i class="icon-line-layout"></i> Edit Widget
                                 @elseif (Request::is('admin/media_gallery*')) <i class="icon-line-image"></i> Media Gallery                                  
                                 @elseif (Request::is('admin/comments*')) <i class="icon-line-speech-bubble"></i> Comments                                  
                                 @elseif (Request::is('admin/users*')) <i class="icon-line-head"></i> Users
                                 @elseif (Request::is('admin/settings*')) <i class="icon-line2-settings"></i> General Settings
                                 @endif </h2>
                         </div>
                    </div> 

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
@yield('footer_scripts')
</body>
</html>





<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Alllad" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />    

    <!-- Stylesheets
    ============================================= -->

    <link rel="stylesheet" href="{{ asset('nexuspress/css/grid12.css') }}">    
    <link rel="stylesheet" href="{{ asset('nexuspress/css/reset.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('nexuspress/css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('nexuspress/css/modal.css') }}">    
    <link rel="stylesheet" href="{{ asset('nexuspress/nexuspress.css') }}">
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

    <!-- <link rel="stylesheet" href="{{ asset('nexuspress/css/typeahead.tagging.css') }}" type="text/css" /> -->  

    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>        
    <script type="text/javascript">
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='{{ asset('nexuspress/js/jquery.js') }}' type='text/javascript'%3E%3C/script%3E"));
    }
    </script>

    <!-- Document Title
    ============================================= -->
    <title> ALLLAD </title>

</head>

<div class="container">
    <div class="wrapper">

    <div class="offsetlinks"> 
          <ul>  
            <li><a href="{{ url('/') }}" target="_blank" data-tooltip="tooltip" title="Open Site"> <i class="icon-line-eye"></i></a></li>
            <li><a href="{{ url('/logout') }}" data-tooltip="tooltip" title="Logout"> <i class="icon-line-cross"></i></a></li>                                   
          </ul>
      </div>

      <div class="row no-gutters">
          <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
            <div class="left">
                <nav>
                  <ul>
                    <li> <a href="{{ url('/admin/posts') }}"> <i class="icon-line2-docs"></i> Posts </a> </li>
                    <li> <a href="{{ url('admin/categories') }}"> <i class="icon-line2-layers">  </i> Categories </a> </li>
                    <li> <a href="{{ url('admin/widgets') }}"> <i class="icon-line-grid"></i> Widgets </a> </li>
                    <li> <a href="{{ url('admin/media_gallery') }}"> <i class="icon-line-image"></i> Images </a> </li>
                    <li> <a href="{{ url('admin/comments') }}"> <i class="icon-line-speech-bubble"> </i> Comments  </a> </li>
                    <li> <a href="{{ url('admin/users') }}"> <i class="icon-line-head"></i> Users </a> </li>
            <!--         <li> <a href="{{ url('admin/settings') }}"> <i class="icon-line2-settings"></i> Settings </a> </li> -->
                  </ul>
                </nav>
            </div>
          </div> 
          <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
            <div class="right">               
                @yield('content')
            </div>    
          </div>
      </div>
    </div>
  </div>


<script>
  $('.searchlink').click(function(){
    $('.searchform').toggle();
    $('.searchbox').focus();

  })
</script>

</body>
</html>





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
    <link rel="stylesheet" href="{{ asset('css/reset.min.css') }}" type="text/css" />  
    <link rel="stylesheet" href="{{ asset('css/grid12.css') }}" type="text/css" />     

<style>

	body{
		background-color: #000;
		height: 100%;
	}
	.parentbox {
	    width:500px;
	    height:400px;
	    border-style:solid;
	    
	    text-align: center;  /* align the inline(-block) elements horizontally */
	    font: 0/0 a;         /* remove the gap between inline(-block) elements */
	}

	.parentbox:before {      /* create a full-height inline block pseudo-element */
	    content: ' ';
	    display: inline-block;
	    vertical-align: middle; /* vertical alignment of the inline element */
	    height: 100%;
	}

	.childbox {
	    display: inline-block;
	    vertical-align: middle;          /* vertical alignment of the inline element */
	    font: 16px/1 Arial, sans-serif;  /* reset the font property */
	    
	    padding: 5px;
	    border: 2px solid black;
	}
	@media screen and (max-width: 480px){
		img {
			width: 100%;
    		height: auto;
		}
	}
</style>

	<body>	
	
		<div class="container">
			<di class="row">
				<div class="col-xs-12">
					<div class="parentbox">
    					<div class="childbox">
					    	<img src="images/503cat.png" alt="" class="displayed">
					    </div>
					</div>
				</div>
			</di>
		</div>

	</body>
</html>



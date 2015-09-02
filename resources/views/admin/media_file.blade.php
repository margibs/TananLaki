
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
  
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
  
    <style>
      body{
          background-image: none;
      }
    </style>


</head>

<body class="stretched no-transition">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">
        
                <!-- Content
        ============================================= -->
        <section id="content">

           <div class="content-wrap">

                <div class="container">
                    <div class="row">
                    
                        <div class="col-xs-12 col-md-12">
                            
                            <form class="form-inline" method="POST" action="{{ url('admin/media_file_upload') }}" enctype="multipart/form-data">
                              {!! csrf_field() !!}
                              <div class="form-group">
                                <input type="file" name="file" id="fileupload" />
                              </div>
                              <div class="form-group">
                                 <input type="hidden" name="item_label" id="uploadName"  />
                              </div>
                              <input type="submit" value="Upload" class="button button3d" />
                            </form>
                            
            				      <div id="image_container">
                                    @foreach($media_files as $media_file)
                					         <div class="outer">
                                          <div class="inner">
                                            <img src="{{ url('/uploads') }}/{{$media_file->image_url}}" get-this="{{$media_file->image_url}}" />
                                          </div>                          
                                    </div>
                                    @endforeach
                				  </div>

                                <!-- <input type="Submit" value="Select" id="image_submit"> -->
                            </div>
                            

                          
                        
                        </div>

                    </div>
                </div>

        </section><!-- #content end -->

    </div><!-- #wrapper end -->
	
	<script>
	jQuery(document).ready(function(){

        $('#fileupload').on('change', function(e) {
          var filename = $('#fileupload').val().split('\\').pop();
          $('#uploadName').val(filename);
       });

		var url = '';
		// e.preventDefault();
        // e.returnValue = false;


		jQuery("#image_submit").attr('disabled','disabled');

		jQuery("#image_container").on("click", "img", function (event) {
            url = jQuery(this).attr('src');
            jQuery('.outer').removeClass('selected');
            jQuery(this).parents('.outer').addClass('selected');

		    jQuery("#image_submit").removeAttr('disabled');

            console.log(url);
            window.opener.CKEDITOR.tools.callFunction('1', url); 
            window.close();

		});

		// jQuery("#image_submit").on("click", function (event) {
		//   console.log(url);
  //           window.opener.CKEDITOR.tools.callFunction('1', url); 
  //           window.close();
		// });

		
	});
	</script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
</body>
</html>




@extends('admin.layout')

@section('content')

<style>
  #image_container .outer, #image_list .outer, #media_wrapper .outer {
    width: 160px;
  }
  #fileuploader{
    display: block;
    margin-bottom: 20px;
    margin-top: 20px;
    margin-right: 25px;
    margin-left: 0;
  }
  .panel{
    padding-left: 0;
  }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}" />


<div class="submenu">
                  
  <div class="searchform"> 
  <form action="">
    <a href=""> <i class="icon-angle-right"></i> </a>
    <input type="text" class="searchbox" />
  </form>
  </div>

  <ul>
    <li> <a href="{{ url('/admin/new_post') }}"> <i class="icon-line-square-plus"></i> Blog Post </a> </li>
    <li> <a href="{{ url('/admin/lol_post') }}"> <i class="icon-line2-emoticon-smile"></i> LOL Post </a> </li>    
    <li> <a href="{{ url('admin/categories') }}"> <i class="icon-line2-layers">  </i> Category </a> </li>                   
    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
  </ul>

</div>

<div class="row">
  
  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">  	

     <div id="media_wrapper">                    

	    @foreach($media_files as $media_file)
			<a href=""><div class="outer">
				<div class="inner">
					<img src="{{ url('/uploads') }}/{{$media_file->image_url}}" />
				</div>                          
			</div>
			</a>
			
		@endforeach 		
    
    </div>

    {!! $media_files->render() !!}    

  </div>

  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

      <div id="fileuploader">Upload</div>

      <div class="panel">
        <h6> Selected Image Details </h6>
        <div class="details">
        <span> Title </span>
        <p> I'm an image </p>
        <span> Dimension </span>
        <p> 500 x 205 </p>
        <span> Url </span>
        <input type="text" value="http://alllad.com/uploads/13484_super glue for eye drops.png">
        <a href="#" class="delete"> Delete </a>
        </div>                        
      </div>
   
  </div>

</div>


<script src="{{ asset('nexuspress/js/jquery.uploadfile.min.js') }}"></script>
<script>
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$("#fileuploader").uploadFile({
			url:"{{url('admin/ajax_upload_image')}}",
			fileName:"myfile",
			formData: { _token: CSRF_TOKEN },
			onSuccess:function(files,data,xhr,pd)
			{
				var parsed = JSON.parse(data);

				// var add_parent = 
				// template_for_media_file.replace(/--image_url--/ig, parsed.image_url)
				// .replace(/--id--/ig, parsed.id);

				$('#media_wrapper').prepend("<div class='outer'><div class='inner'><img src='{{ url('/uploads') }}/"+parsed.image_url+"'></div></div>");

			}
		});
	});
</script>

@endsection
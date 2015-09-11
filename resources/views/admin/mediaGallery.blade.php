@extends('admin.layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
	<br />
	<div id="contentMainWrapper" style="background:transparent;margin-top: 130px;">
		<div id="fileuploader">Upload</div>

		<div id="media_wrapper">
			@foreach($media_files as $media_file)
				<div class="outer">
					<div class="inner">
						<img src="{{ url('/uploads') }}/{{$media_file->image_url}}" />
					</div>                          
				</div>
				
			@endforeach
		</div>
	</div>

{!! $media_files->render() !!}

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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload Sample</title>
	<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.2/uploadfile.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.2/jquery.uploadfile.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	<div id="fileuploader">Upload</div>


<script>
$(document).ready(function()
	{

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$("#fileuploader").uploadFile({
		url:"{{url('ajax_upload_sample')}}",
			fileName:"myfile",
			formData: { _token: CSRF_TOKEN },
			onSuccess:function(files,data,xhr,pd)
			{
			    console.log(files);
			}
		});
	});
</script>
</body>
</html>
@extends('admin.layout')

@section('content')

    
    <h2 class="adminTitle"> Edit Link </h2> 
    
    
    <div class="clearfix"></div>

    <div class="col_three_fourth">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ url('admin/new_link') }}/{{$link->id}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input id="featured_image" type='hidden' name='image' value='{{$link->image}}'>
        <input type="text" name="url" value="{{$link->url}}" class="form-control newPost newPostBox" placeholder="Enter URL LINK here" />
        <br>
        <div id="editorcontainer" style="height:500px;border:1px solid #efefef;">
          <textarea name="description" id="editor1" rows="10" cols="80">{{$link->description}}</textarea>
        </div>
    </div>

    <div class="col_one_fourth col_last">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" style="font-family: Lato;font-weight:500!important;">Image </h2>
            </div>
            <div class="panel-body" style="padding-top: 0;">
                <a href="#" id="load_media_files" class="featImageButton"> <i class="icon-line-marquee-plus"></i> </a> 
              <div id="img_here">
                <img src="{{url('uploads')}}/{{$link->image}}" alt="">
              </div>         
            </div>
        </div>
    <input type="text" name="website_url" value="{{$link->website_url}}" class="form-control newPost newPostBox" placeholder="Website Name" />
        <div class="panel panel-default">
          
            <div class="panel-body">
                    <div class="controls">

            <label class="checkbox" for="published">
                <?php $check_visible = false; ?>
                @if($link->visible == 1)
                <?php $check_visible = true; ?>
                @endif
                {!! Form::checkbox('visible', 1,$check_visible) !!}Visible
            </label>
         
          </div>
              <input type="submit" value="Submit" class="button button-3d">
            </div>
        </div>
</form>
    </div>

    
<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Media File</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div id="fileuploader">Upload</div>
                    <div id="image_list">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='save_changes_modal'> Use Image </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="template_for_media_file" type="nexus/template">
<div class="outer">
<a href="#" class="remove_image" get-id="--id--">X</a>
<div class="inner">
<img src="{{ url('uploads') }}/--image_url--" get-this="--image_url--" />
</div>                          
</div>
</script>

<script>
$(document).ready(function(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
      template_for_media_file = $.trim($("#template_for_media_file").html());

  $("#fileuploader").uploadFile({
    url:"{{url('admin/ajax_upload_image')}}",
      fileName:"myfile",
      formData: { _token: CSRF_TOKEN },
      onSuccess:function(files,data,xhr,pd)
      {
        var parsed = JSON.parse(data);

          var add_parent = 
          template_for_media_file.replace(/--image_url--/ig, parsed.image_url)
          .replace(/--id--/ig, parsed.id);

          $('#image_list').prepend(add_parent);

      }
    });


  $('#load_media_files').on('click',function(){
    $('#image_list').html('');
      $.ajax({ 
        type: 'get',
        url: "{{url('admin/ajax_get_media_file')}}",
        success: function(response)
        {
          var parsed = JSON.parse(response);

            $.each( parsed, function( index, obj){

              var add_parent = 
                template_for_media_file.replace(/--image_url--/ig, obj.image_url)
                .replace(/--id--/ig, obj.id);

              $('#image_list').append(add_parent);

          });

        }
      });

    $('#myModal').modal('show');
  });

  $("#image_list").on('click','.remove_image',function() {

    var current_image = $(this);
    var image_id = current_image.attr('get-id');

    if(confirm("Are you sure to delete this image?") == true)
    {

      $.ajax({ 
        type: 'post',
        url: "{{url('admin/ajax_delete_image')}}",
        data: {_token: CSRF_TOKEN,'image_id' : image_id},
        success: function(response) 
        {
           current_image.parent().remove();
        }
      });
    }

    return false;
  });

  var url = '';
    $("#image_list").on("click", "img", function (event) {
        url = $(this).attr('get-this');
        $('.outer').removeClass('selected');
        $(this).parents('.outer').addClass('selected');
    });
  // Hide modal if "Okay" is pressed
    $('#myModal #save_changes_modal').click(function() {
        $('#myModal').modal('hide');
        $('#img_here').html("<img src='{{ url('uploads') }}/"+url+"'>");
        $('#featured_image').attr('value',url);
        console.log(url);
    });
});

</script>
@endsection
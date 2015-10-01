@extends('admin.layout')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <h2 class="adminTitle" style="margin-top:130px;"> </h2> 
    
    
    <div class="clearfix"></div>

    <div class="col_three_fourth" style="padding-left: 20px;">
  
      <form method="POST" action="{{ url('admin/new_post') }}/{{$post->id}}" enctype="multipart/form-data">
     
       @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        {!! csrf_field() !!}
        <input id="featured_image" type='hidden' name='feat_image_url' value='{{$post->feat_image_url}}'>
        <input type="hidden" id="widget_image_url" name="widget_image_url" value="{{$post->yt_image}}">
        <input type="text" name="title" class="form-control newPost newPostBox" value="{{$post->title}}" placeholder="Enter Title Here.." />
        <br>
        <div id="editorcontainer" style="height:500px;border:1px solid #efefef;">
          <textarea name="content" id="editor1" rows="10" cols="80">{!! $post->content !!}</textarea>
        </div>

        <h3> <i class="icon-line-flag"></i> Custom Introduction </h3>
        <textarea name="introduction" id="" class="excerptBox" style="height: 80px;">{{$post->introduction}}</textarea>
        
        <h3> <i class="icon-line-flag"></i> Add Custom Excerpt </h3>
        <textarea name="excerpt" id="" class="excerptBox">{{$post->excerpt}}</textarea>
        

    </div>

    <div class="col_one_fourth col_last" style="padding-right: 20px;">

            <div class="panel panel-default">
                  <div class="panel-heading">
                      <h2 class="panel-title">  Featured Image <a href="#" id="load_media_files" class="featImageButton"> <i class="icon-plus-sign"></i> </a>   </h2>
                  </div>
                  <div class="panel-body" style="padding-top: 0;">               
                    <div id="img_here">
                      <img src="{{url('uploads')}}/{{$post->feat_image_url}}" alt="">
                    </div>         
                  </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title" style="display: block;margin: 0 0 15px 0;text-align: center;"> Image after video play <a href="#" id="load_media_files2" class="featImageButton"> <i class="icon-plus-sign"></i> </a>  </h2>
                </div>
                <div class="panel-body" style="padding-top: 0;">
                      
                  <div id="img_here2">
                    <img src="{{url('uploads')}}/{{$post->yt_image}}" alt="">
                  </div>         
                </div>
            </div>
            
            <div class="panel panel-default">
              <div class="panel-heading">
                   <h2 class="panel-title">  Categories </h2>
              </div>
               <div class="panel-body">
                    <div class="control-group">
                      <div class="controls">
                          
                           @foreach($categories as $category)
                                
                                <?php $check = false; ?>

                                @if($category->post_id != null)
                                  <?php $check = true; ?>
                                @endif

                                {!! Form::checkbox('category_id[]', $category->id,$check) !!}                               
                                {{ $category->name }}
                                <br />  
                            @endforeach

                      </div>
                    </div>
                </div>
            </div>


       <div class="panel panel-default">
          <div class="panel-heading">
                <h2 class="panel-title"> Autopost </h2>
            </div>
            <div class="panel-body">
                  <div class="controls">
                     <label class="checkbox" for="published">
                      {!! Form::checkbox('shared_fb', 1,$shared_fb_status) !!} <i class="icon-facebook-sign"> </i>  Post on FB <br >
                      {!! Form::checkbox('shared_twitter', 1,$shared_twitter_status) !!} <i class="icon-twitter-sign"> </i>  Post on Twitter
                 </div>
            </div>
        </div>

        <div class="panel panel-default">
          
            <div class="panel-body">
                    <div class="controls">

            <label class="checkbox" for="published">
                <?php $check_publish = false; ?>
                @if($post->status == 1)
                <?php $check_publish = true; ?>
                @endif
                {!! Form::checkbox('status', 1,$check_publish) !!}Publish
               
                 <span> ( Uncheck to save as draft ) </span>
            </label>
         
          </div>
              
                <!-- <a href="#" class="button"> Publish Now </a> -->
              <input type="submit" value="Update Post" class="button button-3d" style="display: block;margin: 0 auto 15px auto;">
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

<script>
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  // CKEDITOR.replace( 'editor1',{
  //     filebrowserBrowseUrl : 'media_file',

  // });

  var editorElem = document.getElementById("editorcontainer");
   var editor = CKEDITOR.replace("editor1", { 
      filebrowserBrowseUrl : 'media_file',
      on : {
         // maximize the editor on startup
         'instanceReady' : function( evt ) {
            evt.editor.resize("100%", editorElem.clientHeight);
         }
      }
   });

  CKEDITOR.skinName = 'minimalist';

</script>




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
      template_for_media_file = $.trim($("#template_for_media_file").html()),
      load_file = 0;

  $('#load_media_files').on('click',function(){
    load_file = 1;
    $('#image_list').html('');
      $.ajax({ 
        type: 'get',
        url: "{{url('admin/ajax_get_media_file')}}",
        success: function(response)
        {

          console.log(response);
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

  $('#load_media_files2').on('click',function(){
      load_file = 2;
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
        if(load_file == 1)
        {
          $('#img_here').html("<img src='{{ url('uploads') }}/"+url+"'>");
          $('#featured_image').attr('value',url);
        }
        else if(load_file == 2)
        {
          $('#img_here2').html("<img src='{{ url('uploads') }}/"+url+"'>");
          $('#widget_image_url').attr('value',url);
        }
        
        load_file = 0;
    });
});

</script>
@endsection
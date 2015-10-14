@extends('admin.layout')

@section('content')

 <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- modal -->
    <div class="modal">
      <header class="modal-header">
        <h1 class="modal-header-title left"></h1>
        <button class="modal-header-btn modal-close" title="Close Modal"> <i class="icon-line-cross"></i> Close </button>
        <button class="modal-header-btn uploadbtn" title="Upload"  style="float:left;"> Upload </button>
        <button class="modal-header-btn modal-close" title="Close Modal"> Select </button>
      </header>
      <div class="modal-body">
        <section class="modal-content">      
            
            <div id="fileuploader">Upload</div>        
            <div id="image_list"></div>

        </section>
      </div>
    </div>
  <!-- modal -->

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
      <li> <a href="{{ url('/admin/posts') }}" class="active"> <i class="icon-paperclip"></i> All </a> </li>
      <li> <a href="{{ url('/admin/drafts') }}"> <i class="icon-line-marquee"></i> Draft </a> </li>
      <li> <a href="{{ url('/admin/trash') }}"> <i class="icon-trash"></i> Trash </a> </li>                    
      <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
    </ul>
    
  </div>

  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">

    <form method="POST" action="{{ url('admin/new_post') }}/{{$post->id}}" enctype="multipart/form-data">
       {!! csrf_field() !!}

        <input id="featured_image" type='hidden' name='feat_image_url' value='{{$post->feat_image_url}}'>
        <input type="hidden" id="widget_image_url" name="widget_image_url" value="{{$post->yt_image}}">

        @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

      <div class="panel">
        <h6> Select a category </h6>
        <ul class="categories">

<<<<<<< HEAD
          @foreach($categories as $category)              
              <?php $check = false; ?>

              @if($category->post_id != null)
                <?php $check = true; ?>
              @endif
              
              <li>
                <div>
                  <!-- <input id="option1" type="checkbox" name="field1" value="option"> -->
                    {!! Form::checkbox('category_id[]', $category->id,$check) !!}     
                  <label for="option1"><span><span></span></span> {{ $category->name }}   </label>
=======
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
                    @if($post->yt_image != '')
                    <img src="{{url('uploads')}}/{{$post->yt_image}}" alt="">
                    @endif
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
>>>>>>> f5f9d074760c104982b19a3be0627335c9b85170
                </div>
              </li>     
              
          @endforeach

                     
        </ul>
      </div>                    

      <div class="panel">
        <h6> <a title="Upload Image" id="load_media_files" class="featImageButton featimglink modal-trigger"> <i class="icon-line-plus"></i> Featured Image  </a> </h6>         
         <div id="img_here">
          <img src="{{url('uploads')}}/{{$post->feat_image_url}}" alt="">
         </div>     
      </div>

  <!--     <div class="panel">
        <h6> Image after video playback </h6>    
        <a id="load_media_files2" title="Upload Image" class="featImageButton featimglink"> <i class="icon-line2-plus"></i> </a>
         <div id="img_here2">
          @if($post->yt_image != '')
          <img src="{{url('uploads')}}/{{$post->yt_image}}" alt="">
          @endif
        </div>  
      </div>
 -->

      <div class="panel">
        <h6 style="margin-bottom: 15px;"> Auto Post </h6>
          <span class="switchtitle fb"> <i class="icon-facebook-sign" style="margin-right: 9px;"></i> Facebook </span>
          <div class="onoffswitch">
               {!! Form::checkbox('shared_fb', 1,$shared_fb_status, ['class'=>'onoffswitch-checkbox', 'ID'=>'myonoffswitch'] ) !!}            
              <label class="onoffswitch-label" for="myonoffswitch"></label>
          </div>

          <span class="switchtitle twitter"> <i class="icon-twitter"></i> Twitter </span>
          <div class="onoffswitch">
              {!! Form::checkbox('shared_twitter', 1,$shared_twitter_status, ['class'=>'onoffswitch-checkbox', 'ID'=>'myonoffswitch2'] ) !!}     
              <label class="onoffswitch-label" for="myonoffswitch2"></label>
          </div>
         
      </div>

      <div class="panel">
        <h6> Publish </h6>                    
        <span class="switchtitle twitter"> <i class="icon-line-marquee"></i> Update </span>


          <div class="onoffswitch">

              <?php $check_publish = false; ?>

                @if($post->status == 1)
                  <?php $check_publish = true; ?>
                @endif

              {!! Form::checkbox('status', 1,$check_publish, ['class'=>'onoffswitch-checkbox', 'ID'=>'myonoffswitch3']) !!}

              <label class="onoffswitch-label" for="myonoffswitch3"></label>
          </div>
        
          <button id="check_post" class="button button-3d"  style="display: none;">Check Post</button>
          <input id="check_post_submit" type="submit" value="Submit" class="submit">       
        
      </div>                    
  </div>

  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

      <div class="wysiwyg">                      
        <input type="text" value="{{$post->title}}" name="title" class="titlebox newPost newPostBox" placeholder="Enter Title Here.."  style="margin-bottom: 20px;" />                      
        
        <div id="editorcontainer" style="height:500px;border:1px solid #efefef;">
          <textarea name="content" id="editor1" rows="10" cols="80">{!! $post->content !!}</textarea>
        </div>

        <textarea name="introduction" id="" class="excerptBox" placeholder="Introduction">{{$post->introduction}}</textarea>
        <textarea name="excerpt" id="" class="excerptBox" placeholder="Exceprt">{{$post->excerpt}}</textarea>
        
           
      </div>

      </form>
  </div>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('nexuspress/js/draggabilly.pkgd.js') }}"></script>
<script src="{{ asset('nexuspress/js/modal.js') }}"></script>
<script src="{{ asset('nexuspress/js/jquery.uploadfile.min.js') }}"></script>
<script>
  $('.uploadbtn').click(function(){
    $('#fileuploader').toggle();
  });
  window.onload = function(e){         
      Modal.init();
  };
</script>



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
<img src="/uploads/--image_url--" get-this="--image_url--" />
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
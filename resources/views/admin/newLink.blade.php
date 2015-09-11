@extends('admin.layout')

@section('content')

    
    <h2 class="adminTitle"> New Link </h2> 
    
    
    <div class="clearfix"></div>

    <div class="col_half">
        <div id="contentMainWrapper" style="padding:20px;overflow:initial;">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ url('admin/new_link') }}" enctype="multipart/form-data" style="margin-bottom:0;">
                {!! csrf_field() !!}

                  <div class="form-group">
                    <label for="exampleInputEmail1"> Image URL </label>
                    <a href="#" id="load_media_files" class="featImageButton"> <i class="icon-plus-sign"></i> </a> 
                    <div id="img_here"></div>         
                    <input id="featured_image" type='hidden' name='image' value=''>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Ad Link URL </label>
                    <input type="text" class="form-control" name="url"  value="{{old('url')}}"  id="exampleInputEmail1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Ad Title </label>
                    <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="">
                  </div>          
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Ad URL Caption</label>
                    <input type="text" name="website_url" value="{{old('website_url')}}"  class="form-control newPost" id="exampleInputPassword1" placeholder="">
                  </div>                
                  <!-- <select name="" id="" style="padding: 3px 10px;margin-right: 20px;">
                      <option value=""> Select Country </option>
                  </select> -->   
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Select a country </label>
                    <div class="form-group">

                      <input id="demo" class="tags-input" value="" placeholder="Type and enter a country">

                    </div>
                  </div>          
                  
                  <label class="checkbox" for="published" style="display:inline-block;" class="pull-right" >
                        {!! Form::checkbox('visible', 1) !!} Make it visible
                  </label>        
                  <div class="clearfix"></div>
                  <input type="submit" value="Submit" class="button button-3d" style="margin-left: 0;">
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


var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

// var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
//   'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
//   'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
//   'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
//   'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
//   'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
//   'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
//   'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
//   'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
// ];

// $('#the-basics .typeahead').typeahead({
//   hint: true,
//   highlight: true,
//   minLength: 1
// },
// {
//   name: 'states',
//   source: substringMatcher(states)
// });


    // The source of the tags for autocompletion
    var tagsource = [
        'jquery-libs', 'jquery-multilingual-news',
        'jquert-typeahead-tagging', 'jquery-multilingual-tags',
        'jquery-forms-ajaxified', 'jquery-project-template',
        'jquery-development-fabfile', 'jquery-user-media',
        'jquery-feedback-form', 'jquery-review', 'jquery-hero-slider',
        'jquery-document-library', 'jquery-paypal-express-checkout'
    ]


    // Turn the input into the tagging input
    $('#demo').tagging(tagsource);


</script>
@endsection
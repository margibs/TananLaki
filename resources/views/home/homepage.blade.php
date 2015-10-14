
@extends('home.layout')

@section('content')


 <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

      <!-- LEFT START -->
      <div class="left single">

<div class="trending">
  <a href="http://alllad.com/banter/cheeky-morrisons-epically-fail-with-their-fanny-like-pizza-design">
    <img class="trendimgone" src="http://alllad.com/uploads/97083_pizza.jpg" alt=""></a>
    <img class="trendimgtwo" src="http://alllad.com/uploads/24883_pizza2.jpg" alt=""></a>
  <div class="details">
    <span> Today's trending </span>
    <h2><a href="http://alllad.com/banter/cheeky-morrisons-epically-fail-with-their-fanny-like-pizza-design"> Cheeky Morrisons Epically Fail With Their Fanny-Like Pizza Design </a> </h2>
  </div>
</div>

<div class="posts">
    <div class="row no-gutters">

 @foreach($posts as $post)

  
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="postcontent">
          <div class="overlay">
            <span><a href="{{url('')}}/{{$post->cat_slug}}">  {{$post->name}} </a></span>
            <h2><a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">  {{$post->title}}  </a> </h2>
          </div>
          <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">  
          <img src="{{url('uploads')}}/@if($post->thumb_feature_image != ''){{$post->thumb_feature_image}}@else{{$post->feat_image_url}}@endif" alt="" class="initImage"> </a>
        </div>
      </div>            
  
  @endforeach 

   <div id="postswrapper"></div>

  </div>
</div>

<div id="loadmoreajaxloader"> <div class="spinner"></div> </div>


<script id="template_for_list" type="nexus/template">

 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="postcontent">
      <div class="overlay">
        <span><a href="{{ url('') }}/--cat_slug--">  --name-- </a></span>
        <h2><a href="{{ url('') }}/--cat_slug--/--slug--">  --title--  </a> </h2>
      </div>
      <img src="{{url('uploads')}}/--feat_image_url--" alt="" class="initImage">
    </div>
  </div>  

</script>

<script>
  $(document).ready(function(){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
        template_for_list = $.trim($("#template_for_list").html()),
        page = 1,
        current_category_id = {{$current_category_id}};
        query_string = '{{$query_string}}';
        

    $(window).scroll(function(){

        if($(window).scrollTop() == $(document).height() - $(window).height())
        {

          $('div#loadmoreajaxloader').show();

          $.ajax({ 
            type: 'post',
            url: "{{url('home/ajax_get_page')}}",
            data: {_token: CSRF_TOKEN,'page' : page,'current_category_id' : current_category_id,'query_string' : query_string}, 
            success: function(response)
            {

              if(response != 'false')
              {

                var parsed = JSON.parse(response);
                var pages = '';
          

                $.each( parsed, function( index, obj){
       
                  pages =  
                    template_for_list.replace(/--cat_slug--/ig, obj.cat_slug)
                    .replace(/--slug--/ig, obj.slug)
                    .replace(/--feat_image_url--/ig, obj.thumb_feature_image)
                    .replace(/--title--/ig, obj.title)
                    .replace(/--name--/ig, obj.name)
                    .replace(/--created_at--/ig, obj.created_at)
                    .replace(/--excerpt--/ig, obj.excerpt);
                  $("#postswrapper").append(pages);
                  // $(".grid").append(pages);
                  // $(".grid").isotope('reloadItems');
                  // $(".grid").isotope({sortBy: null, sortAscending: true});  
        //             $(".grid").isotope('insert', pages);
            // $(".grid").isotope();

                });
                  $('div#loadmoreajaxloader').hide();
              }
              else
              {
                $('div#loadmoreajaxloader').html('<center style="font-family: Roboto; font-size: 20px; color: #000; font-weight: 700;">No more posts to show.</center>');  
              }

            }
          });

          page++;

        }

    });


  });
</script>




  </div>

</div> 

@endsection
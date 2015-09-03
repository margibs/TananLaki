
@extends('home.layout')

@section('content')
<div class="homeViewWrapper">


<meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- -------------------- ORIG POPULAR POST ----------------- -->
    <!-- <div id="posts" class="small-thumbs popularPosts">

      <div class="entry clearfix">
          <div class="entry-image" style="width: 340px">
              <a href="{{url('')}}/@if($trending->name != ''){{strtolower($trending->name)}}@else{{strtolower($trending->categories2->name)}}@endif/{{$trending->slug}}">
              <img class="image_fade" src="{{url('uploads')}}/{{$trending->feat_image_url}}" alt="Standard Post with Image"></a>
          </div>
          <div class="entry-c">
            <ul class="entry-meta clearfix">
                  <li>
                    <a href="#" class="categorySpan">
                      TODAY'S TRENDING
                    </a>
                  </li>                                   
              </ul>
              <div class="clearfix"></div>
              <div class="entry-title">
                  <h2><a href="{{url('')}}/@if($trending->name != ''){{strtolower($trending->name)}}@else{{strtolower($trending->categories2->name)}}@endif/{{$trending->slug}}"> {{$trending->title}} </a></h2>
              </div>         
              <div class="entry-content">
                  <p> {{ $trending->excerpt }} </p>                                        
              </div>
          </div>
      </div>

    </div>
     -->
    

    <!-- -------------------- NEW POPULAR POST ------------------ -->
  <div class="popularPost">
      <a href="http://alllad.com/news/the-worlds-richest-djs"></a>
      <img class="popularFeatBig" src="{{url('uploads')}}/11913_djharis.jpg" alt="">
      <img class="popularFeatSmall" src="{{url('uploads')}}/57006_djharis.jpg" alt="">
      <div class="details">
        <span class="catergory"><a href="#"> Today's Trending </a></span>
        <h2 class="title"> <a href="http://alllad.com/news/the-worlds-richest-djs"> The World’s Richest DJs </a> </h2>
      </div>
    </div>
  
<!--     <div class="latestPost">
      <p> Latest Posts </p>
    </div>
 -->
	<!-- <div class="masonry"> -->

<!--   
	<h2 class="latestPostText"> Latest <span style="color:#ff0000;">Posts</span> </h2>
  
 -->
   <!-- Posts
  ============================================= -->
  <div id="posts" class="small-thumbs">
  <div class="grid">
    <div class="grid-sizer"></div>    



    @foreach($posts as $post)

      <div class="grid-item">             
          <div class="details">
            <span class="categorySpan">  <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" style="color:#fff;">  {{$post->name}} </a></span> &nbsp; <span class="dateSpan"> </span>      
            <p> <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}"> {{$post->title}} </a> </p>          
          </div>
          <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">
             <img src="{{url('uploads')}}/{{$post->feat_image_url}}" alt="">
          </a>      
      </div>

    @endforeach 

  </div>

  <div id="postswrapper"></div>
  <div id="loadmoreajaxloader"> <span class="cssload-loader"><span class="cssload-loader-inner"></span></span>  </div>

  </div>
  <!-- #posts end -->

</div>

<script id="template_for_list" type="nexus/template">
  
<div class="grid-item">             
    <div class="details">
      <span class="categorySpan">  <a href="{{ url('') }}/--cat_slug--" style="color:#fff;">  --name-- </a></span> &nbsp; <span class="dateSpan"> </span>      
      <p> <a href="{{ url('') }}/--cat_slug--/--slug--"> --title-- </a> </p>          
    </div>
    <a href="{{ url('') }}/--cat_slug--/--slug--">
       <img src="{{url('uploads')}}/--feat_image_url--" alt="">
    </a>      
</div>

</div>
</script>

<script>
  $(document).ready(function(){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
        template_for_list = $.trim($("#template_for_list").html()),
        page = 1,
        current_category_id = {{$current_category_id}};

    $(window).scroll(function(){

        if($(window).scrollTop() == $(document).height() - $(window).height())
        {

          $('div#loadmoreajaxloader').show();

          $.ajax({ 
            type: 'post',
            url: "{{url('home/ajax_get_page')}}",
            data: {_token: CSRF_TOKEN,'page' : page,'current_category_id' : current_category_id}, 
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
                    .replace(/--feat_image_url--/ig, obj.feat_image_url)
                    .replace(/--title--/ig, obj.title)
                    .replace(/--name--/ig, obj.name)
                    .replace(/--created_at--/ig, obj.created_at)
                    .replace(/--excerpt--/ig, obj.excerpt);

                  $(".grid").append(pages);
                  $(".grid").isotope('reloadItems');
                  $(".grid").isotope({sortBy: null, sortAscending: true});  
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



@endsection
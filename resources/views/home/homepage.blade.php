
@extends('home.layout')

@section('content')

<style>
    .allpost{
      padding:15px 15px 0 0;
      overflow:hidden;
    }    
    .initImage{
      width:395px;
      height:224px;
      overflow:hidden;
    }

    

    @media screen and (max-width: 1211px){
      .popularPost h2 a{
        font-size: 23px;
        margin: 5px;
        font-weight: 500;
      }
      .popularPost .catergory a{
        margin-left: 0;
      }
    }
     @media screen and (max-width: 1200px){
          .initImage{
            width:317px;
            height:181px;
          }
    }
    @media screen and (max-width: 991px){
          .initImage{
            width:334px;
            height:189px;
          }
    }
    @media screen and (max-width: 768px){
      .popularPost h2 a {
          font-size: 38px!important;
          line-height: 43px;
          width: 100%;
      }
      .homeViewWrapper{
        padding: 0!important;
      }
      .padRight0 {
          padding-right: auto;
      }
      #posts .details p a{
        font-size: 27px;
      }
    }
    @media screen and (max-width: 540px){
      .popularPost h2 a {
          font-size: 30px!important;
          line-height: 40px;        
      }
      .popularPost h2 {  
        margin-bottom: 15px;
    }
    @media screen and (max-width: 414px){
        .popularPost h2 a {
            font-size: 27px!important;
            line-height: 35px;
        }
    }
    @media screen and (max-width: 360px){
        .popularPost h2 a {
            font-size: 22px!important;
            line-height: 30px;
        }
        #posts .details p a {
            font-size: 22px;
        }
    }

  }
</style>
<div class="homeViewWrapper">


<meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- -------------------- NEW POPULAR POST ------------------ -->
  <div class="popularPost">
      <a href="http://alllad.com/news/millionaire-crashes-supercar-into-crowd-injuring-20-people">
      <img class="popularFeatBig" src="/uploads/62988_suckydriver.jpg" alt="">
      <img class="popularFeatSmall" src="/uploads/26420_suckydriversm.jpg" alt="">
      </a>
      <div class="details" style="border:none;">
        <span class="catergory"><a href="#"> Today's Trending </a></span>
        <h2 class="title"> <a href="http://alllad.com/news/millionaire-crashes-supercar-into-crowd-injuring-20-people"> Millionaire Crashes Supercar Into Crowd, Injuring 20 People

 </a> </h2>
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
<div class="allpost">
<div class="row">

 @foreach($posts as $post)
    
      <div class="col-xs-12 col-sm-6 col-md-6">
        <div style="position:relative;">
          <div class="details">
            <span class="categorySpan">  <a href="{{url('')}}/{{$post->cat_slug}}" style="color:#fff;">  {{$post->name}} </a></span> &nbsp; <span class="dateSpan"> </span>      
            <p> <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}"> {{$post->title}} </a> </p>          
          </div>
           <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">
             <img src="{{url('uploads')}}/{{$post->feat_image_url}}" alt="" class="initImage">
          </a>  
        </div>
      </div>

    @endforeach 
    <div id="postswrapper"></div>
</div>
</div>

  
  <div id="loadmoreajaxloader"> <div class="spinner"></div> </div>

  </div>
  <!-- #posts end -->

</div>

<script id="template_for_list" type="nexus/template">
  <div class="col-md-6">
      <div style="position:relative;">
        <div class="details">
          <span class="categorySpan">  <a href="{{ url('') }}/--cat_slug--" style="color:#fff;">  --name-- </a></span> &nbsp; <span class="dateSpan"> </span>      
          <p> <a href="{{ url('') }}/--cat_slug--/--slug--"> --title-- </a> </p>          
        </div>
         <a href="{{ url('') }}/--cat_slug--/--slug--">
           <img src="{{url('uploads')}}/--feat_image_url--" alt="" class="initImage">
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
                    .replace(/--feat_image_url--/ig, obj.feat_image_url)
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



@endsection
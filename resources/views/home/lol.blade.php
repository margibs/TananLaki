@extends('home.layout')
@section('lol_content')

<style>
  #defaultBlogView{
    display: none;
  }
  .mainPostWrapper{
    background-color: #ececec;
    padding: 0;
  }
  body{
    background-color: #ececec;
  }
  .single-post img{
  	width: auto;
  }
  .single-post, .singleViewWrapper {
    padding: 0;
  }
  .single-title{
  	    margin-bottom: 15px;
        padding: 5px 40px 25px 40px;
        background-color: #fff;
        -moz-box-shadow: 0 -1px 20px -3px #C7C7C7;
        -webkit-box-shadow: 0 -1px 20px -3px #C7C7C7;
        box-shadow: 0 -1px 20px -3px #C7C7C7; 
        border-bottom: none!important;
        overflow: hidden;
  }
  .postcontent {
    width: 100%;
}
</style>

@foreach($posts as $post)
 <div class="single-title" style="padding:0;">
      <div class="entry-title" style=" padding: 10px 60px; ">
           <h2 style="
                padding-bottom: 0;
                margin-top: 20px;
                font-size: 24px;
                margin-bottom: 0;
                line-height: 30px;
                font-family: Roboto;
               ">  <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">{{$post->title}} </a> </h2>

               <div class="social-sharing" data-permalink="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" style="padding: 10px 0 0 0;">                      
                                <a target="_blank" href="http://www.facebook.com/sharer.php?u={{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" class="share-facebook">
                                  <span class="icon icon-facebook" aria-hidden="true"></span>
                                  <span class="share-title">Share</span>
                                  
                                </a>

                                <!-- https://dev.twitter.com/docs/intents -->
                                <a target="_blank" href="http://twitter.com/share?url={{url('')}}/{{$post->cat_slug}}/{{$post->slug}}text={{$post->title}}&text=" class="share-twitter">
                                  <span class="icon icon-twitter" aria-hidden="true"></span>
                                  <span class="share-title">Tweet</span>
                                  
                                </a>

                              
                </div>

      </div>

      <div class="clearfix"></div>

      <div class="singleViewWrapper" style="padding:0!important;">      

        <div class="postcontent nobottommargin clearfix">

            <div class="single-post nobottommargin">

                <!-- Single Post
                ============================================= -->
                <div class="entry clearfix">                                                                                  

        	          <!-- Post Single -->
                    <div class="clearfix"></div>                                                                      

                    <!-- Entry Content
                    ============================================= -->
                    <div class="entry-content notopmargin newContent" style="text-align:center;    width: 80%;
    margin: 0 auto;">
                        <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">{!! $post->content !!}</a>
                        <p style="margin-bottom:10px!important;margin-bottom: 10px!important;
    font-family: Roboto!important;
    font-size: 16px!important;"> {{$post->introduction}} </p>
                        <div class="clear"></div>

                     </div>

                </div><!-- .entry end -->   

                        <div class="clear"></div>
            
            </div>
          </div>
  </div>

<a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" target="_blank" style="
    text-align: center;
    display: block;
    padding: 10px 15px;
    font-size: 16px;
    margin: 15px auto 0 auto;
    color: #B70808;
    background-color: #F3F3F3;
    border-top: 1px solid #DEDEDE;
    font-weight: 700;
    "> <i class="icon-line2-bubble"></i>  
</span> View Comments </a>
</div>
@endforeach
<div id="postswrapper"></div>
<div id="loadmoreajaxloader"> <span class="cssload-loader"><span class="cssload-loader-inner"></span></span>  </div>

<script id="template_for_list" type="nexus/template">
<div class="single-title" style="padding:0;">
  <div class="entry-title" style=" padding: 10px 60px; ">
        <h2 style="
            padding-bottom: 0;
            margin-top: 20px;
            font-size: 24px;
            margin-bottom: 0;
            line-height: 30px;
            font-family: Roboto;
           "><a href="{{ url('') }}/--cat_slug--/--slug--">--title--</a> </h2>

           <div class="social-sharing" data-permalink="{{ url('') }}/--cat_slug--/--slug--" style="padding: 10px 0 0 0;">                      
                            <a target="_blank" href="http://www.facebook.com/sharer.php?u={{ url('') }}/--cat_slug--/--slug--" class="share-facebook">
                              <span class="icon icon-facebook" aria-hidden="true"></span>
                              <span class="share-title">Share</span>
                              
                            </a>

                            <!-- https://dev.twitter.com/docs/intents -->
                            <a target="_blank" href="http://twitter.com/share?url={{ url('') }}/--cat_slug--/--slug--text=--title--&text=" class="share-twitter">
                              <span class="icon icon-twitter" aria-hidden="true"></span>
                              <span class="share-title">Tweet</span>
                              
                            </a>

                          
            </div>

  </div>

  <div class="clearfix"></div>

  <div class="singleViewWrapper" style="padding:0!important;">      

    <div class="postcontent nobottommargin clearfix">

        <div class="single-post nobottommargin">

            <!-- Single Post
            ============================================= -->
            <div class="entry clearfix">                                                                                  

                <!-- Post Single -->
                <div class="clearfix"></div>                                                                      

                <!-- Entry Content
                ============================================= -->
                <div class="entry-content notopmargin newContent" style="text-align:center;    width: 80%;
margin: 0 auto;">
                    <a href="{{ url('') }}/--cat_slug--/--slug--">--content--</a>
                    <p style="margin-bottom:10px!important;margin-bottom: 10px!important;
font-family: Roboto!important;
font-size: 16px!important;"> --introduction-- </p>
                    <div class="clear"></div>

                 </div>

            </div><!-- .entry end -->   

                    <div class="clear"></div>
        
        </div>
      </div>
</div>

<a href="{{ url('') }}/--cat_slug--/--slug--" target="_blank" style="
text-align: center;
display: block;
padding: 10px 15px;
font-size: 16px;
margin: 15px auto 0 auto;
color: #B70808;
background-color: #F3F3F3;
border-top: 1px solid #DEDEDE;
font-weight: 700;
"> <i class="icon-line2-bubble"></i>  
</span> View Comments </a>
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
                    .replace(/--excerpt--/ig, obj.excerpt)
                    .replace(/--content--/ig, obj.content)
                    .replace(/--introduction--/ig, obj.introduction);
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
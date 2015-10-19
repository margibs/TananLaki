@extends('home.layout')

@section('lol_content')

<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<style>
    .single{
      padding-top: 0;
      padding-right: 0;
      margin-top: -1px;
    }
    .bgwhite video, .bgwhite img{
      width: auto;
    }
    .social-sharing{
      padding-bottom: 0;
    }
    body{
      background-color: #ECECEC;
    }
    .left{  
      border-right: 1px solid #ECECEC;
      background-color: transparent;
    }
</style>


<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-md-offset-1 col-lg-offset-1">
  <div class="left single">

        <div class="posts">

                     
                  
                @foreach($posts as $post)

                  
                   <div class="bgwhite">          


                     <div class="loldetails">
                        <h2 class="lolstreamtitle"><a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">{{$post->title}} </a>  </h2>                                                
                        


                          <div class="social-sharing" data-permalink="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}">                  
                              <a target="_blank" href="http://www.facebook.com/sharer.php?u={{url('')}}/{{$post->cat_slug}}/{{$post->slug}}" class="share-facebook">
                                <span class="fa fa-facebook" aria-hidden="true"></span>
                                <span class="share-title">Share</span>
                                <span class="share-count">0</span>
                              </a>
                            
                              <a target="_blank" href="http://twitter.com/share?url={{url('')}}/{{$post->cat_slug}}/{{$post->slug}}&amp;text={{$post->title}}" class="share-twitter">
                                <span class="fa fa-twitter" aria-hidden="true"></span>
                                <span class="share-title">Tweet</span>
                                <span class="share-count">0</span>
                              </a>
                          </div>
                          
                      </div>

                      <div class="lolstream">
                        <a href="{{url('')}}/{{$post->cat_slug}}/{{$post->slug}}"> {!! $post->content !!} </a>
                        <p class="desc"> {{$post->introduction}} </p>

                        <a href="#" class="comments"> <i class="fa fa-comment-o"></i> View Comments </a>

                      </div>  

                </div>                  
                                                                                            
               @endforeach

              <div id="postswrapper"></div>
              <div id="loadmoreajaxloader"> <div class="spinner"></div>  </div>

        
            

        </div>

  </div>
</div>

<script id="template_for_list" type="nexus/template">

<div class="bgwhite">          

  
     <div class="loldetails">
        <h2 class="lolstreamtitle"><a href="{{ url('') }}/--cat_slug--/--slug--"> --title-- </a>  </h2>                                                
        


          <div class="social-sharing" data-permalink="{{ url('') }}/--cat_slug--/--slug--">                  
              <a target="_blank" href="http://www.facebook.com/sharer.php?u={{ url('') }}/--cat_slug--/--slug--" class="share-facebook">
                <span class="fa fa-facebook" aria-hidden="true"></span>
                <span class="share-title">Share</span>
                <span class="share-count">0</span>
              </a>
            
              <a target="_blank" href="http://twitter.com/share?url={{ url('') }}/--cat_slug--/--slug--&amp;text=--title--" class="share-twitter">
                <span class="fa fa-twitter" aria-hidden="true"></span>
                <span class="share-title">Tweet</span>
                <span class="share-count">0</span>
              </a>
          </div>
          
      </div>

      <div class="lolstream">
        <a href="{{ url('') }}/--cat_slug--/--slug--"> --content-- </a>
        <p class="desc"> --introduction-- </p>

        <a href="{{ url('') }}/--cat_slug--/--slug--" class="comments" target="_blank"> <i class="fa fa-comment-o"></i> View Comments </a>

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
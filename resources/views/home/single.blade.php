@extends('home.layout')
@section('content')

<style>
  .single-post img{
    width: auto;
  }
  body{
    background-color: #ececec;
  }
  .mainPostWrapper{
   background-color: #D6D6D6;
    padding-left: 15px;
  }
  @media screen and (max-width: 991px){
    .mainPostWrapper{
      padding: 0 5px;
    }
  }
</style>

<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<div class="bigOuter">
  <div class="bigInner">
    <img id="featIMG" src="{{ url('uploads') }}/{{ $post->feat_image_url }}" alt="">
  </div>
</div>

    <div class="single-title">
        <div class="si-share noborder">                                                                        
            <div>            
                <a href="javascript:fbShare('Fb Share', 'Facebook share popup', 520, 350)" class="social-icon si-colored si-borderless si-facebook si-rounded">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                </a>
                

                <a class="social-icon si-colored si-borderless si-twitter si-rounded"  data-via="allladmag" onclick="javascript:window.open('http://twitter.com/share?url=<?php echo $actual_link ?>&text={{$post->title}}','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="icon-twitter"></i>
                    <i class="icon-twitter"></i>
                </a>                                            

                <a class="social-icon si-colored si-borderless si-gplus si-rounded" onclick="javascript:window.open('https://plus.google.com/share?url=<?php echo $actual_link ?>','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="icon-gplus"></i>
                    <i class="icon-gplus"></i>
                </a>                                       
            </div>
        </div><!-- Post Single - Share End -->                        

      <!-- Entry Title
      ============================================= -->
      <div class="entry-title">
          <h2>{{$post->title}}</h2>
      </div><!-- .entry-title end -->

          <!-- Entry Meta
      ============================================= -->
      <ul class="entry-meta clearfix">
          <li> <a href="{{url('')}}/{{$post->cat_slug}}" class="red">{{$post->cat_name}}</a></li>
          <li><i class="icon-line2-clock"></i> {{ date( 'jS F Y', strtotime($post->created_at) ) }}</li>     
          <li><i class="icon-line2-bubble"></i> {{ $comment_count }} </li>                                                       
          <!-- <li><a href="#"><i class="icon-comments"></i> 0 Comments</a></li>          -->
      </ul><!-- .entry-meta end -->

    </div>

  <div class="clearfix"></div>

  <div class="singleViewWrapper" style="padding-bottom:0!important;">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Post Content -->

        <!-- ============================================= -->


        <div class="postcontent nobottommargin clearfix">

            <div class="single-post nobottommargin">

                <!-- Single Post
                ============================================= -->
                <div class="entry clearfix">                                                                                  

        	          <!-- Post Single -->
                    <div class="clearfix"></div>                                  
                        
                    <!-- Entry Image
                    ============================================= -->
                   <!--  <div class="entry-image">
                        <a href="#"><img src="{{url('uploads')}}/{{$post->feat_image_url}}" alt=""></a>
                    </div> -->
                    <!-- .entry-image end -->

                    <!-- Entry Content
                    ============================================= -->
                    <div class="entry-content notopmargin newContent">

                        {!! $post->content !!}

                        <!-- Post Single - Content End -->

                        <div class="clear"></div>

                     </div>

                </div><!-- .entry end -->   

                        <div class="clear"></div>
            
            </div>
          </div>
  </div>


  <div class="post-navigation clearfix">

       <span class="readnext"> Read Next </span>
        <a class="link" href="#">The New Fashion Trend In Asia, wearing...</a>

        <div style="float:right; margin: 10px 20px 0 0;">                                        
          <span style="float:left; margin: 10px; font-family: Roboto; font-weight: bold; font-size: 13px;">Share this Post</span>
           <a href="javascript:fbShare('Fb Share', 'Facebook share popup', 520, 350)" class="social-icon si-colored si-borderless si-facebook si-rounded">
                <i class="icon-facebook"></i>
                <i class="icon-facebook"></i>
            </a>
            <a class="social-icon si-colored si-borderless si-twitter si-rounded"  data-via="allladmag" onclick="javascript:window.open('http://twitter.com/share?url=<?php echo $actual_link ?>&text={{$post->title}}','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <i class="icon-twitter"></i>
                <i class="icon-twitter"></i>
            </a>                                            

            <a class="social-icon si-colored si-borderless si-gplus si-rounded" onclick="javascript:window.open('https://plus.google.com/share?url=<?php echo $actual_link ?>','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <i class="icon-gplus"></i>
                <i class="icon-gplus"></i>
            </a>                                                            
      </div>
  </div>
                      
                  <div class="singleViewWrapper">  
                      <div class="postcontent nobottommargin clearfix">
                        <div class="single-post nobottommargin">
           
								  
							             <!-- Post Author Info ============================================= -->
                         <!--  <div class="panel panel-default authorBox">          
                              <div class="panel-body">
                                  <div class="author-image">
                                      <img src="@if($post->avatar == '')http://accounts-cdn.9gag.com/media/default-avatar/1_37_100_v0.jpg @else {{$post->avatar}} @endif" alt="" class="img-circle">
                                  </div>
                                  <h3 class="panel-title">By <span><a href="#" style="color: #B70808;">{{$post->name}}</a></span></h3>                              
                                  {{$post->description}}
                              </div>
                          </div> -->
                          <!-- Post Single - Author End -->
                          

                          
                          <h4 class="relatedText" style="margin-top: 20px;">Related Posts</h4>
                          <div class="row">                        
                            <div class="related-posts clearfix" style="margin-bottom:0;">

                              @foreach($related_posts as $related_post)

                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 nobottommargin remPadR relateWrapper">
                                    
                                    <a href="{{url('')}}/{{$related_post->cat_slug}}/{{$related_post->slug}}" style="display:block; overflow: hidden;">
                                     <img src="{{url('uploads')}}/{{$related_post->feat_image_url}}" alt="Blog Single"  style="width:100%; border-bottom: 3px solid rgb(183, 8, 8);">
                                    </a>

                                    <h4 style="line-height: 22px; font-weight: 600; font-size: 16px; margin-top: 8px;"><a href="{{url('')}}/{{$related_post->cat_slug}}/{{$related_post->slug}}"  style="color: #000; font-weight: 500; font-size: 17px !important; font-family: Oswald;" >{{$related_post->title}}</a></h4>    

                                </div>

                                @endforeach

                            </div>
                          </div>

                          <h4 class="relatedText"> From around the web </h4>
                          <div class="row">

                            <div class="related-posts clearfix">

                              @foreach($links as $link)

                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 nobottommargin remPadR aroundWebWrapper">
                                    
                                    <a href="{{$link->url}}" target="_blank" style="display:block; overflow: hidden;">
                                      <div class="aroundWebPic">
                                        <img src="{{url('uploads')}}/{{$link->image}}" alt="{{$link->description}}">
                                      </div>
                                    </a>
                                    <h4 class="aroundWebText"><a href="{{$link->url}}" target="_blank">{{$link->description}}</a></h4>                                                                          
                                    <span><a href="{{$link->url}}" target="_blank"> {{ucfirst($link->website_url)}} </a> </span>
                                </div>

                                @endforeach

                            </div>
                          </div>

              						<h4 class="relatedText"> What do you think? </h4>
                          
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-right: 0;">
                              @if(Auth::check())

                                      <div class="commentPic">
                                        <img src="@if($user_avatar == '')http://accounts-cdn.9gag.com/media/default-avatar/1_37_100_v0.jpg @else {{$user_avatar}} @endif" alt="" class="pull-left">
                                      </div>
                                      <div class="commentTextbox">
                                        <textarea class="top_comment" placeholder="Write comments..." ></textarea>
                                        {{-- <input type="submit" id="top_submit" value="Post Comment" class="button pull-right" disabled="disabled"> --}}
                                        <a class="button replyBtn top_submit"> Post Comment </a>     
                                      </div>
                                  
                              @else

                                <a href="{{url('login')}}" class="button">Login</a> <span style=" font-weight: 700; color: #000; font-size: 15px;"> or </span> <a href="{{url('login/facebook')}}/{{$category}}/{{$slug}}"  class="button"> <i class="icon-facebook"></i> Login with facebook</a>
                             
                              @endif

                             <div class="cleafix"></div>
             
                              <div id="comment_container">
                                @foreach($comments as $comment)
                                    <div style="overflow:hidden;margin-bottom: 10px; margin-top: 50px;clear:both;">
                                      <div style=" height: 50px; width: 50px; overflow: hidden; float: left; margin-right: 10px;">
                                          <img src="@if($comment->avatar == '')http://accounts-cdn.9gag.com/media/default-avatar/1_37_100_v0.jpg @else {{$comment->avatar}} @endif" alt="" class="pull-left">
                                      </div>
                                      <p class="commenterName">
                                        {{$comment->name}} 
                                        <span>  {{$comment->created_at}}  </span>
                                      </p>
                                      <p class="commentContent">
                                        {{$comment->content}}
                                      </p>
                                      <a href="#" class="reply_comment" data-id="{{$comment->id}}" style="font-size: 12px; font-weight: 700;" >reply</a>         
                                      <div class="clearfix"></div>

                                      <div id="comment_child{{$comment->id}}">
                                        @foreach($comment->child_comments as $child_comment)
                                            <div class="childCommentContainer">
                                              <div style=" height: 50px; width: 50px; overflow: hidden; float: left; margin-right: 10px;">
                                                <img src="@if($child_comment->avatar == '')http://accounts-cdn.9gag.com/media/default-avatar/1_37_100_v0.jpg @else {{$child_comment->avatar}} @endif" alt="" class="pull-left">
                                              </div>
                                              <p class="commenterName">{{$child_comment->name}}
                                              <span>  {{$child_comment->created_at}}  </span>
                                              </p>
                                              <p class="commentContent">{{$child_comment->content}}</p>
                                              <a href="#" class="reply_comment" data-id="{{$comment->id}}" style="font-size: 12px; font-weight: 700;" >reply</a> 
                                            </div>
                                        @endforeach
                                      </div>
                                      
                                      <div id="comment_textarea{{$comment->id}}"></div> 
                                    </div>
                                @endforeach
                                <div id="ajax_comment"></div>
                              </div>
                            </div>
                          </div>
                  </div>

                           </div><!-- .postcontent end -->
                  </div>      

@include('_common.ajaxTemplate')

<script>
$(document).ready(function(){




  $('.top_comment').on('keypress',function(){
    if($('.top_comment').val() == '')
    {
      $('.top_submit').attr('disabled','disabled');
    }
    else
    {
      $('.top_submit').removeAttr('disabled');
    }
  });


    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
        post_id = '{{$post->id}}',
        parent = 0;

    $('.top_submit').on('click',function(e){

        e.preventDefault();
        $('.top_submit').attr('disabled','disabled');

        var $this = $(this),
            content = $('.top_comment').val(),
            template_parent_comment = $.trim($("#template_parent_comment").html()),
            add_parent = '';
        if($('.top_comment').val() != '')
        {
          $.ajax({ 
            type: 'post',
            url: "{{url('comment/ajax_add_comment')}}",
            data: {_token: CSRF_TOKEN,'content' : content,'post_id' : post_id, 'parent' : parent }, 
            success: function(response)
            {

              $('.top_comment').val('');
              
              var parsed = JSON.parse(response);
              var avatar = 'http://accounts-cdn.9gag.com/media/default-avatar/1_37_100_v0.jpg';

              $.each( parsed, function( index, obj){

                if(obj.avatar != '')
                {
                  avatar = obj.avatar;
                }

                add_parent =  
                  template_parent_comment.replace(/--avatar--/ig, avatar)
                  .replace(/--name--/ig, obj.name)
                  .replace(/--content--/ig, obj.content)
                  .replace(/--created_at--/ig, obj.created_at)
                  .replace(/--id--/ig, obj.id);

                $('#ajax_comment').append(add_parent);

              });

            }
          });
        }

    })
    // END FOR SUBMIT

    $("#comment_container").on('click','.reply_comment',function(e){
        e.preventDefault();

        var $this = $(this),
            parent_id = $this.attr('data-id'),
            comment_textarea = "#comment_textarea"+parent_id;
            $(comment_textarea).html('<textarea class="commenTextarea" placeholder="" style="margin-left: 88px;margin-top: 10px;"></textarea><a class="button replyBtn" data-parent-id="'+parent_id+'" style="margin-left: 88px!important;"> Reply </a>');
    });

    $("#comment_container").on('click','.replyBtn',function(){

        var parent_id = $(this).attr('data-parent-id'),
            comment_textarea = "#comment_textarea"+parent_id,
            content = $(comment_textarea).find('textarea').val(),
            template_child_comment = $.trim($("#template_child_comment").html()),
            comment_child = "#comment_child"+parent_id;

          $.ajax({ 
            type: 'post',
            url: "{{url('comment/ajax_add_comment')}}",
            data: {_token: CSRF_TOKEN,'content' : content,'post_id' : post_id, 'parent' : parent_id }, 
            success: function(response)
            {

              // $('#top_comment').val('');
              
              var parsed = JSON.parse(response);
              var avatar = 'http://accounts-cdn.9gag.com/media/default-avatar/1_37_100_v0.jpg';

              $.each( parsed, function( index, obj){

                if(obj.avatar != '')
                {
                  avatar = obj.avatar;
                }

                add_child =  
                  template_child_comment.replace(/--avatar--/ig, avatar)
                  .replace(/--name--/ig, obj.name)
                  .replace(/--content--/ig, obj.content)
                  .replace(/--created_at--/ig, obj.created_at)
                  .replace(/--parent_id--/ig, parent_id);

                $(comment_child).append(add_child);

              });

            }
          });


    });




    //END reply comment on click

     // $('#shareme').sharrre({
     //    share: {
     //      //googlePlus: true,
     //      facebook: true,
     //      twitter: true         
     //    },
     //    enableTracking: true,
     //    buttons: {
     //      googlePlus: {size: 'tall', annotation:'bubble'},
     //      facebook: {layout: 'box_count'},
     //      twitter: {count: 'vertical'}          
     //    },
     //    hover: function(api, options){
     //      $(api.element).find('.buttons').show();
     //    },
     //    hide: function(api, options){
     //      $(api.element).find('.buttons').hide();
     //    }
     //  });


});
		// function login() {
		//   FB.login(function(response) {
		//       if (response.authResponse) {
  //       		// connected
  //       		console.log("FB.login connected");
  //       		window.location.reload();
		//       } 
  //             else {
		//           // cancelled
		//           console.log("FB.login cancelled");
		//       }
		// },
		// fbscope);
		// }

		// window.fbAsyncInit = function() {
		// FB.init({
		// appId: '123456789012345',

		// // App ID
		// channelUrl: '//staging.pdfmyurl.com/facebook.channel.html',

		// // Channel File
		// status: true,

		// // check login status
		// cookie: true,

		// // enable cookies to allow the server to access the session
		// xfbml: true // parse XFBML
		// });

		// // Additional init code here
		// FB.getLoginStatus(function(response) {
		// if (response.status === 'connected') {

		// // connected
		// console.log("FB.getLoginStatus connected");
		// sendUserInfo();

		// } else if (response.status === 'not_authorized') {

		// // not_authorized
		// // User logged into FB but not authorized
		// console.log("FB.getLoginStatus not_authorized");

		// } else {

		// // not_logged_in
		// // User not logged into FB
		// console.log("FB.getLoginStatus not_logged_in");
		// }
		// });
		// };

		// function sendUserInfo() {
		// FB.api('/me', function(response) {

		// //console.log("my object: %o", response);
		// var map = new OTMap();

		// //map.put("username!", response.username);
		// map.put("gender!", response.gender);

		// OTLogService.sendEvent("user logged in", map);
		// });
		// }

   function fbShare(title, descr, winWidth, winHeight) {      
      var url  = window.location.href;
      var title = $(".entry-title h2").text();
      var image = $('#featIMG').attr('src');
      var winTop = (screen.height / 2) - (winHeight / 2);
      var winLeft = (screen.width / 2) - (winWidth / 2);
      window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,scrollbars=1,status=0,width=' + winWidth + ',height=' + winHeight);
    }
</script>


@endsection

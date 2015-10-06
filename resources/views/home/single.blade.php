@extends('home.layout')

@section('fb_og')
<meta property="og:type" content="website">
  <meta property="og:image" content="{{ url('uploads') }}/{{ $post->feat_image_url }}"/>
  <link rel="image_src" href="{{ url('uploads') }}/{{ $post->feat_image_url }}"/>
  <meta property="og:title" content="{{$post->title}}" />
@endsection

@section('content')



<?php
$url =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
?>

<style>
  .single-post img{
    width: auto;
  }
  .arrow_box {
  position: relative;
  background: #B70808;
  margin-right: 30px;
  font-size: 20px;
  padding: 15px;    
  color: #fff;
  font-family: Oswald;
  float: right;
  max-width: 400px;
  white-space: nowrap;
  text-overflow: ellipsis;

  border-top-left-radius: 2px;
  border-bottom-left-radius: 2px;
  transition:background 0.2s ease;
}
.arrow_box:hover{
  cursor: pointer;
}
 .arrow_box a{
  color: #fff;
  display: block;
  width: 100%;
  overflow: hidden;
 }
 .arrow_box img{
    float: right;
    margin-top: -47px;
    position: relative;
    z-index: 2;
    top: 7px;
 }
.arrow_box span{
    border-right: 1px solid #E27272;
    margin-right: 10px;
    padding-right: 10px;
    text-transform: uppercase;
    font-size: 15px;
    font-family: Roboto;
    font-weight: 700;
    color: #D26D6D;
    position: relative;

    top: -2px;
}
.arrow_box:after {
  left: 100%;
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-color: rgba(136, 183, 213, 0);
  border-left-color: #B70808;
  border-width: 30px;
  margin-top: -30px;
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
      padding: 0;
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
          <li><i class="icon-line2-bubble"></i> {{-- $comment_count --}} 
                <span class="fb-comments-count" data-href="<?php echo $actual_link ?>">0</span>      
           </li>                                                       

          <!-- <li><a href="#"><i class="icon-comments"></i> 0 Comments</a></li>          -->
      </ul><!-- .entry-meta end -->

    </div>

  <div class="clearfix"></div>

  


  <div class="singleViewWrapper" style="padding-bottom:0!important;">

        <div class="social-sharing" data-permalink="<?php echo $actual_link ?>">
            <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
            <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link ?>" class="share-facebook">
              <span class="icon icon-facebook" aria-hidden="true"></span>
              <span class="share-title">Share</span>
              <span class="share-count">0</span>
            </a>

            <!-- https://dev.twitter.com/docs/intents -->
            <a target="_blank" href="http://twitter.com/share?url=<?php echo $actual_link ?>&amp;text={{$post->title}}&amp;" class="share-twitter">
              <span class="icon icon-twitter" aria-hidden="true"></span>
              <span class="share-title">Tweet</span>
              <span class="share-count">0</span>
            </a>

            <!-- https://developers.google.com/+/web/share/ -->
            <!-- <a target="_blank" href="http://plus.google.com/share?url=<?php echo $actual_link ?>" class="share-google"> -->
              <!-- Cannot get Google+ share count with JS yet -->
              <!-- <span class="icon icon-google" aria-hidden="true"></span>
              <span class="share-count">+1</span>
            </a> -->
        </div>
  
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
                        
                        <p style="font-weight:bold!important;"> {{$post->introduction}} </p>
@if(!$is_mobile)                  
<script src="//go.padstm.com/?id=411724"></script>
@else
<script src="//go.padstm.com/?id=411724"></script>
@endif

                        {!! $post->content !!}

                        <!-- Post Single - Content End -->

                        <div class="clear"></div>

                     </div>
                    
                    @if($next_post != null)
                     <div class="nextPost">
                         <div class="arrow_box">                                          
                              <a href="{{url('')}}/{{ $next_post->cat_slug }}/{{ $next_post->slug }}"><span> Next </span> {{ $next_post->title }} <img src="{{ asset('images/elipssis.jpg') }}" alt="" />  </a>                                                                                                                           
                        </div>
                    </div>
                    @endif

                    <div class="social-sharing socialsharebottom" data-permalink="<?php echo $actual_link ?>">
                      <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
                      <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link ?>" class="share-facebook">
                        <span class="icon icon-facebook" aria-hidden="true"></span>
                        <span class="share-title">Share</span>
                        <span class="share-count">0</span>
                      </a>

                      <!-- https://dev.twitter.com/docs/intents -->
                      <a target="_blank" href="http://twitter.com/share?url=<?php echo $actual_link ?>&amp;text={{$post->title}}&amp;" class="share-twitter">
                        <span class="icon icon-twitter" aria-hidden="true"></span>
                        <span class="share-title">Tweet</span>
                        <span class="share-count">0</span>
                      </a>

                      <!-- https://developers.google.com/+/web/share/ -->
                      <!-- <a target="_blank" href="http://plus.google.com/share?url=<?php echo $actual_link ?>" class="share-google"> -->
                        <!-- Cannot get Google+ share count with JS yet -->
                        <!-- <span class="icon icon-google" aria-hidden="true"></span>
                        <span class="share-count">+1</span>
                      </a> -->
                  </div>

                    <div class="clearfix"></div>


                </div><!-- .entry end -->   
                 
            </div>
          </div>
  </div>



 <!--  <div class="post-navigation clearfix">
      
      @if($next_post != null)
       <span class="readnext"> Read Next </span>
       <a class="link" href="{{url('')}}/{{ $next_post->cat_slug }}/{{ $next_post->slug }}">{{ $next_post->title }}</a>
      @else
     <span class="readnext"> Current post </span>
      @endif
        <div style="float:right; margin: 6px 20px 0 0;">                                        
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
  </div> -->
                      
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

                          
                        <h4 class="relatedText"> From around the web </h4>
                            <div id="contentclick24950"></div>
                            <script type="text/javascript">
                                (function() {
                                    var data =
                                    {
                                        pub_id: "8270",w_id: "24950",pw: "f3bd01bc302bca", cbust: (new Date()).getTime()
                                    };
                              if (typeof widgetCheck24950 === 'undefined')   {
                                    var u="";
                                    for(var key in data){u+=key+"="+data[key]+"&"}
                                    u=u.substring(0,u.length-1);    
                                    var a = document.createElement("script");
                                    a.type= 'text/javascript';
                                    a.src = "https://api.contentclick.co.uk/pub_serve.php?" + u;
                                    a.async = true;   
                                    document.getElementById("contentclick24950").appendChild(a);
                              window.widgetCheck24950 = "set";
                              }
                                })();   
                            </script>
                          
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

              						<h4 class="relatedText"> What do you think? </h4>

                          <div id="mydiv">
                          <div></div>
                          </div>
                          <script>
                          $(document).ready(function(){
                            var mydiv = document.getElementById("mydiv");  
                            mydiv.innerHTML = "<fb:comments href='" + document.location.href + "' num_posts='10' width='739'></fb:comments>";  
                            FB.XFBML.parse(mydiv);  
                          });
                          </script>
                          
                         <!--  <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-right: 0;">
            
                              <div id="comment_container">
                                @foreach($comments as $comment)
                                    <div style="overflow:hidden;margin-bottom: 10px; margin-top: 20px;clear:both;">
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
 -->

                              <!-- @if(Auth::check())

                                      <div class="commentPic">
                                        <img src="@if($user_avatar == '')http://accounts-cdn.9gag.com/media/default-avatar/1_37_100_v0.jpg @else {{$user_avatar}} @endif" alt="" class="pull-left">
                                      </div>
                                      <div class="commentTextbox">
                                        <textarea class="top_comment" placeholder="Write comments..." ></textarea>
                                        {{-- <input type="submit" id="top_submit" value="Post Comment" class="button pull-right" disabled="disabled"> --}}
                                        <div class="commentPostButton">
                                          <a class="button replyBtn top_submit"> <i class="icon-comment2" style="color:#fff;"></i> Post Comment </a>     
                                        </div>
                                      </div>
                                  
                              @else -->
                                        

                               <!--      <form class="form-horizontal">
                                    
                                    <h2> Leave a comment     <a href="{{url('login')}}"> <i class="icon-lock two"></i> Site Login</a> <span style=" font-weight: 700; color: #000; font-size: 15px;"> </span> <a href="{{url('login/facebook')}}/{{$category}}/{{$slug}}" > <i class="icon-facebook"></i> Facebook Login </a> </h2> -->
<!-- 
                                     <div class="loginButton">
                                <a href="{{url('login')}}"> <i class="icon-lock"></i> Site Login</a> <span style=" font-weight: 700; color: #000; font-size: 15px;"> </span> <a href="{{url('login/facebook')}}/{{$category}}/{{$slug}}"> <i class="icon-facebook"></i> Facebook Login </a>
                                    </div> -->
                             

                                    <!-- Text input-->
                                   <!--  <div class="form-group">
                                      <label class="col-md-2 control-label" for="name">Name</label>  
                                      <div class="col-md-10">
                                      <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">
                                        
                                      </div>
                                    </div> -->

                                    <!-- Text input-->
                                   <!--  <div class="form-group">
                                      <label class="col-md-2 control-label" for="email">Email</label>  
                                      <div class="col-md-10">
                                      <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
                                        
                                      </div>
                                    </div> -->

                                    <!-- Text input-->
                                    <!-- <div class="form-group">
                                      <label class="col-md-2 control-label" for="website">Website</label>  
                                      <div class="col-md-10">
                                      <input id="website" name="website" type="text" placeholder="" class="form-control input-md">
                                        
                                      </div>
                                    </div> -->

                                    <!-- Textarea -->
                                    <!-- <div class="form-group">
                                      <label class="col-md-2 control-label" for="comment">Comment</label>
                                      <div class="col-md-10">                     
                                        <textarea class="form-control" id="comment" name="comment"> </textarea>
                                      </div>
                                    </div>

                                    <input type="submit" value="Comment" class="button pull-right" />

                                    </form> -->
                                    
                             <!--   
                              @endif

                            </div>
                          </div> -->
                  </div>

                           </div><!-- .postcontent end -->
                  </div>      

@include('_common.ajaxTemplate')
<script>
$(document).ready(function(){
//   var google_ads='<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">';
// google_ads+= '<';
// google_ads+= '/script>';
// google_ads+= '<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7471386204506681" data-ad-slot="3662886450" data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});';
// google_ads+= '<';
// google_ads+= '/script>';

  // $('.newContent p:nth-child(1)').after(google_ads);
  // $('.newContent').find("p:first").after(google_ads);


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

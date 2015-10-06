@extends('home.layout')
@section('lol_content')
                         


<style>
  #defaultBlogView{
    display: none;
  }
  .sidebarTitle{
        width: 105%;
  }
  .single-title{
    padding-bottom: 10px;
    border-bottom: none!important;
  }
  .single-post img{
    width: auto;
  }
  .nextPost{
        text-align: right;
    margin-top: 50px;
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
 img, video{
    max-width: 100%;
    height: auto;
  }
  .mainPostWrapper{
    background-color: #ececec;
    padding: 0;
  }
  body{
    background-color: #ececec;
  }
  .entry-title h2{
       padding-bottom:0;margin-top: 20px;    font-family: Roboto;
      font-size: 30px;
      line-height: 35px;
    }
  @media  screen and (max-width: 991px){ 
    .postcontent{
      width: 98%!important;
    }
    .entry-title h2{
        margin-top: 45px;
        margin-bottom: 5px;
        font-size: 30px !important;
    }
    .padRight0 {
      padding-right: 15px;
    }
    .singleViewWrapper{
      padding-top:  0;
    }
  }
</style>


  <div class="single-title">

      <div class="entry-title">

           <h2>  {{$post->title}} </h2>

           <div class="social-sharing" data-permalink="http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" style="padding: 10px 0 0 0;">
                        <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" class="share-facebook">
                          <span class="icon icon-facebook" aria-hidden="true"></span>
                          <span class="share-title">Share</span>
                          
                        </a>

                        <!-- https://dev.twitter.com/docs/intents -->
                        <a target="_blank" href="http://twitter.com/share?url=http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes&amp;text=Cara Delevingne Says She Prefers Being Naked To Wearing Clothes&amp;" class="share-twitter">
                          <span class="icon icon-twitter" aria-hidden="true"></span>
                          <span class="share-title">Tweet</span>
                          
                        </a>

                        <a style="color: #6C6868; font-weight: 300; font-size: 17px; position: relative; top: 4px;">  
                        <i class="icon-line2-bubble"></i>  
                            <span class="fb-comments-count fb_comments_count_zero" data-href="http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" fb-xfbml-state="rendered"><span class="fb_comments_count">0</span> Comments </span>      
                        </a>
            </div>

      </div>

    </div>

  <div class="singleViewWrapper" style="padding-bottom:0!important;">
  
        <meta name="csrf-token" content="ZMHnRoC655h03IBwA0VMiZZqdmNGOU8JkoQELOgu">

        <div class="postcontent nobottommargin clearfix" style="width: 100%; margin: 0;">
           
            <div class="single-post nobottommargin" style="padding: 0;">

                <!-- Single Post
                ============================================= -->
                <div class="entry clearfix">                                                                                  

                    <div class="entry-content notopmargin newContent">                       
                        
                          <div class="entry-title">
        
                                <div style="text-align:center;">

                                 {!! $post->content !!} 
                                <p style="margin-bottom:10px!important;"> {{$post->introduction}} </p>
                                </div>
      
                               @if($next_post != null)
                                <div class="nextPost">
                                     <div class="arrow_box">                                          
                                          <a href="{{url('')}}/{{ $next_post->cat_slug }}/{{ $next_post->slug }}"><span> Next </span> {{ $next_post->title }}</a>                                                                                                                            
                                    </div>
                                </div>
                                @endif          

                                <div class="social-sharing" data-permalink="http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" style="padding: 15px 0;">
                                      <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
                                      <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" class="share-facebook">
                                        <span class="icon icon-facebook" aria-hidden="true"></span>
                                        <span class="share-title">Share</span>
                                        
                                      </a>

                                      <!-- https://dev.twitter.com/docs/intents -->
                                      <a target="_blank" href="http://twitter.com/share?url=http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes&amp;text=Cara Delevingne Says She Prefers Being Naked To Wearing Clothes&amp;" class="share-twitter">
                                        <span class="icon icon-twitter" aria-hidden="true"></span>
                                        <span class="share-title">Tweet</span>
                                        
                                      </a>

                                      
                                  </div>

         
           
                            </div><!-- .entry-title end -->
  
                     </div>

                </div><!-- .entry end -->   

            </div>

          </div>
  </div>

                      
                  <div class="singleViewWrapper">  
                      <div class="postcontent nobottommargin clearfix"  style="width: 100%; margin: 0;">
                        <div class="single-post nobottommargin" style="padding:0;">


                          <h4 class="relatedText" style="margin-top: 20px;">  More Fun </h4>
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

                          <div id="mydiv"><fb:comments href="http://localhost/alllad/public/news/cara-delevingne-says-she-prefers-being-naked-to-wearing-clothes" num_posts="10" width="739" fb-xfbml-state="rendered" class="fb_iframe_widget"><span style="height: 175px; width: 735px;"><iframe id="f3e54f9c6c" name="f160508a1" scrolling="no" title="Facebook Social Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=907091149365288&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6brUqVNoWO3.js%3Fversion%3D41%23cb%3Df1c75308ac%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff2b9b8308%26relation%3Dparent.parent&amp;href=http%3A%2F%2Flocalhost%2Falllad%2Fpublic%2Fnews%2Fcara-delevingne-says-she-prefers-being-naked-to-wearing-clothes&amp;locale=en_US&amp;numposts=10&amp;sdk=joey&amp;version=v2.2&amp;width=739" style="border: none; overflow: hidden; height: 175px; width: 735px;"></iframe></span></fb:comments></div>
                          <script>
                          var mydiv = document.getElementById("mydiv");  
                          mydiv.innerHTML = "<fb:comments href='" + document.location.href + "' num_posts='10' width='739'></fb:comments>";  
                          FB.XFBML.parse(mydiv);  
                          </script>
                                               
                  </div>

             </div><!-- .postcontent end -->
    </div>      

<script id="template_parent_comment" type="nexus/template">
  <div style="overflow:hidden;margin-bottom: 10px;margin-top: 20px;">
    <img src="--avatar--" alt="" class="pull-left" style=" width: 50px; width: 50px; overflow: hidden;  margin-right: 10px;">
    <p class="commenterName"> --name-- <span> --created_at-- </span></p>
    <p class="commentContent"> --content-- </p>
    <a href="#" class="reply_comment" data-id="--id--" style="font-size: 12px; font-weight: 700;" >reply</a>
        <div id="comment_child--id--"></div>              
    <div class="clearfix"></div>
    <div id="comment_textarea--id--"></div> 
  </div>
</script>

<script id="template_child_comment" type="nexus/template">
  <div class="childCommentContainer">
    <div style="height: 50px; width: 50px; overflow: hidden; float: left; margin-right: 10px;">
      <img src="--avatar--" alt="" class="pull-left">
    </div>
    <p class="commenterName">--name-- <span> --created_at-- </span> </p>
    <p class="commentContent">--content--</p>
    <a href="#" class="reply_comment" data-id="--parent_id--" style="font-size: 12px; font-weight: 700;" >reply</a> 
  </div>
</script>
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
        post_id = '15',
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
            url: "http://localhost/alllad/public/comment/ajax_add_comment",
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
            url: "http://localhost/alllad/public/comment/ajax_add_comment",
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
  //          // connected
  //          console.log("FB.login connected");
  //          window.location.reload();
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
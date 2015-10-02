@extends('home.layout')
@section('content')

<style>
  .mainPostWrapper{
    background-color: #ececec;
    padding: 0 0 0 15px;
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
  }
  .postcontent {
    width: 100%;
}
</style>




 <div class="single-title">

      <div class="entry-title">

           <h2 style="
    padding-bottom: 15px;
    border-bottom: 1px solid #DADADA;
    margin-top: 20px;
    font-size: 24px;
    margin-bottom: 10px;
    line-height: 30px;
    font-family: Roboto;
               ">  Simpsons fans after they heard that season 30 will be the Simpsons' last season </h2>

      </div>

      <div class="clearfix"></div>

      <div class="singleViewWrapper" style="padding-bottom:0!important;">
  
		        <meta name="csrf-token" content="{{ csrf_token() }}" />
		        

		        <div class="postcontent nobottommargin clearfix">

		            <div class="single-post nobottommargin">

		                <!-- Single Post
		                ============================================= -->
		                <div class="entry clearfix">                                                                                  

		                    <div class="entry-content notopmargin newContent" style="text-align:center;">
		                       <br />
		                       <video preload="auto" poster="http://img-9gag-fun.9cache.com/photo/aMQXX7P_460s.jpg" loop="" muted="" autoplay="autoplay">
						                <source src="http://img-9gag-fun.9cache.com/photo/aMQXX7P_460sv.mp4" type="video/mp4">
						                <source src="http://img-9gag-fun.9cache.com/photo/aMQXX7P_460svwm.webm" type="video/webm">
						                <div class="badge-item-animated-img"></div>
						            </video>

		                     </div>

		                </div><!-- .entry end -->   

		                <div class="clear"></div>
		            
		            </div>
		          </div>
		  </div>

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


@endsection
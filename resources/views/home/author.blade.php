@extends('home.layout')
@section('content')
<!-- Post Content
                    ============================================= -->
                    <div class="postcontent nobottommargin clearfix" style=" background-color: #fff; ">
						
						<div class="center" style="margin-bottom: 50px; border: 1px solid #F1F1F1; background-color: #F1F1F1;    padding-top: 20px;">
						 	<img src="images/author/1.jpg" alt="" class="img-circle">
						 	<h2 style="font-family: Oswald; color: #000; font-size: 35px; margin-bottom:0;"> Donnie Darko </h2>
						 	<p style=" margin-bottom: 30px; margin-top: 0; color: #C1C0C0;"> 12 posts </p>
						 </div> 

                        <!-- Posts
                        ============================================= -->
                        <div id="posts" class="small-thumbs" style=" margin: 20px;">

                            <div class="entry clearfix">
                                <div class="entry-image">
                                    <a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/small/17.jpg" alt="Standard Post with Image"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li>10th Feb 2014</li>                
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
                                        <a href="blog-single.html"class="more-link">Read More</a>
                                    </div>
                                </div>
                            </div>


                        </div><!-- #posts end -->

                        <!-- Pagination
                        ============================================= -->
                        <ul class="pager">
                          <li><a href="#">Previous</a></li>
                          <li><a href="#">Next</a></li>
                        </ul>
                        <!-- .pager end -->

                    </div><!-- .postcontent end -->
@endsection
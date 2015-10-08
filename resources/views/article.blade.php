@extends("layouts.master")

@section("content")

<div class="page-content">
<div class="wrapper">
	<div class="left-content">
   	 <div class="title-heading">
      <h1 class="entry-title">{!! $articleDetails->post->title !!}</h1>
      	
      <div class="published-updated">Posted on September 26, 2015, 2:00 PM 
      <span>Ingrid lunden <span class="color1">(</span><span class="small-font">@ingridlunden</span><span class="color1">)</span></span></div>
      
      
      <ul class="share-icon">
      		<li><div class="share">1200<br /><span>share</span></div></li>
            <li class="fb"><a href=""><i class="fa fa-facebook"></i></a></li>
            <li class="tw"><a href=""><i class="fa fa-twitter"></i></a></li>
            <li class="gp"><a href=""><i class="fa fa-google-plus"></i></a></li>
            <li class="pi"><a href=""><i class="fa fa-pinterest-square"></i></a></li>
            <li class="en"><a href=""><i class="fa fa-envelope-o"></i></a></li>
            <li class="li"><a href=""><i class="fa fa-linkedin"></i></a></li>
            <li class="fs"><a href=""><i class="fa fa-foursquare"></i></a></li>
        </ul>
        <div class="pull-right next-story">Next Story</div>
        <div class="clearfix"></div>
       </div> 
			<article>
				{!! $articleDetails->post->content !!}
			</article>

    <div class="right-content">
    	<div class="img-section-3">
        	<img src="images/thumb1.jpg" width="285" height="190" alt="thumb1" />
			<p class="img-caption">WATCH: This Is One Cold, Cold Dog
            <br />
            <a href="">Animal</a>
            </p>
            
      </div>
  </div>
    <div class="clearfix"></div>
</div>
</div>






<section class="container>
	<div class="container-fixed-width">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8">
				<article>
					<h1>{!! $articleDetails->post->title !!}</h1>
					{!! $articleDetails->post->content !!}
				</article>
			
			</div>
			
			<div class="col-lg-4 col-md-4 col-sm-4">
			
			</div>
		</div>
	</div>
</section>
@stop


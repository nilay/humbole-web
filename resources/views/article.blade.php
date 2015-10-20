@extends("layouts.master")

@section("additional_meta")
<meta content="{{$articleDetails->post->author->name}}" property="article:author">
<meta content="http://www.facebook.com/humbole" property="article:publisher">
@foreach($articleDetails->post->tags as $tag)
	<meta content="{{$tag->slug}}" property="article:tag">
@endforeach
<meta content="{{$articleDetails->post->thumbnail}}" property="og:image">
<meta content="www.humbole.com" property="twitter:domain">
<meta content="@humbole2" property="twitter:site">
<meta content="{{$articleDetails->post->title}}" property="twitter:title">
<meta content="{{$articleDetails->post->title}}" property="twitter:description">
<meta content="@humbole2" property="twitter:creator">
<meta content="summary_large_image" property="twitter:card">
<meta content="{{$articleDetails->post->thumbnail}}" property="twitter:image">
<meta content="{{$articleDetails->post->author->name}}" name="author">
<meta content="{{$articleDetails->post->thumbnail}}" name="image">
<meta content="{{$articleDetails->post->thumbnail}}" name="thumbnail">

<meta keywords="{{$articleDetails->post->title}}">
<meta content="{{$articleDetails->post->title}}" name="keywords">
<meta content="{{$articleDetails->post->title}}" name="news_keywords">
@stop




@section("content")
<style>
article img {
    max-width: 600px;
}
</style>


		<section id="site-contents">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h2 class="page-heading">{{ $articleDetails->post->title }}</h2>
						<!--
						<div class="media">
							<div class="media-left">
								<a href="#"><img class="media-object img-circle" src="http://placehold.it/40?text=A" alt="..."></a>
							</div>
							
							<div class="media-body">
								<h4 class="media-heading">Author Name</h4>
								<p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit</small></p>
							</div>
							
						</div>
						-->
						<p><img src="/images/social-media-sharing-icons.jpg" alt="" /></p>

						<article>
							{!! $articleDetails->post->content !!}
						</article>
					</div>
					
					
					
					<aside class="col-md-4" ng-controller="RelatedController">
					
						<div class="grid-item" ng-repeat="post in relatedPosts">
							<figure class="grid-thumbnail">
								<span class="image-wrapper">
									<a href="/article/@{{post.slug}}">
										<img width="100%" height="100%" ng-src="@{{post.thumbnail_images.medium.url}}">
									</a>
								</span>
							</figure>
							<div class="image-description">
								<h2 class="image-title"><a href="/article/@{{post.slug}}">@{{post.title}}</a></h2>
								<div class="image-category">
									<a href="/topic/@{{post.categories[0].slug}}">@{{album.categories[0].title}}</a>
								</div>
							</div>
						</div>
				
					</aside>
				</div>
            </div>
            
            
            
			<section class="container container-grid" ng-controller="RecentController">
				<hr/>
				<h3>Recent</h3>
				<div class="row">
					<div class="grid-item grid-item-4" ng-repeat="post in relatedPosts">
						<figure class="grid-thumbnail">
							<span class="image-wrapper">
								<a href="/article/@{{post.slug}}">
									<img width="100%" height="100%" ng-src="@{{post.thumbnail_images.medium.url}}">
								</a>
							</span>
						</figure>
						<div class="image-description">
							<h2 class="image-title"><a href="/article/@{{post.slug}}">@{{post.title}}</a></h2>
							<div class="image-category">
								<a href="/topic/@{{post.categories[0].slug}}">@{{album.categories[0].title}}</a>
							</div>
						</div>
					</div>

				</div>
			</section>
		</div>
	</section>




@stop

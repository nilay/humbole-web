@extends("layouts.master")

@section("content")
<style>
article img {
    max-width: 600px;
}
</style>


		<section id="site-contents" ng-app="articleApp" ng-controller="ArticleController">
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
					
					
					
					<aside class="col-md-4">
					
						<div class="grid-item" ng-repeat="post in relatedPosts">
							<figure class="grid-thumbnail">
								<span class="image-wrapper">
									<a href="/article/@{{post.slug}}">
										<img ng-src="@{{post.thumbnail_images.medium.url}}">
									</a>
								</span>
							</figure>
							<div class="image-description">
								<h2 class="image-title"><a href="/article/@{{post.slug}}">@{{post.title}}</a></h2>
								<div class="image-category"><a href="/topic/@{{post.categories[0].slug}}">@{{album.categories[0].title}}</a></div>
							</div>
						</div>
				
					</aside>
				</div>
            </div>
            
            
            
			<section class="container container-grid">
				<h3>Recent</h3>
				<div class="row">
					<div class="grid-item grid-item-4">
						<figure class="grid-thumbnail">
							<span class="image-wrapper"><a href="#"><img ng-src=""></a></span>
						</figure>
						<div class="image-description">
							<h2 class="image-title"><a href="#">Vivamus ut nunc et sapien tristique iaculis</a></h2>
							<div class="image-category"><a href="#">Animals</a></div>
						</div>
					</div>

				</div>
			</section>
		</div>
	</section>




@stop
@section("additional_script")
<script src="/js/controllers/article-ctrl.js"></script>
@stop

@extends("layouts.master")

@section("content")
<section class="container container-grid">
	
	<h3> <center>Ouch ...sorry we can't find the page you're looking for. But we have some super awesome articles you may like to experience and share with your friends. Check it out:<center> </h3> 


</section>


	<section class="container container-grid" ng-controller="RecentController">
		<hr/>
		
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

@stop

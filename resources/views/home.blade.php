@extends("layouts.master")

@section("content")
<section class="container container-grid" ng-app="app">
	<div class="row" ng-controller="AppController" infinite-scroll='reddit.nextPage()' infinite-scroll-disabled='reddit.busy' infinite-scroll-distance='0'>
    	
    	<div class="grid-item grid-item-@{{$index+1}}" ng-repeat="album in reddit.items">
			<figure class="grid-thumbnail">
				<span class="image-wrapper">
				  <a href="/article/@{{album.slug}}">
					<img width="100%" height="100%" 
						src="@{{$index==0 ? album.thumbnail_images['post-thumbnail'].url : $index==1 || $index==2 || $index==3 || $index==4 || $index==5 ? album.thumbnail_images.medium.url : album.thumbnail_images.thumbnail.url}}" 
						ng-src="@{{$index==0 ? album.thumbnail_images['post-thumbnail'].url : $index==1 || $index==2 || $index==3 || $index==4 || $index==5 ? album.thumbnail_images.medium.url : album.thumbnail_images.thumbnail.url}}" 
						alt="@{{$index}}" />
				  </a>
				</span>
				<div class="social-sharing">
					<ul class="nav nav-justified">
						<li><a href=""><span class="icon-favorite"></span></a></li>
						<li><a href=""><span class="icon-facebook"></span></a></li>
						<li><a href=""><span class="icon-twitter"></span></a></li>
						<li><a href=""><span class="icon-pinterest"></span></a></li>
						<li><a href=""><span class="icon-sharing"></span></a></li>
					</ul>
				</div>
			</figure>
			<div class="image-description">
				<h2 class="image-title"><a href="/article/@{{album.slug}}">@{{album.title}}</a></h2>
				<div class="image-category"><a href="/topic/@{{album.categories[0].slug}}">@{{album.categories[0].title}}</a></div>
			</div>
		</div>
	
	 <div ng-show='reddit.busy'>Loading data...</div>
	</div>
</section>
@stop

@section("additional_script")
<script src="/js/ng-infinite-scroll.min.js"></script>
<script src="/js/controllers/home-ctrl.js"></script>
@stop
@extends("layouts.master")

@section("additional_css")
<link rel="stylesheet" href="/css/grid.css">
@stop
@section("content")
<section class="container container-grid" ng-app="app">
	<div class="row" ng-controller="AppController" infinite-scroll='reddit.nextPage()' infinite-scroll-disabled='reddit.busy' infinite-scroll-distance='0'>
    	
    	<div class="grid-item grid-item-@{{$index+1}}" ng-repeat="album in reddit.items">
			<figure class="grid-thumbnail">
				<span class="image-wrapper">
				  <a href="#">
					<img width="100%", height="100%" src="@{{album.thumbnail_images.thumbnail.url}}" ng-src="@{{album.thumbnail_images.thumbnail.url}}" alt="" />
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
				<h2 class="image-title"><a href="#">@{{album.title}}</a></h2>
				<div class="image-category"><a href="#">@{{album.slug}}</a></div>
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
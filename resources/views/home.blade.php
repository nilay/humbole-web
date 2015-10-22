@extends("layouts.master")

@section("content")
<section id="home-grid" class="container container-grid">
	<div class="row" ng-controller="HomeController" infinite-scroll='reddit.nextPage()' infinite-scroll-disabled='reddit.busy' infinite-scroll-distance='0'>
    	<div id="gridWrap" class="grid-item grid-item-@{{$index+1}}" ng-repeat="album in reddit.items">
			<figure class="grid-thumbnail">
				<span class="image-wrapper">
				  <a href="/article/@{{album.slug}}">
					<img width="100%" height="100%" 
						ng-src="@{{$index==0 ? album.thumbnail_images['post-thumbnail'].url : $index==1 || $index==2 || $index==3 || $index==4 || $index==5 ? album.thumbnail_images.medium.url : album.thumbnail_images.thumbnail.url}}" 
						/>
				  </a>
				</span>
			</figure>
			<div class="image-description">
				<h2 class="image-title"><a href="/article/@{{album.slug}}">@{{album.title}}</a></h2>
				<div class="image-category"><a href="/topic/@{{album.categories[0].slug}}">@{{album.categories[0].title}}</a>&nbsp;</div>
			</div>
		</div>
	
	 <center><div ng-show='reddit.busy'><img src="/images/preloader.gif"></div></center>
	</div>
</section>
@stop

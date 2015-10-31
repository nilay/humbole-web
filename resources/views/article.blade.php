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
<script>
var article_tags = "{{$tags}}";
var article_id = "{{$articleDetails->post->id}}";
</script>
		<section id="site-contents">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h2 class="page-heading">{{ $articleDetails->post->title }}</h2>
						<div class="media">		
							
							<!--<div class="media-left">								
									<a href="#"><img class="media-object img-circle" src="http://placehold.it/40?text=A" alt="..."></a>								
							</div>-->							
							<div class="media-body">
								<h4 class="media-heading author-heading">by {{ ucwords($articleDetails->post->author->name) }}</h4>
								<p><small>Published on {{  date('F d \,  Y',strtotime($articleDetails->post->date)) }}</small></p>
							</div>
						</div>
						
						
						<p class="article-social-sharing share-top">
							<span class="sharing-count"><strong><span class="changeNumber">{{ $share_count }}</span></strong><br />shares</span>
							<a href="https://www.facebook.com/sharer/sharer.php?u=http://humbole.com/article/{{ $articleDetails->post->slug }}&title={{ $articleDetails->post->title }}" onclick="return share_social(this.href,{{$articleDetails->post->id}},1);" class="icon-facebook"></a>
							<a href="http://twitter.com/share?url=http://humbole.com/article/{{ $articleDetails->post->slug }}&text={{ $articleDetails->post->title }}" onclick="return share_social(this.href,{{$articleDetails->post->id}},2);" class="icon-twitter"></a>
							<a href="https://plus.google.com/share?url=http://humbole.com/article/{{ $articleDetails->post->slug }}" onclick="return share_social(this.href,{{$articleDetails->post->id}},3);" class="icon-google-plus"></a>
							<a href="mailto:?to=&body=%0D%0Ahttp://humbole.com/article/{{ $articleDetails->post->slug }}%0D%0A%0D%0AHumbole.com&subject={{ $articleDetails->post->title }}" onclick="sendAjaxShareCount('{{$articleDetails->post->id}}','4');" class="icon-envelope-o"></a>
						</p>
						
						
						
						<ul class="share-sidebar sidebar article-social-sharing">
							
							<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://humbole.com/article/{{ $articleDetails->post->slug }}&title={{ $articleDetails->post->title }}" onclick="return share_social(this.href,{{$articleDetails->post->id}},1);" class="icon-facebook"></a></li>
							<li><a href="http://twitter.com/share?url=http://humbole.com/article/{{ $articleDetails->post->slug }}&text={{ $articleDetails->post->title }}" onclick="return share_social(this.href,{{$articleDetails->post->id}},2);" class="icon-twitter"></a></li>
							<li><a href="https://plus.google.com/share?url=http://humbole.com/article/{{ $articleDetails->post->slug }}" onclick="return share_social(this.href,{{$articleDetails->post->id}},3);" class="icon-google-plus"></a></li>
							<li><a href="mailto:?to=&body=%0D%0Ahttp://humbole.com/article/{{ $articleDetails->post->slug }}%0D%0A%0D%0AHumbole.com&subject={{ $articleDetails->post->title }}" onclick="sendAjaxShareCount('{{$articleDetails->post->id}}','4');" class="icon-envelope-o"></a>
							</li>
						</ul>
						
						
						
						
						
						
						

						<article>
							{!! $articleDetails->post->content !!}
						</article>
						
						<div class="mtop-art">
						<p class="article-social-sharing share-bottom">
							<span class="sharing-count"><strong><span class="changeNumber">{{ $share_count }}</span></strong><br />shares</span>
							<a href="https://www.facebook.com/sharer/sharer.php?u=http://humbole.com/article/{{ $articleDetails->post->slug }}&title={{ $articleDetails->post->title }}" onclick="return share_social(this.href,{{$articleDetails->post->id}},1);" class="icon-facebook"></a>
							<a href="http://twitter.com/share?url=http://humbole.com/article/{{ $articleDetails->post->slug }}&text={{ $articleDetails->post->title }}" onclick="return share_social(this.href,{{$articleDetails->post->id}},2);" class="icon-twitter"></a>
							<a href="https://plus.google.com/share?url=http://humbole.com/article/{{ $articleDetails->post->slug }}" onclick="return share_social(this.href,{{$articleDetails->post->id}},3);" class="icon-google-plus"></a>
							<a href="mailto:?to=&body=%0D%0Ahttp://humbole.com/article/{{ $articleDetails->post->slug }}%0D%0A%0D%0AHumbole.com&subject={{ $articleDetails->post->title }}" onclick="sendAjaxShareCount('{{$articleDetails->post->id}}','4');" class="icon-envelope-o"></a>
						</p>
					</div>
						
						
					</div>
					
					
					
					<aside class="col-md-4 related-articals" ng-controller="RelatedController">
						<h4>Related Articles</h4>
						<div class="grid-item" ng-repeat="post in relatedPosts">
							<figure class="grid-thumbnail">
								<span class="image-wrapper">
									<a href="/article/@{{post.slug}}">
										<img width="100%" height="100%" ng-src="@{{post.thumbnail_images.medium.url}}">
									</a>
								</span>
							</figure>
							<div class="image-description">
								<h2 class="image-title"><a href="/article/@{{post.slug}}" ng-bind-html="post.title"></a></h2>
								<div class="image-category">
									<a href="/topic/@{{post.categories[0].slug}}">@{{post.categories[0].title}}</a>
								</div>
							</div>
						</div>
				
					</aside>
									
				</div>
				
				
            </div>
            
            
            
			<section class="container container-grid" ng-controller="RecentController">
				<hr/>
				<h4>Most Recent Articles</h4>
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
							<h2 class="image-title"><a href="/article/@{{post.slug}}" ng-bind-html="post.title"></a></h2>
							<div class="image-category">
								<a href="/topic/@{{post.categories[0].slug}}">@{{post.categories[0].title}}</a>
							</div>
						</div>
					</div>

				</div>
			</section>
		</div>
	</section>

<script>
function share_social(url,page,type){
	window.open(url,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
	sendAjaxShareCount(page,type);
	return false;	
}
function sendAjaxShareCount(page,type){
	$.get("/article/sharecount/" + page);
	$('.changeNumber').html(parseInt($('.changeNumber').html(), 10)+1)
}


$(window).scroll(function(e) {
	var artSahreTop = $('.share-top').offset();
	var artSahreBottom = $('.share-bottom').offset();
    if ($(window).scrollTop() > artSahreTop.top  && $(window).scrollTop() < artSahreBottom.top-$(window).height() && $(window).width() > 767)
     {
		$('.share-sidebar').fadeIn();
     }
    else
     {
		$('.share-sidebar').fadeOut();
     }
 });


</script>



@stop

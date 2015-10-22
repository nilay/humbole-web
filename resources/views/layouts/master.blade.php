<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <title>{{$title or 'Humbole | Your Daily Dose...'}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$description or 'Your Daily Dose'}}">
    <meta content="{{$title or 'Humbole | Your Daily Dose...'}}" name="title">
	<meta content="{{$og_title or 'Humbole | Your Daily Dose...'}}" property="og:title">
	<meta content="{{$og_description or 'Humbole | Your Daily Dose...'}}" property="og:description">
	<meta content="website" property="og:type">
	<meta content="{{$og_url or 'http://www.humbole.com'}}" property="og:url">
	<meta content="Humbole" property="og:site_name">
	@yield('additional_meta')
	<!-- core CSS -->
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
	<link rel="stylesheet" href="/css/icomoon.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="shortcut icon" href="/images/humbole.ico">
	@yield('additional_css')  
	<script src="{{ elixir('js/all.js') }}"></script>
	
</head><!--/head-->

<body id="home" class="homepage" >
	{!! SnippetHelper::addGoogleAnalyticsScript() !!}
		<header id="social-header" class="hidden-xs">
			<div class="container text-right">
				<a href="https://www.facebook.com/humbole" target="_blank"><span class="icon-facebook"></span></a>
				<a href="https://twitter.com/humbole2" target="_blank"><span class="icon-twitter"></span></a>
				<a href="https://plus.google.com/u/1/b/110776927912026744773/110776927912026744773/posts?pageId=110776927912026744773" target="_blank"><span class="icon-google-plus"></span></a>
			</div>
		</header>
		
		<header id="site-header" ng-controller="HeaderController">
				<nav class="navbar" >
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-navigation">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="/"><span class="site-logo"><img src="/images/logo.png" alt="Humbole" /></span></a>
						</div>
						
						<div class="collapse navbar-collapse" id="site-navigation">
							<ul class="nav navbar-nav">
								<li>
									<div class="onoffswitch">
										<input ng-checked="{{Session::get('gender') == 'female' ? 'false' : 'true'}}" {{Session::get('gender') == 'female' ? '' : 'checked'}} ng-model="mfswitch" ng-click="genderChange();" type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch"/>
										<label class="onoffswitch-label" for="myonoffswitch">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								
								<li ng-repeat="item in menu">
									<a ng-class="appliedClass(item.l)" href="@{{item.l}}">@{{item.t}}</a>
								</li>
								<!--
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Me <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">My Humbole</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Action 3</a></li>
									</ul>
								</li>
								-->
							</ul>
						</div>
					</div>
				</nav>
			
		</header>
		
		<!--<section id="site-contents" class="loading-contents">-->
		<section id="site-contents">
			@yield('content')
		</section>

	<footer id="site-footer">
		<div class="container container-footer">
			<a href="/about-us">About Us</a> | 
			<a href="/disclaimer">Disclaimer</a>
		</div>
	</footer>
<script src="/config.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/controllers/header-ctrl.js"></script>
<script src="/js/ng-infinite-scroll.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular-sanitize.min.js"></script>

@yield('additional_script')
@yield('additional_script2')


</body>
</html>
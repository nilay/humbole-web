<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Humbole</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Insurance management for your business, all online">
    <meta name="author" content="">
    <meta content="Humbole" name="title">
	<meta content="Humbole" property="og:title">

	<meta content="Humbole" property="og:description">
	<meta content="website" property="og:type">
	<meta content="http://www.humbole.com" property="og:url">
	<meta content="Humbole" property="og:site_name">
	<!-- core CSS -->
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
	<link rel="stylesheet" href="/css/icomoon.css">
	<link rel="stylesheet" href="/css/style.css">
	@yield('additional_css')  
</head><!--/head-->

<body id="home" class="homepage" >
		<header id="social-header" class="hidden-xs">
			<div class="container text-right">
				<a href="#"><span class="icomoon-facebook"></span></a>
				<a href="#"><span class="icomoon-twitter"></span></a>
				<a href="#"><span class="icomoon-linkedin"></span></a>
				<a href="#"><span class="icomoon-youtube"></span></a>
				<a href="#"><span class="icomoon-google-plus"></span></a>
				<a href="#"><span class="icomoon-pinterest"></span></a>
			</div>
		</header>
		
		<header id="site-header">
			<div class="container">
				<nav class="navbar">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-navigation">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#"><span class="site-logo"><img src="/images/logo.png" alt="Humbole" /></span></a>
						</div>
						
						<div class="collapse navbar-collapse" id="site-navigation">
							<ul class="nav navbar-nav">
								<li>
									<div class="onoffswitch">
										<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked />
										<label class="onoffswitch-label" for="myonoffswitch">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="/people/kids">Kids</a></li>
								<li><a href="/people/teens">Teens</a></li>
								<li><a href="/people/bachelors">Bachelors</a></li>
								<li><a href="/people/techies">Techies</a></li>
								<li><a href="/people/fourty-plus">40+</a></li>
								<li><a href="/people/60-plus">60+</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Me <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Action 1</a></li>
										<li><a href="#">Action 2</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Action 3</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</header>
		

	@yield('content')

	<footer id="site-footer">
		<div class="container container-footer">
			<hr />
			<p>About Us</p>
		</div>
	</footer>
<script src="/config.js"></script>
<script src="{{ elixir('js/all.js') }}"></script>
<script type="text/javascript" src="/js/main.js"></script>
@yield('additional_script')
@yield('additional_script2')


</body>
</html>
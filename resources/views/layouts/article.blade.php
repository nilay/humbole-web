<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Humbole</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your daily dose...">
    <meta name="author" content="">
    <meta content="Humbole" name="title">
	<meta content="Humbole" property="og:title">

	<meta content="Humbole" property="og:description">
	<meta content="website" property="og:type">
	<meta content="http://www.humbole.com" property="og:url">
	<meta content="Humbole" property="og:site_name">
	<!-- core CSS -->
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
	@yield('additional_css')  
	<style>
		.container-fixed-width{
		    max-width: 1000px;
		    width: auto;
		}	
	</style>
</head><!--/head-->

<body id="home" class="homepage" >
    <header>
      <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
                <div class="navbar-header">
                    <button aria-controls="navbar" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" ><img alt="Humbole" src="/img/temp-logo.png" height="50"></a>
                </div>
                <div class="navbar-collapse collapse" id="navbar" style="max-height: 710px;">
                    <ul class="nav navbar-nav navbar-left scroll-to">
						<li><a href="/prizes">Cat1</a></li>
						<li><a href="/photos">Cat2</a></li>
						<li><a href="/people">Cat3</a></li>
					</ul> 
					
					<ul class="nav navbar-nav navbar-right scroll-to">
                       <li><a href="/login">Login</a></li>
			           <li><a href="/index/presignup">Signup</a></li>
			        </ul>
                </div><!--/.nav-collapse -->
            </div>
      </nav>

    </header><!--/header-->
	<div style="margin-top:60px;"></div>

	@yield('content')

    <footer>
      <hr>
        <p>&copy; Humbole 2014-2015</p>
	</footer>
<script src="/config.js"></script>
<script src="{{ elixir('js/all.js') }}"></script>
@yield('additional_script')
@yield('additional_script2')


</body>
</html>
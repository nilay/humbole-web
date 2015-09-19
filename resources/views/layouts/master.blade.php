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
	@yield('additional_css')  
</head><!--/head-->

<body id="home" class="homepage" >
    <header id="header">

    </header><!--/header-->


	@yield('content')

    <footer id="footer">
	</footer>

<script src="{{ elixir('js/all.js') }}"></script>
@yield('additional_script')
@yield('additional_script2')


</body>
</html>
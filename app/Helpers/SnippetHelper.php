<?php namespace App\Helpers;
use Config;
class SnippetHelper {
    public static function addMixPanelInit() {
		return ' 
			<!-- start Mixpanel -->
			<!-- end Mixpanel -->		

		'; 	
    }
    
    
    public static function addGoogleTagManagerScript(){
    	return "  
			<!-- Google Tag Manager -->
			<!-- End Google Tag Manager -->    	
    	"; 
    }
    
    public static function addGoogleAnalyticsScript(){
    	return "   
			<!-- Google Tag Manager -->
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			  ga('create', 'UA-68978646-1', 'auto');
			  ga('send', 'pageview');
			
			</script>
			<!-- End Google Tag Manager -->    	
    	"; 
    }
    
    
} 







   

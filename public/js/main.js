var $fixedHeader, headerTop, headerHeight;
$(function(){
	if($('.onoffswitch-checkbox').is(':checked')){
		$('body').addClass('user-male');
	} else {
		$('body').addClass('user-female');
	}
	$('.onoffswitch-checkbox').on('change', function(){
		$('body').toggleClass('user-male');
		$('body').toggleClass('user-female');
	})
	
	$fixedHeader = $('#site-header');
	headerTop = $fixedHeader.offset().top;
	headerHeight = $fixedHeader.outerHeight(true);
	headerSetting();
	$(window).bind('resize', function(){	
		headerTop = $fixedHeader.offset().top;
		headerHeight = $fixedHeader.outerHeight(true);
		headerSetting()
	})
	$(window).bind('scroll', function(){
		headerSetting()
	})
	
	if($('#site-footer').length){
		var footer = $('#site-footer');
		footer.before('<div style="height:'+footer.outerHeight(true)+'px"></div>')
	}
	
	if($('#site-contents').length){
		var siteContents = $('#site-contents');
		var contentsHeight = $(window).height() - ($('#social-header').outerHeight(true) + $('#site-header').outerHeight(true) + $('#site-footer').outerHeight(true))
		siteContents.css({'min-height':contentsHeight});
	}
})

function headerSetting(){
	var scrollAmount = $(window).scrollTop();
	if(scrollAmount > headerTop){
		$('body').addClass('user-scroll');
		if(!$('#header-placeholder').length){
			$fixedHeader.after('<div id="header-placeholder" style="height:'+headerHeight+'px;"></div>')
		}
	} else {
		$('body').removeClass('user-scroll');
		$('#header-placeholder').remove();
	}
}
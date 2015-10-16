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

pageContext = function(){
  	var gender = $('.onoffswitch-checkbox').is(':checked') ? 'male' : 'female';
    var pathArray = window.location.pathname.split( '/' );
    var group =  pathArray[2] ? pathArray[2] : null;
    var topic =  pathArray[3] ? pathArray[3] : null;
  	return {'gender': gender, 'group': group, 'topic':topic};
  }

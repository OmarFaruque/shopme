jQuery(document).ready(function($){
	/*
	* Hotline hover function 
	*/
	$('.hotline').hover(function(){
		$(this).find('h3').animate({width: '285px'}, function(){
			$(this).find('b').show();	
		});
	},function(){
		$(this).find('b').hide();
		$(this).find('h3').animate({width: '75px'});
	});

	// zoom function 
	$("#zoom").elevateZoom({
  		zoomType: "lens",
  		lensShape : "round",
  		lensSize    : 200
	});

	$(document.body).on('click', 'button.navbar-toggle', function(){
		$(this).next('.menu-main-menu-container').slideToggle();
	});


	/* Add Non Clicable if mobile menu */
	if($('button.navbar-toggle').is(':visible')){
		$('ul#menu-main-menu > li.menu-item-has-children > a').attr('href', 'javascript:void(0)');
		$('ul#menu-main-menu > li > a').click(function(){
			$('ul#menu-main-menu > li > ul.sub-menu').slideUp();
			$(this).next('ul.sub-menu').slideToggle();
		});
	}
	
}); // End Document Ready 



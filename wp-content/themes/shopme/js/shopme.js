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
});



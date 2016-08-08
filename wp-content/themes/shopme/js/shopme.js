jQuery(document).ready(function($){
	/*
	* Hotline hover function 
	*/
	$('.hotline').hover(function(){
		$(this).find('h3').animate({width: '250px'}, function(){
			$(this).find('b').show();	
		});
	},function(){
		$(this).find('b').hide();
		$(this).find('h3').animate({width: '75px'});
	});


	/*
	* menu hover function 
	*/
	$('ul#menu-main-menu > li').hover(function(){
		$(this).children('ul.sub-menu').slideDown();
	}, function(){
		$(this).children('ul.sub-menu').slideUp();
	});
});
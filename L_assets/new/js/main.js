jQuery(document).ready(function($){
	//slicknav
	$('#nav').slicknav();
	//sticky
	 $("header").sticky({topSpacing:0});


	//scrollspy
	$('body').scrollspy({
		target: '#navbar-example',
		offset: 95
	});
	//Smooth Scroll
	var $root = $('html, body');
	$('#nav li a').click(function() {
		var href = $.attr(this, 'href');
		$root.animate({
			scrollTop: $(href).offset().top
		}, 2000, function () {
			window.location.hash = href;
		});
		return false;
	});
	//ScrollUp
	$.scrollUp({
		animation: 'slide', // Fade, slide, none
		scrollSpeed: 2000,
		scrollText: [
		  "<i class='fa fa-chevron-up'></i>"
		]
	});


});
jQuery(window).load(function(){
	//Isotope 
	$(".gallery_item").isotope({
		itemSelector: '.single_items',
		layoutMode: 'fitRows',
	});
});


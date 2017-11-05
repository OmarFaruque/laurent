jQuery(document).ready(function($){
	$('.navIcon i').click(function(){
		$('.sidebarMenu').slideToggle();
	});

	$('ul#menu-top-menu li').each(function(){
		$(this).addClass('pull-left');
	});

	$(document.body).on('click', '.productThumb', function(){
		var img = $(this).children('img').attr('src');
		$('.singleProductImage a').attr('href', img);
		$('.singleProductImage img.img-responsive').attr('src', img);
	});

}); // End document ready
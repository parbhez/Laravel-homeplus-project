(function ($) {
    "use strict";

jQuery(document).ready(function(){
  
$( ".bs_color_red" ).parent('li').append('<i class="fa fa-square color-red"></i>');
$( ".bs_color_gray" ).parent('li').append('<i class="fa fa-square color-gray"></i>');
$( ".bs_color_white" ).parent('li').append('<i class="fa fa-square color-white"></i>');
$( ".bs_color_yellow" ).parent('li').append('<i class="fa fa-square color-yellow"></i>');
$( ".bs_color_blue" ).parent('li').append('<i class="fa fa-square color-blue"></i>');
$( ".bs_color_black" ).parent('li').append('<i class="fa fa-square color-black"></i>');
$( ".bs_color_pink" ).parent('li').append('<i class="fa fa-square color-pink"></i>');
$( ".bs_color_orange" ).parent('li').append('<i class="fa fa-square color-orange"></i>');
$( ".bs_color_green" ).parent('li').append('<i class="fa fa-square color-green"></i>');
$( ".bs_color_beige" ).parent('li').append('<i class="fa fa-square color-beige"></i>');
  
$(".update-button span.add-update a").append(' <i class="fa fa-pencil"></i>');
$(".update-button span.add-delete a").append(' <i class="fa fa-trash"></i>');  
  
  
  $( "li.previous a" ).html('<i class=" fa fa-angle-left"></i>Previous');
  $( "li.disabled span" ).html('<i class=" fa fa-angle-left"></i>Previous');
  $( "li.next a" ).html('Next<i class=" fa fa-angle-right"></i>');
  $( "li.next.disabled span" ).html('Next<i class=" fa fa-angle-right"></i>');
  

  
/*---------------------------------------
	curency and language js
----------------------------------------- */	

/*---------------------------------------
	price range ui slider js
----------------------------------------- */		

		
/*---------------------------------------
	scroll to top
----------------------------------------- */	
  $.scrollUp({
    scrollText: '<i class="fa fa-angle-double-up"></i>',
    easingType: 'linear',
    scrollSpeed: 800,
    animation: 'fade'
  });  

/*---------------------------------------
	mobile menu
----------------------------------------- */	
$('.mobile-menu').meanmenu();			
		
/*---------------------------------------
	new  product, sale product carousel
----------------------------------------- */	
$('.new-pro-carousel, .sale-carousel').owlCarousel({
  items : 2,
  itemsDesktop : [1199,2],
  itemsDesktopSmall : [991,1],
  itemsTablet: [767,2],
  itemsMobile : [480,1],
  autoPlay: false,
  navigation: true,
  pagination: false,
  navigationText:['<i class="fa fa-angle-left owl-prev-icon"></i>',
				  '<i class="fa fa-angle-right owl-next-icon"></i>']
});
  
  
/*---------------------------------------  
  client-carousel
----------------------------------------- */  
$('.client-carousel').owlCarousel({
    items :  6 ,
	itemsDesktop : [1199,4],
	itemsDesktopSmall : [991,3],
	itemsTablet: [767,2],
	itemsMobile : [480,1],
	autoPlay :  false,
	stopOnHover: false,		
	navigation: true,
	pagination: false,
	navigationText:['<i class="fa fa-angle-left owl-prev-icon"></i>',
	'<i class="fa fa-angle-right owl-next-icon"></i>']
});	
  
  
/*----- about pager testimonial -----*/	
	$(".what-client-say").owlCarousel({
		items : 1,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [991,1],
		itemsTablet: [767,1],
		itemsMobile : [480,1],
		autoPlay: false,
		navigation: false,
		pagination: true,
		singleItem : true,
		transitionStyle : "backSlide"
	});		  

/*---------------------------------------
	featured  product, bestseller, carousel
----------------------------------------- */	
$('.feartured-carousel, .bestseller-carousel').owlCarousel({
  items : 5,
  itemsDesktop : [1199,4],
  itemsDesktopSmall : [991,3],
  itemsTablet: [767,2],
  itemsMobile : [480,1],
  autoPlay :  false,
  stopOnHover: false,		
  navigation: true,
  pagination: false,
  navigationText:['<i class="fa fa-angle-left owl-prev-icon"></i>',
				  '<i class="fa fa-angle-right owl-next-icon"></i>']	
});	
		
/*---------------------------------------
	related-product  carousel
----------------------------------------- */	
	$('.related-product').owlCarousel({
		items : 4,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [991,3],
		itemsTablet: [767,2],
		itemsMobile : [480,1],
		autoPlay :  false,
		stopOnHover: false,		
		navigation: true,
		pagination: false,
		navigationText:['<i class="fa fa-angle-left owl-prev-icon"></i>','<i class="fa fa-angle-right owl-next-icon"></i>']	
	});	
		
/*---------------------------------------
	latest news carousel
----------------------------------------- */	
$('.latest-news-carousel').owlCarousel({
  items : 4,
  itemsDesktop : [1199,3],
  itemsDesktopSmall : [991,3],
  itemsTablet: [767,2],
  itemsMobile : [480,1],
  autoPlay :  false,
  stopOnHover: false,		
  navigation: true,
  pagination: false,
  navigationText:['<i class="fa fa-angle-left owl-prev-icon"></i>',
				  '<i class="fa fa-angle-right owl-next-icon"></i>']
});	
		

/*---------------------------------------
	home 2 left category menu
----------------------------------------- */	
	$('.category-heading').on( "click", function(){
		$('.category-menu-list').slideToggle(300);
	});	
		
/*---------------------------------------
	home 2 new product, home 2 sale product carousel
----------------------------------------- */	
	$('.home2-new-pro-carousel, .home2-sale-carousel').owlCarousel({
		items : 4,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [991,2],
		itemsTablet: [767,2],
		itemsMobile : [480,1],
		autoPlay :  false,
		stopOnHover: false,		
		navigation: true,
		pagination: false,
		navigationText:['<i class="fa fa-angle-left owl-prev-icon"></i>','<i class="fa fa-angle-right owl-next-icon"></i>']	
	});
		
/*---------------------------------------
	sidebar best seller carousel
----------------------------------------- */
	$('.sidebar-best-seller-carousel').owlCarousel({
		items : 1,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [991,1],
		itemsTablet: [767,1],
		itemsMobile : [480,1],
		autoPlay :  false,
		stopOnHover: false,		
		navigation: true,
		pagination: false,
		navigationText:['<i class="fa fa-angle-left owl-prev-icon"></i>','<i class="fa fa-angle-right owl-next-icon"></i>']
	});
		
/*---------------------------------------
	tab product carousel shaddam_hossain	
----------------------------------------- */	
$('.tab-carousel-1').owlCarousel({
  items : 4,
  itemsDesktop : [1199,4],
  itemsDesktopSmall : [991,3],
  itemsTablet: [767,2],
  itemsMobile : [480,1],
  autoPlay :  false,
  stopOnHover: false,		
  navigation: true,
  pagination: false,
  navigationText:['<i class="fa fa-angle-left owl-prev-icon"></i>',
				  '<i class="fa fa-angle-right owl-next-icon"></i>']
});	
			
/*---------------------------------------
	mainSlider
----------------------------------------- */	
$('#mainSlider').nivoSlider({
	controlNav: true,
	directionNav: false,
	pauseTime: 5000,
	nextText: '<div class="slider-bolut"></div>',
	prevText: '<div class="slider-bolut"></div>'
});	 	
/*---------------------------------------
	single product product thumbnail
----------------------------------------- */	
	$('.bxslider').bxSlider({
	  minSlides: 4,
	  maxSlides: 4,
	  slideWidth: 88,
	  responsive:true,
	   nextText: '<i class="fa fa-angle-left"></i>',
	  prevText: '<i class="fa fa-angle-right"></i>'
	});	

/*---------------------------------------
	francy box lightbox
----------------------------------------- */	


/*-----------------------------------------
	cart plus minus button
--------------------------------------------*/	  

		

 }); 
})(jQuery);
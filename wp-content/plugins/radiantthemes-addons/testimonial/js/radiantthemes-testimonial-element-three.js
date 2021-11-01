jQuery(document).ready(function(){
	jQuery(".testimonial.element-three.owl-carousel").each(function(){
		jQuery(this).owlCarousel({
			nav: jQuery(this).attr("data-owl-nav") ,
			dots: jQuery(this).attr("data-owl-dots") ,
			loop: jQuery(this).attr("data-owl-loop") ,
			autoplay: jQuery(this).attr("data-owl-autoplay") ,
			autoplayTimeout: jQuery(this).attr("data-owl-autoplay-timeout") ,
			responsive:{
		        0:{ items: jQuery(this).attr("data-owl-mobile-items") },
		        321:{ items: jQuery(this).attr("data-owl-mobile-items") },
		        480:{ items: jQuery(this).attr("data-owl-tab-items") },
		        768:{ items: jQuery(this).attr("data-owl-tab-items") },
		        992:{ items: jQuery(this).attr("data-owl-desktop-items") },
		        1200:{ items: jQuery(this).attr("data-owl-desktop-items") }
		    }
		});
	});
	jQuery(".testimonial.element-three:not(.owl-carousel)").each(function(){
		jQuery(this).children().css({
			"width" : "calc(100% / " + jQuery(this).data("row-items") + ")",
		});
	});
});
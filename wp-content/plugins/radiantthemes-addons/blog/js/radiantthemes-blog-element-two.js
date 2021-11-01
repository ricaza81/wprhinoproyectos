jQuery(document).ready(function(){
	jQuery(".blog.element-two.owl-carousel").each(function(){
		jQuery(this).owlCarousel({
			nav: jQuery(this).data("owl-nav") ,
			dots: jQuery(this).data("owl-dots") ,
			loop: jQuery(this).data("owl-loop") ,
			autoplay: jQuery(this).data("owl-autoplay") ,
			autoplayTimeout: jQuery(this).data("owl-autoplay-timeout") ,
			responsive:{
		        0:{ items: jQuery(this).data("owl-mobile-items") },
		        321:{ items: jQuery(this).data("owl-mobile-items") },
		        480:{ items: jQuery(this).data("owl-tab-items") },
		        768:{ items: jQuery(this).data("owl-tab-items") },
		        992:{ items: jQuery(this).data("owl-desktop-items") },
		        1200:{ items: jQuery(this).data("owl-desktop-items") }
		    }
		});
	});
	jQuery(".blog.element-two:not(.owl-carousel)").each(function(){
		jQuery(this).children().css({
			"width" : "calc(100% / " + jQuery(this).data("row-items") + ")",
		});
	});
});
jQuery(window).load(function(){
    jQuery(".rt-portfolio-slider.element-two.owl-carousel").each(function(){
		jQuery(this).owlCarousel({
			nav: true,
			dots: true,
			mouseDrag: true,
			touchDrag: true,
			loop: jQuery(this).data("portfolio-mobileitem") ,
			autoplay: jQuery(this).data("portfolio-mobileitem") ,
			autoplayTimeout: jQuery(this).data("portfolio-mobileitem") ,
			responsive:{
		        0:{
		        	items: jQuery(this).data("portfolio-mobileitem"),
		        	stagePadding: 0,
		        },
		        321:{
		        	items: jQuery(this).data("portfolio-mobileitem"),
		        	stagePadding: 20,
		        },
		        480:{
		        	items: jQuery(this).data("portfolio-tabitem"),
		        	stagePadding: 50,
		        },
		        768:{
		        	items: jQuery(this).data("portfolio-tabitem"),
		        	stagePadding: 100,
		        },
		        992:{
		        	items: jQuery(this).data("portfolio-desktopitem"),
		        	stagePadding: 150,
		    	},
		        1200:{
		        	items: jQuery(this).data("portfolio-desktopitem"),
		        	stagePadding: 400,
		    	}
		    },
        });
        if ( jQuery(this).hasClass("has-fancybox") ) {
            jQuery(this).find(".fancybox").fancybox({
                animationEffect: "zoom-in-out",
                animationDuration: 500,
                zoomOpacity: "auto",
            });
        }
	});
});
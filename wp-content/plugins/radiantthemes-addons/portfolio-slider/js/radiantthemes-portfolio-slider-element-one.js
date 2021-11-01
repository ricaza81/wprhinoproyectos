jQuery(window).load(function(){
    jQuery(".rt-portfolio-slider.element-one.owl-carousel").each(function(){
		jQuery(this).owlCarousel({
			nav: true,
			dots: false,
			mouseDrag: false,
			touchDrag: true,
			loop: jQuery(this).data("portfolio-mobileitem") ,
			autoplay: jQuery(this).data("portfolio-mobileitem") ,
			autoplayTimeout: jQuery(this).data("portfolio-mobileitem") ,
			responsive:{
		        0:{ items: jQuery(this).data("portfolio-mobileitem") },
		        321:{ items: jQuery(this).data("portfolio-mobileitem") },
		        480:{ items: jQuery(this).data("portfolio-tabitem") },
		        768:{ items: jQuery(this).data("portfolio-tabitem") },
		        992:{ items: jQuery(this).data("portfolio-desktopitem") },
		        1200:{ items: jQuery(this).data("portfolio-desktopitem") }
		    }
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
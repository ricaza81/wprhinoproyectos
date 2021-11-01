jQuery(document).ready(function(){
	jQuery(".rt-image-slider.element-two.owl-carousel").each(function(){
        jQuery(this).owlCarousel({
            nav: false,
            dots: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 6000,
            responsive:{
                0:{ items: jQuery(this).data("owl-mobile-items") },
                321:{ items: jQuery(this).data("owl-mobile-items") },
                480:{ items: jQuery(this).data("owl-tab-items") },
                768:{ items: jQuery(this).data("owl-tab-items") },
                992:{ items: jQuery(this).data("owl-desktop-items") },
                1200:{ items: jQuery(this).data("owl-desktop-items") }
            }
        });
        jQuery(this).find(".fancybox").fancybox({
            animationEffect: "zoom-in-out",
            animationDuration: 500,
            zoomOpacity: "auto",
        });
	});
});
jQuery(document).ready(function(){
	jQuery(".rt-image-gallery.element-one").each(function(){
        jQuery(this).find(".owl-carousel").owlCarousel({
            nav: false,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 6000,
            items: 1,
            thumbs: true,
            thumbImage: true,
        });
        jQuery(this).find(".owl-thumb-item").css({
            "width" : "calc(100% / " + jQuery(this).data("thumbnail-items") + ")" ,
        })
	});
});
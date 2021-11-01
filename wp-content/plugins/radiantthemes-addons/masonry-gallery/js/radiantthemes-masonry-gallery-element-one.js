jQuery(document).ready(function(){
	jQuery(".rt-masonry-gallery.element-one").each(function(){
        jQuery(this).isotope({
            layoutMode: 'masonry',
        });
        jQuery(this).find(".fancybox").fancybox({
            animationEffect: "zoom-in-out",
            animationDuration: 500,
            zoomOpacity: "auto",
        });
	});
});
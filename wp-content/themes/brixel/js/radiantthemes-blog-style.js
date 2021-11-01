(function($){
	"use strict";
	jQuery(window).on("load", function(){
	    // ISOTOPE
		jQuery(".isotope-blog-style").isotope({
			itemSelector: '.isotope-blog-style-item',
			layoutMode: 'masonry',
		});
	});
})(jQuery);
jQuery(document).ready(function(){
	jQuery(".rt-progress-bar.element-one").each(function(){
		jQuery(this).find(".progress-width").text( jQuery(this).data("progress-bar-width") );
		jQuery(this).find(".progress").css({
			"height": jQuery(this).data("progress-bar-height")
		});
		jQuery(this).find(".progress-bar").css({
			"width": jQuery(this).data("progress-bar-width")
		});
	});
});
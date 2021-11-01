jQuery(document).ready(function(){
	jQuery(".rt-separator.element-four").each(function(){
		jQuery(this).css({
			"text-align": jQuery(this).data("separator-direction"),
		});
		jQuery(this).find(".block").css({
			"width": jQuery(this).data("separator-width"),
			"background-color": jQuery(this).data("separator-color"),
		});
		jQuery(this).find(".gap").css({
			"background-color": jQuery(this).data("separator-background"),
		});
		jQuery(this).find(".bar").css({
			"background-color": jQuery(this).data("separator-color"),
		});
	});
});
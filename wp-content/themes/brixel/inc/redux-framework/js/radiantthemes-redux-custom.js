jQuery(document).on("ready", function(){
	// DATEPICKER
	jQuery("input[id='coming_soon_datetime']").each(function(){
		jQuery(this).attr("readonly", "readonly");
		jQuery(this).appendDtpicker();
	});
});
jQuery(window).on("load", function(){
	setTimeout(function(){
		// SUBHEADER TOGGLE
		jQuery(".enable-toggle").next().hide();
		jQuery(".enable-toggle").addClass("i-am-toggled");
		jQuery(".enable-toggle").on("click", function(){
			jQuery(this).next().toggle();
			jQuery(this).toggleClass("i-am-toggled");
		});
	}, 2000);
});
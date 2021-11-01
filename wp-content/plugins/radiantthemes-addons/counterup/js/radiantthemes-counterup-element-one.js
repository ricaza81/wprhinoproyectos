jQuery(document).ready(function(){
	jQuery(".rt-counterup").each(function(){
		jQuery(this).counterUp({
			delay: jQuery(this).data("counterup-delay"),
			time: jQuery(this).data("counterup-time"),
		});
	});
});
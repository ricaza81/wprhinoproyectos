jQuery(document).ready(function(){
	jQuery(".rt-accordion.element-six").each(function(){
		jQuery(this).find(".rt-accordion-item-body").slideUp("500");
		jQuery(this).find(".rt-accordion-item:first-child").children(".rt-accordion-item-body").slideDown("500");
		jQuery(this).find(".rt-accordion-item:first-child").addClass("rt-active");
		jQuery(this).find(".rt-accordion-item-title").click(function(){
			jQuery(".rt-accordion.element-six").find(".rt-accordion-item-body").slideUp("500");
			jQuery(".rt-accordion.element-six").find(".rt-accordion-item").removeClass("rt-active");
			jQuery(this).parent().children(".rt-accordion-item-body").slideDown("500");
			jQuery(this).parent().addClass("rt-active");
		});
	});
});
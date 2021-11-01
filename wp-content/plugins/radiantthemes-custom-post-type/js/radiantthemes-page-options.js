jQuery(document).on("ready", function(){
	// PAGE HEADER SELECTOR
	jQuery("#RadiantThemesPageHeaderSelector li").on("click", function(){
		jQuery("#RadiantThemesPageHeaderSelector li").removeClass("selected");
		jQuery(this).addClass("selected");
	});
	jQuery("#RadiantThemesPageHeaderSelector li").each(function(){
		if( jQuery(this).find("input[type=radio]").prop("checked") ){
			jQuery(this).addClass("selected");
		}
	});
	// PAGE BANNER SELECTOR
	jQuery("#RadiantThemesPageBannerSelector li").on("click", function(){
		jQuery("#RadiantThemesPageBannerSelector li").removeClass("selected");
		jQuery(this).addClass("selected");
	});
	jQuery("#RadiantThemesPageBannerSelector li").each(function(){
		if( jQuery(this).find("input[type=radio]").prop("checked") ){
			jQuery(this).addClass("selected");
		}
	});
});
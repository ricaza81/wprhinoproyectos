jQuery(document).ready(function(){
	jQuery(".rt-tab.element-four").each(function(){
		jQuery(this).find("ul.nav-tabs a:first").tab("show");
	});
});
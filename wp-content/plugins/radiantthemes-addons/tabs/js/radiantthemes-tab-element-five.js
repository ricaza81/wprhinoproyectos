jQuery(document).ready(function(){
	jQuery(".rt-tab.element-five").each(function(){
		jQuery(this).find("ul.nav-tabs a:first").tab("show");
	});
});
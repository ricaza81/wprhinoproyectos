jQuery(document).ready(function(){
	jQuery(".rt-tab.element-three").each(function(){
		jQuery(this).find("ul.nav-tabs a:first").tab("show");
	});
});
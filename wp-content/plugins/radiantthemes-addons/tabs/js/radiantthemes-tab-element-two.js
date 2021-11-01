jQuery(document).ready(function(){
	jQuery(".rt-tab.element-two").each(function(){
		jQuery(this).find("ul.nav-tabs a:first").tab("show");
	});
});
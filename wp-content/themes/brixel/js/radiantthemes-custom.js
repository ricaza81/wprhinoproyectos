(function($){
	"use strict";
	jQuery(document).on("ready", function(){
		// SCROLL TO TOP
		jQuery(window).on("scroll", function(){
			if (jQuery(this).scrollTop()>100){
				jQuery(".scrollup").addClass("active");
			}else{
				jQuery(".scrollup").removeClass("active");
			}
		});
		jQuery(".scrollup").on("click", function(){
	   		jQuery("html, body").animate({scrollTop:0},600);
	  		return false;
		});
		// HEADER STYLE FOUR SIDE MENU
		jQuery(".sidenav-trigger").on("click", function(){
			jQuery("body").toggleClass("side-menu-open");
		});
		// FLOATING SEARCH BAR
		jQuery(".floating-searchbar i").on("click", function(){
			jQuery("body").toggleClass("floating-searchbar-active");
		});
		// FLYOUT SEARCH BAR
		jQuery(".flyout-searchbar-toggle i").on("click", function(){
			jQuery("body").toggleClass("flyout-searchbar-active");
		});
		jQuery(".flyout-search-close").on("click", function(){
			jQuery("body").removeClass("flyout-searchbar-active");
		});
		// FLYOUT MENU BAR
		jQuery(".flyout-menubar-toggle").on("click", function(){
			jQuery("body").toggleClass("flyout-menubar-active");
		});
		jQuery(".flyout_menu .nav ul.menu li.menu-item-has-children").each(function(){
			jQuery(this).children("a").on("click", function(DisableClick){
				DisableClick.preventDefault();
				jQuery(this).parent().children("ul").slideToggle(500);
			});
		});
		// SIDEBAR SEARCH BUTTON CHANGE
		jQuery(".search-form, .woocommerce-product-search").each(function(){
			jQuery(this).find("input[type=submit]").replaceWith("<button type='submit'><i class='fa fa-search'></i></button>");
		});
		// BLOG COMMENT BUTTON CHANGE
		jQuery(".comments-area .comment-form > p input[type='submit']").each(function(){
			jQuery(this).replaceWith("<button type='submit'><span>Post Comment</span></button>");
		});
		jQuery(".comments-area .comment-form > p input[type='reset']").each(function(){
			jQuery(this).replaceWith("<button type='reset'><span>Reset Comment</span></button>");
		});
		// TOOLTIP
		jQuery("[data-toggle='tooltip']").tooltip();
		// SIDR
		jQuery(".responsive-nav").each(function(){
			jQuery(this).sidr({
				side: 'right',
				displace: jQuery(this).data("responsive-nav-displace"),
				renaming: false,
				source: '.nav',
				name: 'main-menu-left',
				onOpen: function(){
					jQuery("body").addClass("main-menu-open");
				},
				onClose: function(){
					jQuery("body").removeClass("main-menu-open");
				},
			});
			jQuery(".overlay, .sidr-close").on("click", function(){
				jQuery.sidr('close', 'main-menu-left');
			});
		});
		// HAMBURGER SIDR
		jQuery(".hamburger-menu-open.is-sidr").each(function(){
			jQuery(this).sidr({
				side: 'right',
				displace: false,
				renaming: false,
				source: '.wraper_hamburger_menu.is-sidr',
				name: 'hamburger-menu',
			});
			jQuery(".hamburger-menu-close").on("click", function(){
				jQuery.sidr('close', 'hamburger-menu');
			});
		});
		jQuery(".hamburger_menu .nav ul.menu li.menu-item-has-children").each(function(){
			jQuery(this).children("a").on("click", function(DisableClick){
				DisableClick.preventDefault();
				jQuery(this).parent().children("ul").slideToggle(500);
			});
		});
		// RADIANTTHEMES MEGA MENU
		jQuery(".sidr .menu-item-has-children").each(function(){
			jQuery(this).children(".rt-sub-menu, .rt-mega-menu").css({
				"display": "none",
			});
			jQuery(this).children("a").on("click", function(event){
				event.preventDefault();
				jQuery(this).parent(".menu-item-has-children").toggleClass("radiantthemes-menu-open");
				jQuery(this).parent(".menu-item-has-children").children(".rt-sub-menu, .rt-mega-menu").slideToggle(700);
			});
		});
		// MATCHHEIGHT
		jQuery(".matchHeight").matchHeight();
		// WOW
		var wow = new WOW({
			boxClass: 'wow',
			animateClass: 'animated',
			mobile: true,
			live: true,
			scrollContainer: null,
		});
		wow.init();
		// NICESCROLL
		if( jQuery(window).width() > 767 ){
			jQuery(".infinity-scroll").niceScroll({
				cursorcolor: jQuery("body").data("nicescroll-cursorcolor"),
				cursorwidth: jQuery("body").data("nicescroll-cursorwidth"),
				cursorborder: "none",
				cursorborderradius: "0",
			});
		}
		// STICKY
		jQuery(".i-am-sticky").sticky();
		// RATINA
		jQuery("img").attr("data-no-retina", "");
		jQuery(".radiantthemes-retina img").removeAttr("data-no-retina");
	});
	jQuery(window).on("load", function(){
		// PROLOADER
		setTimeout(function(){
			jQuery(".preloader").addClass("loaded");
	    }, jQuery(".preloader").data("preloader-timeout") );
		setTimeout(function(){
			// MATCHHEIGHT
			jQuery(".matchHeight").matchHeight();
	    }, 2000);
	});
})(jQuery);
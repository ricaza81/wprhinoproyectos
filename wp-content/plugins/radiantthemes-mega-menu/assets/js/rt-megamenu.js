jQuery(document).ready(function($) {
	var window_width = $(window).width();
	var nav = $('nav');
	var menu_width = nav.find('.rt-mega-menu-wrap').width();
	if( menu_width > 0 ) {
		var offset_left = nav.find('.rt-mega-menu-wrap').parent().offset().left;

		if( menu_width + offset_left > window_width ) {
			$('nav').find('.rt-mega-menu-wrap').css( 'left', -( menu_width + offset_left - window_width ) - 20 );
		}
	}

	$( '.rt-megamenu-tab-child > a' ).on( 'mouseenter', function() {
		$( '.rt-megamenu-tab-child > ul' ).css( 'display', 'none' );
		$(this).next().css('display','block');
	});

	$( '.rt-mega-menu-hover' ).on( 'mouseenter', function() {
		var t = $(this);
		if ( $(this).hasClass( 'rt-mega-menu-tab' ) ) {
			$(this).parent().find( '> li.rt-mega-menu-hover' ).removeClass('rt-mega-menu-tab-open');
			$(this).addClass('rt-mega-menu-tab-open');
		} else {
			$(this).parent().find( '> li.rt-mega-menu-hover' ).removeClass('rt-mega-menu-open');
			$(this).addClass( 'rt-mega-menu-open' );
		}

	});

	$( '.rt-mega-menu-hover' ).on( 'mouseleave', function() {
		$(this).parent().find( '> li.rt-mega-menu-hover' ).removeClass('rt-mega-menu-open');
	});

	$( '.rt-mega-menu-tab:first-child' ).addClass( 'rt-mega-menu-tab-open' );

	var height = [];

	$('.rt-mega-menu-tabs').each(function() {
		$(this).find( '.rt-mega-menu-tab' ).each(function() {
			var t = $(this);
			var length = $(this).html().length;
			var indexof = $(this).html().indexOf( '</a>' );
			var html = $(this).html().slice( 0, indexof );
			var html2 = $(this).html().slice( indexof + 4, length );
			var return_html = html + '</a><div class="rt-mega-menu-tab-content">' + html2 + '</div>';

			$(this).html( return_html );
		});
	});

	function resize_megamenu_tab() {
		var height = [];

		$('.rt-mega-menu-tabs').each(function() {
			height = [];

			var height_parent = $(this).parent().outerHeight();
			$(this).find( '.rt-mega-menu-tab' ).each(function() {
				var div_height = $(this).find( '.rt-mega-menu-tab-content' ).outerHeight();

				height.push( div_height );
			});

			var max = height[0];


			$.each( height, function( index, number ) {
				if ( max < number ) max = number;
			});

			if ( height_parent > max ) max = height_parent;

			$(this).css( 'min-height', max ).find( '.rt-mega-menu-tab-content' ).css( 'min-height', max );
		});
	}

	$(window).load(function() {
		resize_megamenu_tab();
	});

	// conflict with lazyload plugin
	$( '.rt-mega-menu-hover' ).each(function() {
		$(this).find('img[data-lazy-src]').each(function(){
   			lazy_load_image(this);
		});
	});

	function lazy_load_image(img) {
		var img = $(img), src = img.attr('data-lazy-src');
		img.unbind('scrollin' ).hide().removeAttr('data-lazy-src').attr('data-lazy-loaded', 'true');
		img.attr( 'src', src );
		img.fadeIn();
	}
});
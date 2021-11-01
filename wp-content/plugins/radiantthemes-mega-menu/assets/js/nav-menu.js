jQuery(document).ready(function($){

	// add icon
	$(document).on( 'click', '.rt_megamenu_select_sicon_menu', function(e) {
		e.preventDefault();

		var $this = $(this),
			$id = $this.data('id'),
			$prev = $( 'span.rt-megamenu-icon-prev-' + $id ).find( 'i' );

		$('.modal-box-icon').fadeIn();
		$('.modal-box-icon-overlay').fadeIn();

		$( '#button_select_icon' ).on('click', function() {
			e.preventDefault();

			var $checked = $( 'div.menu-icon-wrap' ).find( 'input:checked' ).val();
			$('span.rt-megamenu-icon-prev-' + $id + ' i').attr( 'class', '' );
			$('span.rt-megamenu-icon-prev-' + $id + ' i').addClass( $checked );
			$('span.rt-megamenu-icon-prev-' + $id ).removeClass('hide-if-icon-empty');
			$('input#edit-menu-item-sicon-' + $id ).val( $checked );
			$( 'input#menu-icon-search' ).val('');

			$( '.menu-icon-wrap .menu-icon-style' ).each(function(e) {
				$(this).show();
			});

			$id = '';
		});
	});

	$(document).on('click', '.modal-close-button', function(e) {
		e.preventDefault();
		$('.modal-box-icon').fadeOut();
		$('.modal-box-icon-overlay').fadeOut();
	});

	$(document).on('click', '.modal-box-icon-overlay', function(e) {
		$('.modal-box-icon').fadeOut();
		$('.modal-box-icon-overlay').fadeOut();
	});

	$(document).on( 'click', '#button_select_icon', function(e) {
		$('.modal-box-icon').fadeOut();
		$('.modal-box-icon-overlay').fadeOut();
	});

	// search icon
	$(document).on( 'keyup', '#menu-icon-search', function(e) {

		var $this = $(this),
				filter = $this.val(),
				count = 0,
				regex = new RegExp( filter, "i" );

		$( '.menu-icon-wrap .menu-icon-style' ).each(function(e) {
			var classname = $('i', this).attr('class');

			if ( classname.search(regex) < 0 ) {
				$(this).hide();
			} else {
				$(this).fadeIn();
				count++;
			}
		})
	});

	// remove icon
	$(document).on( 'click', '.remove_icon', function(e) {
		e.preventDefault();

		var $this = $(this),
				$id = $this.data('id');
		$( 'span.rt-megamenu-icon-prev-' + $id ).removeClass('rt-remove-icon-style').addClass('hide-if-icon-empty');
		$( 'span.rt-megamenu-icon-prev-' + $id + ' i' ).attr( 'class', '' );
		$( 'input#edit-menu-item-sicon-' + $id ).val('');
	});

	$(document).on( 'change', '#menu-icon-filter', function(e) {
		e.preventDefault();

		var $this = $(this),
				filter = $this.val(),
				count = 0,
				regex = new RegExp( filter, 'i' );

		$( '.menu-icon-wrap .menu-icon-style' ).each( function(e) {
			var classname = $( 'i', this ).data('filter');
			if ( classname.search(regex) < 0 ) {
				$(this).hide();
			} else {
				$(this).fadeIn();
				count++;
			}
		});
	});

	$(document).on( 'change', '.menu-item-depth-0 input.rt-megamenu-enable', function() {
		if ( $(this).parent().hasClass( 'mega-menu' ) ) {
			$(this).parent().removeClass( 'mega-menu' );
		} else {
			$(this).parent().addClass( 'mega-menu' );
		}
	});

	var menu = $('#menu-to-edit');

	$(document).on('change', '.menu-item-depth-0 select.rt-megamenu-type', function() {
		var t = $(this);
		$(this).each(function() {
			if ( t.val() == 'tab' ) {
				menu.children( '.menu-item-depth-0:has( select.rt-megamenu-type )' ).each( function() {
					var item = $(this);
					item.removeClass( 'mega-menu-column' ).addClass( 'mega-menu-tab' );
					item.nextUntil('.menu-item-depth-0').removeClass('mega-menu-column').addClass( 'mega-menu-tab' );
				});
			} else {
				menu.children( '.menu-item-depth-0:has( select.rt-megamenu-type )' ).each( function() {
					var item = $(this);
					item.addClass( 'mega-menu-column' ).removeClass( 'mega-menu-tab' );
					item.nextUntil('.menu-item-depth-0').addClass('mega-menu-column').removeClass( 'mega-menu-tab' );
				});
			}
		});
	})

	if ( $( '.menu-item-depth-0 input.rt-megamenu-enable:checked' ) ) {
		$(this).parent().addClass( 'mega-menu' );
	}

	if ( $( '.menu-item-depth-0 input.rt-megamenu-tab-enable:checked' ) ) {
		$(this).parent().addClass( 'mega-menu-tab' );
	}

	function update() {
		menu.children().removeClass('mega-menu');
		menu.children('.menu-item-depth-0:has(.rt-megamenu-enable:checked)').each(function () {
			var item = $(this);
			item.addClass('mega-menu');
			item.nextUntil('.menu-item-depth-0').addClass('mega-menu');
		});
	}

	function update_tab() {
		var t = $('.menu-item-depth-0 select.rt-megamenu-type');
		menu.children().removeClass('mega-menu-tab');
		menu.children().removeClass('mega-menu-column');
		t.each(function() {
			if ( $(this).closest('li').find( '.rt-megamenu-enable').is(':checked') ) {
				if ( $(this).val() == 'tab' ) {
					menu.children( '.menu-item-depth-0:has( select.rt-megamenu-type )' ).each( function() {
						var item = $(this);
						if ( item.find( 'select.rt-megamenu-type' ).val() == 'tab' ) {
							item.removeClass( 'mega-menu-column' ).addClass( 'mega-menu-tab' );
							item.nextUntil('.menu-item-depth-0').removeClass('mega-menu-column').addClass( 'mega-menu-tab' );
						}

					});
				} else if ( t.val() == 'column' ) {
					menu.children( '.menu-item-depth-0:has( select.rt-megamenu-type )' ).each( function() {
						var item = $(this);
						if ( item.find( 'select.rt-megamenu-type' ).val() == 'column' ) {
							item.addClass( 'mega-menu-column' ).removeClass( 'mega-menu-tab' );
							item.nextUntil('.menu-item-depth-0').addClass('mega-menu-column').removeClass( 'mega-menu-tab' );
						}
					});
				}
			}

		});
	}

	$(document).on('change', '.menu-item-depth-0 .rt-megamenu-enable', update);
	$(document).on('change', '.menu-item-depth-0 select.rt-megamenu-type', update_tab);
	// FIXME our handler should be called after WP handler
	menu.on('sortstop', function () {
		setTimeout(update, 1);
	});

	menu.on('sortstop', function () {
		setTimeout(update_tab, 1);
	});

	update();
	update_tab();

	// add widget to menu
	$('#submit-megamenu-widget').on('click', function(e) {
		console.log( 'a' );
		rt_megamenu_add_item();
	});

	function rt_megamenu_add_item() {
		if ( 0 == $('#menu-to-edit').length ) {
			return false;
		}

		var t = $( '.rt_megamenu_widget' ), menuItems = {}, checkboxs = t.find( 'li input[type="checkbox"]:checked' ), re = /menu-item\[([^\]]*)/;

		processMethod = wpNavMenu.addMenuItemToBottom;

		if ( !checkboxs.length ) {
			return false;
		}

		t.find('.spinner').css( 'visibility', 'visible' );

		$(checkboxs).each(function() {
			var t = $(this), id = t.closest( 'li' ).data( 'id' );

			menuItems[id] = t.closest('li').getItemData( 'add-menu-item', id );
		});

		wpNavMenu.addItemToMenu( menuItems, processMethod, function() {
			checkboxs.removeAttr('checked');
			t.find('.spinner').css( 'visibility', 'hidden' );
		});
	}


	//save option for mega menu
	$( 'button#submit-save-setting' ).on( 'click', function(e) {
		e.preventDefault();
		var transition = $( 'input[name="megamenu-transition"]:checked').val(), t = $(this);
		t.parent().find('.spinner').css( 'visibility', 'visible' );
		$.ajax({
			url: ajaxurl,
			type: "POST",
			dataType: 'json',
			data: {
				action: 'rt_mega_menu_save_option',
				transition: transition
			},
			success: function( res ) {
				console.log( res );
				t.parent().find('.spinner').css( 'visibility', 'hidden' );
			}
		});
	});
});
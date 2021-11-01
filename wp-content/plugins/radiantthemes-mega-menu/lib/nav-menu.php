<?php
add_action( 'wp_update_nav_menu_item', 'rt_megamenu_custom_nav_menu', 10, 3 );
function rt_megamenu_custom_nav_menu( $menu_id, $menu_item_db_id, $args ) {

	$classes = array(
		'menu-item-enable-megamenu'     => '_rt_megamenu_enable',
		'menu-item-hide-label'          => '_rt_megamenu_hide_label',
		'menu-item-enable-row'          => '_rt_megamenu_enable_row',
		'menu-item-widgets'             => '_rt_megamenu_widget',
		'menu-item-enable-megamenu-tab' => '_rt_megamenu_tab_enable',
		'menu-item-enable-fullwidth'    => '_rt_megamenu_enable_fullwidth',
	);

	foreach ( $classes as $id => $meta_key ) {
		if ( isset( $_POST[ $id ][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, $meta_key, 'true' );
		} else {
			delete_post_meta( $menu_item_db_id, $meta_key );
		}
	}

	if ( isset( $_REQUEST['menu-item-megamenu-type'] ) ) {
		$value = $_REQUEST['menu-item-megamenu-type'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_rt_megamenu_type', $value );
	}

	if ( isset( $_REQUEST['menu-item-sicon'] ) ) {
		if ( is_array( $_REQUEST['menu-item-sicon'] ) ) {
			$value = $_REQUEST['menu-item-sicon'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_rt_megamenu_sicon', $value );
		}
	}
}

add_filter( 'wp_edit_nav_menu_walker', 'rt_megamenu_custom_nav_edit_walker', 10, 2 );
function rt_megamenu_custom_nav_edit_walker($walker,$menu_id) {
	return 'RT_Megamenu_Menu_Items';
}

class RT_Megamenu_Menu_Items extends Walker_Nav_Menu {
	/**
	 * Starts the list before the elements are added.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {}

	/**
	 * Ends the list of after the elements are added.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {}

	/**
	 * Start the element output.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $_wp_nav_menu_max_depth;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		ob_start();
		$item_id = esc_attr( $item->ID );
		$removed_args = array(
			'action',
			'customlink-tab',
			'edit-menu-item',
			'menu-item',
			'page-tab',
			'_wpnonce',
		);

		$original_title = '';
		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) )
				$original_title = false;
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title = get_the_title( $original_object->ID );
		} elseif ( 'menu_widget' == $item->type ) {
			$original_title = 'Widgets';
			$item->type_label = 'Widget';
		}

		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
		);

		$title = $item->title;

		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			/* translators: %s: title of menu item which is invalid */
			$title = sprintf( __( '%s (Invalid)', 'framework' ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			/* translators: %s: title of menu item in draft status */
			$title = sprintf( __('%s (Pending)', 'framework'), $item->title );
		}

		$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

		$submenu_text = '';
		if ( 0 == $depth )
			$submenu_text = 'style="display: none;"';

		$megamenu_enable           = get_post_meta( $item->ID, '_rt_megamenu_enable', true );
		$megamenu_icon             = get_post_meta( $item->ID, '_rt_megamenu_sicon', true );
		$megamenu_enable_row       = get_post_meta( $item->ID, '_rt_megamenu_enable_row', true );
		$megamenu_hide_label       = get_post_meta( $item->ID, '_rt_megamenu_hide_label', true );
		$megamenu_widget           = get_post_meta( $item->ID, '_rt_megamenu_widget', true );
		$megamenu_tab_enable       = get_post_meta( $item->ID, '_rt_megamenu_tab_enable', true );
		$megamenu_enable_fullwidth = get_post_meta( $item->ID, '_rt_megamenu_enable_fullwidth', true );
		$megamenu_type             = get_post_meta( $item->ID, '_rt_megamenu_type', true );
		$megamenu_type             = !empty( $megamenu_type ) ? $megamenu_type : 'column';
		?>
		<li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
			<dl class="menu-item-bar">
				<dt class="menu-item-handle">
					<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span>
					<span class="item-controls">
						<span class="item-type show-if-mega-menu-top"><?php echo __('Mega Menu', 'rt-megamenu') ?></span>
						<span class="item-type show-if-mega-menu-column"><?php echo __('Column', 'rt-megamenu') ?></span>
						<span class="item-type show-if-mega-menu-tab"><?php echo __('Tab', 'rt-megamenu') ?></span>
						<span class="item-type hide-if-mega-menu-top hide-if-mega-menu-column hide-if-mega-menu-tab"><?php echo esc_html( $item->type_label ); ?></span>
						<span class="item-order hide-if-js">
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-up-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up'); ?>">&#8593;</abbr></a>
							|
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-down-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down'); ?>">&#8595;</abbr></a>
						</span>
						<a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item'); ?>" href="<?php
							echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
						?>"><?php _e( 'Edit Menu Item' ); ?></a>
					</span>
				</dt>
			</dl>

			<div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
				<?php if( 'custom' == $item->type ) : ?>
					<p class="field-url description description-wide <?php if ( $item->type == 'menu_widget' ) echo 'hide-if-menu-is-widget' ?>">
						<label for="edit-menu-item-url-<?php echo $item_id; ?>">
							<?php _e( 'URL' ); ?><br />
							<input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
						</label>
					</p>
				<?php endif; ?>
				<p class="description description-wide <?php if ( $item->type == 'menu_widget' ) echo 'hide-if-menu-is-widget' ?>">
					<label for="edit-menu-item-title-<?php echo $item_id; ?>">
						<span class="show-if-mega-menu-top show-if-mega-menu-top-tab"><?php _e( 'Mega Menu Label', 'rt-megamenu' ) ?></span>
						<span class="show-if-mega-menu-column"><?php _e( 'Mega Menu Column Label', 'rt-megamenu' ) ?></span>
						<span class="show-if-mega-menu-tab"><?php _e( 'Mega Menu Tab Label', 'rt-megamenu' ) ?></span>
						<span class="hide-if-mega-menu-top-tab hide-if-mega-menu-top hide-if-mega-menu-column hide-if-mega-menu-tab"><?php _e( 'Navigation Label', 'rt-megamenu' ) ?></span>
						<input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title rt-mega-menu-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
					</label>

					<label class="rt-mega-menu-title-off-label" for="edit-menu-item-hide-label-<?php echo $item_id; ?>">
						<input type="checkbox" class="rt-mega-menu-disable-label" name="menu-item-hide-label[<?php echo $item_id; ?>]" id="edit-menu-item-hide-label-<?php echo $item_id; ?>" <?php checked( $megamenu_hide_label, 'true' ); ?> />
						<?php _e( 'Hide', 'rt-megamenu' ); ?>
					</label>
				</p>
				<p class="field-title-attr description description-wide <?php if ( $item->type == 'menu_widget' ) echo 'hide-if-menu-is-widget' ?>">
					<label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
						<?php _e( 'Title Attribute' ); ?><br />
						<input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
					</label>
				</p>

				<?php
				/*
				 * Start add feild here
				*/
				?>

				<p class="field-enabel-row description description-wide hide-if-mega-menu-tab">
					<label for="edit-menu-item-enable-row-<?php echo $item_id; ?>">
						<input type="checkbox" name="menu-item-enable-row[<?php echo $item_id; ?>]" id="edit-menu-item-enable-row-<?php echo $item_id; ?>" <?php checked( $megamenu_enable_row, 'true' ); ?> />
						<?php _e( 'Start a new row', 'rt-megamenu' ); ?>
					</label>
				</p>

				<?php
				/*
				 * End add feild here
				*/
				?>

				<p class="field-link-target description <?php if ( $item->type == 'menu_widget' ) echo 'hide-if-menu-is-widget' ?>">
					<label for="edit-menu-item-target-<?php echo $item_id; ?>">
						<input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
						<?php _e( 'Open link in a new window/tab' ); ?>
					</label>
				</p>
				<p class="field-css-classes description description-thin <?php if ( $item->type == 'menu_widget' ) echo 'hide-if-menu-is-widget' ?>">
					<label for="edit-menu-item-classes-<?php echo $item_id; ?>">
						<?php _e( 'CSS Classes (optional)' ); ?><br />
						<input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
					</label>
				</p>
				<p class="field-xfn description description-thin <?php if ( $item->type == 'menu_widget' ) echo 'hide-if-menu-is-widget' ?>">
					<label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
						<?php _e( 'Link Relationship (XFN)' ); ?><br />
						<input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
					</label>
				</p>

				<?php
				/*
				 * Start add feild here
				*/
				?>

				<p class="field-description-html description description-wide <?php if ( $item->type == 'menu_widget' ) echo 'hide-if-menu-is-widget' ?>">
					<label for="edit-menu-item-description-<?php echo $item_id; ?>">
						<?php _e( 'Description (HTML)' ); ?><br />
						<textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->post_content ); // textarea_escaped ?></textarea>
						<span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.'); ?></span>
					</label>
				</p>

				<p class="field-sicon description description-wide <?php if ( $item->type == 'menu_widget' ) echo 'hide-if-menu-is-widget' ?>">
					<label for="edit-menu-item-sicon-<?php echo $item_id; ?>">
						<?php _e( 'Icon', 'rt-megamenu' ); ?><br>
						<!-- <button class="button rt_megamenu_select_sicon_menu" data-id="<?php echo $item_id; ?>" ><?php _e( 'Select Icon', 'rt-megamenu' ); ?></button> -->
						<a href="#" class="button rt_megamenu_select_sicon_menu" data-id="<?php echo $item_id; ?>" data-action="mega-menu-pick-icon">
							<span class="inline-if-empty"><?php _e('Add Icon', 'rt-megamenu') ?></span>
						</a>&nbsp;
						<span class="rt-megamenu-icon-prev-<?php echo $item_id; ?> <?php if ( empty( $megamenu_icon ) ) { echo "hide-if-icon-empty"; } ?>">
							<i class="<?php echo $megamenu_icon; ?>"></i>
							<a class="rt-remove-icon-style remove_icon" data-id="<?php echo $item_id; ?>" title="Remove Icon">
								<span class="dashicons dashicons-no-alt"></span>
							</a>
						</span>
						<input type="hidden" name="menu-item-sicon[<?php echo $item_id; ?>]" id="edit-menu-item-sicon-<?php echo $item_id; ?>" value="<?php echo $megamenu_icon; ?>" />
					</label>
				</p>

				<p class="field-megamenu description description-wide <?php if ( $item->type == 'menu_widget' ) echo 'hide-if-menu-is-widget' ?>">
					<label for="edit-menu-item-enable-megamenu-<?php echo $item_id; ?>">
						<input type="checkbox" class="rt-megamenu-enable" name="menu-item-enable-megamenu[<?php echo $item_id; ?>]" id="edit-menu-item-enable-megamenu-<?php echo $item_id; ?>" <?php checked( $megamenu_enable, 'true' ); ?> />
						<?php _e( 'Use as Mega Menu', 'rt-megamenu' ); ?>
					</label>
				</p>

				<p class="field-enabel-fullwidth description description-wide">
					<label for="edit-menu-item-enable-fullwidth-<?php echo $item_id; ?>">
						<input type="checkbox" name="menu-item-enable-fullwidth[<?php echo $item_id; ?>]" id="edit-menu-item-enable-fullwidth-<?php echo $item_id; ?>" <?php checked( $megamenu_enable_fullwidth, 'true' ); ?> />
						<?php _e( 'Full Width Drop Down', 'rt-megamenu' ); ?>
					</label>
				</p>

				<p class="field-megamenu-type description description-wide <?php if ( $item->type == 'menu_widget' ) echo 'hide-if-menu-is-widget' ?>">
					<label for="edit-menu-item-megamenu-type-<?php echo $item_id ?>">
						<?php _e( 'Use Submenus as:', 'rt-megamenu' ); ?>
						<select class="widefat rt-megamenu-type" name="menu-item-megamenu-type[<?php echo $item_id; ?>]" id="edit-menu-item-megamenu-type-<?php echo $item_id ?>">
							<option <?php selected( $megamenu_type, 'column' ) ?> value="column"><?php _e( 'Column', 'rt-megamenu' ); ?></option>
							<option <?php selected( $megamenu_type, 'tab' ) ?> value="tab"><?php _e( 'Tab', 'rt-megamenu' ); ?></option>
						</select>
					</label>
				</p>

				<?php
				/*
				 * End add feild here
				*/
				?>

				<p class="field-move hide-if-no-js description description-wide">
					<label>
						<span><?php _e( 'Move' ); ?></span>
						<a href="#" class="menus-move menus-move-up" data-dir="up"><?php _e( 'Up one' ); ?></a>
						<a href="#" class="menus-move menus-move-down" data-dir="down"><?php _e( 'Down one' ); ?></a>
						<a href="#" class="menus-move menus-move-left" data-dir="left"></a>
						<a href="#" class="menus-move menus-move-right" data-dir="right"></a>
						<a href="#" class="menus-move menus-move-top" data-dir="top"><?php _e( 'To the top' ); ?></a>
					</label>
				</p>

				<div class="menu-item-actions description-wide submitbox">
					<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
						<p class="link-to-original">
							<?php printf( __('Original: %s'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
						</p>
					<?php endif; ?>
					<a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
					echo wp_nonce_url(
						add_query_arg(
							array(
								'action' => 'delete-menu-item',
								'menu-item' => $item_id,
							),
							admin_url( 'nav-menus.php' )
						),
						'delete-menu_item_' . $item_id
					); ?>"><?php _e( 'Remove' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
						?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel'); ?></a>
				</div>

				<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
				<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
				<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
				<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
				<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
				<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
			</div><!-- .menu-item-settings-->
			<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
	}
} // Walker_Nav_Menu_Edit

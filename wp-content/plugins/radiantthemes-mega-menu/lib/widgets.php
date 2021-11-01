<?php
class RT_Megamenu_Widgets
{

	public $prefix = 'rt_megamenu_widget';

	function __construct()
	{
		add_action( 'admin_init', array( $this, 'add_meta_box' ) );
		add_action( 'widgets_init', array( $this, 'register_sidebar_for_widget_menu' ) );

		add_filter( 'walker_nav_menu_start_el', array( $this, 'start_el' ), 1, 4 );

		// Just for Wordpress 4.3
		add_filter( 'customize_nav_menu_available_item_types', array( $this, 'available_item_types' ), 10, 1 );
		add_filter( 'customize_nav_menu_available_items', array( $this, 'load_available_items_query'), 10, 4 );
	}

	public function add_meta_box() {
		add_meta_box( 'rt-menu-widgets', __( 'Widgets', 'rt-megamenu' ), array( $this, 'metabox' ), 'nav-menus', 'side', 'default' );
	}

	public function get_menu_item( $id, $args = array() ) {
		$default = array(
			'menu-item-db-id'      => 0,
			'menu-item-object'     => '',
			'menu-item-parent-id'  => 0,
			'menu-item-type'       => 'menu_widget',
			'menu-item-title'      => 'Widget',
			'menu-item-url'        => '#',
			'menu-item-target'     => '',
			'menu-item-attr_title' => '',
			'menu-item-classes'    => '',
			'menu-item-xfn'        => '',
		);

		$args = wp_parse_args( $args, $default );

		$output = '';

		foreach( $args as $key => $value ) {
			$output .= '<input type="hidden" name="menu-item['. $id .']['. $key .']" value="'. $value .'" />';
		}

		return $output;
	}

	public function metabox() {
		global $_nav_menu_placeholder, $nav_menu_selected_id, $wp_registered_widgets, $wp_registered_sidebars;

		$output = '';

		$sidebars_widgets = wp_get_sidebars_widgets();

		if ( empty( $wp_registered_sidebars[$this->prefix] ) || empty( $sidebars_widgets[$this->prefix] ) || !is_array( $sidebars_widgets[$this->prefix] ) ) {
			$no_widget_available = '<p>';
			$no_widget_available .= sprintf( __( '<a href="%s">Please add a widget</a> to the <em>Widgets in Menu</em> area', 'rt-megamenu' ), admin_url( 'widgets.php' ) );
			$no_widget_available .= '</p>';

			$output .= $no_widget_available;
		} else {

			$output .= '<ul>';

			foreach ( (array) $sidebars_widgets[$this->prefix] as $id ) {

				if ( !isset( $wp_registered_widgets[$id] ) ) continue;

				$_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;

				$widget = $wp_registered_widgets[$id];

				$widget_num = $widget['params'][0]["number"];

				$widget_slug = rtrim(preg_replace("|[0-9]+|i", "", $id), '-');

				$widget_saved = get_option( 'widget_' . $widget_slug, array() );

				$widget_title = $widget_saved[$widget_num]['title'];

				$widget_name = $widget['name'];
				$widget_name .= (empty($widget_title)) ? '' : ': ' . $widget_title;

				$output .= '<li data-id="'. $_nav_menu_placeholder .'">';

				$output .= '<label for="' . $id . '">';
				$output .= '<input type="checkbox" name="menu-item['. $_nav_menu_placeholder .'][menu-item-object-id]" id="'. $id .'" value="'. $widget_num .'" class="" />';
				$output .= $widget_name;
				$output .= '</label>';

				$output .= $this->get_menu_item( $_nav_menu_placeholder, array( 'menu-item-object' => $id, 'menu-item-title' => $widget_name, 'menu-item-xfn' => $id ) );

				$output .= '</li>';

			}

			$output .= '</ul>';

		}

		?>
		<div class="rt_megamenu_widget" id="rt_megamenu_widget">
			<?php echo $output; ?>
			<p class="button-controls">
				<span class="add-to-menu">
					<input type="submit"<?php wp_nav_menu_disabled_check($nav_menu_selected_id); ?> class="button-secondary submit-add-to-menu right" value="<?php _e( 'Add to menu', 'rt-megamenu' ); ?>" name="rt-megamenu-menu-item" id="submit-megamenu-widget" />
					<span class="spinner"></span>
				</span>
			</p>
		</div>
		<?php
	}

	public function register_sidebar_for_widget_menu() {

		$args = array(
			'name'          => __( 'Widgets in Menu', 'rt-megamenu' ),
			'id'            => $this->prefix,
			'description'   => 'Add a widget into Megamenu',
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="rt-megamenu-widget-title">',
			'after_title'   => '</h3>',
		);

		register_sidebar( $args );
	}

	public function start_el( $item_output, $item, $depth, $args ) {

		if ( $item->type !== 'menu_widget' ) {
			return $item_output;
		}

		global $wp_registered_widgets, $wp_registered_sidebars;

		$id = $item->object;

		if ( !isset( $wp_registered_widgets[ $id ] ) ) {
			return $item_output;
		}

		$sidebar = array_merge(
			$wp_registered_sidebars[ $this->prefix ],
			array( 'widget_id' => $id, 'widget_name' => $wp_registered_widgets[$id]['name'] )
		);

		$params = array_merge(
			array($sidebar),
			(array) $wp_registered_widgets[ $id ]['params']
		);

		$classname = '';
		foreach( (array) $wp_registered_widgets[ $id ]['classname'] as $cn ) {
			if ( is_string( $cn ) ) {
				$classname = '_' . $cn;
			} elseif ( is_object( $cn ) ) {
				$classname = '_' . get_class( $cn );
			}
		}
		$classname = ltrim( $classname, '_' );

		$params[0]['before_widget'] = sprintf( $params[0]['before_widget'], $id, $classname );


		$rt_megamenu_widget = $wp_registered_widgets[$id];

		$wrapper_class = $this->prefix . '_wrap';

		$callback = $wp_registered_widgets[$id]['callback'];

		if ( is_callable( $callback ) ) {
			ob_start();

			?>
			<div class="rt-megamenu-widget">
			<?php call_user_func_array( $callback, $params ); ?>
			</div>
			<?php

			$item_output = ob_get_contents();
			ob_get_clean();
		}

		return $item_output;
	}


	// Just for Wordpress 4.3

	public function available_item_types( $item_types ) {
		$item_types[] = array(
			'title' => 'Widgets',
			'type' => 'menu_widget',
			'object' => $this->prefix,
		);

		return $item_types;
	}

	public function load_available_items_query( $items, $type, $object, $page ) {
		if ( $type = 'menu_widget' ) {
			global $_nav_menu_placeholder, $nav_menu_selected_id, $wp_registered_widgets, $wp_registered_sidebars;
			$sidebars_widgets = wp_get_sidebars_widgets();

			foreach( (array) $sidebars_widgets[ $this->prefix ] as $widget_item ) {
				if ( !isset( $wp_registered_widgets[$widget_item] ) ) continue;
				$_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;
				$widget = $wp_registered_widgets[ $widget_item ];
				$widget_slug = rtrim(preg_replace("|[0-9]+|i", "", $widget_item), '-');
				$widget_saved = get_option( 'widget_' . $widget_slug, array() );
				$widget_title = $widget_saved[$widget_num]['title'];
				$widget_name = $widget['name'];
				$widget_name .= (empty($widget_title)) ? '' : ': ' . $widget_title;

				$items[] = array(
					'id' => $widget_item,
					'title' => $widget_name,
					'type' => 'menu_widget',
					'type_label' => 'Widgets',
					'object' => $widget_item,
					'object_id' => $_nav_menu_placeholder,
					'url' => ''
				);
			}
		}

		return $items;
	}
}

return new RT_Megamenu_Widgets();
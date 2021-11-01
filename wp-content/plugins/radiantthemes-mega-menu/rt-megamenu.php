<?php
/**
 * Plugin Name: RadiantThemes Mega Menu
 * Version: 1.2.0
 * Author: RadiantThemes
 * Author URI: http://radiantthemes.com/
 * Description: Adding a versatile navigation to your site
 *
 */

if ( ! defined( 'RTM_DIR' ) ) {
	define( 'RTM_DIR', trailingslashit( plugin_dir_url( __FILE__ ) ) );
}
if ( ! defined( 'RTM_PATH' ) ) {
	define( 'RTM_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}

class RT_Megamenu {

	public function __construct(){
		global $pagenow;
		load_plugin_textdomain( 'rt-megamenu', false, RTM_PATH . 'languages' );
		//add_action( 'admin_menu', array( $this, 'admin_menu_init' ) );

		//Add bootstrap scripts and style
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
		add_filter( 'wp_nav_menu_args', array( __CLASS__, 'replace_walker' ), 9999999 );
		if ( 'nav-menus.php' == $pagenow ) {
			add_action( 'admin_head', array( $this, 'admin_menu_modal' ) );
		}

	}

	public function admin_menu_init() {

		add_menu_page(
			__( 'RT Megamenu' , 'rt-megamenu' ),
			__( 'RT Megamenu' , 'rt-megamenu' ),
			'manage_options',
			'rt-megamenu',
			array( $this, 'admin_menu_callback' ),
			'dashicons-welcome-widgets-menus',
			99
		);
	}

	public static function replace_walker( $args ) {
		$args['walker'] = new RT_Megamenu_Render( $args['walker'] );
		return $args;
	}

	public function admin_menu_callback() {
		include RTM_PATH . 'templates/admin/builder.php';
	}

	public function admin_menu_modal() {
		$filter = array(
			'web_app'        => __( 'Web Application Icons', 'rt-megamenu' ),
			'transportation' => __( 'Transportation Icons', 'rt-megamenu' ),
			'gender'         => __( 'Gender Icons', 'rt-megamenu' ),
			'file_type'      => __( 'Filt Type Icons', 'rt-megamenu' ),
			'spinner'        => __( 'Spinner Icons', 'rt-megamenu' ),
			'form_control'   => __( 'Form Control Icons', 'rt-megamenu' ),
			'payment'        => __( 'Payment Icons', 'rt-megamenu' ),
			'chart'          => __( 'Chart Icons', 'rt-megamenu' ),
			'currency'       => __( 'Currency Icons', 'rt-megamenu' ),
			'text_editor'    => __( 'Text Editor', 'rt-megamenu' ),
			'directional'    => __( 'Directional Icons', 'rt-megamenu' ),
			'video_player'   => __( 'Video Player Icons', 'rt-megamenu' ),
			'brand'          => __( 'Brand Icons', 'rt-megamenu' ),
			'medical'        => __( 'Medical', 'rt-megamenu' ),
		);
		include RTM_PATH . 'lib/icon.php';
		include RTM_PATH . 'templates/admin/icon.php';
	}

	public function wp_enqueue_scripts() {
		wp_enqueue_style( 'rt-megamenu-front-end-style', RTM_DIR . 'assets/css/rt-megamenu.css' );
		wp_enqueue_script( 'rt-megamenu-front-end-js', RTM_DIR . 'assets/js/rt-megamenu.js', array( 'jquery' ), false, true );
	}

	public function admin_enqueue_scripts() {
		global $pagenow;

		if( 'nav-menus.php' == $pagenow ) {
			wp_enqueue_style( 'rt-megamenu-nav-menu-style', RTM_DIR . 'assets/css/nav-menu.css' );
			wp_enqueue_script( 'rt-megamenu-nav-menu-js', RTM_DIR . 'assets/js/nav-menu.js', array( 'jquery' ), false, true );
			wp_enqueue_style( 'rt-megamenu-style', RTM_DIR . 'assets/css/font-awesome.css' );
		}
	}

}


require_once RTM_PATH . 'lib/render.php';
require_once RTM_PATH . 'lib/nav-menu.php';
require_once RTM_PATH . 'lib/widgets.php';
require_once RTM_PATH . 'lib/setting.php';

$GLOBALS['rt-megamenu'] = new RT_Megamenu();

function rt_megamenu_meta( $post, $key, $default = false, $clear = false ) {
	static $meta = array();

	if ( $clear ) {
		$meta = array();
	}

	$post_id = is_object( $post ) ? $post->ID : $post;

	if ( !isset( $meta[$post_id] ) ) {
		$meta[$post_id] = get_post_meta( $post_id, $key, true );
	}

	return isset( $meta[$post_id] ) ? $meta[$post_id] : $default;
}

add_filter( 'walker_nav_menu_start_el', 'rt_megamenu_filter_start_el', 10, 4 );
function rt_megamenu_filter_start_el( $item_output, $item, $depth, $args ) {
	$hidelabel = get_post_meta( $item->ID, '_rt_megamenu_hide_label', true );
	if ( $depth > 0 && 'true' == $hidelabel ) {
		$item_output = '';
	}

	if ( $depth > 0 && trim( $item->post_content ) ) {
		ob_start();
		?>
		<div class="rt-megamenu-description"><?php rt_megamenu_the_content_by_id( $item->ID ); ?></div>
		<?php
		$item_output .= ob_get_clean();
	}

	return $item_output;
}

function rt_megamenu_the_content_by_id( $post_id=0, $more_link_text = null, $stripteaser = false ){
	global $post;
	$post = get_post($post_id);
	setup_postdata( $post, $more_link_text, $stripteaser );
	the_content();
	wp_reset_postdata( $post );
}

add_filter( 'widget_title', 'rt_megamenu_remove_title_wiget_if_empty', 10, 3 );
function rt_megamenu_remove_title_wiget_if_empty( $title, $instance, $id_base ) {
	if ( empty( $instance['title'] ) ) {
		$title = '';
	}

	return $title;
}

add_filter( 'wp_nav_menu_objects', 'rt_megamenu_add_class', 10, 2 );
function rt_megamenu_add_class( $sorted_menu_items, $args ) {
	$mega_menu = array();
	$parent = array();
	$mega_menu_tab = array();

	foreach( $sorted_menu_items as $item ) {
		$megamenu_enable = get_post_meta( $item->ID, '_rt_megamenu_enable', true );
		$megamenu_type = get_post_meta( $item->ID, '_rt_megamenu_type', true );
		if ( $item->menu_item_parent == 0 && $megamenu_enable === 'true' && $megamenu_type == 'column' ) {
			$mega_menu[ $item->ID ] = true;
		}

		if ( $item->menu_item_parent == 0 && $megamenu_enable == 'true' && $megamenu_type === 'tab' ) {
			$mega_menu_tab[$item->ID] = true;
		}

		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parent[] = $item->menu_item_parent;
		}
	}

	foreach( $sorted_menu_items as $item ) {
		$fullwidth = get_post_meta( $item->ID, '_rt_megamenu_enable_fullwidth', true );

		if ( !isset( $mega_menu[ $item->ID ] ) && !isset( $mega_menu_tab[ $item->ID ] ) && $item->menu_item_parent == 0 ) {
			$item->classes[] = 'menu-flyout';
		}

		if ( isset( $mega_menu[$item->menu_item_parent] ) ) {
			$item->classes[] = 'rt-mega-menu-col';
		}

		if ( isset( $mega_menu_tab[ $item->menu_item_parent ] ) ) {
			$item->classes[] = 'rt-mega-menu-tab';
		}

		if ( $fullwidth == 'true' || isset( $mega_menu_tab[ $item->ID ] ) ) {
			$item->classes[] = 'rt-mega-menu-full-width';
		}

		$item->classes[] = 'rt-mega-menu-hover';
	}

	return $sorted_menu_items;
}

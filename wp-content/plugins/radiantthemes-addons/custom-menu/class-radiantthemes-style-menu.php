<?php
/**
 * Custom Menu
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Menu' ) ) {

	/**
	 * Get All created menu list.
	 *
	 * @return array
	 */
	function rt_get_menu() {
		$custom_menus = array();
		if ( 'vc_edit_form' === vc_post_param( 'action' ) && vc_verify_admin_nonce() ) {
			$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
			if ( is_array( $menus ) && ! empty( $menus ) ) {
				foreach ( $menus as $single_menu ) {
					if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->term_id ) ) {
						$custom_menus[ $single_menu->name ] = $single_menu->term_id;
					}
				}
			}
		}
		return $custom_menus;
	}
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Menu extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Custom Menu', 'radiantthemes-addons' ),
					'base'        => 'rt_menu_style',
					'description' => esc_html__( 'Add Custom Menu with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/custom-menu/icon/Menu-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_menu_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Menu Style', 'radiantthemes-addons' ),
							'param_name' => 'style_variation',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Menu', 'radiantthemes-addons' ),
							'param_name'  => 'nav_menu',
							'value'       => array_flip( rt_get_menu() ),
							'description' => empty( rt_get_menu() ) ? esc_html__( 'Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu.', 'radiantthemes-addons' ) : esc_html__( 'Select menu to display.', 'radiantthemes-addons' ),
							'save_always' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
						),
					),
				)
			);
			add_shortcode( 'rt_menu_style', array( $this, 'radiantthemes_menu_style_func' ) );
		}

		/**
		 * [radiantthemes_menu_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_menu_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation' => 'one',
					'nav_menu'        => '',
					'extra_class'     => '',
					'extra_id'        => '',
				), $atts
			);

			wp_register_style(
				'radiantthemes_menu_' . $shortcode['style_variation'] . '',
				plugins_url( 'radiantthemes-addons/custom-menu/css/radiantthemes-menu-element-' . $shortcode['style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_menu_' . $shortcode['style_variation'] . '' );
			?>
			<!-- rt menu -->
			<?php
			$ex_id  = $shortcode['extra_id'] ? 'id="' . $shortcode['extra_id'] . '"' : '';
			$output = '<div class="rt-menu element-' . $shortcode['style_variation'] . ' ' . $shortcode['extra_class'] . '"  ' . $ex_id . '  >';
			require 'template/template-menu-item-' . $shortcode['style_variation'] . '.php';
			$output .= '</div>' . "\r";
			$output .= '<!-- rt menu -->' . "\r";
			return $output;
		}
	}
}

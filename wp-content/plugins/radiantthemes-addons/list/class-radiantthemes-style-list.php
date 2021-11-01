<?php
/**
 * List Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_List' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_List extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'List', 'radiantthemes-addons' ),
					'base'        => 'rt_list_style',
					'description' => esc_html__( 'Add List with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/list/icon/List-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_list_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'List Style', 'radiantthemes-addons' ),
							'param_name'  => 'style_variation',
							'value'       => array(
								'Style One (Dot)'     => 'one',
								'Style Two (Blank Check Circle)' => 'two',
								'Style Three (Sun)'   => 'three',
								'Style Four (Carret)' => 'four',
								'Style Five (Fill Check Circle)' => 'five',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'textarea_html',
							'heading'     => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name'  => 'content',
							'value'       => wp_kses_post(
								'<ul>
                                    <li>List Item Text One</li>
                                    <li>List Item Text Two</li>
                                    <li>List Item Text Three</li>
                                </ul>', 'radiantthemes-addons'
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'List Icon Color', 'radiantthemes-addons' ),
							'param_name'  => 'list_icon_color',
							'description' => esc_html__( 'Set your List Icon Color. (If not selected, it will take theme default color)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'  => 'animation',
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'admin_label' => false,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Css', 'radiantthemes-addons' ),
							'param_name' => 'css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'tab_id',
							'edit_field_class' => 'hidden',
							'heading'          => esc_html__( 'List Icon ID', 'radiantthemes-addons' ),
							'param_name'       => 'list_icon_test',
						),
					),
				)
			);
			add_shortcode( 'rt_list_style', array( $this, 'radiantthemes_list_style_func' ) );
		}

		/**
		 * [radiantthemes_list_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_list_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation' => 'one',
					'animation'       => '',
					'list_icon_color' => '',
					'list_icon_test'  => '',
					'extra_class'     => '',
					'extra_id'        => '',
					'css'             => '',

				), $atts
			);
			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['css'], ' ' ), $atts );
			wp_register_style(
				'radiantthemes_list_' . $shortcode['style_variation'],
				plugins_url( 'radiantthemes-addons/list/css/radiantthemes-list-element-' . $shortcode['style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_list_' . $shortcode['style_variation'] );

			$custom_css = ".rt-list.rt{$shortcode['list_icon_test']} ul li:before{ color: {$shortcode['list_icon_color']}; }";
			wp_add_inline_style( 'radiantthemes_list_' . $shortcode['style_variation'], $custom_css );

			$list_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			$output  = "\r" . '<!-- list -->' . "\r";
			$output .= '<div class="rt-list rt' . esc_attr( $shortcode['list_icon_test'] ) . ' element-' . esc_attr( $shortcode['style_variation'] );
			$output .= ' ' . $animation_classes . ' ' . $shortcode['extra_class'] . ' ' . esc_attr( $css_class ) . '" ' . $list_id . '><p>';
			$output .= $content;
			$output .= '</p></div>' . "\r";
			$output .= '<!-- list -->' . "\r";
			return $output;
		}
	}
}

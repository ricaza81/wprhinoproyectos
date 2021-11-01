<?php
/**
 * ihover Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_ihover' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_ihover extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'ihover', 'radiantthemes-addons' ),
					'base'        => 'rt_ihover_style',
					'description' => esc_html__( 'Add ihover with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/ihover/icon/iHover-Element-Icon.jpg' ),
					'class'       => 'wpb_rt_vc_extension_ihover_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'ihover Style', 'radiantthemes-addons' ),
							'param_name'  => 'ihover_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Style Four', 'radiantthemes-addons' )  => 'four',
								esc_html__( 'Style Five', 'radiantthemes-addons' )  => 'five',
								esc_html__( 'Style Six', 'radiantthemes-addons' )   => 'six',
								esc_html__( 'Style Seven', 'radiantthemes-addons' ) => 'seven',
								esc_html__( 'Style Eight', 'radiantthemes-addons' ) => 'eight',
								esc_html__( 'Style Nine', 'radiantthemes-addons' )  => 'nine',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Image', 'radiantthemes-addons' ),
							'param_name' => 'ihover_image',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Title', 'radiantthemes-addons' ),
							'param_name'  => 'title',
							'value'       => __( 'Hover Title', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Content', 'radiantthemes-addons' ),
							'value'      => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
							'param_name' => 'ihover_content',
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
					),
				)
			);
			add_shortcode( 'rt_ihover_style', array( $this, 'radiantthemes_ihover_style_func' ) );
		}

		/**
		 * [radiantthemes_ihover_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_ihover_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'ihover_style'   => 'one',
					'ihover_image'   => '',
					'title'          => esc_html__( 'Hover Title', 'radiantthemes-addons' ),
					'ihover_content' => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
					'animation'      => '',
					'extra_class'    => '',
					'extra_id'       => '',
					'css'            => '',

				), $atts
			);
			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['css'], ' ' ), $atts );
			wp_register_style(
				'radiantthemes_ihover_' . $shortcode['ihover_style'],
				plugins_url( 'radiantthemes-addons/ihover/css/radiantthemes-ihover-element-' . $shortcode['ihover_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_ihover_' . $shortcode['ihover_style'] );

			$ihover_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';
			$output = '<div class="rt-ihover element-' . esc_attr( $shortcode['ihover_style'] );
			$output .= ' ' . $animation_classes . ' ' . $shortcode['extra_class'] . ' ' . esc_attr( $css_class ) . '" ' . $ihover_id . '>';
			require 'template/template-ihover-style-' . esc_attr( $shortcode['ihover_style'] ) . '.php';
			$output .= '</div>';
			return $output;
		}
	}
}

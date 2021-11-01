<?php
/**
 * Separator Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Beforeafter' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Beforeafter extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Before-After', 'radiantthemes-addons' ),
					'base'        => 'rt_beforeafter_style',
					'description' => esc_html__( 'Add Before-After comparison effect', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/beforeafter/icon/BeforeAfter-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_beforeafter_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Before After Style', 'radiantthemes-addons' ),
							'param_name'  => 'beforeafter_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
							),
							'admin_label' => true,
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Before image', 'radiantthemes-addons' ),
							'param_name' => 'before_image',
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'After image', 'radiantthemes-addons' ),
							'param_name' => 'after_image',
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
					),
				)
			);
			add_shortcode( 'rt_beforeafter_style', array( $this, 'radiantthemes_beforeafter_style_func' ) );
		}

		/**
		 * [radiantthemes_beforeafter_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_beforeafter_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'beforeafter_style' => 'one',
					'before_image'      => '',
					'after_image'       => '',
					'animation'         => '',
					'extra_class'       => '',
					'extra_id'          => '',
				), $atts
			);

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );
			wp_register_style(
				'radiantthemes_beforeafter_' . $shortcode['beforeafter_style'],
				plugins_url( 'radiantthemes-addons/beforeafter/css/radiantthemes-beforeafter-element-' . $shortcode['beforeafter_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_beforeafter_' . $shortcode['beforeafter_style'] );

			wp_register_script(
				'radiantthemes_beforeafter_min',
				plugins_url( 'radiantthemes-addons/beforeafter/js/before-after.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_beforeafter_min' );

			wp_register_script(
				'radiantthemes_beforeafter_' . $shortcode['beforeafter_style'],
				plugins_url( 'radiantthemes-addons/beforeafter/js/radiantthemes-beforeafter-element-' . $shortcode['beforeafter_style'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_beforeafter_' . $shortcode['beforeafter_style'] );

			$beforeafter_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			$output  = '<div ' . $beforeafter_id . '  class="rt-beforeafter element-' . $shortcode['beforeafter_style'] . ' ' . esc_attr( $shortcode['extra_class'] ) . ' ' . $animation_classes . '">';
			$output .= wp_get_attachment_image( $shortcode['after_image'], 'full' );
			$output .= '<div class="resize">';
			$output .= wp_get_attachment_image( $shortcode['before_image'], 'full' );
			$output .= '</div>';
			$output .= '<span class="handle"></span>';
			$output .= '</div>';

			return $output;
		}
	}
}

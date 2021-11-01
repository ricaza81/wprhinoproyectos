<?php
/**
 * Quote Box Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Quote_Box' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Quote_Box extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Quote Box', 'radiantthemes-addons' ),
					'base'        => 'rt_quote_box_style',
					'description' => esc_html__( 'Add Quote Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/quote-box/icon/Quote-Box-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_quote_box_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Quote Box Style', 'radiantthemes-addons' ),
							'param_name'  => 'quote_box_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )     => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Image', 'radiantthemes-addons' ),
							'param_name' => 'quote_box_image',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Quote Box Alignment', 'radiantthemes-addons' ),
							'param_name'  => 'quote_box_alignment',
							'value'       => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
							),
							'std'         => 'left',
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Quotation', 'radiantthemes-addons' ),
							'param_name' => 'quote_box_quotation',
							'value'      => esc_html__( 'You must not lose faith in humanity. Humanity is an ocean; if a few drops of the ocean are dirty, the ocean does not become dirty.', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Name', 'radiantthemes-addons' ),
							'param_name' => 'quote_box_name',
							'value'      => __( 'Mahatma Gandhi', 'radiantthemes-addons' ),
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
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Customizer', 'radiantthemes-addons' ),
							'param_name' => 'quote_box_css',
							'group'      => esc_html__( 'Customizer', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_quote_box_style', array( $this, 'radiantthemes_quote_box_style_func' ) );
		}

		/**
		 * [radiantthemes_quote_box_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_quote_box_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'quote_box_style'     => 'one',
					'quote_box_image'     => '',
					'quote_box_alignment' => '',
					'quote_box_quotation' => esc_html__( 'You must not lose faith in humanity. Humanity is an ocean; if a few drops of the ocean are dirty, the ocean does not become dirty.' ),
					'quote_box_name'      => esc_html__( 'Mahatma Gandhi' ),
					'animation'           => '',
					'extra_class'         => '',
					'extra_id'            => '',
					'quote_box_css'       => '',
				), $atts
			);
			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );
			$quote_box_css     = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['quote_box_css'], ' ' ), $atts );

			wp_register_style(
				'radiantthemes_quote_box_' . $shortcode['quote_box_style'],
				plugins_url( 'radiantthemes-addons/quote-box/css/radiantthemes-quote-box-element-' . $shortcode['quote_box_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_quote_box_' . $shortcode['quote_box_style'] );

			$quote_box_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';
			$output = '<div class="rt-quote-box element-' . esc_attr( $shortcode['quote_box_style'] );
			$output .= '' . esc_attr( $quote_box_css ) . ' ' . $animation_classes . ' ' . $shortcode['extra_class'] . '" ' . $quote_box_id . '>';
			require 'template/template-quote-box-style-' . esc_attr( $shortcode['quote_box_style'] ) . '.php';
			$output .= '</div>';
			return $output;
		}
	}
}

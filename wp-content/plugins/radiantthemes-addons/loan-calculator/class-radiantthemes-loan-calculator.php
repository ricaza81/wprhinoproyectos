<?php
/**
 * Loan Calculator Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Loan_Calculator' ) ) {

	/**
	 * Class definition.
	 */
	class RadiantThemes_Loan_Calculator extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Loan Calculator', 'radiantthemes-addons' ),
					'base'        => 'rt_loan_calculator',
					'description' => esc_html__( 'Add Loan Calculator.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/loan-calculator/icon/Loan-Calculator-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_loan_calculator',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Choose Style', 'radiantthemes-addons' ),
							'param_name'  => 'style_variation',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
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
			add_shortcode( 'rt_loan_calculator', array( $this, 'radiantthemes_loan_calculator_func' ) );
		}

		/**
		 * [radiantthemes_loan_calculator_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_loan_calculator_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation' => 'one',
					'animation'       => '',
					'extra_class'     => '',
					'extra_id'        => '',
					'css'             => '',

				), $atts
			);
			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['css'], ' ' ), $atts );

			wp_register_style(
				'radiantthemes_bootstrap_slider',
				plugins_url( 'radiantthemes-addons/loan-calculator/css/bootstrap-slider.min.css' )
			);
			wp_enqueue_style( 'radiantthemes_bootstrap_slider' );

			wp_register_style(
				'radiantthemes_loan_calculator_' . $shortcode['style_variation'],
				plugins_url( 'radiantthemes-addons/loan-calculator/css/radiantthemes-loan-calculator-element-' . $shortcode['style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_loan_calculator_' . $shortcode['style_variation'] );

			wp_register_script(
				'radiantthemes_bootstrap_slider',
				plugins_url( 'radiantthemes-addons/loan-calculator/js/bootstrap-slider.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_bootstrap_slider' );

			wp_register_script(
				'radiantthemes_loan_calculator_' . $shortcode['style_variation'],
				plugins_url( 'radiantthemes-addons/loan-calculator/js/radiantthemes-loan-calculator-element-' . $shortcode['style_variation'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_loan_calculator_' . $shortcode['style_variation'] );

			$loan_calculator_id = $shortcode['extra_id'] ? 'id="' . $shortcode['extra_id'] . '"' : '';

			$output  = '<!-- rt-loan-calculator -->';
			$output .= '<div class="rt-loan-calculator element-' . $shortcode['style_variation'] . ' ' . $animation_classes . ' ' . esc_attr( $css_class ) . ' ' . $shortcode['extra_class'] . '"  ' . $loan_calculator_id . '>';

			require 'template/template-loan-calculator-item-' . $shortcode['style_variation'] . '.php';

			$output .= '</div>' . "\r";
			$output .= '<!-- rt-loan-calculator -->' . "\r";
			return $output;
		}
	}
}

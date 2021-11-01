<?php
/**
 * Button Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Alert' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Alert extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Alert Box', 'radiantthemes-addons' ),
					'description' => esc_html__( 'Add alert box', 'radiantthemes-addons' ),
					'base'        => 'rt_alert_style',
					'icon'        => plugins_url( 'radiantthemes-addons/alert-box/icon/Alert-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_alert_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Style', 'radiantthemes-addons' ),
							'param_name' => 'style_variation',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' ) => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' ) => 'two',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Type', 'radiantthemes-addons' ),
							'param_name' => 'select_type',
							'value'      => array(
								esc_html__( 'Info', 'radiantthemes-addons' )    => 'info',
								esc_html__( 'Success', 'radiantthemes-addons' ) => 'success',
								esc_html__( 'Warning', 'radiantthemes-addons' ) => 'warning',
								esc_html__( 'Error', 'radiantthemes-addons' )   => 'error',
							),
							'std'        => 'info',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Type Style', 'radiantthemes-addons' ),
							'param_name' => 'style_type_style',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' ) => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' ) => 'two',
							),
							'std'        => 'one',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Type Alert Title', 'radiantthemes-addons' ),
							'param_name'  => 'title',
							'value'       => esc_html__( 'Info!', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textarea',
							'heading'     => esc_html__( 'Type Alert Text', 'radiantthemes-addons' ),
							'param_name'  => 'text',
							'value'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis ipsum dolor sit amet', 'radiantthemes-addons' ),
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

					),
					'js_view'     => 'VcIconElementView_Backend',
				)
			);
			add_shortcode( 'rt_alert_style', array( $this, 'radiantthemes_alert_style_func' ) );
		}

		/**
		 * [radiantthemes_alert_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_alert_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation'  => 'one',
					'select_type'      => 'info',
					'style_type_style' => 'one',
					'title'            => 'Info!',
					'text'             => 'Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis ipsum dolor sit amet',
					'extra_class'      => '',
					'extra_id'         => '',
					'animation'        => '',

				), $atts
			);
			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );
			wp_register_style(
				'radiantthemes_alert_' . $shortcode['style_variation'],
				plugins_url( 'radiantthemes-addons/alert-box/css/radiantthemes-alertbox-element-' . $shortcode['style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_alert_' . $shortcode['style_variation'] . '' );

			$team_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';
			$output  = "\r" . '<!-- rt-alert-box -->' . "\r";

			$output .= '<div class="rt-alert-box element-' . $shortcode['style_variation'] . ' ';
			$output .= $shortcode['select_type'] . '-style-' . $shortcode['style_type_style'] . ' ';

			$output .= $animation_classes . ' ' . esc_attr( $shortcode['extra_class'] );

			$output .= ' alert fade in"' . $team_id . '>';
			$output .= ' <a href="#" class="close" data-dismiss="alert"><i class="fa fa-times"></i></a><div class="icon"><i class="fa fa-info-circle"></i></div>';
			$output .= '<strong>' . esc_attr( $shortcode['title'] ) . '</strong>';
			$output .= esc_attr( $shortcode['text'] );
			$output .= '</div>' . "\r";
			$output .= '<!-- rt-alert-box -->' . "\r";
			return $output;
		}
	}
}

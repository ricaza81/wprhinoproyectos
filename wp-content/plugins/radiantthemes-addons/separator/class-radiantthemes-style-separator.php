<?php
/**
 * Separator Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Separator' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Separator extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Separator', 'radiantthemes-addons' ),
					'base'        => 'rt_separator_style',
					'description' => esc_html__( 'Radiant Theme Separator', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/separator/icon/Separator-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_separator_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Choose Unit for width', 'radiantthemes-addons' ),
							'param_name'  => 'width_unit',
							'value'       => array(
								esc_html__('Percentage', 'radiantthemes-addons' ) => 'percentage',
								esc_html__('Pixel', 'radiantthemes-addons' )      => 'pixel',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Separator Width (Percentage)', 'radiantthemes-addons' ),
							'param_name'  => 'percentage_width',
							'value'       => array( '100%', '90%', '80%', '70%', '60%', '50%', '40%', '30%', '20%', '10%' ),
							'dependency'  => array(
								'element' => 'width_unit',
								'value'   => 'percentage',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Separator Width (Pixel) eg. 250', 'radiantthemes-addons' ),
							'param_name'  => 'pixel_width',
							'dependency'  => array(
								'element' => 'width_unit',
								'value'   => 'pixel',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Separator Color', 'radiantthemes-addons' ),
							'param_name'  => 'color',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Separator Background Color', 'radiantthemes-addons' ),
							'param_name'  => 'bgcolor',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__(  'Separator Direction', 'radiantthemes-addons' ),
							'param_name'  => 'separator_direction',
							'value'       => array(
								esc_html__(  'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Separator Style', 'radiantthemes-addons' ),
							'param_name'  => 'separator_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Style Four', 'radiantthemes-addons' )  => 'four',
								esc_html__( 'Style Five', 'radiantthemes-addons' )  => 'five',
							),
							'admin_label' => true,
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
			add_shortcode( 'rt_separator_style', array( $this, 'radiantthemes_separator_style_func' ) );
		}

		/**
		 * [radiantthemes_separator_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_separator_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'extra_class'         => '',
					'width_unit'          => 'percentage',
					'percentage_width'    => '100%',
					'pixel_width'         => '',
					'color'               => '#000000',
					'bgcolor'             => '#ffffff',
					'separator_direction' => 'right',
					'separator_style'     => 'one',
					'extra_id'            => '',
				), $atts
			);

			wp_register_style(
				'radiantthemes_separator_' . $shortcode['separator_style'],
				plugins_url( 'radiantthemes-addons/separator/css/radiantthemes-separator-element-' . $shortcode['separator_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_separator_' . $shortcode['separator_style'] );

			wp_register_script(
				'radiantthemes_separator_' . $shortcode['separator_style'],
				plugins_url( 'radiantthemes-addons/separator/js/radiantthemes-separator-element-' . $shortcode['separator_style'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_separator_' . $shortcode['separator_style'] );

			if ( 'percentage' === $shortcode['width_unit'] ) {
				$data_separator_width = $shortcode['percentage_width'];
			} elseif ( 'pixel' === $shortcode['width_unit'] ) {
				$data_separator_width = intval( $shortcode['pixel_width'] ) . 'px';
			}

			$separator_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			$output  = '<div ' . $separator_id . ' class="rt-separator element-' . esc_attr( $shortcode['separator_style'] ) . ' ' . esc_attr( $shortcode['extra_class'] ) . '" data-separator-width="' . esc_attr( $data_separator_width ) . '" data-separator-color="' . esc_attr( $shortcode['color'] ) . '" data-separator-background="' . esc_attr( $shortcode['bgcolor'] ) . '" data-separator-direction="' . esc_attr( $shortcode['separator_direction'] ) . '">';
			$output .= '<div class="block">';
			$output .= '<div class="gap"></div>';
			$output .= '<div class="bar"></div>';
			$output .= '</div></div>';
			return $output;
		}
	}
}

<?php
/**
 * Dropcaps Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Dropcap' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Dropcap extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Dropcap', 'radiantthemes-addons' ),
					'base'        => 'rt_dropcap_style',
					'description' => esc_html__( 'Add Dropcap with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/dropcap/icon/Dropcap-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_dropcap_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Dropcap Style', 'radiantthemes-addons' ),
							'param_name'  => 'style_variation',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea_html',
							'heading'    => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name' => 'content',
							'value'      => esc_html__( 'This is dropcap item element', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Dropcaps Direction', 'radiantthemes-addons' ),
							'param_name' => 'direction',
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
							),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Background Color', 'radiantthemes-addons' ),
							'param_name'  => 'background_color',
							'value'       => '#63667e',
							'description' => esc_html__( 'Choose background color', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Border Color', 'radiantthemes-addons' ),
							'param_name'  => 'border_color',
							'value'       => '#bf0000',
							'description' => esc_html__( 'Choose border color', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Text Color', 'radiantthemes-addons' ),
							'param_name'  => 'text_color',
							'value'       => '#ffffff',
							'description' => esc_html__( 'Choose text color', 'radiantthemes-addons' ),
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
			add_shortcode( 'rt_dropcap_style', array( $this, 'radiantthemes_dropcap_style_func' ) );
		}

		/**
		 * [radiantthemes_dropcap_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_dropcap_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation'  => 'one',
					'direction'        => 'left',
					'background_color' => '#63667e',
					'border_color'     => '#bf0000',
					'text_color'       => '#ffffff',
					'extra_class'      => '',
					'extra_id'         => '',
				), $atts
			);

			wp_register_style(
				'radiantthemes_dropcaps_' . $shortcode['style_variation'] . '',
				plugins_url( 'radiantthemes-addons/dropcap/css/radiantthemes-dropcaps-element-' . $shortcode['style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_dropcaps_' . $shortcode['style_variation'] . '' );
			?>
			<!-- dropcap -->
			<?php
			$dropcaps_id = $shortcode['extra_id'] ? 'id="' . $shortcode['extra_id'] . '"' : '';
			$output      = '<div class="rt-dropcaps element-' . $shortcode['style_variation'] . ' ' . $shortcode['extra_class'] . '"  ' . $dropcaps_id . '  data-dropcaps-direction="' . $shortcode['direction'] . '">';
			require 'template/template-dropcap-item-' . $shortcode['style_variation'] . '.php';
			$output .= '</div>' . "\r";
			$output .= '<!-- dropcap -->' . "\r";
			return $output;
		}
	}
}

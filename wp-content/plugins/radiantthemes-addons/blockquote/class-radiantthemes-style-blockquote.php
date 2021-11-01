<?php
/**
 * Blockquote Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Blockquote' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Blockquote extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Blockquote', 'radiantthemes-addons' ),
					'base'        => 'rt_blockquote_style',
					'description' => esc_html__( 'Add Blockquote', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/blockquote/icon/Blockquote-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_blockquote_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Blockquote Style', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_style',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' ) => 'one',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Blockquote Align', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_align',
							'std'        => 'left',
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Blockquote Icon Position', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_icon_position',
							'std'        => 'left',
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
							),
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Font Color', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_font_color',
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Icon Color', 'radiantthemes-addons' ),
							'param_name' => 'blockquote_icon_color',
						),
						array(
							'type'        => 'textarea_html',
							'holder'      => 'div',
							'heading'     => esc_html__( 'Blockquote Content', 'radiantthemes-addons' ),
							'param_name'  => 'content',
							'value'       => wp_kses_post( '<p>Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis ipsum dolor sit amet, consectetur adi pisicing elit, sed do eiusmod tempor inci didunt ut labore et dolore magna aliqua.</p><p>Ut enim ad minit. Lorem ipsum dolor sit amet, consectetur adi pisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis ipsum dolor sit amet, consectetur adi pisicing elit, sed do eiusmod tempor inci didunt ut labore et dolore magna aliqua. Ut enim ad minit.</p>' ),
							'description' => esc_html__( 'Enter your content.', 'radiantthemes-addons' ),
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
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'css',
							'group'      => esc_html__( 'Design Options', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_blockquote_style', array( $this, 'radiantthemes_blockquote_style_func' ) );
		}

		/**
		 * [radiantthemes_blockquote_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_blockquote_style_func( $atts, $content = null, $tag ) {

			$shortcode = shortcode_atts(
				array(
					'blockquote_style'         => 'one',
					'blockquote_align'         => 'left',
					'blockquote_icon_position' => 'left',
					'blockquote_font_color'    => '',
					'blockquote_icon_color'    => '',
					'animation'                => '',
					'extra_class'              => '',
					'extra_id'                 => '',
					'css'                      => '',
				), $atts
			);

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['css'], ' ' ), $atts );
			$blockquote_style  = esc_attr( $shortcode['blockquote_font_color'] );
			$icon_style        = esc_attr( $shortcode['blockquote_icon_color'] );

			wp_register_style(
				'radiantthemes_blockquote_' . $shortcode['blockquote_style'],
				plugins_url( 'radiantthemes-addons/blockquote/css/radiantthemes-blockquote-element-' . $shortcode['blockquote_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_blockquote_' . $shortcode['blockquote_style'] );

			$blockquote_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			$output  = '<div class="rt-blockquote element-' . esc_attr( $shortcode['blockquote_style'] ) . ' ' . $animation_classes . ' ' . $shortcode['extra_class'] . ' ' . esc_attr( $css_class ) . '" ' . $blockquote_id . ' data-blockquote-align="' . esc_attr( $shortcode['blockquote_align'] ) . '" data-blockquote-icon-position="' . esc_attr( $shortcode['blockquote_icon_position'] ) . '">';
			$output .= '<blockquote style="color:' . esc_attr( $blockquote_style ) . ';"><i class="fa fa-quote-left" style="color:' . esc_attr( $icon_style ) . ';"></i>';
			$output .= $content;
			$output .= '</blockquote>';
			$output .= '</div>';

			return $output;
		}
	}
}

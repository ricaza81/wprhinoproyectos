<?php
/**
 * Highlight Box Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Highlight_Box' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Highlight_Box extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Highlight Box', 'radiantthemes-addons' ),
					'base'        => 'rt_highlight_box_style',
					'description' => esc_html__( 'Add Highlight Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/highlight-box/icon/Highlight-Box-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_highlight_box_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Highlight Box Style', 'radiantthemes-addons' ),
							'param_name'  => 'highlight_box_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Style Four', 'radiantthemes-addons' )  => 'four',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Image', 'radiantthemes-addons' ),
							'param_name' => 'highlight_box_image',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Highlight Box Title', 'radiantthemes-addons' ),
							'param_name'  => 'highlight_box_title',
							'value'       => esc_html__( 'I am a Title', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Highlight Box Content', 'radiantthemes-addons' ),
							'value'      => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
							'param_name' => 'highlight_box_content',
						),
						array(
							'type'        => 'vc_link',
							'heading'     => esc_html__( 'Highlight Box Link', 'radiantthemes-addons' ),
							'param_name'  => 'highlight_box_button',
							'admin_label' => false,
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
			add_shortcode( 'rt_highlight_box_style', array( $this, 'radiantthemes_highlight_box_style_func' ) );
		}

		/**
		 * [radiantthemes_highlight_box_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_highlight_box_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'highlight_box_style'   => 'one',
					'highlight_box_image'   => '',
					'highlight_box_title'   => esc_html__( 'I am a Title', 'radiantthemes-addons' ),
					'highlight_box_content' => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
					'highlight_box_button'  => '',
					'animation'             => '',
					'extra_class'           => '',
					'extra_id'              => '',
					'css'                   => '',

				), $atts
			);
			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );
			$css_class         = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['css'], ' ' ), $atts );

			$highlight_box_button  = vc_build_link( $shortcode['highlight_box_button'] );
			$highlight_box_url     = ( ! empty( $highlight_box_button['url'] ) ) ? $highlight_box_button['url'] : '#';
			$highlight_box_title   = ( ! empty( $highlight_box_button['title'] ) ) ? $highlight_box_button['title'] : '';
			$highlight_box_target  = ( ! empty( $highlight_box_button['target'] ) ) ? $highlight_box_button['target'] : '';
			$highlight_box_rel     = ( ! empty( $highlight_box_button['rel'] ) ) ? $highlight_box_button['rel'] : '';

			wp_register_style(
				'radiantthemes_highlight_box_' . $shortcode['highlight_box_style'],
				plugins_url( 'radiantthemes-addons/highlight-box/css/radiantthemes-highlight-box-element-' . $shortcode['highlight_box_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_highlight_box_' . $shortcode['highlight_box_style'] );

			$highlight_box_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';
			$output = '<div class="rt-highlight-box element-' . esc_attr( $shortcode['highlight_box_style'] );
			$output .= ' ' . $animation_classes . ' ' . $shortcode['extra_class'] . ' ' . esc_attr( $css_class ) . '" ' . $highlight_box_id . '>';
			require 'template/template-highlight-box-style-' . esc_attr( $shortcode['highlight_box_style'] ) . '.php';
			$output .= '</div>';
			return $output;
		}
	}
}

<?php
/**
 * Flip Box Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Flip_Box' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Flip_Box extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Flip Box', 'radiantthemes-addons' ),
					'base'        => 'rt_flip_box_style',
					'description' => esc_html__( 'Add Flip Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/flip-box/icon/Flip-Box-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_flip_box_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Flip Box Style', 'radiantthemes-addons' ),
							'param_name'  => 'flip_box_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' ) => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Flip Box Axis', 'radiantthemes-addons' ),
							'param_name'  => 'flip_box_axis',
							'value'       => array(
								esc_html__( 'Horizontal (X)', 'radiantthemes-addons' ) => 'horizontal',
								esc_html__( 'Vertical (Y)', 'radiantthemes-addons' )   => 'vertical',
							),
							'std'         => 'horizontal',
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
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Image', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_first_card_image',
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Title', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_first_card_title',
							'value'      => __( 'First Card Title', 'radiantthemes-addons' ),
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_first_card_content',
							'value'      => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Customizer', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_first_card_css',
							'group'      => esc_html__( 'First Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Title', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_second_card_title',
							'value'      => __( 'Second Card Title', 'radiantthemes-addons' ),
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__( 'Content', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_second_card_content',
							'value'      => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'vc_link',
							'heading'    => esc_html__( 'Button', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_second_card_button',
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'Customizer', 'radiantthemes-addons' ),
							'param_name' => 'flip_box_second_card_css',
							'group'      => esc_html__( 'Second Card', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_flip_box_style', array( $this, 'radiantthemes_flip_box_style_func' ) );
		}

		/**
		 * [radiantthemes_flip_box_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_flip_box_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'flip_box_style'               => 'one',
					'flip_box_axis'                => 'horizontal',
					'animation'                    => '',
					'extra_class'                  => '',
					'extra_id'                     => '',
					'flip_box_first_card_image'    => '',
					'flip_box_first_card_title'    => esc_html__( 'First Card Title', 'radiantthemes-addons' ),
					'flip_box_first_card_content'  => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
					'flip_box_first_card_css'      => '',
					'flip_box_second_card_title'   => esc_html__( 'Second Card Title', 'radiantthemes-addons' ),
					'flip_box_second_card_content' => esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.', 'radiantthemes-addons' ),
					'flip_box_second_card_button'  => '',
					'flip_box_second_card_css'     => '',
				), $atts
			);
			// Build the animation classes.
			$animation_classes              = $this->getCSSAnimation( $shortcode['animation'] );
			$flip_box_first_card_css_class  = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['flip_box_first_card_css'], ' ' ), $atts );
			$flip_box_second_card_css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['flip_box_second_card_css'], ' ' ), $atts );

			$flip_box_second_card_button        = vc_build_link( $shortcode['flip_box_second_card_button'] );
			$flip_box_second_card_button_url    = ( ! empty( $flip_box_second_card_button['url'] ) ) ? $flip_box_second_card_button['url'] : '#';
			$flip_box_second_card_button_title  = ( ! empty( $flip_box_second_card_button['title'] ) ) ? $flip_box_second_card_button['title'] : '';
			$flip_box_second_card_button_target = ( ! empty( $flip_box_second_card_button['target'] ) ) ? $flip_box_second_card_button['target'] : '';
			$flip_box_second_card_button_rel    = ( ! empty( $flip_box_second_card_button['rel'] ) ) ? $flip_box_second_card_button['rel'] : '';

			wp_register_style(
				'radiantthemes_flip_box_' . $shortcode['flip_box_style'],
				plugins_url( 'radiantthemes-addons/flip-box/css/radiantthemes-flip-box-element-' . $shortcode['flip_box_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_flip_box_' . $shortcode['flip_box_style'] );

			wp_register_script(
				'radiantthemes_flip_box_' . $shortcode['flip_box_style'],
				plugins_url( 'radiantthemes-addons/flip-box/js/radiantthemes-flip-box-element-' . $shortcode['flip_box_style'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_flip_box_' . $shortcode['flip_box_style'] );

			$flip_box_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			$output  = '<div class="rt-flip-box element-' . esc_attr( $shortcode['flip_box_style'] );
			$output .= ' ' . $animation_classes . ' ' . $shortcode['extra_class'] . '" ' . $flip_box_id . '>';

			require 'template/template-flip-box-style-' . esc_attr( $shortcode['flip_box_style'] ) . '.php';
			$output .= '</div>';
			return $output;
		}
	}
}

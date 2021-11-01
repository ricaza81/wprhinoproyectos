<?php
/**
 * Typewriter Text Style Addon
 *
 * @package RadiantThemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Typewriter_Text' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Typewriter_Text extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Typewriter Text', 'radiantthemes-addons' ),
					'description' => esc_html__( 'Add Typewriter Text on the page', 'radiantthemes-addons' ),
					'base'        => 'typewriter_text_style',
					'icon'        => plugins_url( 'radiantthemes-addons/typewriter-text/icon/Typewriter-Text-Element-Icon.png' ),
					'class'       => 'typewriter_text_style_class',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(

						array(
							'type'        => 'param_group',
							'heading'     => esc_html__( 'Value Strings', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Add value strings', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_title_group',
							'params'      => array(
								array(
									'type'        => 'textfield',
									'heading'     => esc_html__( 'Text', 'radiantthemes-addons' ),
									'description' => esc_html__( "Write Text (ex. 'I am a dummy text' )", 'radiantthemes-addons' ),
									'param_name'  => 'typewriter_text_style_title',
									'admin_label' => true,
								),
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Alignment', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select text alignment', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_align',
							'value'       => array(
								esc_html__( 'Inline', 'radiantthemes-addons' ) => 'inline',
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Tag', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select tag for Typewriter Text', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_tag',
							'value'       => array(
								esc_html__( 'h1', 'radiantthemes-addons' )  => 'h1',
								esc_html__( 'h2', 'radiantthemes-addons' )  => 'h2',
								esc_html__( 'h3', 'radiantthemes-addons' )  => 'h3',
								esc_html__( 'h4', 'radiantthemes-addons' )  => 'h4',
								esc_html__( 'h5', 'radiantthemes-addons' )  => 'h5',
								esc_html__( 'h6', 'radiantthemes-addons' )  => 'h6',
								esc_html__( 'p', 'radiantthemes-addons' )   => 'p',
								esc_html__( 'div', 'radiantthemes-addons' ) => 'div',
							),
							'std'         => 'div',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Font Size', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter font size (ex. 20px)', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_font_size',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Line Height', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter line height (ex. 26px)', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_line_height',
							'admin_label' => true,
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Font Color', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select font color.', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_color',
							'value'       => '',
							'admin_label' => true,
						),
						array(
							'type'        => 'animation_style',
							'heading'     => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_animation',
							'admin_label' => false,
							'weight'      => 0,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_extra_class',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'param_name'  => 'typewriter_text_style_extra_id',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Type Speed', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter Type Speed (ex. 100)', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_line_typespeed',
							'group'       => esc_html__( 'Attribute', 'radiantthemes-addons' ),
							'std'         => '100',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Start Delay', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter Start Delay (ex. 0)', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_line_startdelay',
							'group'       => esc_html__( 'Attribute', 'radiantthemes-addons' ),
							'std'         => '0',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Back Speed', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter Back Speed (ex. 100)', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_line_backspeed',
							'group'       => esc_html__( 'Attribute', 'radiantthemes-addons' ),
							'std'         => '100',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Back Delay', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter Back Delay (ex. 0)', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_line_backdelay',
							'group'       => esc_html__( 'Attribute', 'radiantthemes-addons' ),
							'std'         => '0',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Shuffle', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select Shuffle', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_line_shuffle',
							'value'       => array(
								esc_html__( 'True', 'radiantthemes-addons' )   => 'true',
								esc_html__( 'False', 'radiantthemes-addons' )  => 'false',
							),
							'group'       => esc_html__( 'Attribute', 'radiantthemes-addons' ),
							'std'         => 'false',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Loop', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select Loop', 'radiantthemes-addons' ),
							'param_name'  => 'typewriter_text_style_line_loop',
							'value'       => array(
								esc_html__( 'True', 'radiantthemes-addons' )   => 'true',
								esc_html__( 'False', 'radiantthemes-addons' )  => 'false',
							),
							'group'       => esc_html__( 'Attribute', 'radiantthemes-addons' ),
							'std'         => 'true',
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'typewriter_text_style_css',
							'group'      => esc_html__( 'Design', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'typewriter_text_style', array( $this, 'radiantthemes_typewriter_text_style_func' ) );
		}

		/**
		 * [radiantthemes_typewriter_text_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_typewriter_text_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'typewriter_text_style_title_group'     => '',
					'typewriter_text_style_align'           => '',
					'typewriter_text_style_tag'             => 'div',
					'typewriter_text_style_font_size'       => '',
					'typewriter_text_style_line_height'     => '',
					'typewriter_text_style_color'           => '',
					'typewriter_text_style_animation'       => '',
					'typewriter_text_style_extra_class'     => '',
					'typewriter_text_style_extra_id'        => '',
					'typewriter_text_style_line_typespeed'  => '100',
					'typewriter_text_style_line_startdelay' => '0',
					'typewriter_text_style_line_backspeed'  => '100',
					'typewriter_text_style_line_backdelay'  => '0',
					'typewriter_text_style_line_shuffle'    => 'false',
					'typewriter_text_style_line_loop'       => 'true',
					'typewriter_text_style_css'             => '',
				), $atts
			);

			// ADD TAG.
			$typewriter_text_tag = $shortcode['typewriter_text_style_tag'];

			// ADD ANIMATION.
			$animation_classes = $this->getCSSAnimation( $shortcode['typewriter_text_style_animation'] );

			// ADD DESIGN CSS.
			$typewriter_text_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['typewriter_text_style_css'], ' ' ), $atts );

			// ADD RANDOM CLASS.
			$typewriter_text_random_class = 'rt' . rand();

			// ADD EXTRA ID.
			$typewriter_text_extra_id = $shortcode['typewriter_text_style_extra_class'] ? 'id="' . esc_attr( $shortcode['typewriter_text_style_extra_id'] ) . '"' : '';

			// ADD CORE CSS.
			wp_register_style(
				'radiantthemes-typewriter-text',
				plugins_url( 'radiantthemes-addons/typewriter-text/css/radiantthemes-typewriter-text.css' )
			);
			wp_enqueue_style( 'radiantthemes-typewriter-text' );

			// ADD CUSTOM CSS.
			$typewriter_text_custom_css = ".radiantthemes-typewriter-text.element-one.{$typewriter_text_random_class}{
			    text-align: {$shortcode['typewriter_text_style_align']} ;
            }
            .radiantthemes-typewriter-text.element-one.{$typewriter_text_random_class} > .typed-writer{
            	font-size: {$shortcode['typewriter_text_style_font_size']} ;
            	line-height: {$shortcode['typewriter_text_style_line_height']} ;
            	color: {$shortcode['typewriter_text_style_color']} ;
            }";
			wp_add_inline_style( 'radiantthemes-typewriter-text', $typewriter_text_custom_css );

			// ADD TYPED JS.
			wp_register_script(
				'typed',
				plugins_url( 'radiantthemes-addons/typewriter-text/js/typed.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'typed' );

			// ADD CUSTOM JS.
			wp_register_script(
				'radiantthemes-typewriter-text',
				plugins_url( 'radiantthemes-addons/typewriter-text/js/radiantthemes-typewriter-text.js' ),
				array( 'jquery', 'typed' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes-typewriter-text' );

			$titles = vc_param_group_parse_atts( $shortcode['typewriter_text_style_title_group'] );

			// START OF TYPEWRITE TEXT.
			$output = "\r" . '<!-- radiantthemes-typewriter-text -->' . "\r";
			$output .= '<div class="radiantthemes-typewriter-text element-one ' . $typewriter_text_random_class . ' ' . $animation_classes . ' ' . $typewriter_text_class . ' ' . esc_attr( $shortcode['typewriter_text_style_extra_class'] ) . '" ' . $typewriter_text_extra_id . ' data-typewriter-typespeed="' . esc_attr( $shortcode['typewriter_text_style_line_typespeed'] ) . '" data-typewriter-startdelay="' . esc_attr( $shortcode['typewriter_text_style_line_startdelay'] ) . '" data-typewriter-backspeed="' . esc_attr( $shortcode['typewriter_text_style_line_backspeed'] ) . '" data-typewriter-backdelay="' . esc_attr( $shortcode['typewriter_text_style_line_backdelay'] ) . '" data-typewriter-shuffle="' . esc_attr( $shortcode['typewriter_text_style_line_shuffle'] ) . '" data-typewriter-loop="' . esc_attr( $shortcode['typewriter_text_style_line_loop'] ) . '">';
			$output .= '<div class="typed-strings">';
			foreach ($titles as $title) {
				$output .= '<p>' . esc_attr( $title['typewriter_text_style_title'] ) . '</p>';
			}
			$output .= '</div>';
			$output .= '<' . $typewriter_text_tag . ' class="typed-writer"></' . $typewriter_text_tag . '>';
			$output .= '</div>' . "\r";
			$output .= '<!-- radiantthemes-typewriter-text -->' . "\r";
			return $output;
			// END OF TYPEWRITE TEXT.
		}

	}
}

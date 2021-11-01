<?php
/**
 * Counterup Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Counterup' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Counterup extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'                    => esc_html__( 'CounterUp', 'radiantthemes-addons' ),
					'base'                    => 'rt_counterup_style',
					'show_settings_on_create' => true,
					'description'             => esc_html__( 'Add Counterup', 'radiantthemes-addons' ),
					'icon'                    => plugins_url( 'radiantthemes-addons/counterup/icon/CounterUp-Element-Icon.png' ),
					'class'                   => 'wpb_rt_vc_extension_counterup_style',
					'category'                => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'                => 'full',
					'params'                  => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Counterup Style', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_style',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Counterup Value', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_value',
							'admin_label' => true,
							'value'       => 1248,
							'description' => esc_html__( 'Enter the numeric value for counting', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Counterup Time', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_time',
							'value'       => 1000,
							'admin_label' => true,
							'description' => esc_html__( 'How long counting will run (in millisecond)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Counterup Delay', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_delay',
							'value'       => 100,
							'admin_label' => true,
							'description' => esc_html__( 'Counting will start after delay (in millisecond)', 'radiantthemes-addons' ),
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
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Counterup Align', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_align',
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'std'         => 'left',
							'admin_label' => true,
							'description' => esc_html__( 'Select Counterup alignment.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Font Size', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_font_size',
							'description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
							'admin_label' => true,
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Line Height', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_line_height',
							'description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
							'admin_label' => true,
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Counterup Color', 'radiantthemes-addons' ),
							'param_name'  => 'counterup_color',
							'value'       => '',
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select Counterup color.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'checkbox',
							'heading'     => esc_html__( 'Use theme default font family?', 'radiantthemes-addons' ),
							'param_name'  => 'use_theme_fonts',
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
							),
							'description' => esc_html__( 'Use font family from the theme.', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'google_fonts',
							'param_name' => 'counterup_text_font',
							'value'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
							'group'      => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'settings'   => array(
								'fields' => array(
									'font_family_description' => esc_html__( 'Select font family.', 'radiantthemes-addons' ),
									'font_style_description'  => esc_html__( 'Select font styling.', 'radiantthemes-addons' ),
								),
							),
							'dependency' => array(
								'element'            => 'use_theme_fonts',
								'value_not_equal_to' => 'yes',
							),
						),
					),
				)
			);
			add_shortcode( 'rt_counterup_style', array( $this, 'radiantthemes_counterup_style_func' ) );
		}

		/**
		 * [radiantthemes_counterup_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_counterup_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'counterup_style'       => 'one',
					'counterup_value'       => '1248',
					'counterup_time'        => '1000',
					'counterup_delay'       => '100',
					'extra_class'           => '',
					'extra_id'              => '',
					'counterup_align'       => 'left',
					'counterup_font_size'   => '',
					'counterup_line_height' => '',
					'counterup_color'       => '',
					'use_theme_fonts'       => '',
					'counterup_text_font'   => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				), $atts
			);

			$counterup_text_font_data = $this->get_fonts_data( $shortcode['counterup_text_font'] );

			// Build the inline style.
			if ( ( ! isset( $shortcode['use_theme_fonts'] ) || 'yes' !== $shortcode['use_theme_fonts'] ) ) {
				$counterup_text_font_inline_style = $this->google_fonts_styles( $counterup_text_font_data );
			} else {
				$counterup_text_font_inline_style = '';
			}

			if ( ( ! isset( $shortcode['use_theme_fonts'] ) || 'yes' !== $shortcode['use_theme_fonts'] ) && isset( $counterup_text_font_data['values']['font_family'] ) ) {
				// Enqueue the right font.
				$this->enqueue_google_fonts( $counterup_text_font_data );
			}

			wp_register_style(
				'radiantthemes_counterup_' . $shortcode['counterup_style'],
				plugins_url( 'radiantthemes-addons/counterup/css/radiantthemes-counterup-element-' . $shortcode['counterup_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_counterup_' . $shortcode['counterup_style'] );

			wp_register_script(
				'waypoints',
				plugins_url( 'radiantthemes-addons/counterup/js/waypoints.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'waypoints' );

			wp_register_script(
				'jquery-counterup',
				plugins_url( 'radiantthemes-addons/counterup/js/jquery.counterup.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'jquery-counterup' );

			wp_register_script(
				'radiantthemes_counterup_element_' . $shortcode['counterup_style'],
				plugins_url( 'radiantthemes-addons/counterup/js/radiantthemes-counterup-element-' . $shortcode['counterup_style'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_counterup_element_' . $shortcode['counterup_style'] );

			if ( ! empty( $shortcode['counterup_align'] ) ) {
				$counterup_align = "text-align:{$shortcode['counterup_align']};";
			} else {
				$counterup_align = '';
			}

			if ( ! empty( $shortcode['counterup_font_size'] ) ) {
				$counterup_font_size = 'font-size:' . intval( $shortcode['counterup_font_size'] ) . 'px;';
			} else {
				$counterup_font_size = '';
			}

			if ( ! empty( $shortcode['counterup_line_height'] ) ) {
				$counterup_line_height = 'line-height:' . intval( $shortcode['counterup_line_height'] ) . 'px;';
			} else {
				$counterup_line_height = '';
			}

			if ( ! empty( $shortcode['counterup_color'] ) ) {
				$counterup_color = "color:{$shortcode['counterup_color']};";
			} else {
				$counterup_color = '';
			}

			$counterup_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			$output = '<div style="' . $counterup_align . $counterup_font_size . $counterup_line_height . $counterup_color . $counterup_text_font_inline_style . '" class="rt-counterup element-' . esc_attr( $shortcode['counterup_style'] ) . ' ' . esc_attr( $shortcode['extra_class'] ) . '" ' . $counterup_id . ' data-counterup-delay="' . esc_attr( $shortcode['counterup_delay'] ) . '" data-counterup-time="' . esc_attr( $shortcode['counterup_time'] ) . '">' . esc_html( $shortcode['counterup_value'] ) . '</div>';

			return $output;
		}

		/**
		 * Build the string of values in an Array
		 *
		 * @param  [type] $fonts_string description.
		 */
		protected function get_fonts_data( $fonts_string ) {
			// Font data Extraction.
			$google_fonts_param = new Vc_Google_Fonts();
			$field_settings     = array();
			$fonts_data         = strlen( $fonts_string ) > 0 ? $google_fonts_param->_vc_google_fonts_parse_attributes( $field_settings, $fonts_string ) : '';
			return $fonts_data;
		}

		/**
		 * Build the inline style starting from the data
		 *
		 * @param  [type] $fonts_data description.
		 */
		protected function google_fonts_styles( $fonts_data ) {
			// Inline styles.
			$font_family = explode( ':', $fonts_data['values']['font_family'] );
			$styles[]    = 'font-family:' . $font_family[0];
			$font_styles = explode( ':', $fonts_data['values']['font_style'] );
			$styles[]    = 'font-weight:' . $font_styles[1];
			$styles[]    = 'font-style:' . $font_styles[2];

			$inline_style = '';
			foreach ( $styles as $attribute ) {
				$inline_style .= $attribute . '; ';
			}
			return $inline_style;
		}

		/**
		 * Enqueue right google font from Googleapis
		 *
		 * @param  [type] $fonts_data description.
		 */
		protected function enqueue_google_fonts( $fonts_data ) {
			// Get extra subsets for settings (latin/cyrillic/etc).
			$settings = get_option( 'wpb_js_google_fonts_subsets' );
			if ( is_array( $settings ) && ! empty( $settings ) ) {
				$subsets = '&subset=' . implode( ',', $settings );
			} else {
				$subsets = '';
			}

			// We also need to enqueue font from googleapis.
			if ( isset( $fonts_data['values']['font_family'] ) ) {
				wp_enqueue_style(
					'vc_google_fonts_' . vc_build_safe_css_class( $fonts_data['values']['font_family'] ),
					'//fonts.googleapis.com/css?family=' . $fonts_data['values']['font_family'] . $subsets
				);
			}
		}
	}
}

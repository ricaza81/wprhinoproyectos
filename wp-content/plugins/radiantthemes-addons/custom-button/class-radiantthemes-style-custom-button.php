<?php
/**
 * Custom Button Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Custom_Button' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Custom_Button extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Custom Button', 'radiantthemes-addons' ),
					'base'        => 'lea_button_style',
					'description' => esc_html__( 'Add Button with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/custom-button/icon/Button-Element-Icon.png' ),
					'class'       => 'wpb_lea_vc_extension_team_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Title', 'radiantthemes-addons' ),
							'param_name'  => 'title',
							'value'       => esc_html__( 'Text on the button', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'vc_link',
							'heading'     => esc_html__( 'URL (Link)', 'radiantthemes-addons' ),
							'param_name'  => 'link',
							'description' => esc_html__( 'Add link to button.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Alignment', 'radiantthemes-addons' ),
							'param_name'  => 'align',
							'description' => esc_html__( 'Select button alignment.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Inline', 'radiantthemes-addons' ) => 'inline',
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
						),
						
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__( 'Set full width button?', 'radiantthemes-addons' ),
							'param_name' => 'button_block',
							'dependency' => array(
								'element'            => 'align',
								'value_not_equal_to' => 'inline',
							),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__( 'Add icon?', 'radiantthemes-addons' ),
							'param_name' => 'add_icon',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Icon Alignment', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select icon alignment.', 'radiantthemes-addons' ),
							'param_name'  => 'i_align',
							'value'       => array(
								esc_html__( 'Left', 'radiantthemes-addons' )  => 'left',
								esc_html__( 'Right', 'radiantthemes-addons' ) => 'right',
							),
							'dependency'  => array(
								'element' => 'add_icon',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Icon library', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Font Awesome', 'radiantthemes-addons' ) => 'fontawesome',
								esc_html__( 'Open Iconic', 'radiantthemes-addons' )  => 'openiconic',
								esc_html__( 'Typicons', 'radiantthemes-addons' )     => 'typicons',
								esc_html__( 'Entypo', 'radiantthemes-addons' )       => 'entypo',
								esc_html__( 'Linecons', 'radiantthemes-addons' )     => 'linecons',
								esc_html__( 'Mono Social', 'radiantthemes-addons' )  => 'monosocial',
								esc_html__( 'Material', 'radiantthemes-addons' )     => 'material',
							),
							'param_name'  => 'type',
							'description' => esc_html__( 'Select icon library.', 'radiantthemes-addons' ),
							'dependency'  => array(
								'element' => 'add_icon',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'icon_fontawesome',
							'value'       => 'fa fa-adjust',
							'settings'    => array(
								'emptyIcon'    => false,
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'type',
								'value'   => 'fontawesome',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),

						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'icon_openiconic',
							'value'       => 'vc-oi vc-oi-dial',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'openiconic',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'type',
								'value'   => 'openiconic',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'icon_typicons',
							'value'       => 'typcn typcn-adjust-brightness',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'typicons',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'type',
								'value'   => 'typicons',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'iconpicker',
							'heading'    => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name' => 'icon_entypo',
							'value'      => 'entypo-icon entypo-icon-note',
							'settings'   => array(
								'emptyIcon'    => false,
								'type'         => 'entypo',
								'iconsPerPage' => 4000,
							),
							'dependency' => array(
								'element' => 'type',
								'value'   => 'entypo',
							),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'icon_linecons',
							'value'       => 'vc_li vc_li-heart',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'linecons',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'type',
								'value'   => 'linecons',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'icon_monosocial',
							'value'       => 'vc-mono vc-mono-fivehundredpx',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'monosocial',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'type',
								'value'   => 'monosocial',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'icon_material',
							'value'       => 'vc-material vc-material-cake',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'material',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'type',
								'value'   => 'material',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Font Size', 'radiantthemes-addons' ),
							'param_name'  => 'button_font_size',
							'description' => esc_html__( 'Enter font size.', 'radiantthemes-addons' ),
							'admin_label' => true,
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Line Height', 'radiantthemes-addons' ),
							'param_name'  => 'button_line_height',
							'description' => esc_html__( 'Enter line height.', 'radiantthemes-addons' ),
							'admin_label' => true,
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Font Color', 'radiantthemes-addons' ),
							'param_name'  => 'font_color',
							'value'       => '',
							'group'       => esc_html__( 'Typography', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select Button Text color.', 'radiantthemes-addons' ),
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
							'param_name' => 'button_text_font',
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
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'button_design_css',
							'group'      => esc_html__( 'Button Design', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Hover Style', 'radiantthemes-addons' ),
							'param_name'  => 'button_hover_style',
							'description' => esc_html__( 'Select hover style.', 'radiantthemes-addons' ),
							'group'      => esc_html__( 'Button Hover', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Style One (Fade)', 'radiantthemes-addons' )                   => 'one',
								esc_html__( 'Style Two (Sweep Right)', 'radiantthemes-addons' )            => 'two',
								esc_html__( 'Style Three (Zoom Out)', 'radiantthemes-addons' )             => 'three',
								esc_html__( 'Style Four (Fade with Icon Right)', 'radiantthemes-addons' )  => 'four',
							),
							'std'         => 'one',

						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Background Color', 'radiantthemes-addons' ),
							'param_name' => 'background_hover_color',
							'value'      => '',
							'group'      => esc_html__( 'Button Hover', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Border Color', 'radiantthemes-addons' ),
							'param_name' => 'border_hover_color',
							'value'      => '',
							'group'      => esc_html__( 'Button Hover', 'radiantthemes-addons' ),
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Font Color', 'radiantthemes-addons' ),
							'param_name' => 'font_hover_color',
							'value'      => '',
							'group'      => esc_html__( 'Button Hover', 'radiantthemes-addons' ),
						),
					),
					'js_view'     => 'VcIconElementView_Backend',
				)
			);
			add_shortcode( 'lea_button_style', array( $this, 'radiantthemes_custom_button_style_func' ) );
		}

		/**
		 * [radiantthemes_custom_button_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_custom_button_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'title'                  => 'Text on the button',
					'icon_fontawesome'       => 'fa fa-adjust',
					'icon_openiconic'        => '',
					'icon_typicons'          => '',
					'icon_entypo'            => '',
					'icon_linecons'          => '',
					'icon_monosocial'        => '',
					'icon_material'          => '',
					'type'                   => 'icon_fontawesome',
					'align'                  => 'center',
					'button_hover_style'     => 'one',
					'button_block'           => '',
					'add_icon'               => '',
					'i_align'                => 'left',
					'link'                   => '',
					'extra_class'            => '',
					'extra_id'               => '',
					'button_design_css'      => '',
					'button_font_size'       => '',
					'button_line_height'     => '',
					'font_color'             => '',
					'background_hover_color' => '',
					'border_hover_color'     => '',
					'font_hover_color'       => '',
					'use_theme_fonts'        => '',
					'animation'              => '',
					'button_text_font'       => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				), $atts
			);

			$button_text_font_data = $this->get_fonts_data( $shortcode['button_text_font'] );

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );

			// Build the inline style.
			if ( ( ! isset( $shortcode['use_theme_fonts'] ) || 'yes' !== $shortcode['use_theme_fonts'] ) ) {
				$button_text_font_inline_style = $this->google_fonts_styles( $button_text_font_data );
			} else {
				$button_text_font_inline_style = '';
			}

			if ( ( ! isset( $shortcode['use_theme_fonts'] ) || 'yes' !== $shortcode['use_theme_fonts'] ) && isset( $button_text_font_data['values']['font_family'] ) ) {
				// Enqueue the right font.
				$this->enqueue_google_fonts( $button_text_font_data );
			}

			$button_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['button_design_css'], ' ' ), $atts );

			wp_register_style(
				'radiantthemes-custom-button',
				plugins_url( 'radiantthemes-addons/custom-button/css/radiantthemes-custom-button.css' )
			);
			wp_enqueue_style( 'radiantthemes-custom-button' );

			$button_random_class = 'rt' . rand();
			if ( ! empty( $shortcode['background_hover_color'] ) || ! empty( $shortcode['border_hover_color'] ) || ! empty( $shortcode['font_hover_color'] ) ) {
			    
			    // HOVER STYLE ONE
				if ( 'one' === $shortcode['button_hover_style'] ) {
				    
				    $style = '.radiantthemes-custom-button.' . $button_random_class . ' .radiantthemes-custom-button-main:hover{';
				        $style .= ( ! empty( $shortcode['background_hover_color'] ) ) ? ' background-color:' . $shortcode['background_hover_color'] . ' !important;' : '';
    				    $style .= ( ! empty( $shortcode['border_hover_color'] ) ) ? ' border-top-color:' . $shortcode['border_hover_color'] . ' !important; border-right-color:' . $shortcode['border_hover_color'] . ' !important; border-bottom-color:' . $shortcode['border_hover_color'] . ' !important; border-left-color:' . $shortcode['border_hover_color'] . ' !important;' : '';
    				    $style .= ( ! empty( $shortcode['font_hover_color'] ) ) ? ' color:' . $shortcode['font_hover_color'] . ' !important;' : '';
    				$style .= '}';
    				wp_add_inline_style( 'radiantthemes-custom-button', $style );
				    
				// HOVER STYLE TWO   
				} elseif ( 'two' === $shortcode['button_hover_style'] ) {
				    
				    $style = '.radiantthemes-custom-button.' . $button_random_class . ' .radiantthemes-custom-button-main:hover{';
    				    $style .= ( ! empty( $shortcode['border_hover_color'] ) ) ? ' border-top-color:' . $shortcode['border_hover_color'] . ' !important;border-bottom-color:' . $shortcode['border_hover_color'] . ' !important; border-left-color:' . $shortcode['border_hover_color'] . ' !important; border-right-color:' . $shortcode['border_hover_color'] . ' !important;' : '';
    				    $style .= ( ! empty( $shortcode['font_hover_color'] ) ) ? ' color:' . $shortcode['font_hover_color'] . ' !important;' : '';
    				$style .= '}';
    				$style .= '.radiantthemes-custom-button.hover-style-two.' . $button_random_class . ' .radiantthemes-custom-button-main > .overlay{';
    				    $style .= ( ! empty( $shortcode['background_hover_color'] ) ) ? ' background-color:' . $shortcode['background_hover_color'] . ';' : '';
    				$style .= '}';
    				wp_add_inline_style( 'radiantthemes-custom-button', $style );
				    
				// HOVER STYLE THREE
				} elseif ( 'three' === $shortcode['button_hover_style'] ) {
				    
				    $style = '.radiantthemes-custom-button.' . $button_random_class . ' .radiantthemes-custom-button-main:hover{';
    				    $style .= ( ! empty( $shortcode['border_hover_color'] ) ) ? ' border-top-color:' . $shortcode['border_hover_color'] . ' !important;border-bottom-color:' . $shortcode['border_hover_color'] . ' !important; border-left-color:' . $shortcode['border_hover_color'] . ' !important; border-right-color:' . $shortcode['border_hover_color'] . ' !important;' : '';
    				    $style .= ( ! empty( $shortcode['font_hover_color'] ) ) ? ' color:' . $shortcode['font_hover_color'] . ' !important;' : '';
    				$style .= '}';
    				$style .= '.radiantthemes-custom-button.hover-style-three.' . $button_random_class . ' .radiantthemes-custom-button-main > .overlay{';
    				    $style .= ( ! empty( $shortcode['background_hover_color'] ) ) ? ' background-color:' . $shortcode['background_hover_color'] . ';' : '';
    				$style .= '}';
    				wp_add_inline_style( 'radiantthemes-custom-button', $style );
				    
				// HOVER STYLE FOUR
				} elseif ( 'four' === $shortcode['button_hover_style'] ) {
				    
				    $style = '.radiantthemes-custom-button.' . $button_random_class . ' .radiantthemes-custom-button-main:hover{';
				        $style .= ( ! empty( $shortcode['background_hover_color'] ) ) ? ' background-color:' . $shortcode['background_hover_color'] . ' !important;' : '';
    				    $style .= ( ! empty( $shortcode['border_hover_color'] ) ) ? ' border-top-color:' . $shortcode['border_hover_color'] . ' !important;border-bottom-color:' . $shortcode['border_hover_color'] . ' !important; border-left-color:' . $shortcode['border_hover_color'] . ' !important; border-right-color:' . $shortcode['border_hover_color'] . ' !important;' : '';
    				    $style .= ( ! empty( $shortcode['font_hover_color'] ) ) ? ' color:' . $shortcode['font_hover_color'] . ' !important;' : '';
    				$style .= '}';
    				wp_add_inline_style( 'radiantthemes-custom-button', $style );
				    
				}
			    
			}

			// Enqueue needed icon font.
			vc_icon_element_fonts_enqueue( $shortcode['type'] );
			$url        = vc_build_link( $shortcode['link'] );
			$rel        = '';
			$icon_class = isset( $shortcode{'icon_' . $shortcode['type']} ) ? esc_attr( $shortcode{'icon_' . $shortcode['type']} ) : 'fa fa-adjust';
			$icon_class = isset( $shortcode['icon_fontawesome'] ) ? esc_attr( $shortcode['icon_fontawesome'] ) : 'fa fa-adjust';
			if ( 'openiconic' === $shortcode['type'] ) {
				$icon_class = isset( $shortcode['openiconic'] ) ? esc_attr( $shortcode['openiconic'] ) : 'vc-oi vc-oi-dial';
			} elseif ( 'typicons' === $shortcode['type'] ) {
				$icon_class = isset( $shortcode['typicons'] ) ? esc_attr( $shortcode['typicons'] ) : 'typcn typcn-adjust-brightness';
			} elseif ( 'entypo' === $shortcode['type'] ) {
				$icon_class = isset( $shortcode['entypo'] ) ? esc_attr( $shortcode['entypo'] ) : 'entypo-icon entypo-icon-note';
			} elseif ( 'linecons' === $shortcode['type'] ) {
				$icon_class = isset( $shortcode['linecons'] ) ? esc_attr( $shortcode['linecons'] ) : 'vc_li vc_li-heart';
			} elseif ( 'monosocial' === $shortcode['type'] ) {
				$icon_class = isset( $shortcode['monosocial'] ) ? esc_attr( $shortcode['monosocial'] ) : 'vc-mono vc-mono-fivehundredpx';
			} elseif ( 'material' === $shortcode['type'] ) {
				$icon_class = isset( $shortcode['material'] ) ? esc_attr( $shortcode['material'] ) : 'vc-material vc-material-cake';
			}

			if ( ! empty( $url['rel'] ) ) {
				$rel = ' rel="' . esc_attr( $url['rel'] ) . '"';
			}

			$button_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			$output = "\r" . '<!-- radiantthemes-custom-button -->' . "\r";

			$output .= '<div class="radiantthemes-custom-button hover-style-' . esc_attr( $shortcode['button_hover_style'] ) . ' ' . $button_random_class . ' ' . $animation_classes . ' ' . esc_attr( $shortcode['extra_class'] ) . '" ' . $button_id . ' data-button-direction="' . $shortcode['align'] . '"';
			$output .= ' data-button-fullwidth=';

			$output .= ( $shortcode['button_block'] ) ? '"true" ' : '"false" ';
			if ( $shortcode['add_icon'] ) {
				$output .= ' data-button-icon-position="' . $shortcode['i_align'] . '"';
			}
			$output .= '>';

			$button_text_style  = '';
			$button_text_style  = ( ! empty( $shortcode['font_color'] ) ) ? ' color: ' . $shortcode['font_color'] . ';' : '';
			$button_text_style .= ( ! empty( $shortcode['button_line_height'] ) ) ? ' line-height: ' . $shortcode['button_line_height'] . ';' : '';
			$button_text_style .= ( ! empty( $shortcode['button_font_size'] ) ) ? ' font-size: ' . $shortcode['button_font_size'] . ';' : '';

			if ( strlen( $url['url'] ) > 0 ) {
				$output .= '<a style="' . $button_text_style . $button_text_font_inline_style . '" class="radiantthemes-custom-button-main ' . esc_attr( $button_class ) . '" href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">';
				// HOVER STYLE ONE
				if ( 'one' === $shortcode['button_hover_style'] ) {
				    // NO OVERLAY
				// HOVER STYLE TWO   
				} elseif ( 'two' === $shortcode['button_hover_style'] ) {
				    $output .= '<div class="overlay"></div>';
				// HOVER STYLE THREE
				} elseif ( 'three' === $shortcode['button_hover_style'] ) {
				    $output .= '<div class="overlay"></div>';
				// HOVER STYLE FOUR
				} elseif ( 'four' === $shortcode['button_hover_style'] ) {
				    // NO OVERLAY
				}
			    $output .= '<div class="placeholder">';
			}
			
			if ( ! empty( $shortcode['add_icon'] ) && 'left' === $shortcode['i_align'] ) {
				$output .= '<i class="' . $icon_class . '"></i>';
			}
			$output .= $shortcode['title'];
			if ( ! empty( $shortcode['add_icon'] ) && 'right' === $shortcode['i_align'] ) {
				$output .= '<i class="' . $icon_class . '"></i>';
			}

			if ( strlen( $url['url'] ) > 0 ) {
				$output .= '</div>';
				$output .= '</a>';
			}

			$output .= '</div>' . "\r";
			$output .= '<!-- radiantthemes-custom-button -->' . "\r";
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

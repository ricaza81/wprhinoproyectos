<?php
/**
 * Button Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Button' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Button extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Theme Button', 'radiantthemes-addons' ),
					'base'        => 'rt_button_style',
					'description' => esc_html__( 'Compatible with Color Scheme in Theme Options.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/button/icon/Button-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_team_style',
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
			add_shortcode( 'rt_button_style', array( $this, 'radiantthemes_button_style_func' ) );
		}

		/**
		 * [radiantthemes_button_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_button_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'title'            => 'Text on the button',
					'icon_fontawesome' => 'fa fa-adjust',
					'icon_openiconic'  => '',
					'icon_typicons'    => '',
					'icon_entypo'      => '',
					'icon_linecons'    => '',
					'icon_monosocial'  => '',
					'icon_material'    => '',
					'type'             => 'icon_fontawesome',
					'align'            => 'center',
					'button_block'     => '',
					'add_icon'         => '',
					'i_align'          => 'left',
					'link'             => '',
					'extra_class'      => '',
					'extra_id'         => '',
					'animation'        => '',

				), $atts
			);

			wp_register_style(
				'radiantthemes-theme-button',
				plugins_url( 'radiantthemes-addons/button/css/radiantthemes-button-element-one.css' )
			);
			wp_enqueue_style( 'radiantthemes-theme-button' );

			// Build the animation classes.
			$animation_classes = $this->getCSSAnimation( $shortcode['animation'] );

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

			// CALL THEME OPTION VALUE
			$theme_options_value = get_option( 'brixel_theme_option' );

			// HOVER STYLE ONE
			if ( 'one' === $theme_options_value['button_hover_style'] ) {

				if ( isset( $theme_options_value['button_background_color_hover']['color'] ) ) {
					$style      = '.radiantthemes-button .radiantthemes-button-main:hover{';
						$style .= 'background-color:' . $theme_options_value['button_background_color_hover']['color'] . ' !important;';
					$style     .= '}';
					wp_add_inline_style( 'radiantthemes-theme-button', $style );
				}

				// HOVER STYLE TWO
			} elseif ( 'two' === $theme_options_value['button_hover_style'] ) {

				if ( isset( $theme_options_value['button_background_color_hover']['color'] ) ) {
					$style      = '.radiantthemes-button .radiantthemes-button-main > .overlay{';
						$style .= 'background-color:' . $theme_options_value['button_background_color_hover']['color'] . ' !important;';
					$style     .= '}';
					wp_add_inline_style( 'radiantthemes-theme-button', $style );
				}

				// HOVER STYLE THREE
			} elseif ( 'three' === $theme_options_value['button_hover_style'] ) {

				if ( isset( $theme_options_value['button_background_color_hover']['color'] ) ) {
					$style      = '.radiantthemes-button .radiantthemes-button-main > .overlay{';
						$style .= 'background-color:' . $theme_options_value['button_background_color_hover']['color'] . ' !important;';
					$style     .= '}';
					wp_add_inline_style( 'radiantthemes-theme-button', $style );
				}

				// HOVER STYLE FOUR
			} elseif ( 'four' === $theme_options_value['button_hover_style'] ) {

				if ( isset( $theme_options_value['button_background_color_hover']['color'] ) ) {
					$style      = '.radiantthemes-button .radiantthemes-button-main:hover{';
						$style .= 'background-color:' . $theme_options_value['button_background_color_hover']['color'] . ' !important;';
					$style     .= '}';
					wp_add_inline_style( 'radiantthemes-theme-button', $style );
				}
			}

			$output = "\r" . '<!-- radiantthemes-button -->' . "\r";

			$output .= '<div class="radiantthemes-button hover-style-' . esc_attr( $theme_options_value['button_hover_style'] ) . ' ' . $animation_classes . ' ' . esc_attr( $shortcode['extra_class'] ) . '" ' . $button_id . ' data-button-direction="' . $shortcode['align'] . '"';
			$output .= ' data-button-fullwidth=';

			$output .= ( $shortcode['button_block'] ) ? '"true" ' : '"false" ';
			if ( $shortcode['add_icon'] ) {
				$output .= ' data-button-icon-position="' . $shortcode['i_align'] . '"';
			}
			$output .= '>';

			$stylecolor = ( ! empty( $shortcode['font_color'] ) ) ? 'color: ' . $shortcode['font_color'] . ';' : '';

			if ( strlen( $url['url'] ) > 0 ) {
				$output .= '<a style="' . $stylecolor . '" class="radiantthemes-button-main" href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">';
				// HOVER STYLE ONE
				if ( 'one' === $theme_options_value['button_hover_style'] ) {
					// NO OVERLAY
					// HOVER STYLE TWO
				} elseif ( 'two' === $theme_options_value['button_hover_style'] ) {
					$output .= '<div class="overlay"></div>';
					// HOVER STYLE THREE
				} elseif ( 'three' === $theme_options_value['button_hover_style'] ) {
					$output .= '<div class="overlay"></div>';
					// HOVER STYLE FOUR
				} elseif ( 'four' === $theme_options_value['button_hover_style'] ) {
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
				$output     .= '</a>';
			}

			$output .= '</div>' . "\r";
			$output .= '<!-- radiantthemes-button -->' . "\r";
			return $output;
		}
	}
}

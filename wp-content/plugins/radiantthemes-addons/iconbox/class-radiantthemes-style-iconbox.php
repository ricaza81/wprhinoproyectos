<?php
/**
 * Iconbox Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Iconbox' ) ) {

	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Iconbox extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Icon Box', 'radiantthemes-addons' ),
					'base'        => 'rt_iconbox_style',
					'description' => esc_html__( 'Add Icon Box with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/iconbox/icon/IconBox-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_iconbox_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Icon Library', 'radiantthemes-addons' ),
							'description' => esc_html__( 'From custom icon library.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Iconsmind', 'radiantthemes-addons' )  => 'iconsmind-font',
								esc_html__( 'Icofont', 'radiantthemes-addons' )    => 'icofont-font',
							),
							'param_name'  => 'icon_font_type',
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon (Iconsmind)', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							'param_name'  => 'icon_iconsmind',
							'value'       => 'iconsmind-A-Z',
							'settings'    => array(
								'emptyIcon'    => true,
								'type'         => 'iconsmind',
								'iconsPerPage' => 48,
							),
							'dependency'  => array(
								'element' => 'icon_font_type',
								'value'   => 'iconsmind-font',
							),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon (Icofont)', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							'param_name'  => 'icon_icofont',
							'value'       => 'icofont icofont-angry-monster',
							'settings'    => array(
								'emptyIcon'    => true,
								'type'         => 'icofont',
								'iconsPerPage' => 48,
							),
							'dependency'  => array(
								'element' => 'icon_font_type',
								'value'   => 'icofont-font',
							),
						),
						array(
							'type'        => 'textfield',
							'class'       => '',
							'heading'     => esc_html__( 'Icon size', 'radiantthemes-addons' ),
							'param_name'  => 'icon_size',
							'value'       => '',
							'description' => esc_html__( 'Enter icon size. (eg. 10px, 1em, 1rem)', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Icon Color', 'radiantthemes-addons' ),
							'param_name'  => 'icon_color',
							'description' => esc_html__( 'Choose Icon color. If none selected, the default theme color will be used.', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_iconbox_style', array( $this, 'radiantthemes_iconbox_style_func' ) );
		}

		/**
		 * [radiantthemes_iconbox_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_iconbox_style_func( $atts, $content = null, $tag ) {

			$shortcode = shortcode_atts(
				array(
					'icon_font_type' => 'iconsmind-font',
					'icon_iconsmind' => 'iconsmind-A-Z',
					'icon_icofont'   => 'icofont icofont-angry-monster',
					'icon_size'      => '',
					'icon_color'     => '',
				), $atts
			);

			// ADD RANDOM CLASS.
			$random_class = 'rt' . mt_rand();

			// ADD ICONSMIND CSS.
			wp_register_style(
				'iconsmind',
				plugins_url( 'radiantthemes-addons/assets/css/iconsmind.min.css' )
			);
			wp_enqueue_style( 'iconsmind' );

			// ADD ICOFONT CSS.
			wp_register_style(
				'icofont',
				plugins_url( 'radiantthemes-addons/assets/css/icofont.min.css' )
			);
			wp_enqueue_style( 'icofont' );

			$custom_css = ".radiantthemes-icon-box.{$random_class} > i{
			    font-size: {$shortcode['icon_size']} ;
				color: {$shortcode['icon_color']} ;
            }";
			wp_add_inline_style( 'iconsmind', $custom_css );

			// RENDERED HTML.
			$selected_font_type  = str_replace( '-font', '', $shortcode['icon_font_type'] );
			$selected_font_style = $shortcode[ 'icon_' . $selected_font_type ];

			$output  = '<div class="radiantthemes-icon-box ' . $random_class . '">';
			$output .= '<i class="' . esc_attr( $selected_font_style ) . '"></i> ';
			$output .= '</div>';

			return $output;
		}
	}
}

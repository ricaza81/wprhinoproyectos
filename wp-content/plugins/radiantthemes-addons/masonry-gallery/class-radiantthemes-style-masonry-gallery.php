<?php
/**
 * Masonry Gallery Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Masonry_Gallery' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Masonry_Gallery extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Masonry Gallery', 'radiantthemes-addons' ),
					'base'        => 'rt_masonry_gallery',
					'description' => esc_html__( 'Add Masonry Gallery.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/masonry-gallery/icon/Masonry-Gallery-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_masonry_gallery',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Masonry Gallery Style', 'radiantthemes-addons' ),
							'param_name'  => 'masonry_gallery_style_variation',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' ) => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'attach_images',
							'heading'     => esc_html__( 'Upload Images', 'radiantthemes-addons' ),
							'holder'      => 'div',
							'param_name'  => 'masonry_gallery_url',
							'description' => esc_html__( 'Upload Images for gallery', 'radiantthemes-addons' ),
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
							'heading'    => esc_html__( 'Customizer', 'radiantthemes-addons' ),
							'param_name' => 'masonry_gallery_css',
							'group'      => esc_html__( 'Hover Layer', 'radiantthemes-addons' ),
						),
					),
				)
			);
			add_shortcode( 'rt_masonry_gallery', array( $this, 'radiantthemes_masonry_gallery_style_func' ) );
		}

		/**
		 * [radiantthemes_masonry_gallery_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_masonry_gallery_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'masonry_gallery_style_variation'  => 'one',
					'masonry_gallery_url'              => '',
					'animation'                        => '',
					'extra_class'                      => '',
					'extra_id'                         => '',
					'masonry_gallery_css'              => '',
				), $atts
			);

			$animation_classes    = $this->getCSSAnimation( $shortcode['animation'] );
			$masonry_gallery_css  = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['masonry_gallery_css'], ' ' ), $atts );

			wp_register_style(
				'radiantthemes_masonry_gallery_' . $shortcode['masonry_gallery_style_variation'],
				plugins_url( 'radiantthemes-addons/masonry-gallery/css/radiantthemes-masonry-gallery-element-' . $shortcode['masonry_gallery_style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_masonry_gallery_' . $shortcode['masonry_gallery_style_variation'] );

			wp_register_style(
				'fancybox',
				plugins_url( 'radiantthemes-addons/assets/css/jquery.fancybox.min.css' )
			);
			wp_enqueue_style( 'fancybox' );

			wp_register_script(
				'isotope',
				plugins_url( 'radiantthemes-addons/assets/js/isotope.pkgd.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'isotope' );

			wp_register_script(
				'fancybox',
				plugins_url( 'radiantthemes-addons/assets/js/jquery.fancybox.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'fancybox' );

			wp_register_script(
				'radiantthemes_masonry_gallery_' . $shortcode['masonry_gallery_style_variation'],
				plugins_url( 'radiantthemes-addons/masonry-gallery/js/radiantthemes-masonry-gallery-element-' . $shortcode['masonry_gallery_style_variation'] . '.js' ),
				array( 'jquery', 'isotope', 'fancybox' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_masonry_gallery_' . $shortcode['masonry_gallery_style_variation'] );

			$image_ids = explode( ',', $shortcode['masonry_gallery_url'] );

			$output  = '<div class="rt-masonry-gallery element-' . $shortcode['masonry_gallery_style_variation'] . ' row">';
			require 'template/template-masonry-gallery-style-' . esc_attr( $shortcode['masonry_gallery_style_variation'] ) . '.php';
			$output .= '</div>';
			return $output;
		}
	}
}
<?php
/**
 * Image Gallery Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'RadiantThemes_Style_Image_Gallery' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Image_Gallery extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Image Gallery', 'radiantthemes-addons' ),
					'base'        => 'rt_image_gallery',
					'description' => esc_html__( 'Add Image Gallery with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/image-gallery/icon/Image-Gallery-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_image_gallery',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Image Gallery Style', 'radiantthemes-addons' ),
							'param_name'  => 'image_gallery_style_variation',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'attach_images',
							'heading'     => esc_html__( 'Upload Images', 'radiantthemes-addons' ),
							'holder'      => 'div',
							'param_name'  => 'image_gallery_url',
							'description' => esc_html__( 'Upload Images for Gallery', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items in small gallery', 'radiantthemes-addons' ),
							'param_name'  => 'item_small_gallery',
							'admin_label' => true,
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
			add_shortcode( 'rt_image_gallery', array( $this, 'radiantthemes_image_gallery_style_func' ) );
		}

		/**
		 * [radiantthemes_image_gallery_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_image_gallery_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'style_variation'    => 'one',
					'image_gallery_url'  => '',
					'item_small_gallery' => '4',
					'extra_class'        => '',
					'extra_id'           => '',
				), $atts
			);

			wp_register_style(
				'radiantthemes_image_gallery_' . $shortcode['style_variation'],
				plugins_url( 'radiantthemes-addons/image-gallery/css/radiantthemes-image-gallery-element-' . $shortcode['style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_image_gallery_' . $shortcode['style_variation'] );

			wp_register_style(
				'owl-carousel',
				plugins_url( 'radiantthemes-addons/assets/css/owl.carousel.min.css' )
			);
			wp_enqueue_style( 'owl-carousel' );

			wp_register_script(
				'owl-carousel',
				plugins_url( 'radiantthemes-addons/assets/js/owl.carousel.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'owl-carousel' );

			wp_register_script(
				'owl-carousel2-thumbs',
				plugins_url( 'radiantthemes-addons/image-gallery/js/owl.carousel2.thumbs.min.js' ),
				array( 'jquery', 'owl-carousel' ),
				false,
				true
			);
			wp_enqueue_script( 'owl-carousel2-thumbs' );

			wp_register_script(
				'radiantthemes_image_gallery_' . $shortcode['style_variation'],
				plugins_url( 'radiantthemes-addons/image-gallery/js/radiantthemes-image-gallery-element-' . $shortcode['style_variation'] . '.js' ),
				array( 'jquery', 'owl-carousel' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_image_gallery_' . $shortcode['style_variation'] );

			$image_ids = explode( ',', $shortcode['image_gallery_url'] );

			$output  = '<div class="rt-image-gallery element-' . $shortcode['style_variation'] . '" data-thumbnail-items="' . $shortcode['item_small_gallery'] . '">';
			$output .= '<ul class="rt-image-gallery-holder owl-carousel">';
			foreach ( $image_ids as $img_id ) {
				$images  = wp_get_attachment_image_src( $img_id, 'full' );
				$output .= '<li><img src="' . $images[0] . '"></li>';
			}
			$output .= '</ul>';
			$output .= '</div>';
			return $output;
		}
	}
}

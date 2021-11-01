<?php
/**
 * Popup Video Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Popup_Video' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Popup_Video extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Popup Video', 'radiantthemes-addons' ),
					'base'        => 'rt_popup_video',
					'description' => esc_html__( 'Add video popup player.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/popup-video/icon/Popup-Video-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_popup_video',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Popup Video Style', 'radiantthemes-addons' ),
							'param_name'  => 'popup_video_style_variation',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' ) => 'one',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Popup Video Alignment', 'radiantthemes-addons' ),
							'param_name'  => 'popup_video_alignment',
							'description' => esc_html__( 'Choose alignment of the video.', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
							),
							'std'         => 'center',
						),
						array(
							'type'       => 'attach_image',
							'heading'    => esc_html__( 'Upload image', 'radiantthemes-addons' ),
							'param_name' => 'popup_video_image',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Enter Youtube/Vimeo Video Link', 'radiantthemes-addons' ),
							'param_name'  => 'popup_video_link',
							'description' => esc_html__( 'Enter video link. E.g - https://vimeo.com/24850539', 'radiantthemes-addons' ),
							'value'       => '',
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
					'js_view'     => 'VcIconElementView_Backend',
				)
			);
			add_shortcode( 'rt_popup_video', array( $this, 'radiantthemes_popup_video_style_func' ) );
		}

		/**
		 * [radiantthemes_popup_video_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_popup_video_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'popup_video_style_variation' => 'one',
					'popup_video_alignment'       => 'center',
					'popup_video_image'           => '',
					'popup_video_link'            => '',
					'extra_class'                 => '',
					'extra_id'                    => '',
				), $atts
			);

			wp_register_style(
				'fancybox',
				plugins_url( 'radiantthemes-addons/assets/css/jquery.fancybox.min.css' )
			);
			wp_enqueue_style( 'fancybox' );

			wp_register_style(
				'radiantthemes_popup_video_' . $shortcode['popup_video_style_variation'] . '',
				plugins_url( 'radiantthemes-addons/popup-video/css/radiantthemes-popup-video-element-' . $shortcode['popup_video_style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_popup_video_' . $shortcode['popup_video_style_variation'] . '' );

			wp_register_script(
				'fancybox',
				plugins_url( 'radiantthemes-addons/assets/js/jquery.fancybox.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'fancybox' );

			wp_register_script(
				'radiantthemes_popup_video_' . $shortcode['popup_video_style_variation'],
				plugins_url( 'radiantthemes-addons/popup-video/js/radiantthemes-popup-video-element-' . $shortcode['popup_video_style_variation'] . '.js' ),
				array( 'jquery', 'fancybox' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_popup_video_' . $shortcode['popup_video_style_variation'] );

			$popup_video_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			$output = '';

			require 'template/template-popup-video-style-' . esc_attr( $shortcode['popup_video_style_variation'] ) . '.php';

			return $output;
		}
	}
}

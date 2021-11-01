<?php
/**
 * Separator Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Progressbar' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Progressbar extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Progress Bar', 'radiantthemes-addons' ),
					'base'        => 'rt_progressbar_style',
					'description' => esc_html__( 'Radiant Theme Progress Bar', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/progressbar/icon/ProgressBar-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_progressbar_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Progressbar Title', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_title',
							'value'       => 'This is progress bar element',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Progressbar Style', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_style',
							'value'       => array(
								esc_html__( 'Red', 'radiantthemes-addons' )    => 'progress-bar-danger',
								esc_html__( 'Orange', 'radiantthemes-addons' ) => 'progress-bar-warning',
								esc_html__( 'Green', 'radiantthemes-addons' )  => 'progress-bar-success',
								esc_html__( 'Blue', 'radiantthemes-addons' )   => 'progress-bar-info',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Progressbar Height', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter measurement units (Example: px)', 'radiantthemes-addons' ),
							'admin_label' => true,
							'param_name'  => 'progressbar_height',
							'value'       => '15px',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Progress Percentage', 'radiantthemes-addons' ),
							'param_name'  => 'progress_width',
							'value'       => array(
                    								'100%',
                    								'90%',
                    								'80%',
                    								'70%',
                    								'60%',
                    								'50%',
                    								'40%',
                    								'30%',
                    								'20%',
                    								'10%',
							                ),
							'std'         => '80%',
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Progressbar Animation', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_animated',
							'value'       => array(
								esc_html__( 'true', 'radiantthemes-addons' )  => 'active',
								esc_html__( 'false', 'radiantthemes-addons' ) => ' ',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Progressbar Striped', 'radiantthemes-addons' ),
							'param_name'  => 'progressbar_striped',
							'value'       => array(
								esc_html__( 'true', 'radiantthemes-addons' )  => 'progress-bar-striped',
								esc_html__( 'false', 'radiantthemes-addons' ) => ' ',
							),
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
			add_shortcode( 'rt_progressbar_style', array( $this, 'radiantthemes_progressbar_style_func' ) );
		}

		/**
		 * [radiantthemes_progressbar_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_progressbar_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'progressbar_height'   => '15px',
					'progress_width'       => '80%',
					'progressbar_title'    => 'This is progress bar element',
					'progressbar_style'    => 'progress-bar-danger',
					'progressbar_striped'  => 'progress-bar-striped',
					'progressbar_animated' => 'active',
					'extra_class'          => '',
					'extra_id'             => '',
				), $atts
			);

			wp_register_style(
				'progress-bar-element-one',
				plugins_url( 'radiantthemes-addons/progressbar/css/radiantthemes-progress-bar-element-one.css' )
			);
			wp_enqueue_style( 'progress-bar-element-one' );

			$script = plugins_url( 'radiantthemes-addons/progressbar/js/radiantthemes-progress-bar-element-one.js' );
			wp_register_script(
				'progress-bar-element-one',
				$script,
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'progress-bar-element-one' );

			$output  = '<!-- rt-progress-bar -->';
			$output .= '<div id="' . esc_attr( $shortcode['extra_id'] ) . '" class="rt-progress-bar element-one ' . esc_attr( $shortcode['extra_class'] ) . '" data-progress-bar-width="' . esc_attr( $shortcode['progress_width'] ) . '" data-progress-bar-height="' . esc_attr( $shortcode['progressbar_height'] ) . '">';
			$output .= '<div class="title">' . esc_attr( $shortcode['progressbar_title'] );
			$output .= '<span class="progress-width"></span>';
			$output .= '</div>';
			$output .= '<div class="progress">';
			$output .= '<div class="progress-bar ' . esc_attr( $shortcode['progressbar_style'] );
			$output .= esc_attr( $shortcode['progressbar_striped'] ) . ' ' . esc_attr( $shortcode['progressbar_animated'] );
			$output .= '" ></div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<!-- rt-progress-bar -->';

			return $output;
		}
	}
}

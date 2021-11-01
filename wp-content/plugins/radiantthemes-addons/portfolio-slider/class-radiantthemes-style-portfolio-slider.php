<?php
/**
 * Portfolio Slider Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Portfolio_Slider' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Portfolio_Slider extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Portfolio Slider', 'radiantthemes-addons' ),
					'base'        => 'rt_portfolio_slider_style',
					'description' => esc_html__( 'Add Portfolio Slider.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/portfolio-slider/icon/Portfolio-Slider-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_portfolio_slider_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Slider Style', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_slider_style_variation',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Loop', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_slider_allow_loop',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
							),
							'std'        => 'true',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Autoplay?', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_slider_allow_autoplay',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
							),
							'std'        => 'true',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Autoplay Timeout (in millisecond)', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_slider_autoplay_timeout',
							'value'      => 6000,
							'dependency' => array(
								'element' => 'portfolio_slider_allow_autoplay',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items on Desktop', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_slider_items_in_desktop',
							'description' => esc_html__( 'Items on Desktop (in single row)', 'radiantthemes-addons' ),
							'value'       => '5',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items on Tab', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_slider_items_in_tab',
							'description' => esc_html__( 'Items on Tab (in single row)', 'radiantthemes-addons' ),
							'value'       => '3',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Items on Mobile', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_slider_items_in_mobile',
							'description' => esc_html__( 'Items on Mobile (in single row)', 'radiantthemes-addons' ),
							'value'       => '1',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Enable Zoom?', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_slider_enable_zoom',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Extra class name for the container', 'radiantthemes-addons' ),
							'param_name'  => 'extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'radiantthemes-addons' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Order By', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_slider_looping_order',
							'value'      => array(
								esc_html__( 'Date', 'radiantthemes-addons' )       => 'date',
								esc_html__( 'ID', 'radiantthemes-addons' )         => 'ID',
								esc_html__( 'Title', 'radiantthemes-addons' )      => 'title',
								esc_html__( 'Modified', 'radiantthemes-addons' )   => 'modified',
								esc_html__( 'Random', 'radiantthemes-addons' )     => 'random',
								esc_html__( 'Menu order', 'radiantthemes-addons' ) => 'menu_order',
							),
							'std'        => 'ID',
							'group'      => 'Looping',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Sort Order', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_slider_looping_sort',
							'value'      => array(
								esc_html__( 'Ascending', 'radiantthemes-addons' )  => 'ASC',
								esc_html__( 'Descending', 'radiantthemes-addons' ) => 'DESC',
							),
							'std'        => 'DESC',
							'group'      => 'Looping',
						),
					),
				)
			);
			add_shortcode( 'rt_portfolio_slider_style', array( $this, 'radiantthemes_portfolio_slider_style_func' ) );
		}

		/**
		 * [radiantthemes_portfolio_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 */
		public function radiantthemes_portfolio_slider_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'portfolio_slider_style_variation'         => 'one',
                    'portfolio_slider_allow_loop'              => 'true',
                    'portfolio_slider_allow_autoplay'          => 'true',
                    'portfolio_slider_autoplay_timeout'        => '6000',
					'portfolio_slider_items_in_desktop'        => '5',
					'portfolio_slider_items_in_tab'            => '3',
					'portfolio_slider_items_in_mobile'         => '1',
					'portfolio_slider_enable_zoom'             => 'no',
					'extra_class'                              => '',
					'extra_id'                                 => '',
					'portfolio_slider_looping_order'           => 'ID',
					'portfolio_slider_looping_sort'            => 'DESC',
				), $atts
			);

			wp_register_style(
				'owl-carousel',
				plugins_url( 'radiantthemes-addons/assets/css/owl.carousel.min.css' )
			);
			wp_enqueue_style( 'owl-carousel' );

			wp_register_style(
				'fancybox',
				plugins_url( 'radiantthemes-addons/assets/css/jquery.fancybox.min.css' )
			);
			wp_enqueue_style( 'fancybox' );

			wp_register_style(
				'radiantthemes_portfolio_slider_' . $shortcode['portfolio_slider_style_variation'] . '',
				plugins_url( 'radiantthemes-addons/portfolio-slider/css/radiantthemes-portfolio-slider-element-' . $shortcode['portfolio_slider_style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_portfolio_slider_' . $shortcode['portfolio_slider_style_variation'] . '' );

			wp_register_script(
				'owl-carousel',
				plugins_url( 'radiantthemes-addons/assets/js/owl.carousel.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'owl-carousel' );

			wp_register_script(
				'fancybox',
				plugins_url( 'radiantthemes-addons/assets/js/jquery.fancybox.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'fancybox' );

			wp_register_script(
				'radiantthemes_portfolio_slider_' . $shortcode['portfolio_slider_style_variation'],
				plugins_url( 'radiantthemes-addons/portfolio-slider/js/radiantthemes-portfolio-slider-element-' . $shortcode['portfolio_slider_style_variation'] . '.js' ),
				array( 'jquery', 'owl-carousel', 'fancybox' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_portfolio_slider_' . $shortcode['portfolio_slider_style_variation'] );

			$enable_zoom = ( 'yes' === $shortcode['portfolio_slider_enable_zoom'] ) ? 'has-fancybox' : '';

			require 'template/template-portfolio-slider-style-' . esc_attr( $shortcode['portfolio_slider_style_variation'] ) . '.php';

			return $output;
		}
	}
}
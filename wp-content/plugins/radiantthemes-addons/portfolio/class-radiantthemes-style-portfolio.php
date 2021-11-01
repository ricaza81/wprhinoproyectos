<?php
/**
 * Portfolio Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Portfolio' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Portfolio extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Portfolio', 'radiantthemes-addons' ),
					'base'        => 'rt_portfolio_style',
					'description' => esc_html__( 'Add Portfolio with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/portfolio/icon/Portfolio-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_portfolio_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Style', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_style_variation',
							'value'      => array(
								esc_html__( 'Style One (Masonry - Title and Category)', 'radiantthemes-addons' )         => 'one',
								esc_html__( 'Style Two (Flipbox)', 'radiantthemes-addons' )                              => 'two',
								esc_html__( 'Style Three (Masonry - Zoom Center)', 'radiantthemes-addons' )              => 'three',
								esc_html__( 'Style Four (Overlay - Title Bottom)', 'radiantthemes-addons' )              => 'four',
								esc_html__( 'Style Five (Overlay - Zoom Center)', 'radiantthemes-addons' )               => 'five',
								esc_html__( 'Style Six (Overlay - Title Center)', 'radiantthemes-addons' )               => 'six',
								esc_html__( 'Style Seven (Overlay - Title and Details)', 'radiantthemes-addons' )        => 'seven',
								esc_html__( 'Style Eight (Overlay - Title, Zoom and Details)', 'radiantthemes-addons' )  => 'eight',
								esc_html__( 'Style Nine (Left Title - Right Arrow)', 'radiantthemes-addons' )            => 'nine',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Portfolio Category', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Display posts from a specific category (enter portfolio category slug name). Use "all" to dislay all posts. ', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_category',
							'value'       => 'all',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Display Filter', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_display_filter',
							'dependency' => array(
								'element' => 'portfolio_category',
								'value'   => 'all',
							),
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'yes',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Filter Style', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_filter_style',
							'dependency' => array(
								'element' => 'portfolio_display_filter',
								'value'   => 'yes',
							),
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Style Four', 'radiantthemes-addons' )  => 'four',
								esc_html__( 'Style Five', 'radiantthemes-addons' )  => 'five',
								esc_html__( 'Style Six', 'radiantthemes-addons' )   => 'six',
								esc_html__( 'Style Seven', 'radiantthemes-addons' ) => 'seven',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Filter Align', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_filter_alignment',
							'dependency' => array(
								'element' => 'portfolio_display_filter',
								'value'   => 'yes',
							),
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
							'std'        => 'center',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Box Align', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_box_alignment',
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
							'std'        => 'center',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'How many items to show?', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_max_posts',
							'description' => esc_html__( 'Use -1 to dislay all posts. ', 'radiantthemes-addons' ),
							'value'       => '8',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Portfolio Box Number', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_box_number',
							'description' => esc_html__( 'Number of Portfolio Box to display in a grid.', 'radiantthemes-addons' ),
							'value'      => array(
							    '1',
								'2',
								'3',
								'4',
							),
							'std'        => '3',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Enable Zoom?', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_enable_zoom',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'yes',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Enable Link?', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_enable_link',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
                        array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Enable Title?', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_enable_title',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
                        array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Portfolio Enable excerpt?', 'radiantthemes-addons' ),
							'param_name' => 'portfolio_enable_excerpt',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Spacing between Portfolio Items', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_spacing',
							'description' => esc_html__( 'Enter only the spacing value without unit. E.g. 30', 'radiantthemes-addons' ),
							'value'       => '0',
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
							'param_name' => 'portfolio_looping_order',
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
							'param_name' => 'portfolio_looping_sort',
							'value'      => array(
								esc_html__( 'Ascending', 'radiantthemes-addons' )  => 'ASC',
								esc_html__( 'Descending', 'radiantthemes-addons' ) => 'DESC',
							),
							'std'        => 'DESC',
							'group'      => 'Looping',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Offset Posts', 'radiantthemes-addons' ),
							'param_name'  => 'portfolio_looping_offset',
							'description' => esc_html__( 'Use this field to ignore few posts (Eg.: 2 ).', 'radiantthemes-addons' ),
							'group'       => 'Looping',
						),
					),
				)
			);
			add_shortcode( 'rt_portfolio_style', array( $this, 'radiantthemes_portfolio_style_func' ) );
		}

		/**
		 * [radiantthemes_portfolio_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 */
		public function radiantthemes_portfolio_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'portfolio_style_variation'    => 'one',
					'portfolio_category'           => 'all',
					'portfolio_display_filter'     => 'yes',
					'portfolio_filter_style'       => 'one',
					'portfolio_filter_alignment'   => 'center',
					'portfolio_box_alignment'      => 'center',
					'portfolio_max_posts'          => '8',
					'portfolio_box_number'         => '3',
					'portfolio_enable_zoom'        => 'yes',
					'portfolio_enable_link'        => 'no',
                    'portfolio_enable_title'       => '',
                    'portfolio_enable_excerpt'     => '',
                    'portfolio_spacing'            => '0',
					'extra_class'                  => '',
					'extra_id'                     => '',
					'portfolio_looping_order'      => 'ID',
					'portfolio_looping_sort'       => 'DESC',
					'portfolio_looping_offset'     => '0',
				), $atts
			);

			wp_register_style(
				'fancybox',
				plugins_url( 'radiantthemes-addons/assets/css/jquery.fancybox.min.css' )
			);
			wp_enqueue_style( 'fancybox' );

			wp_register_style(
				'radiantthemes_portfolio_element_filter_style',
				plugins_url( 'radiantthemes-addons/portfolio/css/radiantthemes-portfolio-element-filter-style.css' )
			);
			wp_enqueue_style( 'radiantthemes_portfolio_element_filter_style' );

			wp_register_style(
				'radiantthemes_portfolio_' . $shortcode['portfolio_style_variation'] . '',
				plugins_url( 'radiantthemes-addons/portfolio/css/radiantthemes-portfolio-element-' . $shortcode['portfolio_style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_portfolio_' . $shortcode['portfolio_style_variation'] . '' );

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
				'radiantthemes_portfolio_' . $shortcode['portfolio_style_variation'],
				plugins_url( 'radiantthemes-addons/portfolio/js/radiantthemes-portfolio-element-' . $shortcode['portfolio_style_variation'] . '.js' ),
				array( 'jquery', 'isotope', 'fancybox' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_portfolio_' . $shortcode['portfolio_style_variation'] );

			$hidden_filter = ( 'no' === $shortcode['portfolio_display_filter'] ) ? 'hidden' : '';

			$enable_zoom = ( 'yes' === $shortcode['portfolio_enable_zoom'] ) ? 'has-fancybox' : '';

			$spacing_value = ( $shortcode['portfolio_spacing'] / 2 );

			if ( '1' == $shortcode['portfolio_box_number'] ) {
				$portfolio_item_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
			} elseif ( '2' == $shortcode['portfolio_box_number'] ) {
				$portfolio_item_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
			} elseif ( '3' == $shortcode['portfolio_box_number'] ) {
				$portfolio_item_class = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
			} elseif ( '4' == $shortcode['portfolio_box_number'] ) {
				$portfolio_item_class = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
			} else {
				$portfolio_item_class = '';
			}

			require 'template/template-portfolio-style-' . esc_attr( $shortcode['portfolio_style_variation'] ) . '.php';

			return $output;
		}

	}
}

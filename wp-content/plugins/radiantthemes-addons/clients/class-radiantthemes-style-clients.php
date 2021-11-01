<?php
/**
 * Clients Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Clients' ) ) {
	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Clients extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Clients', 'radiantthemes-addons' ),
					'base'        => 'rt_clients_style',
					'description' => esc_html__( 'Add Clients with different styles', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/clients/icon/Clients-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_clients_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Clients Style', 'radiantthemes-addons' ),
							'param_name' => 'clients_style',
							'value'      => array(
								esc_html__( 'Style One (Simple)', 'radiantthemes-addons' )                       => 'one',
								esc_html__( 'Style Two (Boxed Shadow)', 'radiantthemes-addons' )                 => 'two',
								esc_html__( 'Style Three (Boxed Alternative Colored)', 'radiantthemes-addons' )  => 'three',
								esc_html__( 'Style Four (Boxed Bordered)', 'radiantthemes-addons' )              => 'four',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Carousel', 'radiantthemes-addons' ),
							'param_name' => 'clients_allow_carousel',
							'value'      => array(
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
							),
							'std'        => 'true',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Navigation?', 'radiantthemes-addons' ),
							'param_name' => 'allow_nav',
							'value'      => array(
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
							),
							'std'        => 'true',
							'dependency' => array(
								'element' => 'clients_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Navigation Style', 'radiantthemes-addons' ),
							'param_name' => 'navigation_style',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
							),
							'dependency' => array(
								'element' => 'allow_nav',
								'value'   => 'true',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Dots for Navigation?', 'radiantthemes-addons' ),
							'param_name' => 'allow_dots',
							'value'      => array(
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
							),
							'std'        => 'true',
							'dependency' => array(
								'element' => 'clients_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Navigation Dot Style', 'radiantthemes-addons' ),
							'param_name' => 'navigation_dot_style',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
							),
							'dependency' => array(
								'element' => 'allow_dots',
								'value'   => 'true',
							),
							'std'        => 'two',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Loop?', 'radiantthemes-addons' ),
							'param_name' => 'allow_loop',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
							),
							'std'        => 'true',
							'dependency' => array(
								'element' => 'clients_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Autoplay?', 'radiantthemes-addons' ),
							'param_name' => 'allow_autoplay',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
							),
							'std'        => 'true',
							'dependency' => array(
								'element' => 'clients_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Autoplay Timeout (in seconds)', 'radiantthemes-addons' ),
							'param_name' => 'autoplay_timeout',
							'value'      => 6,
							'dependency' => array(
								'element' => 'clients_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Order', 'radiantthemes-addons' ),
							'param_name' => 'order',
							'value'      => array(
								esc_html__( 'Ascending', 'radiantthemes-addons' )  => 'ASC',
								esc_html__( 'Descending', 'radiantthemes-addons' ) => 'DESC',
							),
							'std'        => 'DESC',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Order By', 'radiantthemes-addons' ),
							'param_name' => 'order_by',
							'value'      => array(
								esc_html__( 'Date', 'radiantthemes-addons' )          => 'date',
								esc_html__( 'Title', 'radiantthemes-addons' )         => 'title',
								esc_html__( 'ID', 'radiantthemes-addons' )            => 'ID',
								esc_html__( 'Random', 'radiantthemes-addons' )        => 'rand',
								esc_html__( 'Last Modified', 'radiantthemes-addons' ) => 'modified',
							),
							'std'        => 'date',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Count', 'radiantthemes-addons' ),
							'param_name'  => 'max_posts',
							'description' => esc_html__( 'Number of posts to show ( -1 for all posts )', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
							'param_name'  => 'posts_in_desktop',
							'description' => esc_html__( 'Posts on Desktop', 'radiantthemes-addons' ),
							'std'         => '5',
							'dependency'  => array(
								'element' => 'clients_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Posts on Tab', 'radiantthemes-addons' ),
							'param_name'  => 'posts_in_tab',
							'description' => esc_html__( 'Posts on Tab', 'radiantthemes-addons' ),
							'std'         => '5',
							'dependency'  => array(
								'element' => 'clients_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
							'param_name'  => 'posts_in_mobile',
							'description' => esc_html__( 'Posts on Mobile', 'radiantthemes-addons' ),
							'std'         => '1',
							'dependency'  => array(
								'element' => 'clients_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Row Items', 'radiantthemes-addons' ),
							'param_name'  => 'clients_no_row_items',
							'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
							'std'         => '2',
							'dependency'  => array(
								'element' => 'clients_allow_carousel',
								'value'   => 'false',
							),
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
					),
				)
			);
			add_shortcode( 'rt_clients_style', array( $this, 'radiantthemes_clients_style_func' ) );
		}

		/**
		 * [radiantthemes_clients_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_clients_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'clients_style'          => 'one',
					'clients_allow_carousel' => 'true',
					'allow_nav'              => 'true',
					'navigation_style'       => 'one',
					'allow_loop'             => 'true',
					'allow_autoplay'         => 'true',
					'allow_dots'             => 'true',
					'navigation_dot_style'   => 'one',
					'autoplay_timeout'       => '',
					'order'                  => 'DESC',
					'order_by'               => 'date',
					'max_posts'              => -1,
					'posts_in_desktop'       => '5',
					'posts_in_tab'           => '5',
					'posts_in_mobile'        => '1',
					'clients_no_row_items'   => '2',
					'extra_class'            => '',
					'extra_id'               => '',
				), $atts
			);

			wp_register_style(
				'radiantthemes_clients_nav_dot_style',
				plugins_url( 'radiantthemes-addons/clients/css/radiantthemes-clients-nav-dot-style.css' )
			);
			wp_enqueue_style( 'radiantthemes_clients_nav_dot_style' );

			wp_register_style(
				'radiantthemes_clients_' . $shortcode['clients_style'],
				plugins_url( 'radiantthemes-addons/clients/css/radiantthemes-clients-element-' . $shortcode['clients_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_clients_' . $shortcode['clients_style'] );

			if ( 'true' == $shortcode['clients_allow_carousel'] ) {
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
			}

			wp_register_script(
				'radiantthemes_clients_' . $shortcode['clients_style'],
				plugins_url( 'radiantthemes-addons/clients/js/radiantthemes-clients-element-' . $shortcode['clients_style'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_clients_' . $shortcode['clients_style'] );

			$navigation_style = $shortcode['allow_nav'] ? 'owl-nav-style-' . esc_attr( $shortcode['navigation_style'] ) : '';
			$dot_style        = $shortcode['allow_dots'] ? 'owl-dot-style-' . esc_attr( $shortcode['navigation_dot_style'] ) : '';

			$clients_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';

			if ( 'false' == $shortcode['clients_allow_carousel'] ) {
				$output = '<div class="clients element-' . esc_attr( $shortcode['clients_style'] ) . ' ' . esc_attr( $shortcode['extra_class'] ) . '" ' . $clients_id . ' data-row-items="' . esc_attr( $shortcode['clients_no_row_items'] ) . '">';
			} elseif ( 'true' == $shortcode['clients_allow_carousel'] ) {
				$output = '<div class="clients owl-carousel element-' . esc_attr( $shortcode['clients_style'] ) . ' ' . $navigation_style . ' ' . $dot_style . ' ' . esc_attr( $shortcode['extra_class'] ) . '" ' . $clients_id . ' data-owl-nav="' . esc_attr( $shortcode['allow_nav'] ) . '" data-owl-dots="' . esc_attr( $shortcode['allow_dots'] ) . '" data-owl-loop="' . esc_attr( $shortcode['allow_loop'] ) . '" data-owl-autoplay="' . esc_attr( $shortcode['allow_autoplay'] ) . '" data-owl-autoplay-timeout="' . esc_attr( $shortcode['autoplay_timeout'] ) . '" data-owl-mobile-items="' . esc_attr( $shortcode['posts_in_mobile'] ) . '" data-owl-tab-items="' . esc_attr( $shortcode['posts_in_tab'] ) . '" data-owl-desktop-items="' . esc_attr( $shortcode['posts_in_desktop'] ) . '">';
			}

			if ( empty( $shortcode['max_posts'] ) ) {
				$shortcode['max_posts'] = -1;
			}
			$query = new WP_Query(
				array(
					'post_type'      => 'client',
					'posts_per_page' => $shortcode['max_posts'],
					'order'          => $shortcode['order'],
					'orderby'        => $shortcode['order_by'],
				)
			);
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					if ( ! has_post_thumbnail() ) {
						$output .= '<!-- clients-item -->';
						$output .= '<div class="clients-item no-image">';
					} else {
						$output .= '<!-- clients-item -->';
						$output .= '<div class="clients-item">';
					}
					$output .= '<div class="holder matchHeight">';
					$output .= '<div class="table">';
					$output .= '<div class="table-cell">';
					$output .= '<div class="pic radiantthemes-retina">';
					$output .= get_the_post_thumbnail( get_the_ID() );
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '<!-- clients-item -->';
				}
				wp_reset_postdata();
			} else {
				echo '<p>No items found</p>';
			}

			if ( 'false' == $shortcode['clients_allow_carousel'] ) {
				$output .= '</div>';
			} elseif ( 'true' == $shortcode['clients_allow_carousel'] ) {
				$output .= '</div>';
			}

			return $output;
		}
	}
}

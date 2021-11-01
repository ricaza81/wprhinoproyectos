<?php
/**
 * Blog Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Blog' ) ) {
	/**
	 * GET Categories | Categories for posts or specified taxonomy
	 *
	 * @param string $category Category slug.
	 * @return array
	 */
	function rt_get_categories( $category ) {
		$categories = get_categories(
			array(
				'taxonomy' => $category,
			)
		);

		$array = array(
			'' => esc_html__( 'All', 'radiantthemes-addons' ),
		);

		foreach ( $categories as $cat ) {
			if ( is_object( $cat ) ) {
				$array[ $cat->slug ] = $cat->name;
			}
		}

		return $array;
	}

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Blog extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Blog', 'radiantthemes-addons' ),
					'base'        => 'rt_blog_style',
					'description' => esc_html__( 'Add Blog with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/blog/icon/Blog-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_blog_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Blog Style', 'radiantthemes-addons' ),
							'param_name' => 'style_variation',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )      => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )      => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' )    => 'three',
								esc_html__( 'Style Four', 'radiantthemes-addons' )     => 'four',
								esc_html__( 'Style Five', 'radiantthemes-addons' )     => 'five',
								esc_html__( 'Style Six', 'radiantthemes-addons' )      => 'six',
								esc_html__( 'Style Seven', 'radiantthemes-addons' )    => 'seven',
								esc_html__( 'Style Eight', 'radiantthemes-addons' )    => 'eight',
								esc_html__( 'Style Nine', 'radiantthemes-addons' )     => 'nine',
								esc_html__( 'Style Ten', 'radiantthemes-addons' )      => 'ten',
								esc_html__( 'Style Eleven', 'radiantthemes-addons' )   => 'eleven',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Carousel', 'radiantthemes-addons' ),
							'param_name' => 'blog_allow_carousel',
							'value'      => array(
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
							),
							'std'        => 'true',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Category', 'radiantthemes-addons' ),
							'param_name' => 'select_category',
							'value'      => array_flip( rt_get_categories( 'category' ) ),
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
								'element' => 'blog_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Navigation Style', 'radiantthemes-addons' ),
							'param_name' => 'navigation_style',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' ) => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' ) => 'two',
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
								'element' => 'blog_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Navigation Dot Style', 'radiantthemes-addons' ),
							'param_name' => 'navigation_dot_style',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' ) => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' ) => 'two',
							),
							'dependency' => array(
								'element' => 'allow_dots',
								'value'   => 'true',
							),
							'std'        => 'two',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Allow Loop', 'radiantthemes-addons' ),
							'param_name' => 'allow_loop',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'true',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'false',
							),
							'std'        => 'true',
							'dependency' => array(
								'element' => 'blog_allow_carousel',
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
								'element' => 'blog_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Autoplay Timeout (in millisecond)', 'radiantthemes-addons' ),
							'param_name' => 'autoplay_timeout',
							'value'      => 1000,
							'dependency' => array(
								'element' => 'allow_autoplay',
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
							'value'       => '-1',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
							'param_name'  => 'posts_in_desktop',
							'description' => esc_html__( 'Posts on Desktop (in single row)', 'radiantthemes-addons' ),
							'value'       => '3',
							'dependency'  => array(
								'element' => 'blog_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Posts on Tab', 'radiantthemes-addons' ),
							'param_name'  => 'posts_in_tab',
							'description' => esc_html__( 'Posts on Tab (in single row)', 'radiantthemes-addons' ),
							'value'       => '2',
							'dependency'  => array(
								'element' => 'blog_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
							'param_name'  => 'posts_in_mobile',
							'description' => esc_html__( 'Posts on Mobile (in single row)', 'radiantthemes-addons' ),
							'value'       => '1',
							'dependency'  => array(
								'element' => 'blog_allow_carousel',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Number of Row Items', 'radiantthemes-addons' ),
							'param_name'  => 'blog_no_row_items',
							'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
							'std'         => '2',
							'dependency'  => array(
								'element' => 'blog_allow_carousel',
								'value'   => 'false',
							),
						),

						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__( 'Add Animation?', 'radiantthemes-addons' ),
							'param_name' => 'add_animation',
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Name', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'param_name'       => 'rt_animation',
							'description'      => sprintf( wp_kses_post( 'Choose your animation name. Powered By:  <a href="%s" target="_blank">Animate css</a>).', 'radiantthemes-addons' ), 'https://daneden.github.io/animate.css' ),
							'value'            => array(
								esc_html__( 'Attention Seekers', 'radiantthemes-addons' )    => 'attention_seekers',
								esc_html__( 'Bouncing Entrances', 'radiantthemes-addons' )   => 'bouncing_entrances',
								esc_html__( 'Bouncing Exits', 'radiantthemes-addons' )       => 'bouncing_exits',
								esc_html__( 'Fading Entrances', 'radiantthemes-addons' )     => 'fading_entrances',
								esc_html__( 'Fading Exits', 'radiantthemes-addons' )         => 'fading_exits',
								esc_html__( 'Flippers', 'radiantthemes-addons' )             => 'flippers',
								esc_html__( 'Lightspeed', 'radiantthemes-addons' )           => 'lightspeed',
								esc_html__( 'Rotating Entrances', 'radiantthemes-addons' )   => 'rotating_entrances',
								esc_html__( 'Rotating Exits', 'radiantthemes-addons' )      => 'rotating_exits',
								esc_html__( 'Sliding Entrances', 'radiantthemes-addons' )    => 'sliding_entrances',
								esc_html__( 'Sliding Exits', 'radiantthemes-addons' )        => 'sliding_exits',
								esc_html__( 'Zoom Entrances', 'radiantthemes-addons' )       => 'zoom_entrances',
								esc_html__( 'Zoom Exits', 'radiantthemes-addons' )           => 'zoom_exits',
								esc_html__( 'Specials', 'radiantthemes-addons' )             => 'specials',
							),
							'std'              => 'attention_seekers',
							'dependency'       => array(
								'element' => 'add_animation',
								'value'   => 'true',
							),

						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'attention_seekers',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'Bounce', 'radiantthemes-addons' )     => 'bounce',
								esc_html__( 'Flash', 'radiantthemes-addons' )      => 'flash',
								esc_html__( 'Pulse', 'radiantthemes-addons' )      => 'pulse',
								esc_html__( 'rubberBand', 'radiantthemes-addons' ) => 'rubberBand',
								esc_html__( 'shake', 'radiantthemes-addons' )      => 'shake',
								esc_html__( 'swing', 'radiantthemes-addons' )      => 'swing',
								esc_html__( 'tada', 'radiantthemes-addons' )       => 'tada',
								esc_html__( 'wobble', 'radiantthemes-addons' )     => 'wobble',
								esc_html__( 'jello', 'radiantthemes-addons' )      => 'jello',
							),
							'std'              => 'bounce',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'attention_seekers',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'bouncing_entrances',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'BounceIn', 'radiantthemes-addons' )      => 'bounceIn',
								esc_html__( 'BounceInDown', 'radiantthemes-addons' )  => 'bounceInDown',
								esc_html__( 'BounceInLeft', 'radiantthemes-addons' )  => 'bounceInLeft',
								esc_html__( 'BounceInRight', 'radiantthemes-addons' ) => 'bounceInRight',
								esc_html__( 'BounceInUp', 'radiantthemes-addons' )    => 'bounceInUp',

							),
							'std'              => 'bounceIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'bouncing_entrances',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'bouncing_exits',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'bounceOut', 'radiantthemes-addons' )      => 'bounceOut',
								esc_html__( 'bounceOutDown', 'radiantthemes-addons' )  => 'bounceOutDown',
								esc_html__( 'bounceOutLeft', 'radiantthemes-addons' )  => 'bounceOutLeft',
								esc_html__( 'bounceOutRight', 'radiantthemes-addons' ) => 'bounceOutRight',
								esc_html__( 'bounceOutUp', 'radiantthemes-addons' )    => 'bounceOutUp',

							),
							'std'              => 'bounceOut',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'bouncing_exits',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'fading_entrances',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'fadeIn', 'radiantthemes-addons' )         => 'fadeIn',
								esc_html__( 'fadeInDown', 'radiantthemes-addons' )     => 'fadeInDown',
								esc_html__( 'fadeInDownBig', 'radiantthemes-addons' )  => 'fadeInDownBig',
								esc_html__( 'fadeInLeft', 'radiantthemes-addons' )     => 'fadeInLeft',
								esc_html__( 'fadeInLeftBig', 'radiantthemes-addons' )  => 'fadeInLeftBig',
								esc_html__( 'fadeInRight', 'radiantthemes-addons' )    => 'fadeInRight',
								esc_html__( 'fadeInRightBig', 'radiantthemes-addons' ) => 'fadeInRightBig',
								esc_html__( 'fadeInUp', 'radiantthemes-addons' )       => 'fadeInUp',
								esc_html__( 'fadeInUpBig', 'radiantthemes-addons' )    => 'fadeInUpBig',

							),
							'std'              => 'fadeIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'fading_entrances',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'fading_exits',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'fadeOut', 'radiantthemes-addons' )         => 'fadeOut',
								esc_html__( 'fadeOutDown', 'radiantthemes-addons' )     => 'fadeOutDown',
								esc_html__( 'fadeOutDownBig', 'radiantthemes-addons' )  => 'fadeOutDownBig',
								esc_html__( 'fadeOutLeft', 'radiantthemes-addons' )     => 'fadeOutLeft',
								esc_html__( 'fadeOutLeftBig', 'radiantthemes-addons' )  => 'fadeOutLeftBig',
								esc_html__( 'fadeOutRight', 'radiantthemes-addons' )    => 'fadeOutRight',
								esc_html__( 'fadeOutRightBig', 'radiantthemes-addons' ) => 'fadeOutRightBig',
								esc_html__( 'fadeOutUp', 'radiantthemes-addons' )       => 'fadeOutUp',
								esc_html__( 'fadeOutUpBig', 'radiantthemes-addons' )    => 'fadeOutUpBig',

							),
							'std'              => 'fadeOut',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'fading_exits',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'flippers',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'flip', 'radiantthemes-addons' )     => 'flip',
								esc_html__( 'flipInX', 'radiantthemes-addons' )  => 'flipInX',
								esc_html__( 'flipInY', 'radiantthemes-addons' )  => 'flipInY',
								esc_html__( 'flipOutX', 'radiantthemes-addons' ) => 'flipOutX',
								esc_html__( 'flipOutY', 'radiantthemes-addons' ) => 'flipOutY',

							),
							'std'              => 'flip',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'flippers',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'lightspeed',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'lightSpeedIn', 'radiantthemes-addons' )  => 'lightSpeedIn',
								esc_html__( 'lightSpeedOut', 'radiantthemes-addons' )  => 'lightSpeedOut',
							),
							'std'              => 'lightSpeedIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'lightspeed',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'rotating_entrances',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'rotateIn', 'radiantthemes-addons' )          => 'rotateIn',
								esc_html__( 'rotateInDownLeft', 'radiantthemes-addons' )  => 'rotateInDownLeft',
								esc_html__( 'rotateInDownRight', 'radiantthemes-addons' ) => 'rotateInDownRight',
								esc_html__( 'rotateInUpLeft', 'radiantthemes-addons' )    => 'rotateInUpLeft',
								esc_html__( 'rotateInUpRight', 'radiantthemes-addons' )   => 'rotateInUpRight',

							),
							'std'              => 'rotateIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'rotating_entrances',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'rotating_exits',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'rotateOut', 'radiantthemes-addons' )          => 'rotateOut',
								esc_html__( 'rotateOutDownLeft', 'radiantthemes-addons' )  => 'rotateOutDownLeft',
								esc_html__( 'rotateOutDownRight', 'radiantthemes-addons' ) => 'rotateOutDownRight',
								esc_html__( 'rotateOutUpLeft', 'radiantthemes-addons' )    => 'rotateOutUpLeft',
								esc_html__( 'rotateOutUpRight', 'radiantthemes-addons' )   => 'rotateOutUpRight',

							),
							'std'              => 'rotateIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'rotating_exits',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'sliding_entrances',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'slideInUp', 'radiantthemes-addons' )    => 'slideInUp',
								esc_html__( 'slideInDown', 'radiantthemes-addons' )  => 'slideInDown',
								esc_html__( 'slideInLeft', 'radiantthemes-addons' )  => 'slideInLeft',
								esc_html__( 'slideInRight', 'radiantthemes-addons' ) => 'slideInRight',

							),
							'std'              => 'slideInUp',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'sliding_entrances',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'sliding_exits',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'slideOutUp', 'radiantthemes-addons' )    => 'slideOutUp',
								esc_html__( 'slideOutDown', 'radiantthemes-addons' )  => 'slideOutDown',
								esc_html__( 'slideOutLeft', 'radiantthemes-addons' )  => 'slideOutLeft',
								esc_html__( 'slideOutRight', 'radiantthemes-addons' ) => 'slideOutRight',

							),
							'std'              => 'slideOutUp',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'sliding_exits',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'zoom_entrances',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'zoomIn', 'radiantthemes-addons' )      => 'zoomIn',
								esc_html__( 'zoomInDown', 'radiantthemes-addons' )  => 'zoomInDown',
								esc_html__( 'zoomInLeft', 'radiantthemes-addons' )  => 'zoomInLeft',
								esc_html__( 'zoomInRight', 'radiantthemes-addons' ) => 'zoomInRight',
								esc_html__( 'zoomInUp', 'radiantthemes-addons' )    => 'zoomInUp',

							),
							'std'              => 'zoomIn',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'zoom_entrances',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'zoom_exits',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'zoomOut', 'radiantthemes-addons' )      => 'zoomOut',
								esc_html__( 'zoomOutDown', 'radiantthemes-addons' )  => 'zoomOutDown',
								esc_html__( 'zoomOutLeft', 'radiantthemes-addons' )  => 'zoomOutLeft',
								esc_html__( 'zoomOutRight', 'radiantthemes-addons' ) => 'zoomOutRight',
								esc_html__( 'zoomOutUp', 'radiantthemes-addons' )    => 'zoomOutUp',

							),
							'std'              => 'zoomOut',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'zoom_exits',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Animation Style', 'radiantthemes-addons' ),
							'param_name'       => 'specials',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'description'      => esc_html__( 'Choose your animation style', 'radiantthemes-addons' ),
							'value'            => array(
								esc_html__( 'hinge', 'radiantthemes-addons' )        => 'hinge',
								esc_html__( 'jackInTheBox', 'radiantthemes-addons' ) => 'jackInTheBox',
								esc_html__( 'rollIn', 'radiantthemes-addons' )       => 'rollIn',
								esc_html__( 'rollOut', 'radiantthemes-addons' )      => 'rollOut',

							),
							'std'              => 'hinge',
							'dependency'       => array(
								'element' => 'rt_animation',
								'value'   => 'specials',
							),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Animation Duration', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Put time is seconds. Eg. 2s', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'param_name'       => 'duration',
							'value'            => '2s',
							'dependency'       => array(
								'element' => 'add_animation',
								'value'   => 'true',
							),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Animation Delay', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Put time is seconds. Eg. 0s', 'radiantthemes-addons' ),
							'param_name'       => 'delay',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0s',
							'dependency'       => array(
								'element' => 'add_animation',
								'value'   => 'true',
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
			add_shortcode( 'rt_blog_style', array( $this, 'radiantthemes_blog_style_func' ) );
		}

		/**
		 * [radiantthemes_blog_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 * @return [type]          [description]
		 */
		public function radiantthemes_blog_style_func( $atts, $content = null, $tag ) {

			$shortcode = shortcode_atts(
				array(
					'style_variation'      => 'one',
					'blog_allow_carousel'  => 'true',
					'select_category'      => '',
					'allow_nav'            => 'true',
					'navigation_style'     => 'one',
					'allow_loop'           => 'true',
					'allow_autoplay'       => 'true',
					'allow_dots'           => 'true',
					'navigation_dot_style' => 'two',
					'autoplay_timeout'     => '',
					'order'                => 'DESC',
					'order_by'             => 'date',
					'max_posts'            => -1,
					'posts_in_desktop'     => '3',
					'posts_in_tab'         => '2',
					'posts_in_mobile'      => '1',
					'blog_no_row_items'    => '2',
					'add_animation'        => '',
					'rt_animation'         => 'attention_seekers',
					'attention_seekers'    => 'bounce',
					'bouncing_entrances'   => 'bounceIn',
					'bouncing_exits'       => 'bounceOut',
					'fading_entrances'     => 'fadeIn',
					'fading_exits'         => 'fadeOut',
					'flippers'             => 'flip',
					'lightspeed'           => 'lightSpeedIn',
					'rotating_entrances'   => 'rotateIn',
					'rotating_exits'       => 'rotateOut',
					'sliding_entrances'    => 'slideInUp',
					'sliding_exits'        => 'slideOutUp',
					'zoom_entrances'       => 'zoomIn',
					'zoom_exits'           => 'zoomOut',
					'specials'             => 'hinge',
					'duration'             => '2s',
					'delay'                => '0s',
					'extra_class'          => '',
					'extra_id'             => '',
				), $atts
			);

			if ( 'true' == $shortcode['blog_allow_carousel'] ) {
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

			wp_register_style(
				'radiantthemes_blog_nav_dot_style',
				plugins_url( 'radiantthemes-addons/blog/css/radiantthemes-blog-nav-dot-style.css' )
			);
			wp_enqueue_style( 'radiantthemes_blog_nav_dot_style' );

			wp_register_style(
				'radiantthemes_blog_' . $shortcode['style_variation'],
				plugins_url( 'radiantthemes-addons/blog/css/radiantthemes-blog-element-' . $shortcode['style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_blog_' . $shortcode['style_variation'] );

			wp_register_script(
				'radiantthemes_blog_' . $shortcode['style_variation'],
				plugins_url( 'radiantthemes-addons/blog/js/radiantthemes-blog-element-' . $shortcode['style_variation'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_blog_' . $shortcode['style_variation'] );

			$blog_id = $shortcode['extra_id'] ? 'id="' . esc_attr( $shortcode['extra_id'] ) . '"' : '';
			// Build the animation classes.
			$time         = '';
			$rt_animation = '';
			if ( $shortcode['add_animation'] ) {
				$time  = 'data-wow-duration="' . $shortcode['duration'] . '"';
				$time .= ' data-wow-delay="' . $shortcode['delay'] . '"';

				if ( 'attention_seekers' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['attention_seekers'] ) ? esc_attr( $shortcode['attention_seekers'] ) : 'bounce';

				} elseif ( 'bouncing_entrances' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['bouncing_entrances'] ) ? esc_attr( $shortcode['bouncing_entrances'] ) : 'bounceIn';

				} elseif ( 'bouncing_exits' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['bouncing_exits'] ) ? esc_attr( $shortcode['bouncing_exits'] ) : 'bounceOut';

				} elseif ( 'fading_entrances' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['fading_entrances'] ) ? esc_attr( $shortcode['fading_entrances'] ) : 'fadeIn';

				} elseif ( 'fading_exits' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['fading_exits'] ) ? esc_attr( $shortcode['fading_exits'] ) : 'fadeOut';

				} elseif ( 'flippers' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['flippers'] ) ? esc_attr( $shortcode['flippers'] ) : 'flip';

				} elseif ( 'lightspeed' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['lightspeed'] ) ? esc_attr( $shortcode['lightspeed'] ) : 'lightSpeedIn';

				} elseif ( 'rotating_entrances' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['rotating_entrances'] ) ? esc_attr( $shortcode['rotating_entrances'] ) : 'rotateIn';

				} elseif ( 'rotating_exits' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['rotating_exits'] ) ? esc_attr( $shortcode['rotating_exits'] ) : 'rotateOut';

				} elseif ( 'sliding_entrances' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['sliding_entrances'] ) ? esc_attr( $shortcode['sliding_entrances'] ) : 'slideInUp';

				} elseif ( 'sliding_exits' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['sliding_exits'] ) ? esc_attr( $shortcode['sliding_exits'] ) : 'slideOutUp';

				} elseif ( 'zoom_entrances' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['zoom_entrances'] ) ? esc_attr( $shortcode['zoom_entrances'] ) : 'zoomIn';

				} elseif ( 'zoom_exits' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['zoom_exits'] ) ? esc_attr( $shortcode['zoom_exits'] ) : 'zoomOut';

				} elseif ( 'specials' === $shortcode['rt_animation'] ) {
					$rt_animation = isset( $shortcode['specials'] ) ? esc_attr( $shortcode['specials'] ) : 'hinge';

				}
						$rt_animation = 'wow ' . $rt_animation;
			}

			$output = '<!-- blog -->' . "\r";

			if ( 'false' == $shortcode['blog_allow_carousel'] ) {
				$output .= '<div class="blog element-' . $shortcode['style_variation'] . ' ';
				$output .= $shortcode['extra_class'] . '" ' . $blog_id;
				$output .= ' data-row-items="';
				$output .= esc_attr( $shortcode['blog_no_row_items'] ) . '"';
				$output .= '>';
			} elseif ( 'true' == $shortcode['blog_allow_carousel'] ) {
				$output .= '<div class="blog element-' . $shortcode['style_variation'] . ' owl-carousel ';
				$output .= ' ' . ( $shortcode['allow_nav'] ) ? "owl-nav-style-{$shortcode['navigation_style']}" : '';
				$output .= ' ' . ( $shortcode['allow_dots'] ) ? " owl-dot-style-{$shortcode['navigation_dot_style']}" : '';
				$output .= ' ' . $shortcode['extra_class'] . '" ' . $blog_id;
				$output .= ' data-owl-nav="';
				$output .= $shortcode['allow_nav'] . '" data-owl-dots="';
				$output .= $shortcode['allow_dots'] . '" data-owl-loop="';
				$output .= $shortcode['allow_loop'] . '" data-owl-autoplay="';
				$output .= $shortcode['allow_autoplay'] . '" data-owl-autoplay-timeout="';
				$output .= $shortcode['autoplay_timeout'] * 1000;
				$output .= '" data-owl-mobile-items="';
				$output .= $shortcode['posts_in_mobile'] . '" data-owl-tab-items="';
				$output .= $shortcode['posts_in_tab'] . '" data-owl-desktop-items="';
				$output .= $shortcode['posts_in_desktop'] . '">';
			} else {
				$output .= '';
			}

			$query = new WP_Query(
				array(
					'post_type'      => 'post',
					'category_name'  => $shortcode['select_category'],
					'posts_per_page' => $shortcode['max_posts'],
					'order'          => $shortcode['order'],
					'orderby'        => $shortcode['order_by'],
				)
			);

			$data = 0;
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					require 'template/template-blog-item-' . $shortcode['style_variation'] . '.php';
				}
				wp_reset_postdata();
			} else {
				$output .= '<p>No items found</p>';
			}

			$output .= '</div>' . "\r";
			$output .= '<!-- blog -->' . "\r";
			return $output;
		}
	}
}

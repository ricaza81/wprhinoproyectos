<?php
/**
 * Radiantthemes Accordion Addon
 *
 * @package Radiantthemes
 */

if ( ! class_exists( 'RadiantThemes_Style_Accordion' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Accordion {
		/**
		 * [$radiant_accordionstyle] description
		 *
		 * @var [type]
		 */
		private $radiant_accordionstyle;

		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Accordion', 'radiantthemes-addons' ),
					'base'        => 'rt_accordion_style',
					'class'       => 'wpb_rt_vc_extension_accordion_style',
					'icon'        => plugins_url( 'radiantthemes-addons/accordion/icon/Accordion-Element-Icon.png' ),
					'controls'    => 'full',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'as_parent'   => array(
						'only' => 'rt_accordion_style_item',
					),
					'js_view'     => 'VcColumnView',
					'description' => esc_html__( 'Accordion Content', 'radiantthemes-addons' ),
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Accordion Style', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_accordionstyle',
							'value'       => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Style Four', 'radiantthemes-addons' )  => 'four',
								esc_html__( 'Style Five', 'radiantthemes-addons' )  => 'five',
								esc_html__( 'Style Six', 'radiantthemes-addons' )   => 'six',
							),
							'std'         => 'one',
							'admin_label' => true,
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
							'param_name'  => 'radiant_extra_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Element ID', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_extra_id',
							'description' => sprintf( wp_kses_post( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'accordion_content_css',
							'group'      => esc_html__( 'Accordion Content Design', 'radiantthemes-addons' ),
						),
					),
				)
			);

			vc_map(
				array(
					'name'                    => esc_html__( 'Accordion Item', 'radiantthemes-addons' ),
					'base'                    => 'rt_accordion_style_item',
					'description'             => esc_html__( 'Add the title and content', 'radiantthemes-addons' ),
					'as_child'                => array(
						'only' => 'rt_accordion_style',
					),
					'show_settings_on_create' => true,
					'content_element'         => true,
					'params'                  => array(

						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Accordion Title', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_accordiontitle',
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea_html',
							'holder'     => 'div',
							'heading'    => esc_html__( 'Accordion Content', 'radiantthemes-addons' ),
							'param_name' => 'content',
						),
					),
				)
			);
			add_shortcode( 'rt_accordion_style', array( $this, 'radiantthemes_accordion_style_func' ) );
			add_shortcode( 'rt_accordion_style_item', array( $this, 'radiantthemes_accordion_style_item_func' ) );
		}

		/**
		 * [radiantthemes_accordion_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_accordion_style_func( $atts, $content = null, $tag ) {

			$shortcode                    = shortcode_atts(

				array(
					'radiant_accordionstyle' => 'one',
					'add_animation'          => '',
					'rt_animation'           => 'attention_seekers',
					'attention_seekers'      => 'bounce',
					'bouncing_entrances'     => 'bounceIn',
					'bouncing_exits'         => 'bounceOut',
					'fading_entrances'       => 'fadeIn',
					'fading_exits'           => 'fadeOut',
					'flippers'               => 'flip',
					'lightspeed'             => 'lightSpeedIn',
					'rotating_entrances'     => 'rotateIn',
					'rotating_exits'         => 'rotateOut',
					'sliding_entrances'      => 'slideInUp',
					'sliding_exits'          => 'slideOutUp',
					'zoom_entrances'         => 'zoomIn',
					'zoom_exits'             => 'zoomOut',
					'specials'               => 'hinge',
					'duration'               => '2s',
					'delay'                  => '0s',
					'radiant_extra_class'    => '',
					'radiant_extra_id'       => '',
					'accordion_content_css'  => '',
				), $atts
			);
			$this->radiant_accordionstyle = $shortcode['radiant_accordionstyle'];
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

			wp_register_style(
				'radiantthemes_accordion_' . $shortcode['radiant_accordionstyle'],
				plugins_url( 'radiantthemes-addons/accordion/css/radiantthemes-accordion-element-' . $shortcode['radiant_accordionstyle'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_accordion_' . $shortcode['radiant_accordionstyle'] );

			wp_register_script(
				'radiantthemes_accordion_script_' . $shortcode['radiant_accordionstyle'],
				plugins_url( 'radiantthemes-addons/accordion/js/radiantthemes-accordion-element-' . $shortcode['radiant_accordionstyle'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_accordion_script_' . $shortcode['radiant_accordionstyle'] );

			$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content.

			$accordion_id = $shortcode['radiant_extra_id'] ? 'id="' . esc_attr( $shortcode['radiant_extra_id'] ) . '"' : '';

			$accordion_content_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['accordion_content_css'], ' ' ), $atts );

			$output  = '<div class="rt-accordion element-' . esc_attr( $shortcode['radiant_accordionstyle'] ) . ' ' . esc_attr( $shortcode['radiant_extra_class'] ) . ' ' . $rt_animation . '" ' . esc_attr( $accordion_content_css ) . ' ' . $time . '>';
			$output .= do_shortcode( $content );
			$output .= '</div>';
			return $output;
		}

		/**
		 * [radiantthemes_accordion_style_item_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_accordion_style_item_func( $atts, $content = null, $tag ) {
			$accordionicon = '';

			$shortcode = shortcode_atts(
				array(
					'radiant_accordiontitle' => '',
					'radiant_accordionstyle' => '',
				), $atts
			);

			$output = '';

			if ( ! isset( $shortcode['radiant_accordiontitle'] ) || '' === $shortcode['radiant_accordiontitle'] ) {
				$shortcode['radiant_accordiontitle'] = 'Accordion';
			}
			require 'template/template-accordion-element-' . $this->radiant_accordionstyle . '.php';
			return $output;
		}
	}
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_Rt_Accordion_Style' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Accordion_Style extends WPBakeryShortCodesContainer {

	}
}

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'WPBakeryShortCode_Rt_Accordion_Style_Item' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Accordion_Style_Item extends WPBakeryShortCode {

	}
}

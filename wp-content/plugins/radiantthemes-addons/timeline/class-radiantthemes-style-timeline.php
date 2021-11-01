<?php
/**
 * Radiantthemes Timeline Addon
 *
 * @package Radiantthemes
 */

if ( ! class_exists( 'RadiantThemes_Style_Timeline' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Timeline {
		/**
		 * [$timelinestyle description]
		 *
		 * @var [type]
		 */
		private $timelinestyle;
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Timeline', 'radiantthemes-addons' ),
					'description' => esc_html__( 'Add timeline', 'radiantthemes-addons' ),
					'base'        => 'rt_timeline_style',
					'icon'        => plugins_url( 'radiantthemes-addons/timeline/icon/Timeline-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_timeline_style',
					'controls'    => 'full',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'as_parent'   => array(
						'only'    => 'rt_timeline_style_item',
					),
					'js_view'     => 'VcColumnView',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Select Timeline Style', 'radiantthemes-addons' ),
							'param_name' => 'radiant_timeline_style',
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' ) => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' ) => 'two',
							),
							'std'        => 'one',
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
							'param_name' => 'timeline_design_css',
							'group'      => esc_html__( 'Design', 'radiantthemes-addons' ),
						),
					),
				)
			);

			vc_map(
				array(
					'name'                    => esc_html__( 'Timeline Item', 'radiantthemes-addons' ),
					'base'                    => 'rt_timeline_style_item',
					'description'             => esc_html__( 'Add image, title and content', 'radiantthemes-addons' ),
					'as_child'                => array(
						'only' => 'rt_timeline_style',
					),
					'show_settings_on_create' => true,
					'content_element'         => true,
					'params'                  => array(
						array(
							'type'        => 'attach_image',
							'heading'     => esc_html__( 'Timeline Image', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_timeline_image',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Timeline Title', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_timeline_title',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Timeline Date (Month)', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_timeline_date_month',
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Timeline Date (Year)', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_timeline_date_year',
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea_html',
							'holder'     => 'div',
							'heading'    => esc_html__( 'Timeline Content', 'radiantthemes-addons' ),
							'param_name' => 'content',
						),
					),
				)
			);
			add_shortcode( 'rt_timeline_style', array( $this, 'radiantthemes_timeline_style_func' ) );
			add_shortcode( 'rt_timeline_style_item', array( $this, 'radiantthemes_timeline_style_item_func' ) );
		}

		/**
		 * [radiantthemes_timeline_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_timeline_style_func( $atts, $content = null, $tag ) {
			$timelinestyle = '';

			$shortcode = shortcode_atts(
				array(
					'radiant_timeline_style' => 'one',
					'radiant_extra_class'    => '',
					'radiant_extra_id'       => '',
					'timeline_design_css'    => '',
				), $atts
			);

			$this->timelinestyle = $shortcode['radiant_timeline_style'];

			wp_register_style(
				'radiantthemes_timeline_' . $shortcode['radiant_timeline_style'],
				plugins_url( 'radiantthemes-addons/timeline/css/radiantthemes-timeline-element-' . $shortcode['radiant_timeline_style'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_timeline_' . $shortcode['radiant_timeline_style'] );

			wp_register_script(
				'radiantthemes_timeline_script_' . $shortcode['radiant_timeline_style'],
				plugins_url( 'radiantthemes-addons/timeline/js/radiantthemes-timeline-element-' . $shortcode['radiant_timeline_style'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_timeline_script_' . $shortcode['radiant_timeline_style'] );

			$i = -1;

			$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content.

			$output = '';

			$timeline_id = $shortcode['radiant_extra_id'] ? 'id="' . esc_attr( $shortcode['radiant_extra_id'] ) . '"' : '';

			$timeline_design_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['timeline_design_css'], ' ' ), $atts );

			$output .= '<div class="radiantthemes-timeline element-' . esc_attr( $shortcode['radiant_timeline_style'] ) . ' ' . esc_attr( $shortcode['radiant_extra_class'] ) . '">';
			$output .= do_shortcode( $content );
			$output .= '</div>';

			return $output;
		}

		/**
		 * [radiantthemes_tab_style_item_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_timeline_style_item_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'radiant_timeline_image'      => '',
					'radiant_timeline_title'      => '',
					'radiant_timeline_date_month' => '',
					'radiant_timeline_date_year'  => '',
				), $atts
			);

			$output = '';

			if ( ! isset( $shortcode['radiant_timeline_title'] ) || '' === $shortcode['radiant_timeline_title'] ) {
				$shortcode['radiant_timeline_title'] = 'Timeline';
			}
			if ( ! isset( $shortcode['radiant_timeline_date_month'] ) || '' === $shortcode['radiant_timeline_date_month'] ) {
				$shortcode['radiant_timeline_date_month'] = 'March';
			}
			if ( ! isset( $shortcode['radiant_timeline_date_year'] ) || '' === $shortcode['radiant_timeline_date_year'] ) {
				$shortcode['radiant_timeline_date_year'] = '2018';
			}

			require 'template/template-timeline-style-' . esc_attr( $this->timelinestyle ) . '.php';

			return $output;
		}
	}
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_Rt_Timeline_Style' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Timeline_Style extends WPBakeryShortCodesContainer {

	}
}
if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'WPBakeryShortCode_Rt_Timeline_Style_Item' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Timeline_Style_Item extends WPBakeryShortCode {

	}
}

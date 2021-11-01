<?php
/**
 * Case Study Style Addon
 *
 * @package Radiantthemes
 */

if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'Radiantthemes_Style_Case_Study' ) ) {

	/**
	 * Class definition.
	 */
	class Radiantthemes_Style_Case_Study extends WPBakeryShortCode {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Case Study', 'radiantthemes-addons' ),
					'base'        => 'rt_case_study_style',
					'description' => esc_html__( 'Add Case Study with multiple styles.', 'radiantthemes-addons' ),
					'icon'        => plugins_url( 'radiantthemes-addons/case-studies/icon/Case-Study-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_case_study_style',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'controls'    => 'full',
					'params'      => array(
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Style', 'radiantthemes-addons' ),
							'param_name' => 'case_study_style_variation',
							'value'      => array(
								esc_html__( 'Style One (ZoomIn On Hover)', 'radiantthemes-addons' )                        => 'one',
								esc_html__( 'Style Two (Overlay SlideUp On Hover)', 'radiantthemes-addons' )               => 'two',
								esc_html__( 'Style Three (ZoomIn - Button TranslateY On Hover)', 'radiantthemes-addons' )  => 'three',
								esc_html__( 'Style Four (ZoomIn - Button Effect On Hover)', 'radiantthemes-addons' )       => 'four',
								esc_html__( 'Style Five (With Right Arrow Button)', 'radiantthemes-addons' )               => 'five',
								esc_html__( 'Style Six (No Image)', 'radiantthemes-addons' )                               => 'six',
								esc_html__( 'Style Seven (Title Below)', 'radiantthemes-addons' )                          => 'seven',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Display Filter', 'radiantthemes-addons' ),
							'param_name' => 'case_study_display_filter',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'yes',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Filter Style', 'radiantthemes-addons' ),
							'param_name' => 'case_study_filter_style',
							'dependency' => array(
								'element' => 'case_study_display_filter',
								'value'   => 'yes',
							),
							'value'      => array(
								esc_html__( 'Style One', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two', 'radiantthemes-addons' )   => 'two',
								esc_html__( 'Style Three', 'radiantthemes-addons' ) => 'three',
								esc_html__( 'Style Four', 'radiantthemes-addons' )  => 'four',
								esc_html__( 'Style Five', 'radiantthemes-addons' )  => 'five',
								esc_html__( 'Style Six', 'radiantthemes-addons' )   => 'six',
							),
							'std'        => 'one',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Filter Align', 'radiantthemes-addons' ),
							'param_name' => 'case_study_filter_alignment',
							'dependency' => array(
								'element' => 'case_study_display_filter',
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
							'type'        => 'textfield',
							'heading'     => esc_html__( 'No of Case Studies', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter no of Case Studies to display. Leave blank to show all posts.', 'radiantthemes-addons' ),
							'param_name'  => 'no_of_case_studies',
							'dependency'  => array(
								'element' => 'case_study_display_filter',
								'value'   => 'no',
							),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Box Align', 'radiantthemes-addons' ),
							'param_name' => 'case_study_box_alignment',
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
							),
							'std'        => 'center',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Case Study Box Number', 'radiantthemes-addons' ),
							'param_name'  => 'case_study_box_number',
							'description' => esc_html__( 'Number of Case Study Box to display in a grid.', 'radiantthemes-addons' ),
							'value'       => array(
								'3',
								'4',
							),
							'std'         => '3',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Enable Zoom?', 'radiantthemes-addons' ),
							'param_name' => 'case_study_enable_zoom',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Enable Title?', 'radiantthemes-addons' ),
							'param_name' => 'case_study_enable_title',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Case Study Enable excerpt?', 'radiantthemes-addons' ),
							'param_name' => 'case_study_enable_excerpt',
							'value'      => array(
								esc_html__( 'Yes', 'radiantthemes-addons' ) => 'yes',
								esc_html__( 'No', 'radiantthemes-addons' )  => 'no',
							),
							'std'        => 'no',
						),
						array(
							'type'        => 'checkbox',
							'heading'     => esc_html__( 'Enable Link Button?', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Button style can be controled from Theme Option > Button.', 'radiantthemes-addons' ),
							'param_name'  => 'case_study_enable_link_button',
							'value'       => esc_html__( 'Yes', 'radiantthemes-addons' ),
							'dependency'  => array(
								'element' => 'case_study_enable_zoom',
								'value'   => 'no',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Link Button Text', 'radiantthemes-addons' ),
							'description' => esc_html__( 'Enter text for link button. E.g. Details', 'radiantthemes-addons' ),
							'param_name'  => 'case_study_link_button_text',
							'value'       => 'Details',
							'dependency'  => array(
								'element' => 'case_study_enable_link_button',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Spacing between Case Study Items', 'radiantthemes-addons' ),
							'param_name'  => 'case_study_spacing',
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
							'param_name' => 'case_study_looping_order',
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
							'param_name' => 'case_study_looping_sort',
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
			add_shortcode( 'rt_case_study_style', array( $this, 'radiantthemes_case_study_style_func' ) );
		}

		/**
		 * [radiantthemes_case_study_style_func description]
		 *
		 * @param  [type] $atts    [description.
		 * @param  [type] $content [description.
		 * @param  [type] $tag     [description.
		 */
		public function radiantthemes_case_study_style_func( $atts, $content = null, $tag ) {
			$shortcode = shortcode_atts(
				array(
					'case_study_style_variation'    => 'one',
					'case_study_display_filter'     => 'yes',
					'case_study_filter_style'       => 'one',
					'case_study_filter_alignment'   => 'center',
					'no_of_case_studies'            => '',
					'case_study_box_alignment'      => 'center',
					'case_study_box_number'         => '3',
					'case_study_enable_zoom'        => 'no',
					'case_study_enable_link_button' => 'true',
					'case_study_link_button_text'   => 'Details',
					'case_study_spacing'            => '0',
					'case_study_enable_title'       => '',
					'case_study_enable_excerpt'     => '',
					'extra_class'                   => '',
					'extra_id'                      => '',
					'case_study_looping_order'      => 'ID',
					'case_study_looping_sort'       => 'DESC',
				), $atts
			);

			wp_register_style(
				'fancybox',
				plugins_url( 'radiantthemes-addons/assets/css/jquery.fancybox.min.css' )
			);
			wp_enqueue_style( 'fancybox' );

			wp_register_style(
				'radiantthemes_case_study_element_filter_style',
				plugins_url( 'radiantthemes-addons/case-studies/css/radiantthemes-case-study-element-filter-style.css' )
			);
			wp_enqueue_style( 'radiantthemes_case_study_element_filter_style' );

			wp_register_style(
				'radiantthemes_case_study_' . $shortcode['case_study_style_variation'] . '',
				plugins_url( 'radiantthemes-addons/case-studies/css/radiantthemes-case-study-element-' . $shortcode['case_study_style_variation'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_case_study_' . $shortcode['case_study_style_variation'] . '' );

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
				'radiantthemes_case_study_' . $shortcode['case_study_style_variation'],
				plugins_url( 'radiantthemes-addons/case-studies/js/radiantthemes-case-study-element-' . $shortcode['case_study_style_variation'] . '.js' ),
				array( 'jquery', 'isotope', 'fancybox' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_case_study_' . $shortcode['case_study_style_variation'] );

			$hidden_filter = ( 'no' === $shortcode['case_study_display_filter'] ) ? 'hidden' : '';

			$enable_zoom = ( 'yes' === $shortcode['case_study_enable_zoom'] ) ? 'has-fancybox' : '';

			$spacing_value = ( $shortcode['case_study_spacing'] / 2 );

			if ( '3' == $shortcode['case_study_box_number'] ) {
				$case_study_item_class = 'col-lg-4 col-md-4 col-sm-2 col-xs-12';
			} elseif ( '4' == $shortcode['case_study_box_number'] ) {
				$case_study_item_class = 'col-lg-3 col-md-3 col-sm-2 col-xs-12';
			} else {
				$case_study_item_class = '';
			}

			require 'template/template-case-study-style-' . esc_attr( $shortcode['case_study_style_variation'] ) . '.php';

			return $output;
		}

	}
}

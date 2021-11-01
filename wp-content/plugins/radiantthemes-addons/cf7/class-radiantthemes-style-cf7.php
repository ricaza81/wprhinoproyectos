<?php
/**
 * Radiant cf7 Addon
 *
 * @package Radiantthemes
 */

if ( ! class_exists( 'RadiantThemes_Style_Cf7' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Cf7 {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Contact Form 7', 'radiantthemes-addons' ),
					'base'        => 'rt_cf7_style',
					'icon'        => plugins_url( 'radiantthemes-addons/cf7/icon/CF7-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_accordion_style',
					'controls'    => 'full',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'as_parent'   => array(
						'only' => 'contact-form-7',
					),
					'js_view'     => 'VcColumnView',
					'description' => esc_html__( 'Radiant Contact Form 7 Style', 'radiantthemes-addons' ),
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Contact Form 7 Style', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_cf7',
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
							'type'             => 'colorpicker',
							'class'            => '',
							'heading'          => esc_html__( 'Submit Button Background Color', 'radiantthemes-addons' ),
							'param_name'       => 'submit_background_color',
							'group'            => esc_html__( 'Submit Button Design', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '',
							'description'      => esc_html__( 'Form here you can change the submit button color.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'colorpicker',
							'class'            => '',
							'heading'          => esc_html__( 'Submit Button Hover Color', 'radiantthemes-addons' ),
							'param_name'       => 'submit_hover_color',
							'group'            => esc_html__( 'Submit Button Design', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '',
							'description'      => esc_html__( 'Form here you can change the submit button hover color.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'colorpicker',
							'class'            => '',
							'heading'          => esc_html__( 'Submit Button Text Color', 'radiantthemes-addons' ),
							'param_name'       => 'submit_text_color',
							'group'            => esc_html__( 'Submit Button Design', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '',
							'description'      => esc_html__( 'Form here you can change the submit button text color.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'colorpicker',
							'class'            => '',
							'heading'          => esc_html__( 'Submit Button Text Hover Color', 'radiantthemes-addons' ),
							'param_name'       => 'submit_text_hover_color',
							'group'            => esc_html__( 'Submit Button Design', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '',
							'description'      => esc_html__( 'Form here you can change the submit button text hover color.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'colorpicker',
							'class'            => '',
							'heading'          => esc_html__( 'Background Color For Input Fields', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_background_color',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '#ffffff',
							'description'      => esc_html__( 'Form here you can change the Background Color For Input Fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'colorpicker',
							'class'            => '',
							'heading'          => esc_html__( 'Font Color For Input Fields', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_font_color',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '#252525',
							'description'      => esc_html__( 'Form here you can change the Font Color For Input Fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Top', 'radiantthemes-addons' ),
							'param_name'       => 'radius_top',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow border radius top for input fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Right', 'radiantthemes-addons' ),
							'param_name'       => 'radius_right',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow border radius right for input fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Bottom', 'radiantthemes-addons' ),
							'param_name'       => 'radius_bottom',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow border radius bottom for input fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Left', 'radiantthemes-addons' ),
							'param_name'       => 'radius_left',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow border radius left for input fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Top', 'radiantthemes-addons' ),
							'param_name'       => 'padding_top',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow padding top for input fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Right', 'radiantthemes-addons' ),
							'param_name'       => 'padding_right',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow padding right for input fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Bottom', 'radiantthemes-addons' ),
							'param_name'       => 'padding_bottom',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow padding bottom for input fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Left', 'radiantthemes-addons' ),
							'param_name'       => 'padding_left',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow padding left for input fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Border For Input Fields', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_border_style',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => array(
								esc_html__( 'None', 'radiantthemes-addons' )    => 'none',
								esc_html__( 'Solid', 'radiantthemes-addons' )   => 'solid',
								esc_html__( 'Dotted', 'radiantthemes-addons' )  => 'dotted',
								esc_html__( 'Dashed', 'radiantthemes-addons' )  => 'dashed',
								esc_html__( 'Hidden', 'radiantthemes-addons' )  => 'hidden',
								esc_html__( 'Double', 'radiantthemes-addons' )  => 'double',
								esc_html__( 'Groove', 'radiantthemes-addons' )  => 'groove',
								esc_html__( 'Ridge', 'radiantthemes-addons' )   => 'ridge',
								esc_html__( 'Inset', 'radiantthemes-addons' )   => 'inset',
								esc_html__( 'Outset', 'radiantthemes-addons' )  => 'outset',
								esc_html__( 'Initial', 'radiantthemes-addons' ) => 'initial',
								esc_html__( 'Inherit', 'radiantthemes-addons' ) => 'inherit',
							),
							'std'              => 'none',
						),
						array(
							'type'             => 'colorpicker',
							'class'            => '',
							'heading'          => esc_html__( 'Border Color For Input Fields', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_border_color',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '#465579', // Default blue color.
							'description'      => esc_html__( 'Allow border color for input fields.', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Top', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_border_top',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow border top for input fields.', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Right', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_border_right',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow border right for input fields.', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Bottom', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_border_bottom',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow border bottom for input fields.', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Left', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_border_left',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow border left for input fields.', 'radiantthemes-addons' ),
						),

						array(
							'type'             => 'colorpicker',
							'class'            => '',
							'heading'          => esc_html__( 'Font Color For Input Fields Focus', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_font_focus_color',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '#252525',
							'description'      => esc_html__( 'Form here you can change the Focus Font Color For Input Fields.', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'colorpicker',
							'class'            => '',
							'heading'          => esc_html__( 'Background Color For Input Fields Focus', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_background_focus_color',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '#252525',
							'description'      => esc_html__( 'Form here you can change the Focus Background Color For Input Fields.', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Focus Border style', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_focus_style',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => array(
								esc_html__( 'None', 'radiantthemes-addons' )    => 'none',
								esc_html__( 'Solid', 'radiantthemes-addons' )   => 'solid',
								esc_html__( 'Dotted', 'radiantthemes-addons' )  => 'dotted',
								esc_html__( 'Dashed', 'radiantthemes-addons' )  => 'dashed',
								esc_html__( 'Hidden', 'radiantthemes-addons' )  => 'hidden',
								esc_html__( 'Double', 'radiantthemes-addons' )  => 'double',
								esc_html__( 'Groove', 'radiantthemes-addons' )  => 'groove',
								esc_html__( 'Ridge', 'radiantthemes-addons' )   => 'ridge',
								esc_html__( 'Inset', 'radiantthemes-addons' )   => 'inset',
								esc_html__( 'Outset', 'radiantthemes-addons' )  => 'outset',
								esc_html__( 'Initial', 'radiantthemes-addons' ) => 'initial',
								esc_html__( 'Inherit', 'radiantthemes-addons' ) => 'inherit',
							),
							'std'              => 'none',
						),
						array(
							'type'             => 'colorpicker',
							'class'            => '',
							'heading'          => esc_html__( 'Focus Color For Input Fields', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_focus_color',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '#465579', // Default blue color.
							'description'      => esc_html__( 'Allow focus color for input fields.', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Top', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_focus_top',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow focus top for input fields.', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Right', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_focus_right',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow focus right for input fields.', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Bottom', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_focus_bottom',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow focus bottom for input fields.', 'radiantthemes-addons' ),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Left', 'radiantthemes-addons' ),
							'param_name'       => 'radiant_focus_left',
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0px',
							'group'            => esc_html__( 'Contact Form 7 Input Box Setting', 'radiantthemes-addons' ),
							'description'      => esc_html__( 'Allow focus left for input fields.', 'radiantthemes-addons' ),
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
							'param_name' => 'cf7_content_css',
							'group'      => esc_html__( 'Contact Form 7 Design', 'radiantthemes-addons' ),
						),
					),
				)
			);

			$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

			$contact_forms = array();
			if ( $cf7 ) {
				foreach ( $cf7 as $cform ) {
					$contact_forms[ $cform->post_title ] = $cform->ID;
				}
			} else {
				$contact_forms[ esc_html__( 'No contact forms found', 'radiantthemes-addons' ) ] = 0;
			}
			vc_map(
				array(
					'name'                    => esc_html__( 'Contact Form 7', 'radiantthemes-addons' ),
					'base'                    => 'contact-form-7',
					'description'             => esc_html__( 'Select contact form', 'radiantthemes-addons' ),
					'as_child'                => array(
						'only' => 'rt_cf7_style',
					),
					'show_settings_on_create' => true,
					'content_element'         => true,
					'params'                  => array(

						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select contact form', 'radianttheme' ),
							'param_name'  => 'id',
							'value'       => $contact_forms,
							'save_always' => true,
							'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'radiantthemes-addons' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Search title', 'radiantthemes-addons' ),
							'param_name'  => 'title',
							'admin_label' => true,
							'description' => esc_html__( 'Enter optional title to search if no ID selected or cannot find by ID.', 'radiantthemes-addons' ),
						),

					),
				)
			);
			add_shortcode( 'rt_cf7_style', array( $this, 'radiantthemes_accordion_style_func' ) );
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
			$shortcode = shortcode_atts(
				array(
					'radiant_cf7'                    => 'one',
					'submit_text_color'              => '#ffffff',
					'submit_text_hover_color'        => '',
					'submit_background_color'        => '',
					'submit_hover_color'             => '#ffffff',
					'radiant_background_color'       => '#ffffff',
					'padding_top'                    => '0px',
					'padding_right'                  => '0px',
					'padding_bottom'                 => '0px',
					'padding_left'                   => '0px',
					'radius_top'                     => '0px',
					'radius_right'                   => '0px',
					'radius_bottom'                  => '0px',
					'radius_left'                    => '0px',
					'radiant_font_color'             => '#252525',
					'radiant_font_focus_color'       => '#252525',
					'radiant_focus_style'            => 'none',
					'radiant_focus_color'            => '#465579',
					'radiant_background_focus_color' => '',
					'radiant_focus_top'              => '0px',
					'radiant_focus_right'            => '0px',
					'radiant_focus_bottom'           => '0px',
					'radiant_focus_left'             => '0px',
					'radiant_border_style'           => 'none',
					'radiant_border_color'           => '#465579',
					'radiant_border_top'             => '0px',
					'radiant_border_right'           => '0px',
					'radiant_border_bottom'          => '0px',
					'radiant_border_left'            => '0px',
					'radiant_extra_class'            => '',
					'radiant_extra_id'               => '',
					'cf7_content_css'                => '',
				), $atts
			);
			wp_register_style(
				'radiantthemes_cf7_' . $shortcode['radiant_cf7'],
				plugins_url( 'radiantthemes-addons/cf7/css/radiantthemes-contact-form-element-' . $shortcode['radiant_cf7'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_cf7_' . $shortcode['radiant_cf7'] );

						$random = 'rt' . substr( md5( microtime() ), 0, 15 );

						$submit_text_color       = $shortcode['submit_text_color'] ? ' color:' . esc_attr( $shortcode['submit_text_color'] ) . ';' : '#ffffff;';
						$submit_text_hover_color = $shortcode['submit_text_hover_color'] ? ' color:' . esc_attr( $shortcode['submit_text_hover_color'] ) . ';' : '#ffffff;';

						$submit_background_color = $shortcode['submit_background_color'] ? ' background-color:' . esc_attr( $shortcode['submit_background_color'] ) . ';' : '#ffffff;';
						$submit_hover_color      = $shortcode['submit_hover_color'] ? ' background-color:' . esc_attr( $shortcode['submit_hover_color'] ) . ';' : '#ffffff;';

						$submit_text = '.radiant-contact-form.' . $random . ' .form-row input[type=submit],
.radiant-contact-form.' . $random . ' .form-row input[type=button],.radiant-contact-form.' . $random . ' .form-row button[type=submit] {  ' . $submit_background_color . $submit_text_color . ' }';
			wp_add_inline_style( 'radiantthemes_cf7_' . $shortcode['radiant_cf7'], $submit_text );

						$submit_hover = '.radiant-contact-form.' . $random . ' .form-row input[type=submit]:hover, .radiant-contact-form.' . $random . ' .form-row input[type=button]:hover, .radiant-contact-form.' . $random . ' .form-row button[type=submit]:hover {  ' . $submit_hover_color . $submit_text_hover_color . ' }';
			wp_add_inline_style( 'radiantthemes_cf7_' . $shortcode['radiant_cf7'], $submit_hover );

			$padding  = $shortcode['padding_top'] ? ' padding-top:' . esc_attr( $shortcode['padding_top'] ) . ';' : '';
			$padding .= $shortcode['padding_right'] ? ' padding-right:' . esc_attr( $shortcode['padding_right'] ) . ';' : '';
			$padding .= $shortcode['padding_bottom'] ? ' padding-bottom:' . esc_attr( $shortcode['padding_bottom'] ) . ';' : '';
			$padding .= $shortcode['padding_left'] ? ' padding-left:' . esc_attr( $shortcode['padding_left'] ) . ';' : '';

			$radius  = $shortcode['radius_top'] ? ' ' . esc_attr( $shortcode['radius_top'] ) : '';
			$radius .= $shortcode['radius_right'] ? ' ' . esc_attr( $shortcode['radius_right'] ) : '';
			$radius .= $shortcode['radius_bottom'] ? ' ' . esc_attr( $shortcode['radius_bottom'] ) : '';
			$radius .= $shortcode['radius_left'] ? ' ' . esc_attr( $shortcode['radius_left'] ) : '';
			$radius  = ' border-radius:' . $radius . ';';

			$background_color = $shortcode['radiant_background_color'] ? ' background-color: ' . esc_attr( $shortcode['radiant_background_color'] ) . ';' : '';

			$color = '.radiant-contact-form.' . $random . ' .form-row input[type = text], .radiant-contact-form.' . $random . ' .form-row input[type = email], .radiant-contact-form.' . $random . ' .form-row input[type = url], .radiant-contact-form.' . $random . ' .form-row input[type = tel], .radiant-contact-form.' . $random . ' .form-row input[type = number], .radiant-contact-form.' . $random . ' .form-row input[type = password], .radiant-contact-form.' . $random . ' .form-row input[type = date], .radiant-contact-form.' . $random . ' .form-row input[type = time], .radiant-contact-form.' . $random . ' .form-row select, .radiant-contact-form.' . $random . ' .form-row textarea {  ' . $background_color . $padding . $radius . ' }';
			wp_add_inline_style( 'radiantthemes_cf7_' . $shortcode['radiant_cf7'], $color );

			$radiant_font_color = $shortcode['radiant_font_color'] ? ' color  : ' . esc_attr( $shortcode['radiant_font_color'] ) . ';' : '';

			$fontcolor = '.radiant-contact-form.' . $random . ' .form-row input[type = text], .radiant-contact-form.' . $random . ' .form-row input[type = email], .radiant-contact-form.' . $random . ' .form-row input[type = url], .radiant-contact-form.' . $random . ' .form-row input[type = tel], .radiant-contact-form.' . $random . ' .form-row input[type = number], .radiant-contact-form.' . $random . ' .form-row input[type = password], .radiant-contact-form.' . $random . ' .form-row input[type = date], .radiant-contact-form.' . $random . ' .form-row input[type = time], .radiant-contact-form.' . $random . ' .form-row select, .radiant-contact-form.' . $random . ' .form-row textarea {  ' . $radiant_font_color . ' }';
			wp_add_inline_style( 'radiantthemes_cf7_' . $shortcode['radiant_cf7'], $fontcolor );

			$radiant_font_focus_color = $shortcode['radiant_font_focus_color'] ? ' color:' . esc_attr( $shortcode['radiant_font_focus_color'] ) . ';' : '';

			$background_focus_color = $shortcode['radiant_background_focus_color'] ? ' background-color:' . esc_attr( $shortcode['radiant_background_focus_color'] ) . ';' : '';

			$fontfocuscolor = '.radiant-contact-form.' . $random . ' .form-row input[type=text]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=email]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=url]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=tel]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=number]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=password]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=date]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=time]:focus, .radiant-contact-form.' . $random . ' .form-row select:focus, .radiant-contact-form.' . $random . ' .form-row textarea:focus {  ' . $radiant_font_focus_color . $background_focus_color . ' }';
			wp_add_inline_style( 'radiantthemes_cf7_' . $shortcode['radiant_cf7'], $fontfocuscolor );

			$focus_color  = $shortcode['radiant_focus_style'] ? ' ' . esc_attr( $shortcode['radiant_focus_style'] ) . '' : '';
			$focus_color .= $shortcode['radiant_focus_color'] ? ' ' . esc_attr( $shortcode['radiant_focus_color'] ) . '' : '';

			$focus  = $shortcode['radiant_focus_top'] ? ' border-top:' . esc_attr( $shortcode['radiant_focus_top'] ) . $focus_color . ';' : '';
			$focus .= $shortcode['radiant_focus_right'] ? ' border-right:' . esc_attr( $shortcode['radiant_focus_right'] ) . $focus_color . ';' : '';
			$focus .= $shortcode['radiant_focus_bottom'] ? ' border-bottom:' . esc_attr( $shortcode['radiant_focus_bottom'] ) . $focus_color . ';' : '';
			$focus .= $shortcode['radiant_focus_left'] ? ' border-left:' . esc_attr( $shortcode['radiant_focus_left'] ) . $focus_color . ';' : '';

			$borderradius = '.radiant-contact-form.' . $random . ' .form-row input[type=text]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=email]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=url]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=tel]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=number]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=password]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=date]:focus, .radiant-contact-form.' . $random . ' .form-row input[type=time]:focus, .radiant-contact-form.' . $random . ' .form-row select:focus, .radiant-contact-form.' . $random . ' .form-row textarea:focus {  ' . $focus . ' }';
			wp_add_inline_style( 'radiantthemes_cf7_' . $shortcode['radiant_cf7'], $borderradius );

			$borderstyle  = $shortcode['radiant_border_style'] ? ' ' . esc_attr( $shortcode['radiant_border_style'] ) . '' : '';
			$borderstyle .= $shortcode['radiant_border_color'] ? ' ' . esc_attr( $shortcode['radiant_border_color'] ) . '' : '';

			$rtborder  = $shortcode['radiant_border_top'] ? ' border-top:' . esc_attr( $shortcode['radiant_border_top'] ) . $borderstyle . ';' : '';
			$rtborder .= $shortcode['radiant_border_right'] ? ' border-right:' . esc_attr( $shortcode['radiant_border_right'] ) . $borderstyle . ';' : '';
			$rtborder .= $shortcode['radiant_border_bottom'] ? ' border-bottom:' . esc_attr( $shortcode['radiant_border_bottom'] ) . $borderstyle . ';' : '';
			$rtborder .= $shortcode['radiant_border_left'] ? ' border-left:' . esc_attr( $shortcode['radiant_border_left'] ) . $borderstyle . ';' : '';

			$input_border_style = '.radiant-contact-form.' . $random . ' .form-row input[type=text], .radiant-contact-form.' . $random . ' .form-row input[type=email], .radiant-contact-form.' . $random . ' .form-row input[type=url], .radiant-contact-form.' . $random . ' .form-row input[type=tel], .radiant-contact-form.' . $random . ' .form-row input[type=number], .radiant-contact-form.' . $random . ' .form-row input[type=password], .radiant-contact-form.' . $random . ' .form-row input[type=date], .radiant-contact-form.' . $random . ' .form-row input[type=time], .radiant-contact-form.' . $random . ' .form-row select, .radiant-contact-form.' . $random . ' .form-row textarea {  ' . $rtborder . ' }';
			wp_add_inline_style( 'radiantthemes_cf7_' . $shortcode['radiant_cf7'], $input_border_style );

			$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content.

			$ex_id   = $shortcode['radiant_extra_id'] ? 'id=' . esc_attr( $shortcode['radiant_extra_id'] ) . '' : '';
			$cf7_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['cf7_content_css'], ' ' ), $atts );
			$output  = "\r" . '<!-- rt-cf7 -->' . "\r";
			$output .= '<div class="radiant-contact-form ' . $random . ' element-' . esc_attr( $shortcode['radiant_cf7'] ) . ' ' . esc_attr( $shortcode['radiant_extra_class'] ) . esc_attr( $cf7_css ) . '" ' . esc_attr( $ex_id ) . ' >';
			$output .= $content;
			$output .= '</div>' . "\r";
			$output .= '<!-- rt-cf7 -->' . "\r";

			return $output;
		}
	}
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_Rt_Cf7_Style' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Cf7_Style extends WPBakeryShortCodesContainer {

	}
}
if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'WPBakeryShortCode_Rt_Cf7_Style_Item' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Cf7_Style_Item extends WPBakeryShortCode {

	}
}

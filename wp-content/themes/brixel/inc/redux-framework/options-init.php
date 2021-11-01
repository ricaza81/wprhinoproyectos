<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 *
 * @package brixel
 */

// Check if Redux installed.
if ( ! class_exists( 'Redux' ) ) {
	return;
}
// This is your option name where all the Redux data is stored.
$opt_name = 'brixel_theme_option';

/**
 * SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args  = array(
	// TYPICAL -> Change these values as you need/desire.
	'opt_name'             => $opt_name,
	'disable_tracking'     => true,
	'display_name'         => $theme->get( 'Name' ),
	'display_version'      => esc_html__( 'Powered By: Radiant Admin Options', 'brixel' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Theme Options', 'brixel' ),
	'page_title'           => esc_html__( 'Theme Options', 'brixel' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => true,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-hammer',
	'admin_bar_priority'   => 50,
	'global_variable'      => '',
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => true,
	'page_priority'        => 61,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => 'dashicons-hammer',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => '_options',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'footer_credit'        => $theme->get( 'Name' ),
	'show_import_export'   => true,
	'show_options_object'  => false,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	'output_tag'           => true,
	'database'             => '',
	'use_cdn'              => true,
	'ajax_save'            => true,
	'hints'                => array(
		'icon_position' => 'right',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color' => 'light',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'duration' => '500',
				'event'    => 'mouseleave unfocus',
			),
		),
	),
);
Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

/**
 * As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 */

// -> START Basic Fields.
Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'General', 'brixel' ),
		'icon'  => 'el el-cog',
		'id'    => 'theme-general',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Color', 'brixel' ),
		'icon'       => 'el el-brush',
		'id'         => 'color',
		'subsection' => true,
		'fields'     => array(

			// color info.
			array(
				'id'    => 'info_color_scheme',
				'type'  => 'info',
				'title' => esc_html__( 'Color Options', 'brixel' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),
			
			// Color Scheme Type.
			array(
				'id'       => 'color_scheme_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Color Scheme Type', 'brixel' ),
				'subtitle' => esc_html__( 'Select color scheme type', 'brixel' ),
				'options'  => array(
					'predefined-color' => 'Predefined Color',
					'custom-color'     => 'Custom Color',
				),
				'default'  => 'predefined-color',
			),
			
			// Color Scheme Type Predefined.
			array(
                'id'       => 'color_scheme_type_predefined',
                'type'     => 'palette',
                'title'    => esc_html__( 'Select Theme Color', 'brixel' ),
				'subtitle' => esc_html__( 'From here you can choose theme color for your website. (Please Note: This will set preset color scheme on your theme. You can replace color(s) from each element settings.)', 'brixel' ),
                'palettes' => array(
                    // azure-blue.
                    '#0080ff'     => array(
                        '#0080ff',
                    ),
                    // ocean-blue.
                    '#2b65eb'     => array(
                        '#2b65eb',
                    ),
                    // midnight-blue.
                    '#2e3150'     => array(
                        '#2e3150',
                    ),
                    // royal-blue.
                    '#2c62e0'     => array(
                        '#2c62e0',
                    ),
                    // royal-blue-light.
                    '#4a76fd'     => array(
                        '#4a76fd',
                    ),
                    // royal-blue-dark.
                    '#26408b'     => array(
                        '#26408b',
                    ),
                    // police-strobe.
                    '#0bb5ff'     => array(
                        '#0bb5ff',
                    ),
                    // navy-blue.
                    '#010080'     => array(
                        '#010080',
                    ),
                    // yellow.
                    '#ffbc13'     => array(
                        '#ffbc13',
                    ),
                    // orange.
                    '#ff871c'     => array(
                        '#ff871c',
                    ),
                    // pinkish-red.
                    '#ff1053'     => array(
                        '#ff1053',
                    ),
                    // crimson-red.
                    '#b70e09'     => array(
                        '#b70e09',
                    ),
                    // ruby-red.
                    '#900604'     => array(
                        '#900604',
                    ),
                    // magenta.
                    '#b80083'     => array(
                        '#b80083',
                    ),
                    // rose-red.
                    '#fd002f'     => array(
                        '#fd002f',
                    ),
                ),
                'default'  => '#ffbc13',
                'required' => array(
					array(
						'color_scheme_type',
						'equals',
						'predefined-color',
					),
				),
            ),

			// Color Scheme Type Custom.
			array(
				'id'       => 'color_scheme_type_custom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Select Theme Color', 'brixel' ),
				'subtitle' => esc_html__( 'From here you can choose theme color for your website. (Please Note: This will set preset color scheme on your theme. You can replace color(s) from each element settings.)', 'brixel' ),
				'desc'     => esc_html__( 'Select alpha value if you want to use alpha in selected areas.', 'brixel' ),
				'default'  => array(
					'color'  => '#efa600',
					'alpha'  => 0.85,
				),
				'required' => array(
					array(
						'color_scheme_type',
						'equals',
						'custom-color',
					),
				),
			),
			
			// Radiant Body Background.
			array(
				'id'       => 'radiant_body_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Body Background', 'brixel' ),
				'subtitle' => esc_html__( 'Choose a background for the theme. (Please Note: This option will not work, if you have selected background for a particular section.)', 'brixel' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'  => esc_html__( 'Favicon', 'brixel' ),
		'id'     => 'favicon',
		'icon'   => 'el el-bookmark-empty',
		'subsection' => true,
		'fields' => array(

			array(
				'id'       => 'favicon',
				'type'     => 'media',
				'title'    => esc_html__( 'Favicon', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload Favicon on your website. (.ico 32x32 pixels)', 'brixel' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/images/Brixel-Favicon-Default.ico',
				),
			),

			array(
				'id'    => 'apple-icon',
				'type'  => 'media',
				'title' => esc_html__( 'Apple Touch Icon', 'brixel' ),
				'desc'  => esc_html__( 'apple-touch-icon.png 180x180 pixels', 'brixel' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/images/Apple-Touch-Icon-180x180-Default.png',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'   => esc_html__( 'Fonts', 'brixel' ),
		'id'      => 'basic-settings',
		'icon'    => 'el el-fontsize',
		'subsection' => true,
		'fields'  => array(
			array(
				'id'             => 'general_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'General', 'brixel' ),
				'subtitle'       => esc_html__( 'This will be the default font of your website.', 'brixel' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => true,
				'output'         => array( 'body' ),
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Rubik',
					'font-weight' => '400',
					'font-size'   => '15px',
					'color'       => '#010101',
					'line-height' => '28px',
				),
			),

			array(
				'id'             => 'h1_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H1', 'brixel' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H1 tags of your website.', 'brixel' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h1' ),
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Poppins',
					'font-weight' => '700',
					'font-size'   => '40px',
					'color'       => '#010101',
					'line-height' => '46px',
				),
			),

			array(
				'id'             => 'h2_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H2', 'brixel' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H2 tags of your website.', 'brixel' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h2' ),
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Poppins',
					'font-weight' => '700',
					'font-size'   => '26px',
					'color'       => '#010101',
					'line-height' => '35px',
				),
			),

			array(
				'id'             => 'h3_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H3', 'brixel' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H3 tags of your website.', 'brixel' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h3' ),
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Poppins',
					'font-weight' => '700',
					'font-size'   => '23px',
					'color'       => '#010101',
					'line-height' => '35px',
				),
			),

			array(
				'id'             => 'h4_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H4', 'brixel' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H4 tags of your website.', 'brixel' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h4' ),
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Poppins',
					'font-weight' => '700',
					'font-size'   => '22px',
					'color'       => '#010101',
					'line-height' => '35px',
				),
			),

			array(
				'id'             => 'h5_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H5', 'brixel' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H5 tags of your website.', 'brixel' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h5' ),
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Poppins',
					'font-weight' => '700',
					'font-size'   => '20px',
					'color'       => '#010101',
					'line-height' => '30px',
				),
			),

			array(
				'id'             => 'h6_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H6', 'brixel' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H6 tags of your website.', 'brixel' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h6' ),
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Poppins',
					'font-weight' => '700',
					'font-size'   => '14px',
					'color'       => '#010101',
					'line-height' => '22px',
				),
			),
		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Custom Slug', 'brixel' ),
		'icon'       => 'el el-folder-open',
		'id'    	 => 'custom_slug',
		'subsection' => true,
		'fields'     => array(

			// color info.
			array(
				'id'    => 'info_change_slug',
				'type'  => 'info',
				'title' => esc_html__( 'Change Custom Post Type Slug', 'brixel' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),
			array(
				'id'       => 'change_slug_portfolio',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio', 'brixel' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'brixel' ),
				'validate' => 'no_special_chars',
				'default'  => 'project',
			),
			array(
				'id'       => 'change_slug_team',
				'type'     => 'text',
				'title'    => esc_html__( 'Team', 'brixel' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'brixel' ),
				'validate' => 'no_special_chars',
				'default'  => 'team',
			),
			array(
				'id'       => 'change_slug_casestudies',
				'type'     => 'text',
				'title'    => esc_html__( 'Case Study', 'brixel' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'brixel' ),
				'validate' => 'no_special_chars',
				'default'  => 'case-studies',
			),
		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Preloader', 'brixel' ),
		'icon'       => 'el el-hourglass',
		'id'    	 => 'preloader',
		'subsection' => true,
		'fields'     => array(

			// Preloader Info.
			array(
				'id'    => 'info_preloader',
				'type'  => 'info',
				'title' => esc_html__( 'Preloader Options', 'brixel' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Preloader Switch.
			array(
				'id'       => 'preloader_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Preloader', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if want to activate Preloader or not.', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),

			// Preloader Style.
			array(
				'id'       => 'preloader_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Preloader Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Style of the Preloader. (Powered By: "SpinKit")', 'brixel' ),
				'options'  => array(
					'rotating-plane'  => 'Rotating Plane',
					'double-bounce'   => 'Double Bounce',
					'wave'            => 'Wave',
					'wandering-cubes' => 'Wandering Cubes',
					'pulse'           => 'Pulse',
					'chasing-dots'    => 'Chasing Dots',
					'three-bounce'    => 'Three Bounce',
					'circle'          => 'Circle',
					'cube-grid'       => 'Cube Grid',
					'fading-circle'   => 'Fading Circle',
					'folding-cube'    => 'Folding Cube',
				),
				'default'  => 'wave',
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Color.
			array(
				'id'       => 'preloader_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Preloader Color', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a color for the Preloader.', 'brixel' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-circle .sk-child:before, .sk-circle .sk-child:before, .sk-cube-grid .sk-cube, .sk-fading-circle .sk-circle:before, .sk-folding-cube .sk-cube:before',
				),
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Timeout.
			array(
				'id'            => 'preloader_timeout',
				'type'          => 'slider',
				'title'         => esc_html__( 'Preloader Timeout', 'brixel' ),
				'subtitle'      => esc_html__( 'Select preloader timeout after successful page load. Min is 100ms, Max is 3000ms and Default is 500ms.', 'brixel' ),
				'min'           => 100,
				'step'          => 100,
				'max'           => 3000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Scroll To Top', 'brixel' ),
		'icon'       => 'el el-chevron-up',
		'id'    	 => 'scroll_to_top',
		'subsection' => true,
		'fields'     => array(

			// Scroll To Top Info.
			array(
				'id'    => 'info_scroll_to_top',
				'type'  => 'info',
				'title' => esc_html__( 'Scroll To Top Options', 'brixel' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Scroll To Top Direction.
			array(
				'id'       => 'scroll_to_top_direction',
				'type'     => 'select',
				'title'    => esc_html__( 'Direction', 'brixel' ),
				'subtitle' => esc_html__( 'Select Direction of the Scroll To Top.', 'brixel' ),
				'options'  => array(
					'left'    => 'Left',
					'right'   => 'Right',
				),
				'default'  => 'left',
			),

			// Scroll To Top Background Color.
			array(
				'id'       => 'scroll_to_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Scroll To Top.', 'brixel' ),
				'output'   => array(
					'background-color' => '.scrollup',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Header', 'brixel' ),
		'icon'  => 'el el-website',
		'id'    => 'header',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'General', 'brixel' ),
		'icon'       => 'el el-cog-alt',
		'id'         => 'general',
		'subsection' => true,
		'fields'     => array(

			// Header Style Info.
			array(
				'id'    => 'info_header_style',
				'type'  => 'info',
				'title' => esc_html__( 'Header Style', 'brixel' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Header Style Options.
			array(
				'id'       => 'header-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Header Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Header Style (Header will be changed as per selection || N.B.: You can change header even from page to page).', 'brixel' ),
				'options'  => array(
					'header-style-default' => array(
						'alt'   => esc_html__( 'Default Style', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Default.png' ),
						'title' => esc_html__( 'Default Style', 'brixel' ),
					),
					'header-style-one'     => array(
						'alt'   => esc_html__( 'Style One', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-One.png' ),
						'title' => esc_html__( 'Style One', 'brixel' ),
					),
					'header-style-two'     => array(
						'alt'   => esc_html__( 'Style Two', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Two.png' ),
						'title' => esc_html__( 'Style Two', 'brixel' ),
					),
					'header-style-three'   => array(
						'alt'   => esc_html__( 'Style Three', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Three.png' ),
						'title' => esc_html__( 'Style Three', 'brixel' ),
					),
					'header-style-four'    => array(
						'alt'   => esc_html__( 'Style Four', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Four.png' ),
						'title' => esc_html__( 'Style Four', 'brixel' ),
					),
					'header-style-five'    => array(
						'alt'   => esc_html__( 'Style Five', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Five.png' ),
						'title' => esc_html__( 'Style Five', 'brixel' ),
					),
					'header-style-six'     => array(
						'alt'   => esc_html__( 'Style Six', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Six.png' ),
						'title' => esc_html__( 'Style Six', 'brixel' ),
					),
					'header-style-seven'   => array(
						'alt'   => esc_html__( 'Style Seven', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Seven.png' ),
						'title' => esc_html__( 'Style Seven', 'brixel' ),
					),
					'header-style-eight'   => array(
						'alt'   => esc_html__( 'Style Eight', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Eight.png' ),
						'title' => esc_html__( 'Style Eight', 'brixel' ),
					),
					'header-style-nine'   => array(
						'alt'   => esc_html__( 'Style Nine', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Nine.png' ),
						'title' => esc_html__( 'Style Nine', 'brixel' ),
					),
					'header-style-ten'   => array(
						'alt'   => esc_html__( 'Style Ten', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Ten.png' ),
						'title' => esc_html__( 'Style Ten', 'brixel' ),
					),
				),
				'default'  => 'header-style-default',
			),
			
		
			/* ============================= */
			// START OF HEADER CART OPTIONS
			/* ============================= */

			// Header Cart Info.
			array(
				'id'    => 'header_cart_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Cart Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Header Cart Display.
			array(
				'id'       => 'header_cart_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Cart Icon', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want "cart" icon in header or not. (Please Note: Header "Style Default" will not work with this option.)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
			),
			
			/* ============================= */
			// END OF HEADER CART OPTIONS
			/* ============================= */
			 
			/* ============================= */
			// START OF HEADER DEFAULT OPTIONS
			/* ============================= */
			
			// Header Default Info.
			array(
				'id'    => 'header_default_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Default Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Header Default Header Main Background Color.
			array(
				'id'       => 'header_default_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Default" only)', 'brixel' ),
				'output'   => array(
					'background-color' => '.wraper_header.style-default .wraper_header_main',
				),
			),
			
			/* ============================= */
			// END OF HEADER DEFAULT OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER ONE OPTIONS
			/* ============================= */
			
			// Header One Info.
			array(
				'id'    => 'header_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header One Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Header One Header Top Background Color.
			array(
				'id'       => 'header_one_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for top header. (Applies for header "Style One" only)', 'brixel' ),
				'default'  => array(
					'color' => '#20242a',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .wraper_header_top',
				),
			),

			// Header One Header Main Contact Phone.
			array(
				'id'       => 'header_one_header_main_contact_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Phone Number', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style One" only.', 'brixel' ),
				'default'  => esc_html__( '888-123-4587', 'brixel' ),
			),
			
			// Header One Header Main Contact Email.
			array(
				'id'       => 'header_one_header_main_contact_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Email', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style One" only.', 'brixel' ),
				'default'  => esc_html__( 'info@example.com', 'brixel' ),
			),
			
			// Header One Header Main Background Color.
			array(
				'id'       => 'header_one_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style One" only)', 'brixel' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .wraper_header_main',
				),
			),
			
			// Header One Logo.
			array(
				'id'       => 'header_one_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style One" only.)', 'brixel' ),
			),

			// Header One Retina Logo.
			array(
				'id'       => 'header_one_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'brixel' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".   (Applies for header "Style One" only.)', 'brixel' ),
			),

			// Header One Menu Typography.
			array(
				'id'             => 'header_one_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'brixel' ),
				'subtitle'       => esc_html__( 'Typography options for Menu. (Applies for header "Style One" only)', 'brixel' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '14px',
					'color'          => '#414348',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-one .nav',
				),
			),

			// Header One Menu Item Hover/Selected Color.
			array(
				'id'       => 'header_one_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover/Selected Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for all menu items. (Applies for header "Style One" only)', 'brixel' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a',
				),
			),
			
			// Header One Sticky.
			array(
				'id'       => 'header_one_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not. (Applies for header "Style One" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),
			
			// Header One Search Display.
			array(
				'id'       => 'header_one_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not. (Applies for header "Style One" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
			),

			// Header One Search Style.
			array(
				'id'       => 'header_one_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Style of the "Search". (Applies for header "Style One" only)', 'brixel' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_one_search_display',
						'equals',
						true,
					),
				),
			),

			// Header One Search Background Color.
			array(
				'id'       => 'header_one_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search". (Applies for header "Style One" only)', 'brixel' ),
				'required' => array(
					array(
						'header_one_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-one',
				),
			),

			// Header One Mobile Menu Displace.
			array(
				'id'       => 'header_one_mobile_menu_displace',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Mobile Menu Displace', 'brixel' ),
				'subtitle' => esc_html__( 'Select the Mobile Menu displace for mobile menu. (Applies for header "Style One" only)', 'brixel' ),
				'options'  => array(
					'true'  => 'Yes',
					'false' => 'No',
				),
				'default'  => 'true',
			),
			
			/* ============================= */
			// END OF HEADER ONE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER TWO OPTIONS
			/* ============================= */
			
			// Header Two Info.
			array(
				'id'    => 'header_two_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Two Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Header Two Header Main Background Color.
			array(
				'id'       => 'header_two_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Two" only)', 'brixel' ),
				'default'  => array(
					'color' => '#081123',
					'alpha' => 0.5,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .wraper_header_main',
				),
			),
			
			// Header Two Header Main Border Bottom Color.
			array(
				'id'       => 'header_two_header_main_border_botton_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Border Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header border. (Applies for header "Style Two" only)', 'brixel' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_header.style-two .wraper_header_main',
				),
			),
			
			// Header Two Logo.
			array(
				'id'       => 'header_two_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style Two" only.)', 'brixel' ),
			),

			// Header Two Retina Logo.
			array(
				'id'       => 'header_two_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'brixel' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".   (Applies for header "Style Two" only.)', 'brixel' ),
			),

			// Header Two Menu Typography.
			array(
				'id'             => 'header_two_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'brixel' ),
				'subtitle'       => esc_html__( 'Typography options for Menu. (Applies for header "Style Two" only)', 'brixel' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-two .nav',
				),
			),

			// Header Two Menu Item Hover/Selected Color.
			array(
				'id'       => 'header_two_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover/Selected Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for all menu items. (Applies for header "Style Two" only)', 'brixel' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a',
				),
			),
			
			// Header Two Sticky.
			array(
				'id'       => 'header_two_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not. (Applies for header "Style Two" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),
			
			// Header Two Search Display.
			array(
				'id'       => 'header_two_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not. (Applies for header "Style Two" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
			),

			// Header Two Search Style.
			array(
				'id'       => 'header_two_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Style of the "Search". (Applies for header "Style Two" only)', 'brixel' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_two_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Search Background Color.
			array(
				'id'       => 'header_two_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search". (Applies for header "Style Two" only)', 'brixel' ),
				'required' => array(
					array(
						'header_two_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-two',
				),
			),

			// Header Two Mobile Menu Displace.
			array(
				'id'       => 'header_two_mobile_menu_displace',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Mobile Menu Displace', 'brixel' ),
				'subtitle' => esc_html__( 'Select the Mobile Menu displace for mobile menu. (Applies for header "Style Two" only)', 'brixel' ),
				'options'  => array(
					'true'  => 'Yes',
					'false' => 'No',
				),
				'default'  => 'true',
			),
			
			/* ============================= */
			// END OF HEADER TWO OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER THREE OPTIONS
			/* ============================= */
			
			// Header Three Info.
			array(
				'id'    => 'header_three_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Three Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Header Three Header Main Background Color.
			array(
				'id'       => 'header_three_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Three" only)', 'brixel' ),
				'output'   => array(
					'background-color' => '.wraper_header.style-three .wraper_header_main',
				),
			),
			
			// Header Three Logo.
			array(
				'id'       => 'header_three_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style Three" only.)', 'brixel' ),
			),

			// Header Three Retina Logo.
			array(
				'id'       => 'header_three_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'brixel' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".   (Applies for header "Style Three" only.)', 'brixel' ),
			),

			// Header Three Menu Typography.
			array(
				'id'             => 'header_three_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'brixel' ),
				'subtitle'       => esc_html__( 'Typography options for Menu. (Applies for header "Style Three" only)', 'brixel' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '14px',
					'color'          => '#414348',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-three .nav',
				),
			),

			// Header Three Menu Item Hover/Selected Color.
			array(
				'id'       => 'header_three_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover/Selected Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for all menu items. (Applies for header "Style Three" only)', 'brixel' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a',
				),
			),
			// Header Three Header Top Social Text.
			array(
				'id'       => 'header_three_header_top_social_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Social Text', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'brixel' ),
				'default'  => esc_html__( 'Stay Connected:', 'brixel' ),
			),
			// Header Three Header Main Contact Text.
			array(
				'id'       => 'header_three_header_main_contact_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Text', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'brixel' ),
				'default'  => esc_html__( 'Need Help? Talk To an Expert', 'brixel' ),
			),

			// Header Three Header Main Contact Phone.
			array(
				'id'       => 'header_three_header_main_contact_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Phone Number', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'brixel' ),
				'default'  => esc_html__( '888-123-4587', 'brixel' ),
			),
			
			// Header Three Sticky.
			array(
				'id'       => 'header_three_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not. (Applies for header "Style Three" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),
			
			// Header Three Search Display.
			array(
				'id'       => 'header_three_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not. (Applies for header "Style Three" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
			),

			// Header Three Mobile Menu Displace.
			array(
				'id'       => 'header_three_mobile_menu_displace',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Mobile Menu Displace', 'brixel' ),
				'subtitle' => esc_html__( 'Select the Mobile Menu displace for mobile menu. (Applies for header "Style Three" only)', 'brixel' ),
				'options'  => array(
					'true'  => 'Yes',
					'false' => 'No',
				),
				'default'  => 'true',
			),
			
			/* ============================= */
			// END OF HEADER THREE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER FOUR OPTIONS
			/* ============================= */
			
			// Header Four Info.
			array(
				'id'    => 'header_four_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Four Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Header Four Header Main Background Color.
			array(
				'id'       => 'header_four_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Four" only)', 'brixel' ),
				'default'  => array(
					'color' => '#f8f8f8',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-four .wraper_header_main',
				),
			),
			
			// Header Four Logo.
			array(
				'id'       => 'header_four_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style Four" only.)', 'brixel' ),
			),

			// Header Four Retina Logo.
			array(
				'id'       => 'header_four_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'brixel' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".   (Applies for header "Style Four" only.)', 'brixel' ),
			),
			
			/* ============================= */
			// END OF HEADER FOUR OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER FIVE OPTIONS
			/* ============================= */
			
			// Header Five Info.
			array(
				'id'    => 'header_five_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Five Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Header Five Header Main Background Color.
			array(
				'id'       => 'header_five_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Five" only)', 'brixel' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-five .wraper_header_main',
				),
			),
			
			// Header Five Logo.
			array(
				'id'       => 'header_five_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style Five" only.)', 'brixel' ),
			),

			// Header Five Retina Logo.
			array(
				'id'       => 'header_five_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'brixel' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".   (Applies for header "Style Five" only.)', 'brixel' ),
			),
			
			// Header Five Header Sidepanel Background Color.
			array(
				'id'       => 'header_five_header_sidepanel_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Sidepanel Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for sidepanel header. (Applies for header "Style Five" only)', 'brixel' ),
				'output'   => array(
					'background-color' => '.hamburger_menu.header-style-five',
				),
			),
			
			// Header Five Menu Typography.
			array(
				'id'             => 'header_five_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'brixel' ),
				'subtitle'       => esc_html__( 'Typography options for Menu. (Applies for header "Style Five" only)', 'brixel' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '32px',
					'color'          => '#ffffff',
					'line-height'    => '40px',
				),
				'output'         => array(
					'.hamburger_menu.header-style-five > .nav',
				),
			),

			// Header Five Menu Item Hover/Selected Color.
			array(
				'id'       => 'header_five_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover/Selected Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for all menu items. (Applies for header "Style Five" only)', 'brixel' ),
				'validate' => 'color',
				'default'  => '#010101',
				'output'   => array(
					'.hamburger_menu.header-style-five > .nav > [class*="menu-"] > ul.menu > li:hover > a, .hamburger_menu.header-style-five > .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .hamburger_menu.header-style-five > .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .hamburger_menu.header-style-five > .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .hamburger_menu.header-style-five > .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .hamburger_menu.header-style-five > .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .hamburger_menu.header-style-five > .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .hamburger_menu.header-style-five > .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .hamburger_menu.header-style-five > .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a',
				),
			),
			
			// Header Five Header Main Contact Email.
			array(
				'id'       => 'header_five_header_main_contact_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Email', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Five" only.', 'brixel' ),
				'default'  => esc_html__( 'info@example.com', 'brixel' ),
			),

			// Header Five Header Main Contact Phone.
			array(
				'id'       => 'header_five_header_main_contact_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Phone Number', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Five" only.', 'brixel' ),
				'default'  => esc_html__( '888-123-4587', 'brixel' ),
			),
			
			// Header Five Search Display.
			array(
				'id'       => 'header_five_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not. (Applies for header "Style Five" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
			),

			// Header Five Search Style.
			array(
				'id'       => 'header_five_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Style of the "Search". (Applies for header "Style Five" only)', 'brixel' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_five_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Search Background Color.
			array(
				'id'       => 'header_five_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search". (Applies for header "Style Five" only)', 'brixel' ),
				'required' => array(
					array(
						'header_five_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-five',
				),
			),
			
			/* ============================= */
			// END OF HEADER FIVE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER SIX OPTIONS
			/* ============================= */
			
			// Header Six Info.
			array(
				'id'    => 'header_six_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Six Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Header Six Header Main Background Color.
			array(
				'id'       => 'header_six_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Six" only)', 'brixel' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .wraper_header_main',
				),
			),
			
			// Header Six Logo.
			array(
				'id'       => 'header_six_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style Six" only.)', 'brixel' ),
			),

			// Header Six Retina Logo.
			array(
				'id'       => 'header_six_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'brixel' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".   (Applies for header "Style Six" only.)', 'brixel' ),
			),
			
			// Header Six Header Menu Background Color.
			array(
				'id'       => 'header_six_header_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for menu header. (Applies for header "Style Six" only)', 'brixel' ),
				'output'   => array(
					'background-color' => '.wraper_flyout_menu.header-style-six',
				),
			),
			
			// Header Six Sticky.
			array(
				'id'       => 'header_six_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not. (Applies for header "Style Six" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),
			
			// Header Six Search Display.
			array(
				'id'       => 'header_six_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not. (Applies for header "Style Six" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
			),

			// Header Six Search Style.
			array(
				'id'       => 'header_six_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Style of the "Search". (Applies for header "Style Six" only)', 'brixel' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_six_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Search Background Color.
			array(
				'id'       => 'header_six_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search". (Applies for header "Style Six" only)', 'brixel' ),
				'required' => array(
					array(
						'header_six_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-six',
				),
			),
			
			/* ============================= */
			// END OF HEADER SIX OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER SEVEN OPTIONS
			/* ============================= */
			
			// Header Seven Info.
			array(
				'id'    => 'header_seven_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Seven Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Header Seven Header Main Background Color.
			array(
				'id'       => 'header_seven_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Seven" only)', 'brixel' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.3,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-seven .wraper_header_main',
				),
			),
			
			// Header Seven Header Main Border Bottom Color.
			array(
				'id'       => 'header_seven_header_main_border_botton_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Border Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header border. (Applies for header "Style Seven" only)', 'brixel' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_header.style-seven .wraper_header_main',
				),
			),
			
			// Header Seven Logo.
			array(
				'id'       => 'header_seven_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style Seven" only.)', 'brixel' ),
			),

			// Header Seven Retina Logo.
			array(
				'id'       => 'header_seven_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'brixel' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".   (Applies for header "Style Seven" only.)', 'brixel' ),
			),

			// Header Seven Menu Typography.
			array(
				'id'             => 'header_seven_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'brixel' ),
				'subtitle'       => esc_html__( 'Typography options for Menu. (Applies for header "Style Seven" only)', 'brixel' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '600',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-seven .nav',
				),
			),

			// Header Seven Menu Item Hover/Selected Color.
			array(
				'id'       => 'header_seven_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover/Selected Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for all menu items. (Applies for header "Style Seven" only)', 'brixel' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-seven .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-seven .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-seven .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-seven .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a',
				),
			),
			
			// Header Seven Sticky.
			array(
				'id'       => 'header_seven_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not. (Applies for header "Style Seven" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),
			
			// Header Seven Search Display.
			array(
				'id'       => 'header_seven_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not. (Applies for header "Style Seven" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
			),

			// Header Seven Search Style.
			array(
				'id'       => 'header_seven_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Style of the "Search". (Applies for header "Style Seven" only)', 'brixel' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_seven_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Seven Search Background Color.
			array(
				'id'       => 'header_seven_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search". (Applies for header "Style Seven" only)', 'brixel' ),
				'required' => array(
					array(
						'header_seven_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-seven',
				),
			),

			// Header Seven Mobile Menu Displace.
			array(
				'id'       => 'header_seven_mobile_menu_displace',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Mobile Menu Displace', 'brixel' ),
				'subtitle' => esc_html__( 'Select the Mobile Menu displace for mobile menu. (Applies for header "Style Seven" only)', 'brixel' ),
				'options'  => array(
					'true'  => 'Yes',
					'false' => 'No',
				),
				'default'  => 'true',
			),
			
			/* ============================= */
			// END OF HEADER SEVEN OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER EIGHT OPTIONS
			/* ============================= */
			
			// Header Eight Info.
			array(
				'id'    => 'header_eight_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Eight Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Header Eight Header Main Background Color.
			array(
				'id'       => 'header_eight_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Eight" only)', 'brixel' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.3,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eight .wraper_header_main',
				),
			),
			
			// Header Eight Header Main Border Bottom Color.
			array(
				'id'       => 'header_eight_header_main_border_botton_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Border Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header border. (Applies for header "Style Eight" only)', 'brixel' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_header.style-eight .wraper_header_main',
				),
			),
			
			// Header Eight Logo.
			array(
				'id'       => 'header_eight_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style Eight" only.)', 'brixel' ),
			),

			// Header Eight Retina Logo.
			array(
				'id'       => 'header_eight_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'brixel' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".   (Applies for header "Style Eight" only.)', 'brixel' ),
			),

			// Header Eight Menu Typography.
			array(
				'id'             => 'header_eight_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'brixel' ),
				'subtitle'       => esc_html__( 'Typography options for Menu. (Applies for header "Style Eight" only)', 'brixel' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '600',
					'font-size'      => '14px',
					'color'          => '#ffffff',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-eight .nav',
				),
			),

			// Header Eight Menu Item Hover/Selected Color.
			array(
				'id'       => 'header_eight_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover/Selected Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for all menu items. (Applies for header "Style Eight" only)', 'brixel' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-eight .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a',
				),
			),
			
			// Header Eight Sticky.
			array(
				'id'       => 'header_eight_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not. (Applies for header "Style Eight" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),
			
			// Header Eight Search Display.
			array(
				'id'       => 'header_eight_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not. (Applies for header "Style Eight" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
			),

			// Header Eight Search Style.
			array(
				'id'       => 'header_eight_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Style of the "Search". (Applies for header "Style Eight" only)', 'brixel' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_eight_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Eight Search Background Color.
			array(
				'id'       => 'header_eight_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search". (Applies for header "Style Eight" only)', 'brixel' ),
				'required' => array(
					array(
						'header_eight_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-eight',
				),
			),

			// Header Eight Mobile Menu Displace.
			array(
				'id'       => 'header_eight_mobile_menu_displace',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Mobile Menu Displace', 'brixel' ),
				'subtitle' => esc_html__( 'Select the Mobile Menu displace for mobile menu. (Applies for header "Style Eight" only)', 'brixel' ),
				'options'  => array(
					'true'  => 'Yes',
					'false' => 'No',
				),
				'default'  => 'true',
			),
			
			/* ============================= */
			// END OF HEADER EIGHT OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER NINE OPTIONS
			/* ============================= */

			// Header Nine Info.
			array(
				'id'    => 'header_nine_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Nine Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Nine Box Shadow.
			array(
				'id'       => 'header_nine_box_shadow',
				'type'     => 'box_shadow',
				'title'    => esc_html__( 'Header Box Shadow', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Nine" only.', 'brixel' ),
				'units'    => array( 'px', 'em' ),
				'opacity'  => true,
				'rgba'     => true,
				'default'  => array(
					'horizontal'   => '0',
					'vertical'     => '0',
					'blur'         => '27px',
					'spread'       => '0',
					'opacity'      => '0.22',
					'shadow-color' => '#050606',
					'shadow-type'  => 'outside',
					'units'        => 'px',
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-nine',
				),
			),

			// Header Nine Header Top Background Color.
			array(
				'id'       => 'header_nine_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Bar Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Nine" only.', 'brixel' ),
				'output'   => array(
					'background-color' => '.wraper_header.style-nine .wraper_header_top',
				),
			),

			// Header Nine Header Top Contact Text.
			array(
				'id'       => 'header_nine_header_top_contact_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Contact Text', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Nine" only.', 'brixel' ),
				'default'  => esc_html__( 'Need Help? Talk to an Expert', 'brixel' ),
			),

			// Header Nine Header Top Contact Phone.
			array(
				'id'       => 'header_nine_header_top_contact_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Phone Number', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Nine" only.', 'brixel' ),
				'default'  => esc_html__( '888-123-4567', 'brixel' ),
			),

			// Header Nine Logo.
			array(
				'id'       => 'header_nine_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style Nine" only.)', 'brixel' ),
			),

			// Header Nine Retina Logo.
			array(
				'id'       => 'header_nine_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'brixel' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".   (Applies for header "Style Nine" only.)', 'brixel' ),
			),
			// Header Nine Header Top Social Text.
			array(
				'id'       => 'header_nine_header_top_social_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Social Text', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Nine" only.', 'brixel' ),
				'default'  => esc_html__( 'Stay Connected:', 'brixel' ),
			),
			// Header Nine Header Main Background Color.
			array(
				'id'       => 'header_nine_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Nine" only)', 'brixel' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-nine .wraper_header_main',
				),
			),

			// Header Nine Menu Typography.
			array(
				'id'             => 'header_nine_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'brixel' ),
				'subtitle'       => esc_html__( 'Typography options for Menu. (Applies for header "Style Nine" only)', 'brixel' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#010101',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-nine .nav',
				),
			),

			// Header Nine Menu Item Hover/Selected Color.
			array(
				'id'       => 'header_nine_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover/Selected Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for all menu items. (Applies for header "Style Nine" only)', 'brixel' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a',
				),
			),
			
			// Header Nine Sticky.
			array(
				'id'       => 'header_nine_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not. (Applies for header "Style Nine" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),

			// Header Nine Search Display.
			array(
				'id'       => 'header_nine_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not. (Applies for header "Style Nine" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
			),

			// Header Nine Search Style.
			array(
				'id'       => 'header_nine_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Style of the "Search". (Applies for header "Style Nine" only)', 'brixel' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_nine_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Nine Search Background Color.
			array(
				'id'       => 'header_nine_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search". (Applies for header "Style Nine" only)', 'brixel' ),
				'required' => array(
					array(
						'header_nine_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-nine',
				),
			),

			// Header Nine Mobile Menu Displace.
			array(
				'id'       => 'header_nine_mobile_menu_displace',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Mobile Menu Displace', 'brixel' ),
				'subtitle' => esc_html__( 'Select the Mobile Menu displace for mobile menu. (Applies for header "Style Nine" only)', 'brixel' ),
				'options'  => array(
					'true'  => 'Yes',
					'false' => 'No',
				),
				'default'  => 'true',
			),

			/* ============================= */
			// END OF HEADER NINE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER TEN OPTIONS
			/* ============================= */

			// Header Ten Info.
			array(
				'id'    => 'header_ten_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Ten Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Ten Header Top Background Color.
			array(
				'id'       => 'header_ten_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Bar Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'brixel' ),
				'default'  => array(
					'color' => '#0e0d0d',
					'alpha' => 0.4,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten .wraper_header_top',
				),
			),

			// Header Ten Header Top Contact Email.
			array(
				'id'       => 'header_ten_header_top_contact_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Email', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'brixel' ),
				'default'  => esc_html__( 'info@example.com', 'brixel' ),
			),

			// Header Ten Header Top Contact Phone.
			array(
				'id'       => 'header_ten_header_top_contact_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Phone Number', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'brixel' ),
				'default'  => esc_html__( '888-123-4587', 'brixel' ),
			),
			
			// Header Ten Header Top Social Text.
			array(
				'id'       => 'header_ten_header_top_social_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Social Text', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for header "Style Ten" only.', 'brixel' ),
				'default'  => esc_html__( 'Stay Connected:', 'brixel' ),
			),

			// Header Ten Header Main Background Color.
			array(
				'id'       => 'header_ten_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Ten" only)', 'brixel' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten .wraper_header_main',
				),
			),
			
			// Header Ten Logo.
			array(
				'id'       => 'header_ten_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'brixel' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style Ten" only.)', 'brixel' ),
			),

			// Header Ten Retina Logo.
			array(
				'id'       => 'header_ten_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'brixel' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".   (Applies for header "Style Ten" only.)', 'brixel' ),
			),

			// Header Ten Menu Typography.
			array(
				'id'             => 'header_ten_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'brixel' ),
				'subtitle'       => esc_html__( 'Typography options for Menu. (Applies for header "Style Ten" only)', 'brixel' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '400',
					'font-size'      => '17px',
					'color'          => '#ffffff',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-ten .nav',
				),
			),

			// Header Ten Menu Item Hover/Selected Color.
			array(
				'id'       => 'header_ten_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover/Selected Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies for all menu items. (Applies for header "Style Ten" only)', 'brixel' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a',
				),
			),
			
			// Header Ten Sticky.
			array(
				'id'       => 'header_ten_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not. (Applies for header "Style Ten" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),

			// Header Ten Search Display.
			array(
				'id'       => 'header_ten_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not. (Applies for header "Style Ten" only)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
			),

			// Header Ten Search Style.
			array(
				'id'       => 'header_ten_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Style of the "Search". (Applies for header "Style Ten" only)', 'brixel' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_ten_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Search Background Color.
			array(
				'id'       => 'header_ten_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search". (Applies for header "Style Ten" only)', 'brixel' ),
				'required' => array(
					array(
						'header_ten_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-ten',
				),
			),

			// Header Ten Mobile Menu Displace.
			array(
				'id'       => 'header_ten_mobile_menu_displace',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Mobile Menu Displace', 'brixel' ),
				'subtitle' => esc_html__( 'Select the Mobile Menu displace for mobile menu. (Applies for header "Style Ten" only)', 'brixel' ),
				'options'  => array(
					'true'  => 'Yes',
					'false' => 'No',
				),
				'default'  => 'true',
			),

			/* ============================= */
			// END OF HEADER TEN OPTIONS
			/* ============================= */

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Short Header', 'brixel' ),
		'icon'       => 'el el-website',
		'id'         => 'inner_page_banner',
		'subsection' => true,
		'fields'     => array(

			// Short Header Style Options.
			array(
				'id'       => 'short-header',
				'type'     => 'image_select',
				//'class' => 'radiant-subheader',
				'title'    => esc_html__( 'Select Short Header', 'brixel' ),
				//'subtitle' => esc_html__( '', 'brixel' ),
				'options'  => array(
					'Banner-With-Breadcrumb'     => array(
						'alt'   => esc_html__( 'Banner-With-Breadcrumb', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-With-Breadcrumb.png' ),
						'title' => esc_html__( 'Banner & Breadcrumb', 'brixel' ),
					),
					'Banner-only'     => array(
						'alt'   => esc_html__( 'Banner Only', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-Only.png' ),
						'title' => esc_html__( 'Banner Only', 'brixel' ),
					),
					'breadcrumb-only' => array(
						'alt'   => esc_html__( 'Breadcrumb-Only', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Breadcrumb-Only.png' ),
						'title' => esc_html__( 'Breadcrumb Only', 'brixel' ),
					),
					'banner-none'   => array(
						'alt'   => esc_html__( 'Banner None', 'brixel' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-None.png' ),
						'title' => esc_html__( 'Banner None', 'brixel' ),
					),

				),
					'default'  => 'Banner-With-Breadcrumb',
			),
			// Inner Page Banner Info.
			array(
				'id'    => 'inner_page_banner_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Inner Page Banner', 'brixel' ),
			),

			// Inner Page Banner Background.
			array(
				'id'       => 'inner_page_banner_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Inner Page Banner Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Inner Page Banner. (Please Note: This is the default image of Inner Page Banner section. You can change background image on respective pages.)', 'brixel' ),
				'default'  => array(
					'background-repeat'     => 'no-repeat',
					'background-size'       => 'cover',
					'background-attachment' => 'inherit',
				),
				'output'   => array(
					'.wraper_inner_banner',
				),
			),

			// Inner Page Banner Border Bottom.
			array(
				'id'       => 'inner_page_banner_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Inner Page Banner Border Bottom', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom for Inner Page Banner.', 'brixel' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.1,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_inner_banner_main',
				),
			),

			// Inner Page Banner Padding.
			array(
				'id'             => 'inner_page_banner_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Inner Page Banner Padding', 'brixel' ),
				'subtitle'       => esc_html__( 'Set padding for inner page banner area.', 'brixel' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '26px',
					'padding-bottom' => '30px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_inner_banner_main > .container',
				),
			),

			// Inner Page Banner Title Font.
			array(
				'id'             => 'inner_page_banner_title_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Title Font', 'brixel' ),
				'subtitle'       => esc_html__( 'This will be the default font of your inner page banner title.', 'brixel' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Montserrat',
					'font-weight' => '700',
					'font-size'   => '45px',
					'color'       => '#ffffff',
					'line-height' => '55px',
				),
				'output'         => array(
					'.inner_banner_main .title',
				),
			),

			// Inner Page Banner Subtitle Font.
			array(
				'id'             => 'inner_page_banner_subtitle_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Subtitle Font', 'brixel' ),
				'subtitle'       => esc_html__( 'This will be the default font of your inner page banner subtitle.', 'brixel' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Montserrat',
					'font-weight' => '600',
					'font-size'   => '18px',
					'color'       => '#ffffff',
					'line-height' => '26px',
				),
				'output'         => array(
					'.inner_banner_main .subtitle',
				),
			),

			// Inner Page Banner Alignment.
			array(
				'id'      => 'inner_page_banner_alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Inner Page Banner Alignment', 'brixel' ),
				'options' => array(
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
				'default' => 'left',
			),

			// Breadcrumb Style Info.
			array(
				'id'    => 'breadcrumb_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Breadcrumb', 'brixel' ),
			),

			// Breadcrumb Arrow Style.
			array(
				'id'       => 'breadcrumb_arrow_style',
				'type'     => 'select',
				'title'    => __( 'Breadcrumb Arrow Style', 'brixel' ),
				'subtitle' => __( 'Select an icon for breadcrumb arrow.', 'brixel' ),
				'data'     => 'elusive-icons',
				'default'  => 'el el-chevron-right',
			),

			// Breadcrumb Font.
			array(
				'id'             => 'breadcrumb_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Breadcrumb Font', 'brixel' ),
				'subtitle'       => esc_html__( 'This will be the default font of your Inner Page Banner Breadcrumb.', 'brixel' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Montserrat',
					'font-weight' => '400',
					'font-size'   => '16px',
					'color'       => '#ffffff',
					'line-height' => '26px',
				),
				'output'         => array(
					'.inner_banner_breadcrumb #crumbs',
				),
			),

			// Breadcrumb Padding.
			array(
				'id'             => 'breadcrumb_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Breadcrumb Padding', 'brixel' ),
				'subtitle'       => esc_html__( 'Set padding for breadcrumb area.', 'brixel' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_inner_banner_breadcrumb > .container',
				),
			),

			// Breadcrumb Alignment.
			array(
				'id'      => 'breadcrumb_alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Breadcrumb Alignment', 'brixel' ),
				'options' => array(
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
				'default' => 'left',
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'  => esc_html__( 'Footer', 'brixel' ),
		'icon'   => 'el el-photo',
		'id'     => 'footer',
		'fields' => array(

			// Footer Style Info.
			array(
				'id'    => 'footer_style_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Footer Style', 'brixel' ),
			),

			// Footer Style Options.
			array(
				'id'       => 'footer-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Footer Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select footer style. (N.B.: Please set style for individual footer on their respective settings below.)', 'brixel' ),
				'options'  => array(
					'footer-style-one' => array(
						'alt' => esc_html__( 'Style One', 'brixel' ),
						'img' => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-One.png' ),
					),
					'footer-style-two' => array(
						'alt' => esc_html__( 'Style Two', 'brixel' ),
						'img' => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Two.png' ),
					),
					'footer-style-three' => array(
						'alt' => esc_html__( 'Style Three', 'brixel' ),
						'img' => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Three.jpg' ),
					),
					'footer-style-four' => array(
						'alt' => esc_html__( 'Style Four', 'brixel' ),
						'img' => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Four.jpg' ),
					),
					'footer-style-five' => array(
						'alt' => esc_html__( 'Style Five', 'brixel' ),
						'img' => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Five.png' ),
					),
					'footer-style-six' => array(
						'alt' => esc_html__( 'Style Six', 'brixel' ),
						'img' => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Six.png' ),
					),
					'footer-style-seven' => array(
						'alt' => esc_html__( 'Style Seven', 'brixel' ),
						'img' => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Seven.png' ),
					),
					'footer-style-eight' => array(
						'alt' => esc_html__( 'Style Eight', 'brixel' ),
						'img' => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Eight.png' ),
					),
					'footer-style-nine' => array(
						'alt' => esc_html__( 'Style Nine', 'brixel' ),
						'img' => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Nine.png' ),
					),
					'footer-style-ten' => array(
						'alt' => esc_html__( 'Style Ten', 'brixel' ),
						'img' => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Ten.png' ),
					),
				),
				'default'  => 'footer-style-one',
			),
			
			/* ============================= */
			// START OF FOOTER ONE OPTIONS
			/* ============================= */

			// Footer One Info.
			array(
				'id'    => 'footer_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer One Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Footer One Background.
			array(
				'id'       => 'footer_one_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style One".)', 'brixel' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-one',
				),
			),
			
			// Footer One Main Background.
			array(
				'id'       => 'footer_one_main_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style One".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-one .wraper_footer_main',
				),
			),
			
			// Footer One Main Bottom Border.
			array(
				'id'       => 'footer_one_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style One".)', 'brixel' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-one .wraper_footer_main',
				),
			),
			
			// Footer One Copyright Background.
			array(
				'id'       => 'footer_one_copyright_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Copyright Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style One".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-one .wraper_footer_copyright',
				),
			),
			
			// Footer One Copyright Text.
			array(
				'id'       => 'footer_one_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style One".)', 'brixel' ),
				'default'  => esc_html__( 'brixel 2018', 'brixel' ),
			),
			
			/* ============================= */
			// END OF FOOTER ONE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF FOOTER TWO OPTIONS
			/* ============================= */

			// Footer Two Info.
			array(
				'id'    => 'footer_two_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Two Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Footer Two Background.
			array(
				'id'       => 'footer_two_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Two".)', 'brixel' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-two',
				),
			),
			
			// Footer Two Main Background.
			array(
				'id'       => 'footer_two_main_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Two".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-two .wraper_footer_main',
				),
			),
			
			// Footer Two Main Bottom Border.
			array(
				'id'       => 'footer_two_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Two".)', 'brixel' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-two .wraper_footer_main',
				),
			),
			
			// Footer Two Copyright Background.
			array(
				'id'       => 'footer_two_copyright_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Copyright Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Two".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-two .wraper_footer_copyright',
				),
			),
			
			// Footer Two Copyright Text.
			array(
				'id'       => 'footer_two_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Two".)', 'brixel' ),
				'default'  => esc_html__( 'brixel 2018', 'brixel' ),
			),
			
			/* ============================= */
			// END OF FOOTER TWO OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF FOOTER THREE OPTIONS
			/* ============================= */

			// Footer Three Info.
			array(
				'id'    => 'footer_three_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Three Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Footer Three Background.
			array(
				'id'       => 'footer_three_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Three".)', 'brixel' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-three',
				),
			),
			
			// Footer Three Main Background.
			array(
				'id'       => 'footer_three_main_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Three".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-three .wraper_footer_main',
				),
			),
			
			// Footer Three Main Bottom Border.
			array(
				'id'       => 'footer_three_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Three".)', 'brixel' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-three .wraper_footer_main',
				),
			),
			
			// Footer Three Copyright Background.
			array(
				'id'       => 'footer_three_copyright_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Copyright Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Three".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-three .wraper_footer_copyright',
				),
			),
			
			// Footer Three Copyright Text.
			array(
				'id'       => 'footer_three_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Three".)', 'brixel' ),
				'default'  => esc_html__( 'brixel 2018', 'brixel' ),
			),
			
			/* ============================= */
			// END OF FOOTER THREE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF FOOTER FOUR OPTIONS
			/* ============================= */

			// Footer Four Info.
			array(
				'id'    => 'footer_four_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Four Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Footer Four Background.
			array(
				'id'       => 'footer_four_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Four".)', 'brixel' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-four',
				),
			),
			
			// Footer Four Navigation Background.
			array(
				'id'       => 'footer_four_navigation_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Navigation Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Navigation. (Applicable only for footer "Style Four".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-four .wraper_footer_navigation',
				),
			),
			
			// Footer Four Main Background.
			array(
				'id'       => 'footer_four_main_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Four".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-four .wraper_footer_main',
				),
			),
			
			// Footer Four Main Bottom Border.
			array(
				'id'       => 'footer_four_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Four".)', 'brixel' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-four .wraper_footer_main',
				),
			),
			
			// Footer Four Copyright Background.
			array(
				'id'       => 'footer_four_copyright_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Copyright Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Four".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-four .wraper_footer_copyright',
				),
			),
			
			// Footer Four Copyright Text.
			array(
				'id'       => 'footer_four_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Four".)', 'brixel' ),
				'default'  => esc_html__( 'brixel 2018', 'brixel' ),
			),
			
			/* ============================= */
			// END OF FOOTER FOUR OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF FOOTER FIVE OPTIONS
			/* ============================= */

			// Footer Five Info.
			array(
				'id'    => 'footer_five_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Five Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Footer Five Background.
			array(
				'id'       => 'footer_five_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Five".)', 'brixel' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-five',
				),
			),
			
			// Footer Five Navigation Background.
			array(
				'id'       => 'footer_five_navigation_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Navigation Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Navigation. (Applicable only for footer "Style Five".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-five .wraper_footer_navigation',
				),
			),
			
			// Footer Five Main Background.
			array(
				'id'       => 'footer_five_main_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Five".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-five .wraper_footer_main',
				),
			),
			
			// Footer Five Main Bottom Border.
			array(
				'id'       => 'footer_five_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Five".)', 'brixel' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-five .wraper_footer_main',
				),
			),
			
			// Footer Five Copyright Background.
			array(
				'id'       => 'footer_five_copyright_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Copyright Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Five".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-five .wraper_footer_copyright',
				),
			),
			
			// Footer Five Copyright Text.
			array(
				'id'       => 'footer_five_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Five".)', 'brixel' ),
				'default'  => esc_html__( 'brixel 2018', 'brixel' ),
			),
			
			/* ============================= */
			// END OF FOOTER FIVE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF FOOTER SIX OPTIONS
			/* ============================= */

			// Footer Six Info.
			array(
				'id'    => 'footer_six_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Six Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Footer Six Background.
			array(
				'id'       => 'footer_six_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Six".)', 'brixel' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-six',
				),
			),
			
			// Footer Six Main Background.
			array(
				'id'       => 'footer_six_main_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Six".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-six .wraper_footer_main',
				),
			),
			
			// Footer Six Main Bottom Border.
			array(
				'id'       => 'footer_six_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Six".)', 'brixel' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-six .wraper_footer_main',
				),
			),
			
			// Footer Six Copyright Background.
			array(
				'id'       => 'footer_six_copyright_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Copyright Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Six".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-six .wraper_footer_copyright',
				),
			),
			
			// Footer Six Copyright Text.
			array(
				'id'       => 'footer_six_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Six".)', 'brixel' ),
				'default'  => esc_html__( 'brixel 2018', 'brixel' ),
			),
			
			/* ============================= */
			// END OF FOOTER SIX OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF FOOTER SEVEN OPTIONS
			/* ============================= */

			// Footer Seven Info.
			array(
				'id'    => 'footer_seven_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Seven Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Footer Seven Background.
			array(
				'id'       => 'footer_seven_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Seven".)', 'brixel' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-seven',
				),
			),
			
			// Footer Seven Main Background.
			array(
				'id'       => 'footer_seven_main_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Seven".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-seven .wraper_footer_main',
				),
			),
			
			// Footer Seven Main Bottom Border.
			array(
				'id'       => 'footer_seven_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Seven".)', 'brixel' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-seven .wraper_footer_main',
				),
			),
			
			// Footer Seven Copyright Background.
			array(
				'id'       => 'footer_seven_copyright_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Copyright Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Seven".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-seven .wraper_footer_copyright',
				),
			),
			
			// Footer Seven Copyright Text.
			array(
				'id'       => 'footer_seven_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Seven".)', 'brixel' ),
				'default'  => esc_html__( 'brixel 2018', 'brixel' ),
			),
			
			/* ============================= */
			// END OF FOOTER SEVEN OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF FOOTER EIGHT OPTIONS
			/* ============================= */

			// Footer Eight Info.
			array(
				'id'    => 'footer_eight_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Eight Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Footer Eight Background.
			array(
				'id'       => 'footer_eight_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Eight".)', 'brixel' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-eight',
				),
			),
			
			// Footer Eight Main Background.
			array(
				'id'       => 'footer_eight_main_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Eight".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-eight .wraper_footer_main',
				),
			),
			
			// Footer Eight Main Bottom Border.
			array(
				'id'       => 'footer_eight_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Eight".)', 'brixel' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-eight .wraper_footer_main',
				),
			),
			
			// Footer Eight Copyright Background.
			array(
				'id'       => 'footer_eight_copyright_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Copyright Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Eight".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-eight .wraper_footer_copyright',
				),
			),
			
			// Footer Eight Copyright Text.
			array(
				'id'       => 'footer_eight_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Eight".)', 'brixel' ),
				'default'  => esc_html__( 'brixel 2018', 'brixel' ),
			),
			
			// Footer Eight Copyright Bar.
			array(
				'id'       => 'footer_eight_contact_address',
				'type'     => 'text',
				'title'    => esc_html__( 'Contact Address', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Contact Address. (Applicable only for footer "Style Eight".)', 'brixel' ),
				'default'  => esc_html__( '123, XYZ Road, Collins Avn., New York', 'brixel' ),
			),
			
			/* ============================= */
			// END OF FOOTER EIGHT OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF FOOTER NINE OPTIONS
			/* ============================= */

			// Footer Nine Info.
			array(
				'id'    => 'footer_nine_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Nine Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Footer Nine Background.
			array(
				'id'       => 'footer_nine_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Nine".)', 'brixel' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-nine',
				),
			),
			
			// Footer Nine Navigation Background.
			array(
				'id'       => 'footer_nine_navigation_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Navigation Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Navigation. (Applicable only for footer "Style Nine".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-nine .wraper_footer_navigation',
				),
			),
			
			// Footer Nine Main Background.
			array(
				'id'       => 'footer_nine_main_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Nine".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-nine .wraper_footer_main',
				),
			),
			
			// Footer Nine Main Bottom Border.
			array(
				'id'       => 'footer_nine_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Nine".)', 'brixel' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-nine .wraper_footer_main',
				),
			),
			
			// Footer Nine Copyright Background.
			array(
				'id'       => 'footer_nine_copyright_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Copyright Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Nine".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-nine .wraper_footer_copyright',
				),
			),
			
			// Footer Nine Copyright Text.
			array(
				'id'       => 'footer_nine_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Nine".)', 'brixel' ),
				'default'  => esc_html__( 'brixel 2018', 'brixel' ),
			),
			
			/* ============================= */
			// END OF FOOTER NINE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF FOOTER TEN OPTIONS
			/* ============================= */

			// Footer Ten Info.
			array(
				'id'    => 'footer_ten_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Ten Settings', 'brixel' ),
				'class' => 'radiant-subheader enable-toggle',
			),
			
			// Footer Ten Background.
			array(
				'id'       => 'footer_ten_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Ten".)', 'brixel' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-ten',
				),
			),
			
			// Footer Ten Main Background.
			array(
				'id'       => 'footer_ten_main_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Ten".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-ten .wraper_footer_main',
				),
			),
			
			// Footer Ten Main Bottom Border.
			array(
				'id'       => 'footer_ten_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'brixel' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Ten".)', 'brixel' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-ten .wraper_footer_main',
				),
			),
			
			// Footer Ten Copyright Background.
			array(
				'id'       => 'footer_ten_copyright_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Copyright Background', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Ten".)', 'brixel' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-ten .wraper_footer_copyright',
				),
			),
			
			// Footer Ten Copyright Text.
			array(
				'id'       => 'footer_ten_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Ten".)', 'brixel' ),
				'default'  => esc_html__( 'brixel 2018', 'brixel' ),
			),
			
			/* ============================= */
			// END OF FOOTER TEN OPTIONS
			/* ============================= */

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Elements', 'brixel' ),
		'icon'  => 'el el-braille',
		'id'    => 'elements',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Scroll Bar', 'brixel' ),
		'id'         => 'scroll_bar',
		'icon'       => 'el el-adjust-alt',
		'subsection' => true,
		'fields'     => array(

			// Display Footer Main Section.
			array(
				'id'       => 'scrollbar_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Custom Scrollbar', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if Custom Scrollbar will be activate or not. (Please Note: This will take effect on infinity scroll areas but not for entire website.)', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),

			// Scroll Bar Color.
			array(
				'id'       => 'scrollbar_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Scroll Bar Color', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a color for Scroll Bar.', 'brixel' ),
				'required' => array(
					array(
						'scrollbar_switch',
						'equals',
						true,
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 1,
				),
			),

			// Scroll Bar Width.
			array(
				'id'       => 'scrollbar_width',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'height'   => false,
				'title'    => esc_html__( 'Scroll Bar Width', 'brixel' ),
				'subtitle' => esc_html__( 'Set width for Scroll Bar.', 'brixel' ),
				'required' => array(
					array(
						'scrollbar_switch',
						'equals',
						true,
					),
				),
				'default'  => array(
					'width' => '7',
					'units' => 'px',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Button', 'brixel' ),
		'icon'       => 'el el-off',
		'id'         => 'button-style',
		'subsection' => true,
		'fields'     => array(

			// Button Padding.
			array(
				'id'             => 'button_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Button Padding', 'brixel' ),
				'subtitle'       => esc_html__( 'Allow padding for buttons.', 'brixel' ),
				'default'        => array(
					'padding-top'    => '12px',
					'padding-right'  => '35px',
					'padding-bottom' => '13px',
					'padding-left'   => '35px',
					'units'          => 'px',
				),
				'output'         => array(
					'.radiantthemes-button > .radiantthemes-button-main, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .rt-fancy-text-box.element-one > .holder > .more > a, .rt-fancy-text-box.element-two > .holder > .more > a, .rt-fancy-text-box.element-three > .holder > .more > a, .rt-fancy-text-box.element-four > .holder > .more > a, .team.element-six .team-item > .holder .data .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn',
				),
			),

			// Background Color.
			array(
				'id'       => 'button_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for buttons.', 'brixel' ),
				'output'   => array(
					'background-color' => '.radiantthemes-button > .radiantthemes-button-main, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce form .form-row input.button, .woocommerce .return-to-shop .button, .widget-area > .widget.widget_price_filter .button, .rt-fancy-text-box.element-one > .holder > .more > a, .rt-fancy-text-box.element-two > .holder > .more > a, .rt-fancy-text-box.element-three > .holder > .more > a, .rt-fancy-text-box.element-four > .holder > .more > a, .team.element-six .team-item > .holder .data .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn',
				),
			),

			// Hover Background Color.
			array(
				'id'       => 'button_background_color_hover',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hover Background Color', 'brixel' ),
				'subtitle' => esc_html__( 'Pick a background color for buttons hover.', 'brixel' ),
				'default'  => array(
					'color' => '#252525',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.radiantthemes-button[class*="hover-style-"] .radiantthemes-button-main > .overlay, .radiant-contact-form .form-row input[type=submit]:hover, .radiant-contact-form .form-row input[type=button]:hover, .radiant-contact-form .form-row button[type=submit]:hover, .post.style-two .post-read-more .btn:hover, .post.style-three .entry-main .post-read-more .btn:hover, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .widget-area > .widget.widget_price_filter .button:hover, .rt-fancy-text-box.element-one > .holder > .more > a:hover, .rt-fancy-text-box.element-two > .holder > .more > a:hover, .rt-fancy-text-box.element-three > .holder > .more > a:hover, .rt-fancy-text-box.element-four > .holder > .more > a:hover, .team.element-six .team-item > .holder .data .btn:hover, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn:hover, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn:hover, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn:hover, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn:hover, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn:hover',
				),
			),

			// Border.
			array(
				'id'      => 'button_border',
				'type'    => 'border',
				'title'   => esc_html__( 'Border', 'brixel' ),
				'default' => array(
					'border-top'    => '0px',
					'border-right'  => '0px',
					'border-bottom' => '0px',
					'border-left'   => '0px',
					'border-style'  => 'solid',
					'border-color'  => '#ffffff',
				),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .rt-fancy-text-box.element-one > .holder > .more > a, .rt-fancy-text-box.element-two > .holder > .more > a, .rt-fancy-text-box.element-three > .holder > .more > a, .rt-fancy-text-box.element-four > .holder > .more > a, .team.element-six .team-item > .holder .data .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn',
				),
			),

			// Hover Border Color.
			array(
				'id'      => 'button_hover_border_color',
				'type'    => 'border',
				'title'   => esc_html__( 'Hover Border Color', 'brixel' ),
				'default' => array(
					'border-top'    => '0px',
					'border-right'  => '0px',
					'border-bottom' => '0px',
					'border-left'   => '0px',
					'border-style'  => 'solid',
					'border-color'  => '#ffffff',
				),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main:hover, .radiant-contact-form .form-row input[type=submit]:hover, .radiant-contact-form .form-row input[type=button]:hover, .radiant-contact-form .form-row button[type=submit]:hover, .post.style-two .post-read-more .btn:hover, .post.style-three .entry-main .post-read-more .btn:hover, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .widget-area > .widget.widget_price_filter .button:hover, .rt-fancy-text-box.element-one > .holder > .more > a:hover, .rt-fancy-text-box.element-two > .holder > .more > a:hover, .rt-fancy-text-box.element-three > .holder > .more > a:hover, .rt-fancy-text-box.element-four > .holder > .more > a:hover, .team.element-six .team-item > .holder .data .btn:hover, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn:hover, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn:hover, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn:hover, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn:hover, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn:hover',
				),
			),

			// Border Radius.
			array(
				'id'             => 'border-radius',
				'type'           => 'spacing',
				'mode'           => 'margin',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Border Radius', 'brixel' ),
				'subtitle'       => esc_html__( 'Users can change the Border Radius for Buttons.', 'brixel' ),
				'all'            => false,
				'default'        => array(
					'margin-top'    => '30px',
					'margin-right'  => '30px',
					'margin-bottom' => '30px',
					'margin-left'   => '30px',
					'units'         => 'px',
				),
			),

			// Box Shadow.
			array(
				'id'      => 'theme_button_box_shadow',
				'type'    => 'box_shadow',
				'title'   => esc_html__( 'Theme Button Box Shadow', 'brixel' ),
				'units'   => array( 'px', 'em', 'rem' ),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .rt-fancy-text-box.element-one > .holder > .more > a, .rt-fancy-text-box.element-two > .holder > .more > a, .rt-fancy-text-box.element-three > .holder > .more > a, .rt-fancy-text-box.element-four > .holder > .more > a, .team.element-six .team-item > .holder .data .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn',
				),
				'opacity' => true,
				'rgba'    => true,
				'default' => array(
					'horizontal'   => '0',
					'vertical'     => '0',
					'blur'         => '20px',
					'spread'       => '0',
					'opacity'      => '0.15',
					'shadow-color' => '#000000',
					'shadow-type'  => 'outside',
					'units'        => 'px',
				),

			),

			// Button Typography.
			array(
				'id'             => 'button_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Button Typography', 'brixel' ),
				'subtitle'       => esc_html__( 'Typography options for buttons. Remember, this will effect all buttons of this theme. (Please Note: This change will effect all theme buttons, including Radiants Buttons, Radiant Contact Form Button, Radiant Fancy Text Box Button.)', 'brixel' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Poppins',
					'font-weight' => '400',
					'font-size'   => '16px',
					'color'       => '#fff',
					'line-height' => '25px',
				),
				'output'         => array(
					'.radiantthemes-button > .radiantthemes-button-main, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .rt-fancy-text-box.element-one > .holder > .more > a, .rt-fancy-text-box.element-two > .holder > .more > a, .rt-fancy-text-box.element-three > .holder > .more > a, .rt-fancy-text-box.element-four > .holder > .more > a, .team.element-six .team-item > .holder .data .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn',
				),
			),

			// Hover Font Color.
			array(
				'id'       => 'button_typography_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Hover Font Color', 'brixel' ),
				'subtitle' => esc_html__( 'Select button hover font color.', 'brixel' ),
				'default'  => '#ffffff',
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main:hover, .radiant-contact-form .form-row input[type=submit]:hover, .radiant-contact-form .form-row input[type=button]:hover, .radiant-contact-form .form-row button[type=submit]:hover, .post.style-two .post-read-more .btn:hover, .post.style-three .entry-main .post-read-more .btn:hover, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .widget-area > .widget.widget_price_filter .button:hover, .rt-fancy-text-box.element-one > .holder > .more > a:hover, .rt-fancy-text-box.element-two > .holder > .more > a:hover, .rt-fancy-text-box.element-three > .holder > .more > a:hover, .rt-fancy-text-box.element-four > .holder > .more > a:hover, .team.element-six .team-item > .holder .data .btn:hover, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn:hover, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn:hover, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn:hover, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn:hover, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn:hover',
				),
			),

			// Icon Color.
			array(
				'id'       => 'button_typography_icon',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Icon Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies only if Icon is present', 'brixel' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main i',
				),
			),

			// Hover Icon Color.
			array(
				'id'       => 'button_typography_icon_hover',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hover Icon Color', 'brixel' ),
				'subtitle' => esc_html__( 'Applies only if Icon is present', 'brixel' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main:hover i',
				),
			),
			
			// Hover Style.
			array(
				'id'       => 'button_hover_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hover Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select Hover Style of the "Button".', 'brixel' ),
				'options'  => array(
					'one'   => 'Style One (Fade)',
					'two'   => 'Style Two (Sweep Right)',
					'three' => 'Style Three (Zoom Out)',
					'four'  => 'Style Four (Fade with Icon Right)',
				),
				'default'  => 'one',
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Contact Form', 'brixel' ),
		'icon'       => 'el el-tasks',
		'id'         => 'contact_form_style',
		'subsection' => true,
		'fields'     => array(

			// Height For Input Fields.
			array(
				'id'       => 'contact_form_style_input_height',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'title'    => __( 'Height Option for Input Fields', 'brixel' ),
				'subtitle' => __( 'Users can change height for Input Fields.', 'brixel' ),
				'width'    => false,
				'height'   => true,
				'default'  => array(
					'height' => '45',
					'units'  => 'px',
				),
				'output'   => array(
					'.radiant-contact-form .form-row input[type=text], .radiant-contact-form .form-row input[type=email], .radiant-contact-form .form-row input[type=url], .radiant-contact-form .form-row input[type=tel], .radiant-contact-form .form-row input[type=number], .radiant-contact-form .form-row input[type=password], .radiant-contact-form .form-row input[type=date], .radiant-contact-form .form-row input[type=time], .radiant-contact-form .form-row select',
				),
			),

			// Height For Textarea Fields.
			array(
				'id'       => 'contact_form_style_textarea_height',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'title'    => __( 'Height Option for Textarea Fields', 'brixel' ),
				'subtitle' => __( 'Users can change height for Textarea Fields.', 'brixel' ),
				'width'    => false,
				'height'   => true,
				'default'  => array(
					'height' => '100',
					'units'  => 'px',
				),
				'output'   => array(
					'.radiant-contact-form .form-row textarea',
				),
			),

			// Padding For Input Fields Focus.
			array(
				'id'             => 'contact_form_style_input_padding_focus',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'units'          => array( 'em', 'px' ),
				'units_extended' => false,
				'title'          => esc_html__( 'Padding For Input Fields Focus', 'brixel' ),
				'subtitle'       => esc_html__( 'Users can change padding for input fields focus.', 'brixel' ),
				'default'        => array(
					'padding-top'    => '0px',
					'padding-right'  => '0px',
					'padding-bottom' => '0px',
					'padding-left'   => '0px',
					'units'          => 'px',
				),
				'output'         => array(
					'.radiant-contact-form .form-row input[type=text]:focus, .radiant-contact-form .form-row input[type=email]:focus, .radiant-contact-form .form-row input[type=url]:focus, .radiant-contact-form .form-row input[type=tel]:focus, .radiant-contact-form .form-row input[type=number]:focus, .radiant-contact-form .form-row input[type=password]:focus, .radiant-contact-form .form-row input[type=date]:focus, .radiant-contact-form .form-row input[type=time]:focus, .radiant-contact-form .form-row select:focus, .radiant-contact-form .form-row textarea:focus',
				),
			),

			// Box Shadow For Input Fields.
			array(
				'id'       => 'contact_form_style_input_box_shadow',
				'type'     => 'box_shadow',
				'title'    => esc_html__( 'Box Shadow For Input Fields', 'brixel' ),
				'subtitle' => esc_html__( 'Users can change the Box Shadow for input fields.', 'brixel' ),
				'units'    => array( 'px', 'em' ),
				'output'   => array(
					'.radiant-contact-form .form-row input[type=text], .radiant-contact-form .form-row input[type=email], .radiant-contact-form .form-row input[type=url], .radiant-contact-form .form-row input[type=tel], .radiant-contact-form .form-row input[type=number], .radiant-contact-form .form-row input[type=password], .radiant-contact-form .form-row input[type=date], .radiant-contact-form .form-row input[type=time], .radiant-contact-form .form-row select, .radiant-contact-form .form-row textarea',
				),
				'opacity'  => true,
				'rgba'     => true,
				'default'  => array(
					'horizontal'   => '0',
					'vertical'     => '0',
					'blur'         => '20px',
					'spread'       => '0',
					'opacity'      => '0.15',
					'shadow-color' => '#000000',
					'shadow-type'  => 'outside',
					'units'        => 'px',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Pages', 'brixel' ),
		'icon'  => 'el el-book',
		'id'    => 'pages-option',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Error 404', 'brixel' ),
		'icon'       => 'el el-error',
		'id'         => '404_error',
		'subsection' => true,
		'fields'     => array(

			// 404 Error Padding.
			array(
				'id'             => '404_error_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( '404 Error Padding', 'brixel' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '190px',
					'padding-bottom' => '200px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_error_main > .container',
				),
			),
			
			// 404 Error Background.
			array(
				'id'       => '404_error_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for 404 Page.', 'brixel' ),
				'default'  => array(
					'background-color'      => '#0c0c0c',
					'background-repeat'     => 'no-repeat',
					'background-size'       => 'cover',
					'background-attachment' => 'inherit',
					'background-position'   => 'center-top',
				),
				'output'   => array(
					'.wraper_error_main',
				),
			),
			
			// 404 Error Image.
			array(
				'id'       => '404_error_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'brixel' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website.', 'brixel' ),
			),

			// 404 Error Content.
			array(
				'id'       => '404_error_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'brixel' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body.', 'brixel' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Oops Sorry!</h1><h2>The Page You Are Looking For Isn't Here</h2>",
			),

		),
	)
);
Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Maintenance Mode', 'brixel' ),
		'icon'       => 'el el-broom',
		'id'         => 'maintenance_mode',
		'subsection' => true,
		'fields'     => array(

			// Maintenance Mode Switch.
			array(
				'id'       => 'maintenance_mode_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Maintenance Mode?', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if want to Activate Maintenance Mode.', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),

			// Maintenance Mode Background Property.
			array(
				'id'       => 'maintenance_mode_background_property',
				'type'     => 'background',
				'title'    => esc_html__( 'Page Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Maintenance Mode Page.', 'brixel' ),
				'default'  => array(
					'background-color'      => '#0c0c0c',
					'background-repeat'     => 'no-repeat',
					'background-size'       => 'cover',
					'background-attachment' => 'inherit',
					'background-position'   => 'center-top',
				),
				'output'   => array(
					'body.rt-maintenance-mode',
				),
				'required' => array(
					array(
						'maintenance_mode_switch',
						'equals',
						true,
					),
				),
			),

			// Maintenance Mode Content Body.
			array(
				'id'       => 'maintenance_mode_content_body',
				'type'     => 'editor',
				'title'    => esc_html__( 'Content Body', 'brixel' ),
				'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode page.', 'brixel' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => '<h1>Maintenance Mode</h1><h2>Our website is going under maintenance. We will be back very soon!.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',
				'required' => array(
					array(
						'maintenance_mode_switch',
						'equals',
						true,
					),
				),
			),

			// Maintenance Mode Progress Bar Switch.
			array(
				'id'       => 'maintenance_mode_progressbar_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Progress Bar?', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if want to Activate Progress Bar.', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => true,
				'required' => array(
					array(
						'maintenance_mode_switch',
						'equals',
						true,
					),
				),
			),

			// Maintenance Mode Progress Bar Width.
			array(
				'id'            => 'maintenance_mode_progressbar_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Progress Bar Width', 'brixel' ),
				'subtitle'      => esc_html__( 'Select Progress Bar Width. Min is 0%, Max is 100% and Default is 30%.', 'brixel' ),
				'default'       => 30,
				'min'           => 0,
				'step'          => 10,
				'max'           => 100,
				'display_value' => 'text',
				'required'      => array(
					array(
						'maintenance_mode_switch',
						'equals',
						true,
					),
					array(
						'maintenance_mode_progressbar_switch',
						'equals',
						true,
					),
				),
			),

			// Maintenance Mode Progress Bar Height.
			array(
				'id'       => 'maintenance_mode_progressbar_height',
				'type'     => 'dimensions',
				'units'    => array( 'px' ),
				'title'    => esc_html__( 'Progress Bar Height', 'brixel' ),
				'subtitle' => esc_html__( 'Select Progress Bar Height.', 'brixel' ),
				'width'    => false,
				'height'   => true,
				'default'  => array(
					'height' => '30',
				),
				'required' => array(
					array(
						'maintenance_mode_switch',
						'equals',
						true,
					),
					array(
						'maintenance_mode_progressbar_switch',
						'equals',
						true,
					),
				),
			),
		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Coming Soon', 'brixel' ),
		'icon'       => 'el el-warning-sign',
		'id'         => 'coming_soon',
		'subsection' => true,
		'fields'     => array(

			// Coming Soon Switch.
			array(
				'id'       => 'coming_soon_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Coming Soon', 'brixel' ),
				'subtitle' => esc_html__( 'Choose if want to activate Coming Soon mode.', 'brixel' ),
				'on'       => esc_html__( 'Yes', 'brixel' ),
				'off'      => esc_html__( 'No', 'brixel' ),
				'default'  => false,
			),

			// Coming Soon Custom Background Style.
			array(
				'id'       => 'coming_soon_custom_background_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Coming Soon Page Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select the Coming Soon Page Style.', 'brixel' ),
				'options'  => array(
					'style-one' => 'Dark Theme',
					'style-two' => 'Light Theme',
				),
				'default'  => 'style-one',
				'required' => array(
					array(
						'coming_soon_switch',
						'equals',
						true,
					),
				),
			),

			// Coming Soon Background Property.
			array(
				'id'       => 'coming_soon_background_property',
				'type'     => 'background',
				'title'    => esc_html__( 'Page Background', 'brixel' ),
				'subtitle' => esc_html__( 'Set Background for Coming Soon Page.', 'brixel' ),
				'default'  => array(
					'background-color'      => '#0c0c0c',
					'background-repeat'     => 'no-repeat',
					'background-size'       => 'cover',
					'background-attachment' => 'inherit',
					'background-position'   => 'center-top',
				),
				'output'   => array(
					'body.rt-coming-soon.coming-soon-style-one, body.rt-coming-soon.coming-soon-style-two',
				),
				'required' => array(
					array(
						'coming_soon_switch',
						'equals',
						true,
					),
				),
			),

			// Coming Soon Content Body.
			array(
				'id'       => 'coming_soon_body',
				'type'     => 'editor',
				'title'    => esc_html__( 'Content Body', 'brixel' ),
				'subtitle' => esc_html__( 'Enter content to show on Coming Soon page.', 'brixel' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => '<h1>The Site will be Launching shortly... Perfect and awesome template to present your future product or service. Hooking audience attention is all in the opener.</h1>',
				'required' => array(
					array(
						'coming_soon_switch',
						'equals',
						true,
					),
				),
			),

			// Coming Soon Launch Date-Time.
			array(
				'id'       => 'coming_soon_datetime',
				'type'     => 'text',
				'title'    => esc_html__( 'Launch Date & Time', 'brixel' ),
				'subtitle' => esc_html__( 'Enter Launch Date & Time.', 'brixel' ),
				'default'  => '2018-05-22 12:00',
				'required' => array(
					array(
						'coming_soon_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);
Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Search', 'brixel' ),
		'icon'       => 'el el-search-alt',
		'id'         => 'search',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'search_page_banner_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Search Page Banner Image', 'brixel' ),
				'subtitle' => esc_html__( 'Select search page banner image', 'brixel' ),
			),

			array(
				'id'       => 'search_page_banner_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Page Title', 'brixel' ),
				'subtitle' => esc_html__( 'Enter search page banner title', 'brixel' ),
				'default'  => 'Search',
			),

		),
	)
);
if ( class_exists( 'Tribe__Events__Main' ) ) {
Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Event', 'brixel' ),
		'icon'       => 'el el-calendar',
		'id'         => 'banner_layout',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'events_banner_details',
				'type'     => 'select',
				'title'    => esc_html__( 'Banner Details', 'brixel' ),
				'subtitle' => esc_html__( 'Select Banner options', 'brixel' ),
				'options'  => array(
					'banner-breadcumbs'    => 'Short Banner With Breadcumbs',
					'banner-only'          => 'Short Banner Only',
					'breadcumbs-only'      => 'Breadcumbs Only',
					'none'                 => 'None',
				),
				'default'  => 'banner-breadcumbs',
			),
			array(
				'id'       => 'event_banner_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Event Banner Image', 'brixel' ),
				'subtitle' => esc_html__( 'Select event banner image', 'brixel' ),
				'required' => array(
					array(
						'events_banner_details',
						'!=',
						'none',
					),
					array(
						'events_banner_details',
						'!=',
						'breadcumbs-only',
					),
				),
			),
			array(
				'id'       => 'event_banner_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Event Title', 'brixel' ),
				'subtitle' => esc_html__( 'Enter event banner title', 'brixel' ),
				'default'  => 'Events',
				'required' => array(
					array(
						'events_banner_details',
						'!=',
						'none',
					),
					array(
						'events_banner_details',
						'!=',
						'breadcumbs-only',
					),
				),
			),
		),
	)
);
}
Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Blog', 'brixel' ),
		'icon'  => 'el el-bullhorn',
		'id'    => 'blog',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Blog Layout', 'brixel' ),
		'icon'       => 'el el-check-empty',
		'id'         => 'blog_layout',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'blog-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Style', 'brixel' ),
				'subtitle' => esc_html__( 'Select blog style', 'brixel' ),
				'options'  => array(
					'default'   => array(
						'alt'   => 'Default',
						'img'  => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Default.png',
						'title' => esc_html__( 'Default', 'brixel' ),
					),
					'one'   => array(
						'alt' => 'Classic',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Classic.png',
						'title' => esc_html__( 'Classic', 'brixel' ),
					),
					'two'   => array(
						'alt' => 'Masonry',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Masonry.png',
						'title' => esc_html__( 'Masonry', 'brixel' ),
					),
					'three' => array(
						'alt' => 'List',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-List.png',
						'title' => esc_html__( 'List', 'brixel' ),
					),
					'four' => array(
						'alt' => 'Masonry (No Image)',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-List-No-Image.png',
						'title' => esc_html__( 'List (No Image)', 'brixel' ),
					),
					'five' => array(
						'alt' => 'Metro',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Metro.png',
						'title' => esc_html__( 'Metro', 'brixel' ),
					),
				),
				'default'  => 'default',
			),

			array(
				'id'       => 'blog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Layout', 'brixel' ),
				'subtitle' => esc_html__( 'Select blog layout', 'brixel' ),
				'options'  => array(
					'leftsidebar'  => array(
						'alt' => 'Left Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-Left-Sidebar.png',
					),
					'nosidebar'    => array(
						'alt' => 'No Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-No-Sidebar.png',
					),
					'rightsidebar' => array(
						'alt' => 'Right Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-Right-Sidebar.png',
					),
				),
				'default'  => 'rightsidebar',
				'required' => array(
					array(
						'blog-style',
						'!=',
						'five',
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Blog Options', 'brixel' ),
		'icon'       => 'el el-ok-sign',
		'id'         => 'blog_options',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'blog_comment_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Comments', 'brixel' ),
				'subtitle' => esc_html__( 'Do you want to enable comments on blog details page?', 'brixel' ),
				'default'  => true,
			),

		),
	)
);

if ( class_exists( 'woocommerce' ) ) {

	Redux::setSection(
		$opt_name, array(
			'title' => esc_html__( 'Shop', 'brixel' ),
			'icon'  => 'el el-shopping-cart',
			'id'    => 'shop',
		)
	);

	Redux::setSection(
		$opt_name, array(
			'title'      => esc_html__( 'Product Listing', 'brixel' ),
			'icon'       => 'el el-list-alt',
			'id'         => 'product_listing',
			'subsection' => true,
			'fields'     => array(

				// Product Listing Layout.
				array(
					'id'       => 'shop-style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Listing Layout', 'brixel' ),
					'subtitle' => esc_html__( 'Select Product Listing Layout', 'brixel' ),
					'options'  => array(
						'shop-one' => array(
							'alt'   => 'Style One',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-One.jpg',
						),
						'shop-two' => array(
							'alt'   => 'Style Two',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Two.jpg',
						),
					),
					'default'  => 'shop-one',
				),

				// Sidebar.
				array(
					'id'       => 'shop-sidebar',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar.', 'brixel' ),
					'subtitle' => esc_html__( 'Select Sidebar', 'brixel' ),
					'options'  => array(
						'shop-leftsidebar'  => array(
							'alt' => 'Left Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-Left-Sidebar.jpg',
						),
						'shop-nosidebar'    => array(
							'alt' => 'No Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-No-Sidebar.jpg',
						),
						'shop-rightsidebar' => array(
							'alt' => 'Right Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-Right-Sidebar.jpg',
						),
					),
					'default'  => 'shop-leftsidebar',
				),

				// Shop Box Style.
				array(
					'id'       => 'shop_box_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Shop Box Style', 'brixel' ),
					'subtitle' => esc_html__( 'Select Style of the Shop Box.', 'brixel' ),
					'options'  => array(
						'style-one'  => array(
							'alt' => 'Style One',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-One.jpg',
						),
						'style-two' => array(
							'alt' => 'Style Two',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Two.jpg',
						),
						'style-three' => array(
							'alt' => 'Style Three',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Three.jpg',
						),
						'style-four' => array(
							'alt' => 'Style Four',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Four.jpg',
						),
					),
					'default'  => 'style-one',
				),

			),
		)
	);

	Redux::setSection(
		$opt_name, array(
			'title'      => esc_html__( 'Product Details', 'brixel' ),
			'icon'       => 'el el-shopping-cart',
			'id'         => 'product_details',
			'subsection' => true,
			'fields'     => array(

				array(
					'id'       => 'shop-details-sidebar',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar', 'brixel' ),
					'subtitle' => esc_html__( 'Select Sidebar', 'brixel' ),
					'options'  => array(
						'shop-details-leftsidebar'  => array(
							'alt'   => 'Left Sidebar',
							'title' => 'Left Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-Left-Sidebar.jpg',
						),
						'shop-details-nosidebar'    => array(
							'alt'   => 'No Sidebar',
							'title' => 'No Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-No-Sidebar.jpg',
						),
						'shop-details-rightsidebar' => array(
							'alt'   => 'Right Sidebar',
							'title' => 'Right Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-Right-Sidebar.jpg',
						),
					),
					'default'  => 'shop-details-leftsidebar',
				),

			),
		)
	);

}

Redux::setSection(
	$opt_name, array(
		'title'   => esc_html__( 'Social Icons', 'brixel' ),
		'icon'    => 'el el-globe',
		'id'      => 'social_icons',
		'submenu' => false,
		'fields'  => array(

			// Open social links in new window.
			array(
				'id'      => 'social-icon-target',
				'type'    => 'switch',
				'title'   => esc_html__( 'Open links in new window', 'brixel' ),
				'desc'    => esc_html__( 'Open social links in new window', 'brixel' ),
				'default' => true,
			),

			// Google +.
			array(
				'id'      => 'social-icon-googleplus',
				'type'    => 'text',
				'title'   => esc_html__( 'Google +', 'brixel' ),
				'desc'    => esc_html__( 'Link to the profile page', 'brixel' ),
				'default' => 'https://plus.google.com',
			),

			// Facebook.
			array(
				'id'      => 'social-icon-facebook',
				'type'    => 'text',
				'title'   => esc_html__( 'Facebook', 'brixel' ),
				'desc'    => esc_html__( 'Link to the profile page', 'brixel' ),
				'default' => 'https://facebook.com',
			),

			// Twitter.
			array(
				'id'      => 'social-icon-twitter',
				'type'    => 'text',
				'title'   => esc_html__( 'Twitter', 'brixel' ),
				'desc'    => esc_html__( 'Link to the profile page', 'brixel' ),
				'default' => 'https://twitter.com',
			),

			// Vimeo.
			array(
				'id'      => 'social-icon-vimeo',
				'type'    => 'text',
				'title'   => esc_html__( 'Vimeo', 'brixel' ),
				'desc'    => esc_html__( 'Link to the profile page', 'brixel' ),
				'default' => 'https://vimeo.com',
			),

			// YouTube.
			array(
				'id'    => 'social-icon-youtube',
				'type'  => 'text',
				'title' => esc_html__( 'YouTube', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Flickr.
			array(
				'id'    => 'social-icon-flickr',
				'type'  => 'text',
				'title' => esc_html__( 'Flickr', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// LinkedIn.
			array(
				'id'    => 'social-icon-linkedin',
				'type'  => 'text',
				'title' => esc_html__( 'LinkedIn', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Pinterest.
			array(
				'id'    => 'social-icon-pinterest',
				'type'  => 'text',
				'title' => esc_html__( 'Pinterest', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Xing.
			array(
				'id'    => 'social-icon-xing',
				'type'  => 'text',
				'title' => esc_html__( 'Xing', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Viadeo.
			array(
				'id'    => 'social-icon-viadeo',
				'type'  => 'text',
				'title' => esc_html__( 'Viadeo', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Vkontakte.
			array(
				'id'    => 'social-icon-vkontakte',
				'type'  => 'text',
				'title' => esc_html__( 'Vkontakte', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Tripadvisor.
			array(
				'id'    => 'social-icon-tripadvisor',
				'type'  => 'text',
				'title' => esc_html__( 'Tripadvisor', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Tumblr.
			array(
				'id'    => 'social-icon-tumblr',
				'type'  => 'text',
				'title' => esc_html__( 'Tumblr', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Behance.
			array(
				'id'    => 'social-icon-behance',
				'type'  => 'text',
				'title' => esc_html__( 'Behance', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Instagram.
			array(
				'id'    => 'social-icon-instagram',
				'type'  => 'text',
				'title' => esc_html__( 'Instagram', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Dribbble.
			array(
				'id'    => 'social-icon-dribbble',
				'type'  => 'text',
				'title' => esc_html__( 'Dribbble', 'brixel' ),
				'desc'  => esc_html__( 'Link to the profile page', 'brixel' ),
			),

			// Skype.
			array(
				'id'    => 'social-icon-skype',
				'type'  => 'text',
				'title' => esc_html__( 'Skype', 'brixel' ),
				'desc'  => wp_kses_post( 'Skype login. You can use <strong>callto:</strong> or <strong>skype:</strong> prefix' ),
			),

		),
	)
);

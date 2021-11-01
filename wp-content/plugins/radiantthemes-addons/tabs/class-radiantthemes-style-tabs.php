<?php
/**
 * Radiant Tabs Addon
 *
 * @package Radiantthemes
 */

if ( ! class_exists( 'RadiantThemes_Style_Tabs' ) ) {
	/**
	 * Class definition.
	 */
	class RadiantThemes_Style_Tabs {
		/**
		 * [$tabsstyle description]
		 *
		 * @var [type]
		 */
		private $tabsstyle;
		/**
		 * [$titlebg description]
		 *
		 * @var [type]
		 */
		private $titlebg;
		/**
		 * [$titlecolor description]
		 *
		 * @var [type]
		 */
		private $titlecolor;
		/**
		 * [$titlehoverbg description]
		 *
		 * @var [type]
		 */
		private $titlehoverbg;
		/**
		 * [$content_str description]
		 *
		 * @var [type]
		 */
		private $content_str;
		/**
		 * [$menu_str description]
		 *
		 * @var string
		 */
		private $menu_str = '';
		/**
		 * [$titlehovercolor description]
		 *
		 * @var [type]
		 */
		private $titlehovercolor;

		/**
		 * [$tab_text_alignment description]
		 *
		 * @var [type]
		 */
		private $tab_text_alignment;

		/**
		 * [$tab_border_radius description]
		 *
		 * @var [type]
		 */
		private $tab_border_radius;

		/**
		 * [$tab_border_left description]
		 *
		 * @var [type]
		 */
		private $tab_border_left;

		/**
		 * [$tab_border_top description]
		 *
		 * @var [type]
		 */
		private $tab_border_top;

		/**
		 * [$tab_border_right description]
		 *
		 * @var [type]
		 */
		private $tab_border_right;

		/**
		 * [$tab_border_bottom description]
		 *
		 * @var [type]
		 */
		private $tab_border_bottom;

		/**
		 * [$tab_border_style description]
		 *
		 * @var [type]
		 */
		private $tab_border_style;

		/**
		 * [$radiant_tab_id description]
		 *
		 * @var [type]
		 */
		private $radiant_tab_id;

		/**
		 * [__construct description]
		 */
		public function __construct() {
			vc_map(
				array(
					'name'        => esc_html__( 'Tabs', 'radiantthemes-addons' ),
					'base'        => 'rt_tab_style',
					'icon'        => plugins_url( 'radiantthemes-addons/tabs/icon/Tabs-Element-Icon.png' ),
					'class'       => 'wpb_rt_vc_extension_tab_style',
					'controls'    => 'full',
					'category'    => esc_html__( 'Radiant Elements', 'radiantthemes-addons' ),
					'as_parent'   => array(
						'only' => 'rt_tab_style_item',
					),
					'js_view'     => 'VcColumnView',
					'description' => esc_html__( 'Tabbed Content', 'radiantthemes-addons' ),
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Select Tabs Style', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_tabsstyle',
							'value'       => array(
								esc_html__( 'Style One (Customizable)', 'radiantthemes-addons' )   => 'one',
								esc_html__( 'Style Two (Horizontal)', 'radiantthemes-addons' )     => 'two',
								esc_html__( 'Style Three (Horizontal)', 'radiantthemes-addons' )   => 'three',
								esc_html__( 'Style Four (Horizontal)', 'radiantthemes-addons' )    => 'four',
								esc_html__( 'Style Five (Horizontal)', 'radiantthemes-addons' )    => 'five',
								esc_html__( 'Style Six (Vertical)', 'radiantthemes-addons' )       => 'six',
								esc_html__( 'Style Seven (Horizontal)', 'radiantthemes-addons' )   => 'seven',
								esc_html__( 'Style Eight (Horizontal)', 'radiantthemes-addons' )   => 'eight',
								esc_html__( 'Style Nine (Horizontal)', 'radiantthemes-addons' )    => 'nine',
							),
							'std'         => 'one',
							'admin_label' => true,
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Tab Text Alignment', 'radiantthemes-addons' ),
							'param_name' => 'tab_text_alignment',
							'std'        => 'left',
							'group'       => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'value'      => array(
								esc_html__( 'Left', 'radiantthemes-addons' )   => 'left',
								esc_html__( 'Center', 'radiantthemes-addons' ) => 'center',
								esc_html__( 'Right', 'radiantthemes-addons' )  => 'right',
							),
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Left', 'radiantthemes-addons' ),
							'param_name'       => 'tab_border_left',
							'group'            => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'admin_label'      => true,
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0',
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Top', 'radiantthemes-addons' ),
							'param_name'       => 'tab_border_top',
							'group'            => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'admin_label'      => true,
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0',
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Right', 'radiantthemes-addons' ),
							'param_name'       => 'tab_border_right',
							'group'            => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'admin_label'      => true,
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0',
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Bottom', 'radiantthemes-addons' ),
							'param_name'       => 'tab_border_bottom',
							'group'       => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'admin_label'      => true,
							'edit_field_class' => 'vc_col-xs-3 vc_column',
							'value'            => '0',
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => esc_html__( 'Border Style', 'radiantthemes-addons' ),
							'param_name'       => 'tab_border_style',
							'std'              => 'solid',
							'group'            => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => array(
								esc_html__( 'Theme Defaults', 'radiantthemes-addons' ) => '',
								esc_html__( 'Solid', 'radiantthemes-addons' )          => 'solid',
								esc_html__( 'Dotted', 'radiantthemes-addons' )         => 'dotted',
								esc_html__( 'Dashed', 'radiantthemes-addons' )         => 'dashed',
								esc_html__( 'None', 'radiantthemes-addons' )           => 'none',
								esc_html__( 'Hidden', 'radiantthemes-addons' )         => 'hidden',
								esc_html__( 'Double', 'radiantthemes-addons' )         => 'double',
								esc_html__( 'Groove', 'radiantthemes-addons' )         => 'groove',
								esc_html__( 'Ridge', 'radiantthemes-addons' )          => 'ridge',
								esc_html__( 'Inset', 'radiantthemes-addons' )          => 'inset',
								esc_html__( 'Outset', 'radiantthemes-addons' )         => 'outset',
								esc_html__( 'Initial', 'radiantthemes-addons' )        => 'initial',
								esc_html__( 'Inherit', 'radiantthemes-addons' )        => 'inherit',
							),
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'             => 'textfield',
							'heading'          => esc_html__( 'Border Radius', 'radiantthemes-addons' ),
							'param_name'       => 'tab_border_radius',
							'group'            => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'edit_field_class' => 'vc_col-xs-6 vc_column',
							'value'            => '0',
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Tab Menu Color', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_titlecolor',
							'description' => esc_html__( 'The font color of tab in normal mode.', 'radiantthemes-addons' ),
							'group'       => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'admin_label' => true,
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Tab Menu Background Color', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_titlebg',
							'description' => esc_html__( 'The background color of tab in normal mode.', 'radiantthemes-addons' ),
							'group'       => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'admin_label' => true,
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Tab Menu Hover Font Color', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_titlehovercolor',
							'description' => esc_html__( 'The font color of tab when user hover or in current mode.', 'radiantthemes-addons' ),
							'group'       => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'admin_label' => true,
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html__( 'Tab Menu Background Hover Color', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_titlehoverbg',
							'description' => esc_html__( 'The background color of tab when user hover or in current mode.', 'radiantthemes-addons' ),
							'group'       => esc_html__( 'Typography & Color', 'radiantthemes-addons' ),
							'admin_label' => true,
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Container Width', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_containerwidth',
							'description' => esc_html__( 'The width of the whole contaienr, default is 100%. You can specify it with a smaller value, like 80%, and it will align center automatically.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__( 'Tab Width Auto Adjust', 'radiantthemes-addons' ),
							'param_name' => 'radiant_tab_adjust',
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
							'param_name' => 'tab_menu_css',
							'group'      => esc_html__( 'Tab Menu Design', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),

						),
						array(
							'type'       => 'css_editor',
							'heading'    => esc_html__( 'CSS', 'radiantthemes-addons' ),
							'param_name' => 'tab_content_css',
							'group'      => esc_html__( 'Tab Content Design', 'radiantthemes-addons' ),
							'dependency' => array(
								'element' => 'radiant_tabsstyle',
								'value'   => 'one',
							),
						),
					),
				)
			);

			vc_map(
				array(
					'name'                    => esc_html__( 'Tab Item', 'radiantthemes-addons' ),
					'base'                    => 'rt_tab_style_item',
					'description'             => esc_html__( 'Add the title and content', 'radiantthemes-addons' ),
					'as_child'                => array(
						'only' => 'rt_tab_style',
					),
					'show_settings_on_create' => true,
					'content_element'         => true,
					'params'                  => array(
						array(
							'type'       => 'checkbox',
							'heading'    => esc_html__( 'Display Icons?', 'radiantthemes-addons' ),
							'param_name' => 'radiant_display_icon',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Icon library', 'radiantthemes-addons' ),
							'value'       => array(
								esc_html__( 'Font Awesome', 'radiantthemes-addons' ) => 'fontawesome',
								esc_html__( 'Entypo', 'radiantthemes-addons' )       => 'entypo',
								esc_html__( 'Open Iconic', 'radiantthemes-addons' )  => 'openiconic',
								esc_html__( 'Typicons', 'radiantthemes-addons' )     => 'typicons',
								esc_html__( 'Linecons', 'radiantthemes-addons' )     => 'linecons',
								esc_html__( 'Material', 'radiantthemes-addons' )     => 'material',
							),
							'admin_label' => true,
							'param_name'  => 'radiant_tabicon',
							'description' => esc_html__( 'Select icon library.', 'radiantthemes-addons' ),
							'dependency'  => array(
								'element' => 'radiant_display_icon',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_icon_fontawesome',
							'settings'    => array(
								'emptyIcon'    => true,
								'type'         => 'fontawesome',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'radiant_tabicon',
								'value'   => 'fontawesome',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_icon_openiconic',
							'value'       => 'vc-oi vc-oi-dial',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'openiconic',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'radiant_tabicon',
								'value'   => 'openiconic',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_icon_typicons',
							'value'       => 'typcn typcn-adjust-brightness',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'typicons',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'radiant_tabicon',
								'value'   => 'typicons',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_icon_entypo',
							'value'       => 'entypo-icon entypo-icon-user',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'entypo',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'radiant_tabicon',
								'value'   => 'entypo',
							),
							'admin_label' => true,
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_icon_linecons',
							'value'       => 'vc_li vc_li-heart',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'linecons',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'radiant_tabicon',
								'value'   => 'linecons',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__( 'Icon', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_icon_material',
							'value'       => 'vc-material vc-material-cake',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'material',
								'iconsPerPage' => 4000,
							),
							'dependency'  => array(
								'element' => 'radiant_tabicon',
								'value'   => 'material',
							),
							'description' => esc_html__( 'Select icon from library.', 'radiantthemes-addons' ),
							'admin_label' => true,
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Tab Title', 'radiantthemes-addons' ),
							'param_name'  => 'radiant_tabtitle',
							'admin_label' => true,
						),
						array(
							'type'       => 'textarea_html',
							'holder'     => 'div',
							'heading'    => esc_html__( 'Tab Content', 'radiantthemes-addons' ),
							'param_name' => 'content',
						),
						array(
							'type'       => 'tab_id',
							'heading'    => esc_html__( 'Tab ID', 'radiantthemes-addons' ),
							'param_name' => 'radiant_tab_id',
						),
					),
				)
			);
			add_shortcode( 'rt_tab_style', array( $this, 'radiantthemes_tab_style_func' ) );
			add_shortcode( 'rt_tab_style_item', array( $this, 'radiantthemes_tab_style_item_func' ) );
		}

		/**
		 * [radiantthemes_tab_style_func description]
		 *
		 * @param  [type] $atts    description.
		 * @param  [type] $content description.
		 * @param  [type] $tag     description.
		 * @return [type]          description.
		 */
		public function radiantthemes_tab_style_func( $atts, $content = null, $tag ) {
			$tabsstyle          = '';
			$titlebg            = '';
			$tab_text_alignment = '';
			$tab_border_left    = '';
			$tab_border_top     = '';
			$tab_border_right   = '';
			$tab_border_bottom  = '';
			$tab_border_style   = '';
			$tab_border_radius  = '';
			$titlecolor         = '';
			$titlehoverbg       = '';
			$contentbg          = '';
			$contentcolor       = '';
			$titlehovercolor    = '';

			$shortcode = shortcode_atts(
				array(
					'radiant_tabsstyle'       => 'one',
					'radiant_contentcolor'    => '',
					'radiant_contentbg'       => '',
					'tab_text_alignment'      => 'left',
					'tab_border_radius'       => '0',
					'tab_border_left'         => '0',
					'tab_border_top'          => '0',
					'tab_border_right'        => '0',
					'tab_border_bottom'       => '0',
					'tab_border_style'        => 'solid',
					'radiant_titlecolor'      => '',
					'radiant_titlebg'         => '',
					'radiant_titlehovercolor' => '',
					'radiant_titlehoverbg'    => '',
					'radiant_containerwidth'  => '',
					'radiant_tab_adjust'      => '',
					'radiant_extra_class'     => '',
					'radiant_extra_id'        => '',
					'tab_menu_css'            => '',
					'tab_content_css'         => '',
				), $atts
			);

			$this->tabsstyle          = $shortcode['radiant_tabsstyle'];
			$this->titlebg            = $shortcode['radiant_titlebg'];
			$this->tab_text_alignment = $shortcode['tab_text_alignment'];
			$this->tab_border_left    = $shortcode['tab_border_left'];
			$this->tab_border_top     = $shortcode['tab_border_top'];
			$this->tab_border_right   = $shortcode['tab_border_right'];
			$this->tab_border_bottom  = $shortcode['tab_border_bottom'];
			$this->tab_border_style   = $shortcode['tab_border_style'];
			$this->tab_border_radius  = $shortcode['tab_border_radius'];
			$this->titlecolor         = $shortcode['radiant_titlecolor'];
			$this->titlehoverbg       = $shortcode['radiant_titlehoverbg'];
			$this->contentbg          = $shortcode['radiant_contentbg'];
			$this->contentcolor       = $shortcode['radiant_contentcolor'];
			$this->titlehovercolor    = $shortcode['radiant_titlehovercolor'];
			$this->menu_str           = '';

			wp_register_style(
				'radiantthemes_tabs_' . $shortcode['radiant_tabsstyle'],
				plugins_url( 'radiantthemes-addons/tabs/css/radiantthemes-tab-element-' . $shortcode['radiant_tabsstyle'] . '.css' )
			);
			wp_enqueue_style( 'radiantthemes_tabs_' . $shortcode['radiant_tabsstyle'] );

			wp_register_script(
				'radiantthemes_tabs_script_' . $shortcode['radiant_tabsstyle'],
				plugins_url( 'radiantthemes-addons/tabs/js/radiantthemes-tab-element-' . $shortcode['radiant_tabsstyle'] . '.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script( 'radiantthemes_tabs_script_' . $shortcode['radiant_tabsstyle'] );

			$i = -1;

			$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content.

			$output            = '';
			$all_start         = '';
			$all_end           = '';
			$menu_start        = '';
			$menu_content      = '';
			$menu_end          = '';
			$container_start   = '';
			$container_content = '';
			$container_end     = '';

			$tab_id = $shortcode['radiant_extra_id'] ? 'id="' . esc_attr( $shortcode['radiant_extra_id'] ) . '"' : '';

			$radiant_tab_width_adjust = ( 'true' == $shortcode['radiant_tab_adjust'] ) ? 'nav-justified' : '';

			$tab_menu_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['tab_menu_css'], ' ' ), $atts );

			$tab_content_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $shortcode['tab_content_css'], ' ' ), $atts );

			$output .= '<div class="rt-tab element-' . esc_attr( $shortcode['radiant_tabsstyle'] ) . ' rt-' . esc_attr( $this->radiant_tab_id ) . ' ' . esc_attr( $shortcode['radiant_extra_class'] ) . '" ' . $tab_id . ' style="width:' . esc_attr( $shortcode['radiant_containerwidth'] ) . '">';

			$output .= '<ul class="nav-tabs ' . esc_attr( $radiant_tab_width_adjust ) . esc_attr( $tab_menu_css ) . '">';
			$output .= $this->menu_str;
			$output .= '</ul>';

			$output .= '<div class="tab-content ' . esc_attr( $tab_content_css ) . '">';
			$output .= do_shortcode( $content );
			$output .= '</div>';
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
		public function radiantthemes_tab_style_item_func( $atts, $content = null, $tag ) {
			$tabicon          = '';
			$icon_fontawesome = '';
			$icon_openiconic  = '';
			$icon_typicons    = '';
			$icon_entypo      = '';
			$icon_linecons    = '';
			$icon_pixelicons  = '';
			$icon_material    = '';
			$icon_monosocial  = '';
			$radiant_tab_id   = '';
			$border_radius    = '';
			$border_top       = '';
			$border_right     = '';
			$border_bottom    = '';
			$border_left      = '';

			$shortcode = shortcode_atts(
				array(
					'radiant_display_icon'     => '',
					'radiant_tabicon'          => 'fontawesome',
					'radiant_icon_fontawesome' => '',
					'radiant_icon_openiconic'  => 'vc-oi vc-oi-dial',
					'radiant_icon_typicons'    => 'typcn typcn-adjust-brightness',
					'radiant_icon_entypo'      => 'entypo-icon entypo-icon-user',
					'radiant_icon_linecons'    => 'vc_li vc_li-heart',
					'radiant_icon_material'    => 'vc-material vc-material-cake',
					'radiant_icon_pixelicons'  => '',
					'radiant_icon_monosocial'  => '',
					'radiant_tabtitle'         => '',
					'radiant_tab_id'           => '',
				), $atts
			);

			$this->radiant_tab_id = $shortcode['radiant_tab_id'];

			// allowed metrics: http://www.w3schools.com/cssref/css_units.asp.
			$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';

			if ( ! empty( $this->tab_border_radius ) ) {
				$this->tab_border_radius = preg_replace( '/\s+/', '', $this->tab_border_radius );
				$regexr_font_size        = preg_match( $pattern, $this->tab_border_radius, $matches );
				$this->tab_border_radius = isset( $matches[1] ) ? (float) $matches[1] : (float) $this->tab_border_radius;
				$unit                    = isset( $matches[2] ) ? $matches[2] : 'px';
				$this->tab_border_radius = $this->tab_border_radius . $unit;
				$border_radius           = $this->tab_border_radius;
			} else {
				$border_radius = '0';
			}
			if ( ! empty( $this->tab_border_left ) ) {
				$this->tab_border_left = preg_replace( '/\s+/', '', $this->tab_border_left );
				$regexr_font_size      = preg_match( $pattern, $this->tab_border_left, $matches );
				$this->tab_border_left = isset( $matches[1] ) ? (float) $matches[1] : (float) $this->tab_border_left;
				$unit                  = isset( $matches[2] ) ? $matches[2] : 'px';
				$this->tab_border_left = $this->tab_border_left . $unit;
				$border_left           = $this->tab_border_left;
			} else {
				$border_left = '0';
			}
			if ( ! empty( $this->tab_border_top ) ) {
				$this->tab_border_top = preg_replace( '/\s+/', '', $this->tab_border_top );
				$regexr_font_size     = preg_match( $pattern, $this->tab_border_top, $matches );
				$this->tab_border_top = isset( $matches[1] ) ? (float) $matches[1] : (float) $this->tab_border_top;
				$unit                 = isset( $matches[2] ) ? $matches[2] : 'px';
				$this->tab_border_top = $this->tab_border_top . $unit;
				$border_top           = $this->tab_border_top;
			} else {
				$border_top = '0';
			}
			if ( ! empty( $this->tab_border_right ) ) {
				$this->tab_border_right = preg_replace( '/\s+/', '', $this->tab_border_right );
				$regexr_font_size       = preg_match( $pattern, $this->tab_border_right, $matches );
				$this->tab_border_right = isset( $matches[1] ) ? (float) $matches[1] : (float) $this->tab_border_right;
				$unit                   = isset( $matches[2] ) ? $matches[2] : 'px';
				$this->tab_border_right = $this->tab_border_right . $unit;
				$border_right           = $this->tab_border_right;
			} else {
				$border_right = '0';
			}
			if ( ! empty( $this->tab_border_bottom ) ) {
				$this->tab_border_bottom = preg_replace( '/\s+/', '', $this->tab_border_bottom );
				$regexr_font_size        = preg_match( $pattern, $this->tab_border_bottom, $matches );
				$this->tab_border_bottom = isset( $matches[1] ) ? (float) $matches[1] : (float) $this->tab_border_bottom;
				$unit                    = isset( $matches[2] ) ? $matches[2] : 'px';
				$this->tab_border_bottom = $this->tab_border_bottom . $unit;
				$border_bottom           = $this->tab_border_bottom;
			} else {
				$border_bottom = '0';
			}

			$custom_css = ".rt-tab.element-one.rt-{$shortcode['radiant_tab_id']} > ul.nav-tabs > li > a{ background-color: {$this->titlebg}; border-top-width: {$border_top}; border-right-width: {$border_right}; border-bottom-width: {$border_bottom}; border-left-width: {$border_left}; border-style: {$this->tab_border_style}; border-radius: {$border_radius}; text-align: {$this->tab_text_alignment}; color: {$this->titlecolor}; } .rt-tab.element-one.rt-{$shortcode['radiant_tab_id']} > ul.nav-tabs > li > a:hover, .rt-tab.element-one.rt-{$shortcode['radiant_tab_id']} > ul.nav-tabs > li.active > a{ background-color: {$this->titlehoverbg}; color: {$this->titlehovercolor}; } .rt-tab.element-one.rt-{$shortcode['radiant_tab_id']} > .tab-content{ background-color: {$this->contentbg}; } .rt-tab.element-one.rt-{$shortcode['radiant_tab_id']} > .tab-content > .tab-pane{ color: {$this->contentcolor}; }";
			wp_add_inline_style( 'radiantthemes_tabs_' . $this->tabsstyle, $custom_css );

			$this->radiant_display_icon = $shortcode['radiant_display_icon'];

			vc_icon_element_fonts_enqueue( $shortcode['radiant_tabicon'] );

			$output = '';

			$menu_str = $this->menu_str;

			if ( ! isset( $shortcode['radiant_tabtitle'] ) || '' === $shortcode['radiant_tabtitle'] ) {
				$shortcode['radiant_tabtitle'] = 'Tab';
			}

			$radiant_display_icon = ( 'true' == $shortcode['radiant_display_icon'] ) ? 'data-tab-icon=true' : 'data-tab-icon=false';

			$menu_str .= '<li ' . esc_attr( $radiant_display_icon ) . ' class="matchHeight">';
			$menu_str .= '<a class="text-' . esc_attr( $this->tab_text_alignment ) . '" data-toggle="tab" href="#' . esc_attr( $shortcode['radiant_tab_id'] ) . '"><span>';
			if ( version_compare( WPB_VC_VERSION, '5.2.1' ) >= 0 && isset( $shortcode[ 'radiant_icon_' . $shortcode['radiant_tabicon'] ] ) && esc_attr( $shortcode[ 'radiant_icon_' . $shortcode['radiant_tabicon'] ] ) !== '' ) {
				$menu_str .= '<i class="' . esc_attr( $shortcode[ 'radiant_icon_' . $shortcode['radiant_tabicon'] ] ) . '"></i> ';
			}
			$menu_str .= esc_attr( $shortcode['radiant_tabtitle'] );
			$menu_str .= '</span></a>';
			$menu_str .= '</li>';

			$this->menu_str = $menu_str;

			$output .= '<div id="' . esc_attr( $shortcode['radiant_tab_id'] ) . '" class="tab-pane fade">';
			$output .= $content;
			$output .= '</div>';
			return $output;
		}
	}
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_Rt_Tab_Style' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Tab_Style extends WPBakeryShortCodesContainer {

	}
}
if ( class_exists( 'WPBakeryShortCode' ) && ! class_exists( 'WPBakeryShortCode_Rt_Tab_Style_Item' ) ) {
	/**
	 * Class definition
	 */
	class WPBakeryShortCode_Rt_Tab_Style_Item extends WPBakeryShortCode {

	}
}

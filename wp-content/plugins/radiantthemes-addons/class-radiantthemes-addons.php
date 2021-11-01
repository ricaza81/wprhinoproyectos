<?php
/**
 * Includes Radiant Theme Addons elements like Blog,Team and Testimonials.
 *
 * @package RadiantThemes
 *
 * @wordpress-plugin
 * Plugin Name: RadiantThemes Addons
 * Description: Includes RadiantThemes Addons elements like Blog, Team and Testimonials and more.
 * Version:     2.0.0
 * Author:      RadiantThemes
 * Author URI:  http://www.radiantthemes.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: radiantthemes-addons
 */

/**
 * [vc_after_init_actions description]
 */
function vc_after_init_actions() {
	// Remove VC Elements.
	if ( function_exists( 'vc_remove_element' ) ) {
		// Remove VC Button Element.
		vc_remove_element( 'vc_btn' );

		// Remove VC Separator Element.
		vc_remove_element( 'vc_separator' );

		// Remove VC Tab Element.
		vc_remove_element( 'vc_tta_tabs' );

		// Remove VC Accordion Element.
		vc_remove_element( 'vc_tta_accordion' );

		// Remove VC FAQ Element.
		vc_remove_element( 'vc_toggle' );

		// Remove VC Call to Action Element.
		vc_remove_element( 'vc_cta' );

		// Remove VC Custom Menu.
		vc_remove_element( 'vc_wp_custommenu' );

		// Remove VC Hoverbox.
		vc_remove_element( 'vc_hoverbox' );
	}
}
// After VC Init.
add_action( 'vc_after_init', 'vc_after_init_actions' );

// Set if vc editor is enable or not.
require_once ABSPATH . 'wp-admin/includes/plugin.php';

$params_dir = plugin_dir_path( __FILE__ ) . 'params/';

// check for plugin using plugin name.
if ( class_exists( 'WPBakeryShortCode' ) ) {

	// Activate - params.
	foreach ( glob( $params_dir . '/*.php' ) as $param ) {
		require_once $param;
	}
}

/**
 * Check if Contact Form 7 is installed and activated.
 */
function rt_init_vendor_cf7() {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';

	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) || defined( 'WPCF7_PLUGIN' ) ) {
		require_once 'cf7/class-radiantthemes-style-cf7.php';
	} // if contact form7 plugin active.

}
add_action( 'plugins_loaded', 'rt_init_vendor_cf7' );

$my_theme = wp_get_theme( 'brixel' );
if ( $my_theme->exists() && ($my_theme->get( 'Version' ) >=2 ) )
{
/**
 * Widget additions.
 */
require_once 'widget/facebook-page-box/class-radiantthemes-facebook-widget.php';
require_once 'widget/twitter-widget/class-radiantthemes-twitter-widget.php';
require_once 'widget/contact-box/class-radiantthemes-contact-box-widget.php';
require_once 'widget/social-widget/class-radiantthemes-social-widget.php';
require_once 'widget/recent-posts/class-radiantthemes-recent-posts-widget.php';
}
// Require files.
require_once 'accordion/class-radiantthemes-style-accordion.php';
require_once 'alert-box/class-radiantthemes-style-alert.php';
require_once 'animated-link/class-radiantthemes-style-animated-link.php';
require_once 'beforeafter/class-radiantthemes-style-beforeafter.php';
require_once 'blockquote/class-radiantthemes-style-blockquote.php';
require_once 'blog/class-radiantthemes-style-blog.php';
require_once 'calltoaction/class-radiantthemes-style-calltoaction.php';
require_once 'case-studies/class-radiantthemes-style-case-study.php';
require_once 'clients/class-radiantthemes-style-clients.php';
require_once 'countdown/class-radiantthemes-style-countdown.php';
require_once 'counterup/class-radiantthemes-style-counterup.php';
require_once 'custom-button/class-radiantthemes-style-custom-button.php';
require_once 'custom-menu/class-radiantthemes-style-menu.php';
require_once 'dropcap/class-radiantthemes-style-dropcap.php';
require_once 'fancytextbox/class-radiantthemes-style-fancy-text-box.php';
require_once 'flip-box/class-radiantthemes-style-flip-box.php';
require_once 'highlight-box/class-radiantthemes-style-highlight-box.php';
require_once 'iconbox/class-radiantthemes-style-iconbox.php';
require_once 'ihover/class-radiantthemes-style-ihover.php';
require_once 'image-gallery/class-radiantthemes-style-image-gallery.php';
require_once 'image-slider/class-radiantthemes-style-image-slider.php';
require_once 'list/class-radiantthemes-style-list.php';
require_once 'loan-calculator/class-radiantthemes-loan-calculator.php';
require_once 'masonry-gallery/class-radiantthemes-style-masonry-gallery.php';
require_once 'popup-video/class-radiantthemes-style-popup-video.php';
require_once 'portfolio/class-radiantthemes-style-portfolio.php';
require_once 'portfolio-slider/class-radiantthemes-style-portfolio-slider.php';
require_once 'pricingtable/class-radiantthemes-style-pricing-table.php';
require_once 'progressbar/class-radiantthemes-style-progressbar.php';
require_once 'quote-box/class-radiantthemes-style-quote-box.php';
require_once 'separator/class-radiantthemes-style-separator.php';
require_once 'tabs/class-radiantthemes-style-tabs.php';
require_once 'team/class-radiantthemes-style-team.php';
require_once 'testimonial/class-radiantthemes-style-testimonial.php';
require_once 'typewriter-text/class-radiantthemes-style-typewriter-text.php';
require_once 'button/class-radiantthemes-style-button.php';
require_once 'timeline/class-radiantthemes-style-timeline.php';

if ( ! class_exists( 'Radiantthemes_Addons' ) ) {
	/**
	 * Class Definition.
	 */
	class Radiantthemes_Addons {
		/**
		 * [__construct description]
		 */
		public function __construct() {
			if ( ! function_exists( 'rt_accordion_style_func' ) ) {
				new RadiantThemes_Style_Accordion();
			}
			if ( ! function_exists( 'radiantthemes_alert_style_func' ) ) {
				new Radiantthemes_Style_Alert();
			}
			if ( ! function_exists( 'rt_animated_link_style_func' ) ) {
				new RadiantThemes_Style_Animated_Link();
			}
			if ( ! function_exists( 'radiantthemes_beforeafter_style_func' ) ) {
				new Radiantthemes_Style_Beforeafter();
			}
			if ( ! function_exists( 'radiantthemes_blockquote_style_func' ) ) {
				new Radiantthemes_Style_Blockquote();
			}
			if ( ! function_exists( 'radiantthemes_blog_style_func' ) ) {
				new Radiantthemes_Style_Blog();
			}
			if ( ! function_exists( 'radiantthemes_calltoaction_style_func' ) ) {
				new Radiantthemes_Style_Calltoaction();
			}
			if ( ! function_exists( 'radiantthemes_case_study_style_func' ) ) {
				new Radiantthemes_Style_Case_Study();
			}
			if ( ! function_exists( 'radiantthemes_clients_style_func' ) ) {
				new Radiantthemes_Style_Clients();
			}
			if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) || defined( 'WPCF7_PLUGIN' ) ) {
				if ( ! function_exists( 'rt_cf7_style_func' ) ) {
					new RadiantThemes_Style_Cf7();
				}
			}
			if ( ! function_exists( 'radiantthemes_countdown_style_func' ) ) {
				new Radiantthemes_Style_Countdown();
			}
			if ( ! function_exists( 'radiantthemes_counterup_style_func' ) ) {
				new Radiantthemes_Style_Counterup();
			}
			if ( ! function_exists( 'radiantthemes_custom_button_style_func' ) ) {
				new Radiantthemes_Style_Custom_Button();
			}
			if ( ! function_exists( 'radiantthemes_menu_style_func' ) ) {
				new Radiantthemes_Style_Menu();
			}
			if ( ! function_exists( 'radiantthemes_dropcap_style_func' ) ) {
				new Radiantthemes_Style_Dropcap();
			}
			if ( ! function_exists( 'radiantthemes_fancy_text_box_style_func' ) ) {
				new RadiantThemes_Style_Fancy_Text_Box();
			}
			if ( ! function_exists( 'radiantthemes_flip_box_style_func' ) ) {
				new RadiantThemes_Style_Flip_Box();
			}
			if ( ! function_exists( 'radiantthemes_highlight_box_style_func' ) ) {
				new RadiantThemes_Style_Highlight_Box();
			}
			if ( ! function_exists( 'radiantthemes_iconbox_style_func' ) ) {
				new RadiantThemes_Style_Iconbox();
			}
			if ( ! function_exists( 'radiantthemes_ihover_style_func' ) ) {
				new RadiantThemes_Style_ihover();
			}
			if ( ! function_exists( 'radiantthemes_image_gallery_style_func' ) ) {
				new RadiantThemes_Style_Image_Gallery();
			}
			if ( ! function_exists( 'radiantthemes_image_slider_style_func' ) ) {
				new RadiantThemes_Style_Image_Slider();
			}
			if ( ! function_exists( 'rt_list_style_func' ) ) {
				new RadiantThemes_Style_List();
			}
			if ( ! function_exists( 'rt_loan_calculator_func' ) ) {
				new RadiantThemes_Loan_Calculator();
			}
			if ( ! function_exists( 'radiantthemes_masonry_gallery_style_func' ) ) {
				new RadiantThemes_Style_Masonry_Gallery();
			}
			if ( ! function_exists( 'radiantthemes_popup_video_style_func' ) ) {
				new Radiantthemes_Style_Popup_Video();
			}
			if ( ! function_exists( 'radiantthemes_portfolio_style_func' ) ) {
				new Radiantthemes_Style_Portfolio();
			}
			if ( ! function_exists( 'radiantthemes_portfolio_slider_style_func' ) ) {
				new Radiantthemes_Style_Portfolio_Slider();
			}
			if ( ! function_exists( 'radiantthemes_pricing_table_style_func' ) ) {
				new Radiantthemes_Style_Pricing_Table();
			}
			if ( ! function_exists( 'radiantthemes_progressbar_style_func' ) ) {
				new Radiantthemes_Style_Progressbar();
			}
			if ( ! function_exists( 'radiantthemes_quote_box_style_func' ) ) {
				new RadiantThemes_Style_Quote_Box();
			}
			if ( ! function_exists( 'radiantthemes_separator_style_func' ) ) {
				new Radiantthemes_Style_Separator();
			}
			if ( ! function_exists( 'rt_tabs_style_func' ) ) {
				new RadiantThemes_Style_Tabs();
			}
			if ( ! function_exists( 'radiantthemes_team_style_func' ) ) {
				new Radiantthemes_Style_Team();
			}
			if ( ! function_exists( 'radiantthemes_testimonial_style_func' ) ) {
				new Radiantthemes_Style_Testimonial();
			}
			if ( ! function_exists( 'radiantthemes_typewriter_text_style_func' ) ) {
				new RadiantThemes_Style_Typewriter_Text();
			}
			if ( ! function_exists( 'radiantthemes_button_style_func' ) ) {
				new Radiantthemes_Style_Button();
			}
			if ( ! function_exists( 'radiantthemes_timeline_style_func' ) ) {
				new RadiantThemes_Style_Timeline();
			}
		}
	}
}

/**
 * [radiantthemes_vc_addons_notice description]
 */
function radiantthemes_vc_addons_notice() {
	$plugin_data = get_plugin_data( __FILE__ );
	echo '
	<div class="updated">
		<p>' .
			sprintf( wp_kses_post( '<strong>%s</strong> requires <strong><a href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'radiantthemes-addons' ), esc_html( $plugin_data['Name'] ) ) .
		'</p>
	</div>';
}
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Load scripts for backend
 *
 * @return void
 */
function radiantthemes_load_admin_scripts() {
	wp_enqueue_style(
		'iconsmind',
		plugins_url( 'assets/css/iconsmind.min.css', __FILE__ )
	);
	wp_enqueue_style(
		'icofont',
		plugins_url( 'assets/css/icofont.min.css', __FILE__ )
	);
}
add_action( 'admin_enqueue_scripts', 'radiantthemes_load_admin_scripts' );

/**
 * [radiantthemes_vc_bundle_init description]
 */
function radiantthemes_vc_bundle_init() {

	// Localization.
	load_plugin_textdomain( 'radiantthemes-addons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

	if ( ! defined( 'WPB_VC_VERSION' ) ) {
		add_action( 'admin_notices', 'radiantthemes_vc_addons_notice' );
		return;
	}

	if ( class_exists( 'Radiantthemes_Addons' ) ) {

		new Radiantthemes_Addons();

		$list = array(
			'page',
			'team',
			'portfolio',
			'case-studies',
			'product',
			'post',
		);
		vc_set_default_editor_post_types( $list );
	}
}

add_action( 'init', 'radiantthemes_vc_bundle_init' );


function radiantthemes_load_frontend_scripts() {
// CALL CUSTOM WIDGET CSS.
	if ( is_active_widget( false, false, 'radiantthemes_twitter_widget', true ) ) {
		wp_enqueue_style( 'radiantthemes-twitter-css', plugins_url( 'radiantthemes-addons/widget/twitter-widget/css/radiantthemes-twitter-box.css' ), array(), null );
	}
	if ( is_active_widget( false, false, 'radiantthemes_call_to_action_widget', true ) ) {
		wp_enqueue_style( 'radiantthemes-call-to-action-widget', plugins_url( 'radiantthemes-addons/widget/call-to-action/css/radiantthemes-call-to-action.css' ), array(), null );
	}
	if ( is_active_widget( false, false, 'radiantthemes_contact_box_widget', true ) ) {
		wp_enqueue_style( 'radiantthemes-contact-box-widget', plugins_url( 'radiantthemes-addons/widget/contact-box/css/radiantthemes-contact-box.css' ), array(), null );
	}
	if ( is_active_widget( false, false, 'radiantthemes_recent_posts_widget', true ) ) {
		wp_enqueue_style( 'radiantthemes-recent-posts-widget', plugins_url( 'radiantthemes-addons/widget/recent-posts/css/radiantthemes-recent-post-with-thumbnail-element-one.css' ), array(), null );
	}

	// ENQUEUE TWITTER WIDGET JQUERY.
	if ( is_active_widget( false, false, 'brixel_twitter_widget', true ) ) {
		wp_enqueue_script(
			'radiantthemes-twitter-widget',
			plugins_url( 'radiantthemes-addons/widget/twitter-widget/js/radiantthemes-twitter-box.js' ),
			array( 'jquery' ),
			false,
			true
		);
		wp_enqueue_script(
			'radiantthemes-twitter-widget-min',
			plugins_url( 'radiantthemes-addons/widget/twitter-widget/js/radiantthemes-twitterFetcher.min.js' ),
			array( 'jquery' ),
			false,
			true
		);
	}
}	
add_action( 'wp_enqueue_scripts', 'radiantthemes_load_frontend_scripts' );	
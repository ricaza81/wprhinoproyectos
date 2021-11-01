<?php
/**
 * RadiantThemes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RadiantThemes
 */

/**
 * Custom template tags for this theme.
 */

require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */

require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */

require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Widget additions.
 */
require_once get_parent_theme_file_path( '/inc/widget/facebook-page-box/class-radiantthemes-facebook-widget.php' );
require_once get_parent_theme_file_path( '/inc/widget/twitter-widget/class-radiantthemes-twitter-widget.php' );
require_once get_parent_theme_file_path( '/inc/widget/contact-box/class-radiantthemes-contact-box-widget.php' );
require_once get_parent_theme_file_path( '/inc/widget/social-widget/class-radiantthemes-social-widget.php' );
require_once get_parent_theme_file_path( '/inc/widget/recent-posts/class-radiantthemes-recent-posts-widget.php' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_parent_theme_file_path( '/inc/jetpack.php' );
}

/**
 * Load TGMPA file.
 */
require get_parent_theme_file_path( '/inc/tgmpa/tgmpa.php' );

if ( ! function_exists( 'brixel_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brixel_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Finacorp, use a find and replace
		 * to change 'brixel' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'brixel', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for woocommerce lightbox gallery.
		*/
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top'    => esc_html__( 'Primary', 'brixel' ),
				'footer' => esc_html__( 'Footer', 'brixel' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		$brixel_args = array(
			'default-color' => 'ffffff',
			'default-image' => '',
		);
		add_theme_support( 'custom-background', $brixel_args );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Registers an editor stylesheet for the theme.
		$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Rubik:400,500,700' );
		add_editor_style( $font_url );
		add_editor_style( 'css/radiantthemes-editor-styles.css' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo', array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Require Redux Framework.
		require_once get_parent_theme_file_path( '/inc/redux-framework/admin-init.php' );

		/**
		 * Redux custom css
		 */
		function brixel_custom_redux_css() {
			/**
			 * [brixel_custom_redux_css description]
			 */
			function brixel_override_css_fonts_url() {
				$google_font_url = '';

				/*
				Translators          : If there are characters in your language that are not supported
				by chosen font(s), translate this to 'off'. Do not translate into your own language.
				*/
				if ( 'off' !== _x( 'on', 'Google font: on or off', 'brixel' ) ) {
					$google_font_url = add_query_arg( 'family', rawurlencode( 'Poppins: 300,400,500,600,700' ), '//fonts.googleapis.com/css' );
				}
				return $google_font_url;
			}
			wp_enqueue_style(
				'google-fonts',
				brixel_override_css_fonts_url(),
				array(),
				'1.0.0'
			);
			wp_register_style(
				'simple-dtpicker',
				get_parent_theme_file_uri( '/inc/redux-framework/css/jquery.simple-dtpicker.min.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'simple-dtpicker' );

			wp_register_style(
				'radiantthemes-redux-custom',
				get_parent_theme_file_uri( '/inc/redux-framework/css/radiantthemes-redux-custom.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'radiantthemes-redux-custom' );

			wp_enqueue_script(
				'simple-dtpicker',
				get_parent_theme_file_uri( '/inc/redux-framework/js/jquery.simple-dtpicker.min.js' ),
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script(
				'radiantthemes-redux-custom',
				get_parent_theme_file_uri( '/inc/redux-framework/js/radiantthemes-redux-custom.js' ),
				array( 'jquery' ),
				false,
				true
			);
		}
		// This example assumes your opt_name is set to brixel_theme_option, replace with your opt_name value.
		add_action( 'redux/page/brixel_theme_option/enqueue', 'brixel_custom_redux_css', 2 );
	}
endif;
add_action( 'after_setup_theme', 'brixel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function brixel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'brixel_content_width', 640 );
}
add_action( 'after_setup_theme', 'brixel_content_width', 0 );
add_filter('use_block_editor_for_post', '__return_false', 10);add_filter('use_block_editor_for_post', '__return_false', 10);add_filter('use_block_editor_for_post', '__return_false', 10);add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function brixel_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'brixel' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'brixel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	if ( class_exists( 'woocommerce' ) ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Product | Sidebar', 'brixel' ),
				'id'            => 'brixel-product-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'brixel' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
	}
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		// brixel Footer Areas.
		for ( $j = 1; $j <= 4; $j++ ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer | #', 'brixel' ) . $j . '',
					'id'            => 'brixel-footer-area-' . $j,
					'description'   => esc_html__( 'Add widgets here.', 'brixel' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h5 class="widget-title">',
					'after_title'   => '</h5>',
				)
			);
		}
	}
}
add_action( 'widgets_init', 'brixel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function brixel_scripts() {

	// ENQUEUE STYLESHEETS.
	wp_deregister_style( 'font-awesome' );
	wp_deregister_style( 'font-awesome-css' );
	wp_enqueue_style( 'bootstrap', get_parent_theme_file_uri( '/css/bootstrap.min.css' ), array(), null );
	wp_enqueue_style( 'font-awesome', get_parent_theme_file_uri( '/css/font-awesome.min.css' ), array(), null );
	wp_enqueue_style( 'elusive-icons', get_parent_theme_file_uri( '/css/elusive-icons.min.css' ), array(), null );
	wp_enqueue_style( 'animate', get_parent_theme_file_uri( '/css/animate.min.css' ), array(), null );
	wp_enqueue_style( 'js_composer_front' );
	wp_enqueue_style( 'radiantthemes-custom', get_parent_theme_file_uri( '/css/radiantthemes-custom.css' ), array(), null );
	wp_enqueue_style( 'radiantthemes-responsive', get_parent_theme_file_uri( '/css/radiantthemes-responsive.css' ), array(), null );

	// CALL RESET CSS IF REDUX NOT ACTIVE.
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
		wp_enqueue_style( 'radiantthemes-reset', get_parent_theme_file_uri( '/css/radiantthemes-reset.css' ), array(), null );

		/**
		 * Load Montserrat Google Font when redux framework is not installed.
		 */
		function brixel_default_google_fonts_url() {
			$google_font_url = '';

			/*
			Translators          : If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			*/
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'brixel' ) ) {
				$google_font_url = add_query_arg( 'family', rawurlencode( 'Poppins:700|Rubik:400,500,700' ), '//fonts.googleapis.com/css' );
			}
			return $google_font_url;
		}
		wp_enqueue_style(
			'google-fonts',
			brixel_default_google_fonts_url(),
			array(),
			'1.0.0'
		);
	}

	// CALL CUSTOM WIDGET CSS.
	if ( is_active_widget( false, false, 'radiantthemes_twitter_widget', true ) ) {
		wp_enqueue_style( 'radiantthemes-twitter-css', get_parent_theme_file_uri( '/inc/widget/twitter-widget/css/radiantthemes-twitter-box.css' ), array(), null );
	}
	if ( is_active_widget( false, false, 'radiantthemes_call_to_action_widget', true ) ) {
		wp_enqueue_style( 'radiantthemes-call-to-action-widget', get_parent_theme_file_uri( '/inc/widget/call-to-action/css/radiantthemes-call-to-action.css' ), array(), null );
	}
	if ( is_active_widget( false, false, 'radiantthemes_contact_box_widget', true ) ) {
		wp_enqueue_style( 'radiantthemes-contact-box-widget', get_parent_theme_file_uri( '/inc/widget/contact-box/css/radiantthemes-contact-box.css' ), array(), null );
	}
	if ( is_active_widget( false, false, 'radiantthemes_recent_posts_widget', true ) ) {
		wp_enqueue_style( 'radiantthemes-recent-posts-widget', get_parent_theme_file_uri( '/inc/widget/recent-posts/css/radiantthemes-recent-post-with-thumbnail-element-one.css' ), array(), null );
	}
	
	// ENQUEUE PRELOADER STYLE.
	if ( ! empty( brixel_global_var( 'preloader_switch', '', false ) ) ) {
		wp_enqueue_style(
			'preloader',
			get_parent_theme_file_uri( '/css/spinkit.min.css' ),
			array(),
			null
		);
	}

	// ENQUEUE HEADER STYLE.
	if ( is_404() && ! empty( brixel_global_var( 'error_custom_header_style', '', false ) ) ) {
		wp_enqueue_style(
			'radiantthemes-' . brixel_global_var( 'error_custom_header_style', '', false ),
			get_parent_theme_file_uri( '/css/radiantthemes-' . brixel_global_var( 'error_custom_header_style', '', false ) . '.css' ),
			array(),
			null
		);
	} elseif ( ! empty( brixel_global_var( 'header-style', '', false ) ) ) {
		$id = get_the_ID();

		if (( 'default' != get_post_meta( $id, 'selectheader', true ) ) && (! empty(get_post_meta( $id, 'selectheader', true ))) ) {
			wp_enqueue_style(
			'radiantthemes-header-style-' . get_post_meta( $id, 'selectheader', true ),
			get_parent_theme_file_uri( '/css/radiantthemes-header-style-' . get_post_meta( $id, 'selectheader', true ) . '.css' ),
			array(),
			null
		);
		} else {
			wp_enqueue_style(
				'radiantthemes-' . brixel_global_var( 'header-style', '', false ),
				get_parent_theme_file_uri( '/css/radiantthemes-' . brixel_global_var( 'header-style', '', false ) . '.css' ),
				array(),
				null
			);
		}
	} else {
		wp_enqueue_style(
			'radiantthemes-header-style-default',
			get_parent_theme_file_uri( '/css/radiantthemes-header-style-default.css' ),
			array(),
			null
		);
	}

	// ENQUEUE FOOTER STYLE.
	if ( ! empty( brixel_global_var( 'footer-style', '', false ) ) ) {
		wp_enqueue_style(
			'radiantthemes-' . brixel_global_var( 'footer-style', '', false ),
			get_parent_theme_file_uri( '/css/radiantthemes-' . brixel_global_var( 'footer-style', '', false ) . '.css' ),
			array(),
			null
		);
	} else {
		wp_enqueue_style(
			'radiantthemes-footer-style-one',
			get_parent_theme_file_uri( '/css/radiantthemes-footer-style-one.css' ),
			array(),
			null
		);
	}

	// ENQUEUE STYLE.CSS.
	wp_enqueue_style( 'radiantthemes-style', get_stylesheet_uri() );

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( class_exists( 'ReduxFrameworkPlugin' ) && class_exists( 'Radiantthemes_Addons' ) ) {

		$buttonradius  = '';
		$buttonradius  = esc_html( brixel_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( brixel_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( brixel_global_var( 'border-radius', 'margin-top', true ) );
		$buttonradius .= ' ' . esc_html( brixel_global_var( 'border-radius', 'margin-top', true ) );

		$buttonborderradius = '.team.element-six .team-item > .holder .data .btn, .radiantthemes-button > .radiantthemes-button-main, .rt-fancy-text-box > .holder > .more .btn, .rt-call-to-action-wraper .rt-call-to-action-item .btn:hover, .radiant-contact-form .form-row input[type=submit] {  border-radius:' . $buttonradius . ' ; }';

		wp_enqueue_style(
			'radiantthemes-button-element-one',
			plugins_url( 'radiantthemes-addons/button/css/radiantthemes-button-element-one.css' ),
			plugin_dir_url( __FILE__ ) . 'css/radiantthemes-button-element-one.css',
			array(),
			null
		);
		wp_add_inline_style( 'radiantthemes-button-element-one', $buttonborderradius );
	}

	/* ================= */
	/* ENQUEUE SCRIPTS */
	/* ================= */

	// ENQUEUE BOOTSTRAP JQUERY.
	wp_enqueue_script(
		'bootstrap',
		get_parent_theme_file_uri( '/js/bootstrap.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE SIDR JQUERY.
	wp_enqueue_script(
		'sidr',
		get_parent_theme_file_uri( '/js/jquery.sidr.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE MATCHHEIGHT JQUERY.
	wp_enqueue_script(
		'matchHeight',
		get_parent_theme_file_uri( '/js/jquery.matchHeight-min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE WOW JQUERY.
	wp_enqueue_script(
		'wow',
		get_parent_theme_file_uri( '/js/wow.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE NICESCROLL JQUERY.
	wp_enqueue_script(
		'nicescroll',
		get_parent_theme_file_uri( '/js/jquery.nicescroll.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE STICKY JQUERY.
	wp_enqueue_script(
		'sticky',
		get_parent_theme_file_uri( '/js/jquery.sticky.min.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE RETINA JQUERY.
	wp_enqueue_script(
		'retina',
		get_parent_theme_file_uri( '/js/retina.min.js' ),
		false,
		true
	);

	// ENQUEUE ISOTOPE JQUERY.
	if ( 'two' === brixel_global_var( 'blog-style', '', false ) || 'five' === brixel_global_var( 'blog-style', '', false ) ) {
		wp_enqueue_script(
			'isotope',
			get_parent_theme_file_uri( '/js/isotope.pkgd.min.js' ),
    		array( 'jquery' ),
    		false,
    		true
		);
		wp_enqueue_script(
			'radiantthemes-blog-style',
			get_parent_theme_file_uri( '/js/radiantthemes-blog-style.js' ),
    		array( 'jquery', 'isotope' ),
    		false,
    		true
		);
	}

	// ENQUEUE RADIANTTHEMES CUSTOM JQUERY.
	wp_enqueue_script(
		'radiantthemes-custom',
		get_parent_theme_file_uri( '/js/radiantthemes-custom.js' ),
		array( 'jquery' ),
		false,
		true
	);

	// ENQUEUE TWITTER WIDGET JQUERY.
	if ( is_active_widget( false, false, 'brixel_twitter_widget', true ) ) {
		wp_enqueue_script(
			'radiantthemes-twitter-widget',
			get_parent_theme_file_uri( '/inc/widget/twitter-widget/js/radiantthemes-twitter-box.js' ),
			array( 'jquery' ),
			false,
			true
		);
		wp_enqueue_script(
			'radiantthemes-twitter-widget-min',
			get_parent_theme_file_uri( '/inc/widget/twitter-widget/js/radiantthemes-twitterFetcher.min.js' ),
			array( 'jquery' ),
			false,
			true
		);
	}

	// Load comment-reply.js into footer.
	if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) === 1 ) ) {
		// Load comment-reply.js (into footer).
		wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
	}

	// Load Countdown JS and Coming Soon JS.
	if ( ! is_user_logged_in() && ! empty( brixel_global_var( 'coming_soon_switch', '', false ) ) ) {
		wp_enqueue_script(
			'countdown',
			get_parent_theme_file_uri( '/js/jquery.countdown.min.js' ),
			array( 'jquery' ),
			true
		);
		wp_enqueue_script(
			'radiantthemes-comingsoon',
			get_parent_theme_file_uri( '/js/radiantthemes-comingsoon.js' ),
			array( 'jquery' ),
			true
		);
	}

}
add_action( 'wp_enqueue_scripts', 'brixel_scripts' );

// ENQUEUE COLOR SCHEME.
function radiantthemes_color_scheme() {
	$radiantthemes_theme_options = get_option( 'brixel_theme_option' );
	ob_start();
	include_once get_parent_theme_file_path( '/inc/color-scheme/radiantthemes-color-scheme.php' );
	$radiantthemes_custom_colors = ob_get_clean();
	wp_add_inline_style( 'radiantthemes-style', $radiantthemes_custom_colors );
}
add_action( 'wp_enqueue_scripts', 'radiantthemes_color_scheme' );

/**
 * Woocommerce Support
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * [brixel_wrapper_start description]
 */
function brixel_wrapper_start() {
	echo wp_kses_post( '<section id="main">' );
}
add_action( 'woocommerce_before_main_content', 'brixel_wrapper_start', 10 );

/**
 * [brixel_wrapper_end description]
 */
function brixel_wrapper_end() {
	echo wp_kses_post( '</section>' );
}
add_action( 'woocommerce_after_main_content', 'brixel_wrapper_end', 10 );

/**
 * [woocommerce_support description]
 */
function brixel_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'brixel_woocommerce_support' );

// Remove the product rating display on product loops.
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Ajax cart basket.
add_filter( 'woocommerce_add_to_cart_fragments', 'brixel_iconic_cart_count_fragments', 10, 1 );

/**
 * [brixel_iconic_cart_count_fragments description]
 *
 * @param  [type] $fragments description.
 * @return [type]            [description]
 */
function brixel_iconic_cart_count_fragments( $fragments ) {
	$fragments['span.cart-count'] = '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
	return $fragments;
}

/**
 * Set Site Icon
 */
function brixel_site_icon() {
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
		if ( brixel_global_var( 'favicon', 'url', true ) ) :
	?>
			<link rel="icon" href="<?php echo esc_url( brixel_global_var( 'favicon', 'url', true ) ); ?>" sizes="32x32" />
			<link rel="icon" href="<?php echo esc_url( brixel_global_var( 'apple-icon', 'url', true ) ); ?>" sizes="192x192">
			<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( brixel_global_var( 'apple-icon', 'url', true ) ); ?>" />
			<meta name="msapplication-TileImage" content="<?php echo esc_url( brixel_global_var( 'apple-icon', 'url', true ) ); ?>" />
		<?php else : ?>
			<link rel="icon" href="<?php echo esc_url( get_parent_theme_file_uri( '/images/favicon.ico' ) ); ?>" sizes="32x32" />
			<link rel="icon" href="<?php echo esc_url( get_parent_theme_file_uri( '/images/favicon.ico' ) ); ?>" sizes="192x192">
			<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_parent_theme_file_uri( '/images/favicon.ico' ) ); ?>" />
			<meta name="msapplication-TileImage" content="<?php echo esc_url( get_parent_theme_file_uri( '/images/favicon.ico' ) ); ?>" />
		<?php endif; ?>
<?php
	}
}
add_filter( 'wp_head', 'brixel_site_icon' );

add_filter(
	'wp_prepare_attachment_for_js',
	function( $response, $attachment, $meta ) {
		if (
			'image/x-icon' === $response['mime'] &&
			isset( $response['url'] ) &&
			! isset( $response['sizes']['full'] )
		) {
			$response['sizes'] = array(
				'full' => array(
					'url' => $response['url'],
				),
			);
		}
		return $response;
	},
	10, 3
);

if ( ! function_exists( 'brixel_pagination' ) ) {

	/**
	 * Displays pagination on archive pages
	 */
	function brixel_pagination() {

		global $wp_query;

		$big = 999999999; // need an unlikely integer.

		$paginate_links = paginate_links(
			array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'next_text' => esc_html__( 'Next Page &raquo;', 'brixel' ),
				'prev_text' => esc_html__( '&laquo; Previous Page', 'brixel' ),
				'end_size'  => 5,
				'mid_size'  => 5,
				'add_args'  => false,
			)
		);

		// Display the pagination if more than one page is found.
		if ( $paginate_links ) :
			?>

			<div class="pagination clearfix">
				<?php echo wp_kses_post( $paginate_links ); ?>
			</div>

			<?php
		endif;
	}
}

if ( ! function_exists( 'brixel_pagination' ) ) {

	/**
	 * Displays pagination on archive pages
	 */
	function brixel_pagination() {

		global $wp_query;

		$big = 999999999; // need an unlikely integer.

		$paginate_links = paginate_links(
			array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'next_text' => esc_html__( 'Next Page &raquo;', 'brixel' ),
				'prev_text' => esc_html__( '&laquo; Previous Page', 'brixel' ),
				'end_size'  => 5,
				'mid_size'  => 5,
				'add_args'  => false,
			)
		);

		// Display the pagination if more than one page is found.
		if ( $paginate_links ) :
			?>

			<div class="pagination clearfix">
				<?php echo wp_kses_post( $paginate_links ); ?>
			</div>

			<?php
		endif;
	}
}


/**
 * Display the breadcrumbs.
 */
function brixel_breadcrumbs() {

	$show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	if ( ! brixel_global_var( 'breadcrumb_arrow_style', '', false ) ) {
		$delimiter = '<span class="gap"><i class="el el-chevron-right"></i></span>';
	} else {
		$delimiter = '<span class="gap"><i class="' . brixel_global_var( 'breadcrumb_arrow_style', '', false ) . '"></i></span>';
	}

	$home         = esc_html__( 'Home', 'brixel' ); // text for the 'Home' link.
	$show_current = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before       = '<span class="current">'; // tag before the current crumb.
	$after        = '</span>'; // tag after the current crumb.

	global $post;
	$home_link = get_home_url( 'url' );

	if ( is_home() && is_front_page() ) {

		if ( 1 === $show_on_home ) {
			echo '<div id="crumbs"><a href="' . esc_url( $home_link ) . '">' . esc_html__( 'Home', 'brixel' ) . '</a></div>';
		}
	} elseif ( class_exists( 'woocommerce' ) && ( is_shop() || is_singular( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) ) {
		function my_woocommerce_breadcrumbs() {
			if ( ! brixel_global_var( 'breadcrumb_arrow_style', '', false ) ) {
				$delimiter = '<span class="gap"><i class="el el-chevron-right"></i></span>';
			} else {
				$delimiter = '<span class="gap"><i class="' . brixel_global_var( 'breadcrumb_arrow_style', '', false ) . '"></i></span>';
			}
			return array(
				'delimiter'   => $delimiter,
				'wrap_before' => '<div id="crumbs" itemprop="breadcrumb">',
				'wrap_after'  => '</div>',
				'before'      => '',
				'after'       => '',
				'home'        => _x( 'Home', 'breadcrumb', 'brixel' ),
			);
		}
		add_filter( 'woocommerce_breadcrumb_defaults', 'my_woocommerce_breadcrumbs' );
		woocommerce_breadcrumb();
	} else {

		echo '<div id="crumbs"><a href="' . esc_url( $home_link ) . '">' . esc_html__( 'Home', 'brixel' ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
		if ( is_home() ) {
			echo wp_kses_post( $before ) . get_the_title( get_option( 'page_for_posts', true ) ) . wp_kses_post( $after );
		} elseif ( is_category() ) {
			$this_cat = get_category( get_query_var( 'cat' ), false );
			if ( 0 != $this_cat->parent ) {
				echo get_category_parents( $this_cat->parent, true, ' ' . wp_kses_post( $delimiter ) . ' ' );
			}
			echo wp_kses_post( $before ) . esc_html__( 'Archive by category "', 'brixel' ) . single_cat_title( '', false ) . '"' . wp_kses_post( $after );
		} elseif ( is_search() ) {
			echo wp_kses_post( $before ) . esc_html__( 'Search results for "', 'brixel' ) . get_search_query() . '"' . wp_kses_post( $after );
		} elseif ( is_day() ) {
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
			echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
			echo wp_kses_post( $before ) . get_the_time( 'd' ) . wp_kses_post( $after );
		} elseif ( is_month() ) {
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . wp_kses_post( $delimiter ) . ' ';
			echo wp_kses_post( $before ) . get_the_time( 'F' ) . wp_kses_post( $after );
		} elseif ( is_year() ) {
			echo wp_kses_post( $before ) . get_the_time( 'Y' ) . wp_kses_post( $after );
		} elseif ( class_exists( 'Tribe__Events__Main' ) && ( is_singular( 'tribe_events' ) || ( tribe_is_past() || tribe_is_upcoming() && ! is_tax() ) || ( tribe_is_month() && ! is_tax() ) || ( tribe_is_day() && ! is_tax() ) ) ) {
			echo wp_kses_post( $before ) . esc_html( brixel_global_var( 'event_banner_title', '', false ) ) . wp_kses_post( $after );
		} elseif ( is_single() && ! is_attachment() ) {
			if ( 'post' != get_post_type() ) {
				$post_type = get_post_type_object( get_post_type() );
				$slug      = $post_type->rewrite;

				$cpost_label = $slug['slug'];
				$cpost_label = implode( '-', array_map( 'ucfirst', explode( '-', $cpost_label ) ) );
				$cpost_label = str_replace( '-', ' ', $cpost_label );

				if ( 'team' == get_post_type() || 'portfolio' == get_post_type() || 'case-studies' == get_post_type() ) {
					echo '<a href="' . esc_url( $home_link ) . '/' . esc_attr( $slug['slug'] ) . '/">' . esc_html( $cpost_label ) . '</a>';
				} else {
					echo '<a href="' . esc_url( $home_link ) . '/' . esc_attr( $slug['slug'] ) . '/">' . esc_html( $post_type->labels->singular_name ) . '</a>';
				}

				if ( 1 == $show_current ) {
					echo ' ' . wp_kses_post( $delimiter ) . ' ' . wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
				}
			} else {
				$cat  = get_the_category();
				$cat  = $cat[0];
				$cats = get_category_parents( $cat, true, ' ' . wp_kses_post( $delimiter ) . ' ' );
				if ( 0 == $show_current ) {
					$cats = preg_replace( "#^(.+)\s$delimiter\s$#", '$1', $cats );
				}
				echo wp_kses_post( $cats );
				if ( 1 == $show_current ) {
					echo wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
				}
			}
		} elseif ( ! is_single() && ! is_page() && 'post' != get_post_type() && ! is_404() ) {
			$post_type = get_post_type_object( get_post_type() );
			echo wp_kses_post( $before ) . esc_html( $post_type->labels->singular_name ) . wp_kses_post( $after );
		} elseif ( is_attachment() ) {
			$parent = get_post( $post->post_parent );
			$cat    = get_the_category( $parent->ID );
			$cat    = $cat[0];
			echo wp_kses_post( get_category_parents( $cat, true, ' ' . $delimiter . ' ' ) );
			echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>';
			if ( 1 == $show_current ) {
				echo ' ' . wp_kses_post( $delimiter ) . ' ' . wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
			}
		} elseif ( is_page() && ! $post->post_parent ) {
			if ( 1 == $show_current ) {
				echo wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
			}
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id   = $post->post_parent;
			$breadcrumbs = array();
			while ( $parent_id ) {
				$page          = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id     = $page->post_parent;
			}
			$breadcrumbs       = array_reverse( $breadcrumbs );
			$count_breadcrumbs = count( $breadcrumbs );
			for ( $i = 0; $i < $count_breadcrumbs; $i++ ) {
				echo wp_kses_post( $breadcrumbs[ $i ] );
				if ( ( count( $breadcrumbs ) - 1 ) != $i ) {
					echo ' ' . wp_kses_post( $delimiter ) . ' ';
				}
			}
			if ( 1 == $show_current ) {
				echo ' ' . wp_kses_post( $delimiter ) . ' ' . wp_kses_post( $before ) . get_the_title() . wp_kses_post( $after );
			}
		} elseif ( is_tag() ) {
			echo wp_kses_post( $before ) . esc_html__( 'Posts tagged "', 'brixel' ) . single_tag_title( '', false ) . '"' . wp_kses_post( $after );
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo wp_kses_post( $before ) . esc_html__( 'Articles posted by ', 'brixel' ) . esc_html( $userdata->display_name ) . wp_kses_post( $after );
		} elseif ( is_404() ) {
			echo wp_kses_post( $before ) . esc_html__( 'Error 404', 'brixel' ) . wp_kses_post( $after );
		}

		if ( get_query_var( 'paged' ) ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ' (';
			}
			echo esc_html_e( 'Page', 'brixel' ) . ' ' . get_query_var( 'paged' );
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ')';
			}
		}

		echo '</div>';
	}
}

/**
 * [brixel_template_caching description]
 *
 * @param  WP_Screen $current_screen description.
 */
function brixel_template_caching( WP_Screen $current_screen ) {
	// Only flush the file cache with each request to post list table, edit post screen, or theme editor.
	if ( ! in_array( $current_screen->base, array( 'post', 'edit', 'theme-editor' ), true ) ) {
		return;
	}
	$theme = wp_get_theme();
	if ( ! $theme ) {
		return;
	}
	$cache_hash    = md5( $theme->get_theme_root() . '/' . $theme->get_stylesheet() );
	$label         = sanitize_key( 'files_' . $cache_hash . '-' . $theme->get( 'Version' ) );
	$transient_key = substr( $label, 0, 29 ) . md5( $label );
	delete_transient( $transient_key );
}
add_action( 'current_screen', 'brixel_template_caching' );

if ( ! function_exists( 'brixel_import_files' ) ) :

	/**
	 * [brixel_import_files description]
	 */
	function brixel_import_files() {



		return array(
			array(
				'import_file_name'             => esc_html__( 'Demo 1', 'brixel' ),
				'local_import_file'            => get_parent_theme_file_path( 'inc/import/one/content.xml' ),
				'local_import_widget_file'     => get_parent_theme_file_path( 'inc/import/one/widgets.wie' ),
				'local_import_customizer_file' => get_parent_theme_file_path( 'inc/import/one/customizer.dat' ),
				'local_import_redux'           => array(
					array(
						'file_path'   => get_parent_theme_file_path( 'inc/import/one/redux.json' ),
						'option_name' => 'brixel_theme_option',
					),
				),
				'import_notice'                => esc_html__( 'By clicking import button, you’re sending a file download request to our server which might get stored in server log. Also, by clicking import button, you’re giving consent to download demo content data from our server.', 'brixel' ),

			),


		);
	}
	add_filter( 'pt-ocdi/import_files', 'brixel_import_files' );
endif;

if ( ! function_exists( 'brixel_after_import' ) ) :
	/**
	 * [brixel_after_import description]
	 *
	 * @param  [type] $selected_import description.
	 */
	function brixel_after_import( $selected_import ) {

			// Set Menu.
			$main_menu   = get_term_by( 'name', 'Header Menu', 'nav_menu' );
			$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
			set_theme_mod(
				'nav_menu_locations', array(
					'top'    => $main_menu->term_id,
					'footer' => $footer_menu->term_id,
				)
			);


		// Set Front page.
		$page         = get_page_by_title( 'Home Version 1' );
		$blog_page_id = get_page_by_title( 'Blog' );
		if ( isset( $page->ID ) ) {
			update_option( 'page_on_front', $page->ID );
			update_option( 'show_on_front', 'page' );
		}

		if ( isset( $blog_page_id->ID ) ) {
			update_option( 'page_for_posts', $blog_page_id->ID );
		}

		if ( 'Demo 1' === $selected_import['import_file_name'] ) {
			
		// Import Revolution Slider.
			for ( $t = 1; $t < 5; $t++ ) {
				if ( class_exists( 'RevSlider' ) ) {
					$slider_array = array(
						get_parent_theme_file_path( '/inc/import/one/slider-' . $t . '.zip' ),
					);

					$slider = new RevSlider();

					foreach ( $slider_array as $filepath ) {
						$slider->importSliderFromPost( true, true, $filepath );
					}
				}
			}
		}
	}
	add_action( 'pt-ocdi/after_import', 'brixel_after_import' );
endif;

add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Change slug of custom post types
 *
 * @param  [type] $args      description.
 * @param  [type] $post_type description.
 * @return [string]
 */
function brixel_register_post_type_args( $args, $post_type ) {

	if ( 'portfolio' === $post_type ) {
		$args['rewrite']['slug'] = brixel_global_var( 'change_slug_portfolio', '', false );
	}

	if ( 'team' === $post_type ) {
		$args['rewrite']['slug'] = brixel_global_var( 'change_slug_team', '', false );
	}

	if ( 'case-studies' === $post_type ) {
		$args['rewrite']['slug'] = brixel_global_var( 'change_slug_casestudies', '', false );
	}

	return $args;
}
add_filter( 'register_post_type_args', 'brixel_register_post_type_args', 10, 2 );

/**
 * Add new mimes for custom font upload
 */
if ( ! function_exists( 'brixel_upload_mimes' ) ) {
	/**
	 * [brixel_upload_mimes description]
	 *
	 * @param array $existing_mimes description.
	 */
	function brixel_upload_mimes( $existing_mimes = array() ) {
		$existing_mimes['woff'] = 'font/woff';
		$existing_mimes['ttf']  = 'application/x-font-ttf';
		$existing_mimes['svg']  = 'font/svg';
		$existing_mimes['eot']  = 'font/eot';
		return $existing_mimes;
	}
}
add_filter( 'upload_mimes', 'brixel_upload_mimes' );

// UNWANTED NOTICE REMOVE
function radiantthemes_unwanted_notice_remove() {
    echo '<style type="text/css">.rs-update-notice-wrap,.vc_license-activation-notice{display:none;}</style>';
}
add_action('admin_head', 'radiantthemes_unwanted_notice_remove');

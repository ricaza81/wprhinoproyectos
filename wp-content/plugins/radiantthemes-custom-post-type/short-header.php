<?php
/**
 * Header Banner
 *
 * @package Radiantthemes
 */

/**
 * [radiantthemes_page_options description]
 */
function radiantthemes_page_options() {

	function short_header_metabox_font() {
		$google_font_url = '';
		/*
		Translators          : If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		*/
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'radiantthemes-custom-post-type' ) ) {
			$google_font_url = add_query_arg( 'family', rawurlencode( 'Poppins: 300,400,500,600,700' ), '//fonts.googleapis.com/css' );
		}
		return $google_font_url;
	}
	wp_register_style(
		'radiantthemes-short-header-google-fonts',
		short_header_metabox_font(),
		array(),
		'1.0.0'
	);
	wp_enqueue_style( 'radiantthemes-short-header-google-fonts' );

	wp_register_style(
		'radiantthemes-page-options',
		plugins_url( 'radiantthemes-custom-post-type/css/radiantthemes-page-options.css' ),
		false,
		time()
	);
	wp_enqueue_style( 'radiantthemes-page-options' );

	wp_register_script(
		'radiantthemes-page-options',
		plugins_url( 'radiantthemes-custom-post-type/js/radiantthemes-page-options.js' ),
		array( 'jquery' ),
		time(),
		true
	);
	wp_enqueue_script( 'radiantthemes-page-options' );
}
add_action( 'admin_enqueue_scripts', 'radiantthemes_page_options' );

/**
 * Custom Box
 */
function radiantthemes_page_add_custom_box() {
	$screens = array( 'page' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'page_sectionid', __( 'Header Details', 'radiantthemes-custom-post-type' ), 'radiantthemes_page_inner_custom_box', $screen
		);
	}
}
add_action( 'add_meta_boxes', 'radiantthemes_page_add_custom_box' );

/**
 * Inner Custom Box
 *
 * @global type $post
 * @param type $post description.
 */
function radiantthemes_page_inner_custom_box( $post ) {
	wp_nonce_field( plugin_basename( __FILE__ ), 'page_tm' );
	$vbtitle             = get_post_meta( $post->ID, 'banner_title', true );
	$vselectheader        = get_post_meta( $post->ID, 'selectheader', true );
	$default_selectheader = empty( $vselectheader ) ? 'default' : $vselectheader;
	$vbannercheck        = get_post_meta( $post->ID, 'bannercheck', true );
	$default_bannercheck = empty( $vbannercheck ) ? 'defaultbannercheck' : $vbannercheck;
	?>

	<!-- radiantthemes-page-options -->
	<div id="RadiantThemesPageHeader" class="radiantthemes-page-options">
	    <!-- radiantthemes-page-options-title -->
	    <div class="radiantthemes-page-options-title">
	        <p class="title"><?php esc_html_e( 'Select Header', 'radiantthemes-custom-post-type' ); ?></p>
	    </div>
	    <!-- radiantthemes-page-options-title -->
	    <!-- radiantthemes-page-options-body -->
	    <div class="radiantthemes-page-options-body">
	        <!-- radiantthemes-page-options-body-image-selector -->
	        <div class="radiantthemes-page-options-body-image-selector">
	            <ul id="RadiantThemesPageHeaderSelector">
	                <li class="header-default"><input type="radio" name="selectheader" value="default" <?php checked( $default_selectheader, 'default' ); ?> ></li>
    	            <li class="header-one"><input type="radio" name="selectheader" value="one" <?php checked( $vselectheader, 'one' ); ?> ></li>
    	            <li class="header-two"><input type="radio" name="selectheader" value="two" <?php checked( $vselectheader, 'two' ); ?> ></li>
            		<li class="header-three"><input type="radio" name="selectheader" value="three" <?php checked( $vselectheader, 'three' ); ?> ></li>
            		<li class="header-four"><input type="radio" name="selectheader" value="four" <?php checked( $vselectheader, 'four' ); ?> ></li>
            		<li class="header-five"><input type="radio" name="selectheader" value="five" <?php checked( $vselectheader, 'five' ); ?> ></li>
            		<li class="header-six"><input type="radio" name="selectheader" value="six" <?php checked( $vselectheader, 'six' ); ?> ></li>
            		<li class="header-seven"><input type="radio" name="selectheader" value="seven" <?php checked( $vselectheader, 'seven' ); ?> ></li>
            		<li class="header-eight"><input type="radio" name="selectheader" value="eight" <?php checked( $vselectheader, 'eight' ); ?> ></li>
            		<li class="header-nine"><input type="radio" name="selectheader" value="nine" <?php checked( $vselectheader, 'nine' ); ?> ></li>
            		<li class="header-ten"><input type="radio" name="selectheader" value="ten" <?php checked( $vselectheader, 'ten' ); ?> ></li>
	            </ul>
	        </div>
	        <!-- radiantthemes-page-options-body-image-selector -->
	    </div>
	    <!-- radiantthemes-page-options-body -->
	</div>
    <!-- radiantthemes-page-options -->

    <!-- radiantthemes-page-options -->
	<div id="RadiantThemesPageBanner" class="radiantthemes-page-options">
	    <!-- radiantthemes-page-options-title -->
	    <div class="radiantthemes-page-options-title">
	        <p class="title"><?php esc_html_e( 'Select Short Header', 'radiantthemes-custom-post-type' ); ?></p>
	    </div>
	    <!-- radiantthemes-page-options-title -->
	    <!-- radiantthemes-page-options-body -->
	    <div class="radiantthemes-page-options-body">
	        <!-- radiantthemes-page-options-body-image-selector -->
	        <div class="radiantthemes-page-options-body-image-selector">
	            <ul id="RadiantThemesPageBannerSelector">
	                <li class="header-default"><input type="radio" name="bannercheck" value="defaultbannercheck" <?php checked( $default_bannercheck, 'defaultbannercheck' ); ?> ></li>
	                <li class="bannerbreadcumbs"><input type="radio" name="bannercheck" value="bannerbreadcumbs" <?php checked( $vbannercheck, 'bannerbreadcumbs' ); ?> ></li>
            		<li class="banneronly"><input type="radio" name="bannercheck" value="banneronly" <?php checked( $vbannercheck, 'banneronly' ); ?> ></li>
            		<li class="breadcumbsonly"><input type="radio" name="bannercheck" value="breadcumbsonly" <?php checked( $vbannercheck, 'breadcumbsonly' ); ?> ></li>
            		<li class="nobannerbreadcumbs"><input type="radio" name="bannercheck" value="nobannerbreadcumbs" <?php checked( $vbannercheck, 'nobannerbreadcumbs' ); ?> ></li>
	            </ul>
	        </div>
	        <!-- radiantthemes-page-options-body-image-selector -->
	    </div>
	    <!-- radiantthemes-page-options-body -->
	</div>
    <!-- radiantthemes-page-options -->

    <!-- radiantthemes-page-options -->
	<div id="RadiantThemesPageBannerText" class="radiantthemes-page-options">
	    <!-- radiantthemes-page-options-title -->
	    <div class="radiantthemes-page-options-title">
	        <p class="title"><?php esc_html_e( 'Custom Title', 'radiantthemes-custom-post-type' ); ?></p>
	    </div>
	    <!-- radiantthemes-page-options-title -->
	    <!-- radiantthemes-page-options-body -->
	    <div class="radiantthemes-page-options-body">
	        <!-- radiantthemes-page-options-body-form -->
	        <div class="radiantthemes-page-options-body-form">
	            <input type="hidden" name="<?php echo $vbannercheck; ?>">
	            <input type="text" name="banner_title" id="banner_title" value="<?php echo esc_attr( $vbtitle ); ?>" placeholder="Banner Custom Title"/>
	        </div>
	        <!-- radiantthemes-page-options-body-form -->
	    </div>
	    <!-- radiantthemes-page-options-body -->
	</div>
    <!-- radiantthemes-page-options -->

	<?php
}

/**
 * Save Post data
 *
 * @param type $post_id description.
 * @return type
 */
function radiantthemes_page_save_postdata( $post_id ) {
	if ( ( false == strpos( $_SERVER['REQUEST_URI'], 'post-new.php' ) ) && ( false == strpos( $_SERVER['REQUEST_URI'], 'nav-menus.php' ) ) && ( false == strpos( $_SERVER['REQUEST_URI'], 'admin.php' ) ) && ( "trash" !=  $_REQUEST['action'] ) ) {
		if ( 'page' == $_REQUEST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}
		if ( ! isset( $_POST['page_tm'] ) || ! wp_verify_nonce( $_POST['page_tm'], plugin_basename( __FILE__ ) ) ) {
			return;
		}
		$post_ID = $_POST['post_ID'];

		$tbtitle      = sanitize_text_field( $_POST['banner_title'] );
		$tselectheader = sanitize_html_class( $_POST['selectheader'] );
		$tbannercheck = sanitize_html_class( $_POST['bannercheck'] );

		update_post_meta( $post_ID, 'banner_title', $tbtitle );
		update_post_meta( $post_ID, 'selectheader', $tselectheader );
		update_post_meta( $post_ID, 'bannercheck', $tbannercheck );
	}
}
add_action( 'save_post', 'radiantthemes_page_save_postdata' );

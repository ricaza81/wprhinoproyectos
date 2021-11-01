<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package brixel
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function brixel_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! is_user_logged_in() && ! empty( brixel_global_var( 'coming_soon_switch', '', false ) ) ) {
		$classes[] = 'rt-coming-soon';
		if ( ! empty( brixel_global_var( 'coming_soon_custom_background_style', '', false ) ) ) {
			$classes[] = 'coming-soon-' . brixel_global_var( 'coming_soon_custom_background_style', '', false );
		}
	} elseif ( ! is_user_logged_in() && ! empty( brixel_global_var( 'maintenance_mode_switch', '', false ) ) ) {
		$classes[] = 'rt-maintenance-mode';
	} elseif ( ! is_user_logged_in() && ! empty( brixel_global_var( 'coming_soon_switch', '', false ) ) && ! empty( brixel_global_var( 'maintenance_mode_switch', '', false ) ) ) {
		$classes[] = 'rt-coming-soon';
	}

	if ( is_404() && ! empty( brixel_global_var( 'error_custom_background_style', '', false ) ) ) {
		$classes[] = 'error-404-' . brixel_global_var( 'error_custom_background_style', '', false );
	}

	// banner.
	global $post;
	if ( get_page_by_path( 'team', OBJECT, 'page' ) ) {
		$team_page_info = get_page_by_path( 'team', OBJECT, 'page' );
		$team_page_id   = $team_page_info->ID;
	}

	if ( get_page_by_path( 'portfolio', OBJECT, 'page' ) ) {
		$portfolio_page_info = get_page_by_path( 'portfolio', OBJECT, 'page' );
		$portfolio_page_id   = $portfolio_page_info->ID;
	}

	if ( get_page_by_path( 'shop', OBJECT, 'page' ) ) {
		$shop_page_info = get_page_by_path( 'shop', OBJECT, 'page' );
		$shop_page_id   = $shop_page_info->ID;
	}

	$posts_page_id = get_option( 'page_for_posts' );
	$frontpage_id  = get_option( 'page_on_front' );

	if ( is_tax( 'profession' ) ) {
		if ( 'breadcumbsonly' === get_post_meta( $team_page_id, 'bannercheck', true ) || 'nobannerbreadcumbs' === get_post_meta( $team_page_id, 'bannercheck', true ) ) {
			$classes[] = 'no-inner-banner';
		}
	} elseif ( is_singular( 'portfolio' ) || is_tax( 'portfolio-category' ) ) {
		if ( 'breadcumbsonly' === get_post_meta( $portfolio_page_id, 'bannercheck', true ) || 'nobannerbreadcumbs' === get_post_meta( $portfolio_page_id, 'bannercheck', true ) ) {
			$classes[] = 'no-inner-banner';
		}		
	} elseif ( class_exists( 'Tribe__Events__Main' ) && ( is_singular( 'tribe_events' ) || ( tribe_is_past() || tribe_is_upcoming() && !is_tax() ) || ( tribe_is_month() && !is_tax() ) || ( tribe_is_day() && !is_tax() ) ) ) {
		if ( 'breadcumbs-only' === brixel_global_var( 'events_banner_details', '', false ) || 'none' === brixel_global_var( 'events_banner_details', '', false )  ) {
			$classes[] = 'no-inner-banner';
		}	
	} elseif ( class_exists( 'woocommerce' ) && ( is_shop() || is_singular( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) ) {
		if ( 'breadcumbsonly' === get_post_meta( $shop_page_id, 'bannercheck', true ) || 'nobannerbreadcumbs' === get_post_meta( $shop_page_id, 'bannercheck', true ) ) {
			$classes[] = 'no-inner-banner';
		}
	} elseif ( is_front_page() ) {
		if ( 'breadcumbsonly' === get_post_meta( $frontpage_id, 'bannercheck', true ) ) {
			$classes[] = 'no-inner-banner';
		}
	} elseif ( is_search() || is_home() || is_category() || is_archive() || is_tag() || is_singular( 'post' ) ) {
		if ( 'breadcumbsonly' === get_post_meta( $posts_page_id, 'bannercheck', true ) || 'nobannerbreadcumbs' === get_post_meta( $posts_page_id, 'bannercheck', true ) ) {
			$classes[] = 'no-inner-banner';
		}
	} elseif ( ! is_404() ) {
		if ( ( 'breadcumbsonly' === get_post_meta( $post->ID, 'bannercheck', true ) || 'nobannerbreadcumbs' === get_post_meta( $post->ID, 'bannercheck', true ) ) && ( ! is_front_page() ) && ( ! is_404() ) ) {
			$classes[] = 'no-inner-banner';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'brixel_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function brixel_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'brixel_pingback_header' );

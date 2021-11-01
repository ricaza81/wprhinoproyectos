<?php
/**
 * Template for Portfolio Slider Style One
 *
 * @package Radiantthemes
 */

$output = '<div class="rt-portfolio-slider element-one owl-carousel ' . esc_attr( $enable_zoom ) . '" data-portfolio-loop="' . esc_attr( $shortcode['portfolio_slider_allow_loop'] ) . '" data-portfolio-autoplay="' . esc_attr( $shortcode['portfolio_slider_allow_autoplay'] ) . '" data-portfolio-autoplaytimeout="' . esc_attr( $shortcode['portfolio_slider_autoplay_timeout'] ) . '" data-portfolio-desktopitem="' . esc_attr( $shortcode['portfolio_slider_items_in_desktop'] ) . '" data-portfolio-tabitem="' . esc_attr( $shortcode['portfolio_slider_items_in_tab'] ) . '" data-portfolio-mobileitem="' . esc_attr( $shortcode['portfolio_slider_items_in_mobile'] ) . '">';

// WP_Query arguments.
global $wp_query;

$args     = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => -1,
	'orderby'        => esc_attr( $shortcode['portfolio_slider_looping_order'] ),
	'order'          => esc_attr( $shortcode['portfolio_slider_looping_sort'] ),
);
$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'portfolio-category' );

		$output .= '<div class="rt-portfolio-slider-item">';
		$output .= '<div class="holder">';
		$output .= '<div class="pic">';
		$output .= '<img src="' . plugins_url( 'radiantthemes-addons/portfolio-slider/images/blank-image-100x85.png' ) . '" alt="blank image" width="100" height="85">';
		$output .= '<div class="holder">';
		if ( has_post_thumbnail() ) {
			$output .= get_the_post_thumbnail( get_the_ID(), 'large' );
		}
		$output .= '</div>';
		$output .= '</div>';
		if ( 'yes' === $shortcode['portfolio_slider_enable_zoom'] ) {
			$output .= '<div class="data">';
			$output .= '<div class="table">';
			$output .= '<div class="table-cell">';
			$output .= '<div class="holder">';
		    $output .= '<h4>' . get_the_title() . '</h4>';
		    $output .= '<p>';
		    foreach ( $terms as $term ) {
    			$output .= '<span>'. $term->name . '</span>';
    		}
		    $output .= '</p>';
		    $output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<a class="overlay fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '" style="cursor:url(' . plugins_url( 'radiantthemes-addons/portfolio-slider/images/rt-portfolio-slider-cursor.png' ) . ') 25 25, auto;"></a>';
		} else {
			$output .= '<div class="data">';
			$output .= '<div class="table">';
			$output .= '<div class="table-cell">';
			$output .= '<div class="holder">';
		    $output .= '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
		    $output .= '<p>';
		    foreach ( $terms as $term ) {
    			$output .= '<span>'. $term->name . '</span>';
    		}
		    $output .= '</p>';
		    $output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div>';
		$output .= '</div>';
	endwhile;
}
$output .= '</div>';
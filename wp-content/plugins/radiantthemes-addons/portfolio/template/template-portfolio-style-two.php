<?php
/**
 * Template for Portfolio Style Two
 *
 * @package Radiantthemes
 */
if( 'all' == $shortcode['portfolio_category'] || '' == $shortcode['portfolio_category'])
{
	$portfolio_category = '';
}else {
	$portfolio_category =  array(
					array(
						'taxonomy' => 'portfolio-category',
						'field' => 'slug', 
						'terms' => esc_attr( $shortcode['portfolio_category'] ) 
					)
				);
	$hidden_filter = 'hidden';			
}
$output  = '<div class="rt-portfolio-box-filter element-two filter-style-' . esc_attr( $shortcode['portfolio_filter_style'] ) . ' text-' . esc_attr( $shortcode['portfolio_filter_alignment'] ) . ' ' . esc_attr( $hidden_filter ) . '">';
$output .= '<button class="matchHeight current-menu-item" data-filter="*"><span>All Groups</span></button>';

$taxonomy     = 'portfolio-category';
$orderby      = 'name';
$show_count   = 0;     // 1 for yes, 0 for no
$pad_counts   = 0;     // 1 for yes, 0 for no
$hierarchical = 1;     // 1 for yes, 0 for no
$title        = '';
$empty        = 1;
$depth        = 1;

$args = array(
	'taxonomy'     => $taxonomy,
	'orderby'      => $orderby,
	'show_count'   => $show_count,
	'pad_counts'   => $pad_counts,
	'hierarchical' => $hierarchical,
	'title_li'     => $title,
	'hide_empty'   => $empty,
	'depth'        => $depth,
);
$cats = get_categories( $args );

foreach ( $cats as $cat ) {
	$term_id    = $cat->term_id;
	$ptype_name = $cat->name;
	$ptype_des  = $cat->description;
	$ptype_slug = $cat->slug;
	$term_link  = get_term_link( $cat );

	$output .= '<button class="matchHeight" data-filter=".';
	$output .= $ptype_slug;
	$output .= '"><span>';
	$output .= $ptype_name;
	$output .= '</span></button>';
}

$output .= '</div>';
$output .= '<div class="rt-portfolio-box element-two row isotope ' . esc_attr( $enable_zoom ) . '" data-portfolio-box-align="' . esc_attr( $shortcode['portfolio_box_alignment'] ) . ' style="margin-left:-' . esc_attr( $spacing_value ) . 'px; margin-right:-' . esc_attr( $spacing_value ) . 'px;">';

// WP_Query arguments.
global $wp_query;

$args     = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => esc_attr( $shortcode['portfolio_max_posts'] ),
	'orderby'        => esc_attr( $shortcode['portfolio_looping_order'] ),
	'order'          => esc_attr( $shortcode['portfolio_looping_sort'] ),
	'offset'         => esc_attr( $shortcode['portfolio_looping_offset'] ),
	'tax_query'      => $portfolio_category
);
$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'portfolio-category' );

		$output .= '<div class="rt-portfolio-box-item ';
		foreach ( $terms as $term ) {
			$output .= $term->slug . ' ';
		}
		$output .= $portfolio_item_class . '" style="padding:' . esc_attr( $spacing_value ) . 'px;">';
		$output .= '<div class="holder">';
		$output .= '<div class="pic">';
		$output .= '<img src="' . plugins_url( 'radiantthemes-addons/portfolio/images/blank-image-100x75.jpg' ) . '" alt="blank image" width="100" height="75">';
		$output .= '<div class="holder" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ')"></div>';
		if ( 'yes' === $shortcode['portfolio_enable_zoom'] ) {
			$output .= '<a class="title fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '); cursor:url(' . plugins_url( 'radiantthemes-addons/portfolio/images/rt-portfolio-cursor.png' ) . ') 25 25, auto;">';
			$output .= '<div class="table">';
			$output .= '<div class="table-cell">';
			if ( true == $shortcode['portfolio_enable_title'] ) {
			    $output .= '<h4>' . get_the_title() . '</h4>';
			}
			if ( true == $shortcode['portfolio_enable_excerpt'] ) {
			    $output .= '<p>' . wp_trim_words( get_the_excerpt(), 10, '...' ) . '</p>';
			}
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</a>';
		} else {
			$output .= '<div class="title" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');">';
			$output .= '<div class="table">';
			$output .= '<div class="table-cell">';
			if ( true == $shortcode['portfolio_enable_title'] ) {
			    $output .= '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			}
			if ( true == $shortcode['portfolio_enable_excerpt'] ) {
			    $output .= '<p>' . wp_trim_words( get_the_excerpt(), 10, '...' ) . '</p>';
			}
			if ( true == $shortcode['portfolio_enable_link_button'] ) {
				$output .= '<a class="btn" href="' . get_the_permalink() . '">' . esc_html__('View Details', 'radiantthemes-addons') . '</a>';
			}
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '<div class="clearfix"></div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	endwhile;
}
$output .= '</div>';

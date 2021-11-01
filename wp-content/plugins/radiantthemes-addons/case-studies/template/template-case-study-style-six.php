<?php
/**
 * Template for Case Study Style Six
 *
 * @package Radiantthemes
 */

$output  = '<div class="rt-case-study-box-filter element-six filter-style-' . esc_attr( $shortcode['case_study_filter_style'] ) . ' text-' . esc_attr( $shortcode['case_study_filter_alignment'] ) . ' ' . esc_attr( $hidden_filter ) . '">';
$output .= '<button class="matchHeight current-menu-item" data-filter="*"><span>All Groups</span></button>';

$taxonomy     = 'case-study-category';
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
$output .= '<div class="rt-case-study-box element-six row isotope ' . esc_attr( $enable_zoom ) . '" data-case-study-box-align="' . esc_attr( $shortcode['case_study_box_alignment'] ) . '" style="margin-left:-' . esc_attr( $spacing_value ) . 'px; margin-right:-' . esc_attr( $spacing_value ) . 'px;">';

// WP_Query arguments.
global $wp_query;

$no_of_case_studies = ( $shortcode['no_of_case_studies'] ? $shortcode['no_of_case_studies'] : -1 );

$args     = array(
	'post_type'      => 'case-studies',
	'posts_per_page' => esc_attr( $no_of_case_studies ),
	'orderby'        => esc_attr( $shortcode['case_study_looping_order'] ),
	'order'          => esc_attr( $shortcode['case_study_looping_sort'] ),
);
$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'case-study-category' );

		$output .= '<div class="rt-case-study-box-item ';
		foreach ( $terms as $term ) {
			$output .= $term->slug . ' ';
		}
		$output .= $case_study_item_class . '" style="padding:' . esc_attr( $spacing_value ) . 'px;">';
		$output .= '<div class="holder matchHeight">';
		$output .= '<div class="data">';
		if ( true == $shortcode['case_study_enable_title'] ) {
		    if ( 'yes' === $shortcode['case_study_enable_zoom'] ) {
    		    $output .= '<h4><a class="fancybox" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
    		} else {
    		    $output .= '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
    		}
		}
		if ( true == $shortcode['case_study_enable_excerpt'] ) {
		    $output .= '<p>' . wp_trim_words( get_the_excerpt(), 30, '...' ) . '</p>';
		}
	    $output .= '<a class="arrow-link" href="' . get_the_permalink() . '">' . esc_html( $shortcode['case_study_link_button_text'] ) . '<i class="fa fa-arrow-circle-o-right"></i></a>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	endwhile;
}
$output .= '</div>';

<?php
/**
 * Template for Portfolio Style One
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
$output  = '<div class="rt-portfolio-box-filter element-one filter-style-' . esc_attr( $shortcode['portfolio_filter_style'] ) . ' text-' . esc_attr( $shortcode['portfolio_filter_alignment'] ) . ' ' . esc_attr( $hidden_filter ) . '">';

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

$output .= '<button class="matchHeight current-menu-item" data-filter="*"><span>Show All</span></button>';
$output .= '</div>';
$output .= wp_reset_query();
$output .= '<div class="rt-portfolio-box element-one row isotope ' . esc_attr( $enable_zoom ) . '" data-portfolio-box-align="' . esc_attr( $shortcode['portfolio_box_alignment'] ) . '" style="margin-left:-' . esc_attr( $spacing_value ) . 'px; margin-right:-' . esc_attr( $spacing_value ) . 'px;">';

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

		$output .= '<div data-wow-delay="0.3s" class="rt-portfolio-box-item ';
		foreach ( $terms as $term ) {
			$output .= $term->slug . ' ';
		}
		$output .= $portfolio_item_class . '" style="padding:' . esc_attr( $spacing_value ) . 'px;">';
    		$output .= '<div class="holder">';
    		    $output .= '<div class="pic">';
    		        $output .= get_the_post_thumbnail( get_the_ID(), 'full' );
    		        $output .= '<div class="overlay">';
                        $output .= '<div class="table">';
                            $output .= '<div class="table-cell">';
                        		if ( 'yes' === $shortcode['portfolio_enable_link'] ) {
                        		    $output .= '<a class="btn" href="' . get_the_permalink() . '"><i class="fa fa-link"></i></a>';
                        		}
                        		if ( 'yes' === $shortcode['portfolio_enable_zoom'] ) {
                        		    $output .= '<a class="btn fancybox" href="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"><i class="fa fa-search-plus"></i></a>';
                        		}
        		            $output .= '</div>';
        		        $output .= '</div>';
        		    $output .= '</div>';
    		    $output .= '</div>';
    		    $output .= '<div class="data">';
    		        $output .= '<div class="row">';
    		            $output .= '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">';
    		                if ( true == $shortcode['portfolio_enable_title'] ) {
                    		    $output .= '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
                    		}
                    		if ( true == $shortcode['portfolio_enable_excerpt'] ) {
                    		    $output .= '<p>' . wp_trim_words( get_the_excerpt(), 10, '...' ) . '</p>';
                    		}
    		            $output .= '</div>';
    		            $output .= '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';
    		                $output .= '<ul class="category-list">';
    		                    foreach ( $cats as $cat ) {
                                	$term_id    = $cat->term_id;
                                	$ptype_name = $cat->name;
                                	$ptype_des  = $cat->description;
                                	$ptype_slug = $cat->slug;
                                	$term_link  = get_term_link( $cat );
                                	$output .= '<li>';
                                	$output .= $ptype_name;
                                	$output .= '</li>';
                                }
    		                $output .= '</ul>';
    		            $output .= '</div>';
		            $output .= '</div>';
    		    $output .= '</div>';
    		$output .= '</div>';
		$output .= '</div>';
	endwhile;
}
$output .= '</div>';

<?php
/**
 * Template for Blog Item Two.
 *
 * @package Radiantthemes
 */
$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder">';
$output .= '<div class="pic">';
$output .= '<img src="' . plugins_url( 'radiantthemes-addons/blog/images/blank-image-100x60.jpg' ) . '" alt="blank image" width="100" height="60">';
$output .= '<div class="holder">';
$output .= '<a href="' . get_the_permalink() . '">';
$output .= get_the_post_thumbnail( get_the_ID(), 'full' );
$output .= '</a>';
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="category-display">';
$output .= '<ul>';
$category_detail = get_the_category( get_the_id() );
foreach ( $category_detail as $item ) :
    $category_link = get_category_link( $item->cat_ID );
    $output       .= '<li><a href = "' . esc_url( $category_link ) . '">' . $item->name . '</a></li>';
endforeach;
$output .= '</ul>';
$output .= '</div>';
$output .= '<div class="data">';
$output .= '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
$output .= '<p>' . substr( get_the_excerpt(), 0, 110 ) . '...</p>';
$output .= '<ul class="post-meta">';
$output .= '<li><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '"><strong>' . get_the_author() . '</strong></a></li>';
$output .= '<li><a href="' . get_the_permalink() . '">' . get_the_date( 'F n, Y' ) . '</a></li>';
$output .= '</ul>';
$output .= '</div>';
$output .= '</article>';

<?php
/**
 * Template Blog Item Eight.
 *
 * @package Radiantthemes
 */
$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder matchHeight">';

if ( $data % 2 ) :
	$output .= '<div class="data">';
	$output .= '<h4>';
	$output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
	$output .= '</h4>';
	$output .= '<ul class="meta">';
	$output .= '<li>' . get_the_date( 'j F, Y' ) . '</li>';
	$output .= '<li>';
	$output .= '<a href="' . get_comments_link() . '">';
	$output .= esc_html__( 'Comments (', 'radiantthemes-addons' ) . get_comments_number() . ')';
	$output .= '</a>';
	$output .= '</li>';
	$output .= '</ul>';
	$output .= '<p>' . wp_trim_words( get_the_excerpt(), 12, '...' ) . '</p>';
	$output .= '<hr>';
	$output .= '<a class="btn" href="' . get_the_permalink() . '">' . esc_html__( 'Read More', 'radiantthemes-addons' ) . '</a>';
	$output .= '</div>';
	$output .= '<div class="pic">';
	$output .= '<img src="' . plugins_url( 'radiantthemes-addons/blog/images/blank-image-100x90.jpg' ) . '" alt="blank image" width="100" height="90">';
	$output .= '<a class="holder" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ')"></a>';
	$output .= '</div>';
else :
	$output .= '<div class="pic">';
	$output .= '<img src="' . plugins_url( 'radiantthemes-addons/blog/images/blank-image-100x90.jpg' ) . '" alt="blank image" width="100" height="90">';
	$output .= '<a class="holder" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ')"></a>';
	$output .= '</div>';
	$output .= '<div class="data">';
	$output .= '<h4>';
	$output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
	$output .= '</h4>';
	$output .= '<ul class="meta">';
	$output .= '<li>' . get_the_date( 'j F, Y' ) . '</li>';
	$output .= '<li>';
	$output .= '<a href="' . get_comments_link() . '">';
	$output .= esc_html__( 'Comments (', 'radiantthemes-addons' ) . get_comments_number() . ')';
	$output .= '</a>';
	$output .= '</li>';
	$output .= '</ul>';
	$output .= '<p>' . wp_trim_words( get_the_excerpt(), 12, '...' ) . '</p>';
	$output .= '<hr>';
	$output .= '<a class="btn" href="' . get_the_permalink() . '">' . esc_html__( 'Read More', 'radiantthemes-addons' ) . '</a>';
	$output .= '</div>';
endif;
$data++;
$output .= '</div>';
$output .= '</article>';

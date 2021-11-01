<?php
/**
 * Template Blog Three.
 *
 * @package Radiantthemes
 */

$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder matchHeight">';
$output .= '<div class="row">';
$output .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
if ( has_post_thumbnail() ) :
	$output .= '<div class="pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');">';
else :
	$output .= '<div class="pic">';
endif;

if ( has_post_thumbnail() ) :
	$output .= get_the_post_thumbnail( get_the_ID(), 'large', [ 'class' => 'hidden-lg hidden-md hidden-sm visible-xs' ] );
else :
	$output .= '<img class="hidden-lg hidden-md hidden-sm visible-xs" src="' . plugins_url( 'radiantthemes-addons/blog/images/blog-style-one.png' ) . '" alt="' . get_the_title() . '" title="' . get_the_title() . '">';
endif;

$output .= '</div>';
$output .= '</div>';
$output .= '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
$output .= '<div class="data">';
$output .= '<div class="date">';
$output .= get_the_date( 'j F, Y' );
$output .= '</div>';
$output .= '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
$output .= '<p>' . wp_trim_words( get_the_excerpt(), 12, '...' ) . '</p>';
$output .= '<a class="btn" href="' . get_the_permalink() . '">' . esc_html__( 'Read More', 'radiantthemes-addons' ) . '</a>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';

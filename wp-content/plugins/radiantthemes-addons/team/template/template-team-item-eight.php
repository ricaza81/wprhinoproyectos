<?php
/**
 * Template Style Eight for Team
 *
 * @package Radiantthemes
 */

$output     .= '<!-- team-item -->' . "\r";
$output     .= '<div class="team-item ' . $rt_animation . '" ' . $time . '>';
$output     .= '<div class="holder">';
$output     .= '<div class="pic">';
$output     .= '<img src="' . plugins_url( 'radiantthemes-addons/team/images/blank-image-100x120.jpg' ) . '" alt="blank image" width="100" height="120">';
$output     .= '<div class="holder"><a href="' . get_the_permalink() . '">';
	$output .= get_the_post_thumbnail( get_the_ID(), 'large' );
$output     .= '</a></div></div><div class="data">';
$output     .= '<h5><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
$terms       = get_the_terms( get_the_ID(), 'profession' );
if ( ! empty( $terms ) ) {
	foreach ( $terms as $term ) {
		$output .= '<p class="designation">' . $term->name . '</p>';
	}
}
$output  .= '<ul class="social">';
$facebook = get_post_meta( get_the_ID(), '_team_facebook', true );
$twitter  = get_post_meta( get_the_ID(), '_team_twitter', true );
$gplus    = get_post_meta( get_the_ID(), '_team_gplus', true );
$linkedin = get_post_meta( get_the_ID(), '_team_pinterest', true );
if ( ! empty( $facebook ) ) :
	$output .= '<li><a href="' . $facebook . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
endif;
if ( ! empty( $twitter ) ) :
	$output .= '<li><a href="' . $twitter . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
endif;
if ( ! empty( $gplus ) ) :
	$output .= '<li><a href="' . $gplus . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
endif;
if ( ! empty( $linkedin ) ) :
	$output .= '<li><a href="' . $linkedin . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
endif;
$output .= '</ul></div></div></div>';
$output .= '<!-- team-item -->';

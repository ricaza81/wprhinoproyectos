<?php
/**
 * Template Style Two for Team
 *
 * @package Radiantthemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="team-item ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder">';
$output .= '<div class="pic">';
$output .= '<img src="' . plugins_url( 'radiantthemes-addons/team/images/blank-image-100x140.jpg' ) . '" alt="blank image" width="100" height="140">';
$output .= '<div class="holder" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
$output .= '<div class="data">';
$output .= '<div class="table">';
$output .= '<div class="table-cell">';
$output .= '<h5><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';

$terms = get_the_terms( get_the_ID(), 'profession' );

if ( ! empty( $terms ) ) {
	foreach ( $terms as $term ) {
		$output .= '<p>' . $term->name . '</p>';
	}
}

$output .= '<ul class="social">';

$facebook = get_post_meta( get_the_ID(), '_team_facebook', true );
$twitter  = get_post_meta( get_the_ID(), '_team_twitter', true );
$gplus    = get_post_meta( get_the_ID(), '_team_gplus', true );
$linkedin = get_post_meta( get_the_ID(), '_team_pinterest', true );

if ( ! empty( $facebook ) ) :
	$output .= '<li class="fa fa-facebook"><a href="' . $facebook . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
endif;

if ( ! empty( $twitter ) ) :
	$output .= '<li class="fa fa-twitter"><a href="' . $twitter . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
endif;

if ( ! empty( $gplus ) ) :
	$output .= '<li class="fa fa-google-plus"><a href="' . $gplus . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
endif;

if ( ! empty( $linkedin ) ) :
	$output .= '<li class="fa fa-linkedin"><a href="' . $linkedin . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
endif;

$output .= '</ul></div></div></div></div></div></div>';

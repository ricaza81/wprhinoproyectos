<?php
/**
 * Template Style Twelve for Team
 *
 * @package Radiantthemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="team-item ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder">';
$output .= '<div class="pic">';
$output .= '<img src="' . plugins_url( 'radiantthemes-addons/team/images/blank-image-100x105.jpg' ) . '" alt="blank image" width="100" height="105">';
$output .= '<div class="holder" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . ');"></div>';
$output .= '<div class="data">';
$output .= '<p>' . get_the_excerpt() . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="title matchHeight">';
$output .= '<h5><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
$terms = get_the_terms( get_the_ID(), 'profession' );
if ( ! empty( $terms ) ) {
	foreach ( $terms as $term ) {
		$output .= '<p class="designation">' . $term->name . '</p>';
	}
}
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

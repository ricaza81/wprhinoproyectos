<?php
/**
 * Template Style Eleven for Team
 *
 * @package Radiantthemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="team-item ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder">';
$output .= '<div class="pic">';
$output .= '<img src="' . plugins_url( 'radiantthemes-addons/team/images/blank-image-100x90.jpg' ) . '" alt="blank image" width="100" height="90">';
$output .= '<div class="holder"><a href="' . get_the_permalink() . '">';
$output .= get_the_post_thumbnail( get_the_ID(), 'full' );
$output .= '</a></div>';
$output .= '</div>';
$output .= '<div class="data matchHeight">';
$output .= '<h5><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';

$terms = get_the_terms( get_the_ID(), 'profession' );

if ( ! empty( $terms ) ) {
	foreach ( $terms as $term ) {
		$output .= '<p class="designation">' . $term->name . '</p>';
	}
}

$output .= '<p class="phone">' . get_post_meta( get_the_ID(), '_team_phone', true ) . '</p>';
$output .= '<p class="email">' . get_post_meta( get_the_ID(), '_team_email', true ) . '</p>';
$output .= '</div></div></div>';

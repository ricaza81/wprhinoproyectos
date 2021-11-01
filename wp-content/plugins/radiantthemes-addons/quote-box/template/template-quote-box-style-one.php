<?php
/**
 * Template Quote Box Style One.
 *
 * @package Radiantthemes
 */

if ( ! empty( $shortcode['quote_box_image'] ) ) {
	$output .= '<div class="holder has-image">';
} else {
	$output .= '<div class="holder">';
}
if ( ! empty( $shortcode['quote_box_image'] ) ) {
	$output .= '<div class="pic">';
	$output .= wp_get_attachment_image( $shortcode['quote_box_image'], 'full' );
	$output .= '</div>';
}
$output .= '<div class="data text-' . esc_attr( $shortcode['quote_box_alignment'] ) . '">';
$output .= '<blockquote>' . esc_attr( $shortcode['quote_box_quotation'] ) . '';
if ( ! empty( $shortcode['quote_box_name'] ) ) {
	$output .= '<cite>' . esc_attr( $shortcode['quote_box_name'] ) . '</cite>';
}
$output .= '</blockquote>';
$output .= '</div>';
$output .= '</div>';

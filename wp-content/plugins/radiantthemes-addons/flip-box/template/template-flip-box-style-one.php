<?php
/**
 * Template Flip Box Style One.
 *
 * @package Radiantthemes
 */

if ( 'horizontal' === $shortcode['flip_box_axis'] ) {
	$output .= '<div class="holder horizontal">';
} elseif ( 'vertical' === $shortcode['flip_box_axis'] ) {
	$output .= '<div class="holder vertical">';
}

$output .= '<div class="first-card">';
$output .= '<div class="table">';
$output .= '<div class="table-cell ' . esc_attr( $flip_box_first_card_css_class ) . '">';
if ( ! empty( $shortcode['flip_box_first_card_image'] ) ) {
	$output .= wp_get_attachment_image( $shortcode['flip_box_first_card_image'], 'full' );
}
if ( ! empty( $shortcode['flip_box_first_card_title'] ) ) {
	$output .= '<h4>' . esc_attr( $shortcode['flip_box_first_card_title'] ) . '</h4>';
}
if ( ! empty( $shortcode['flip_box_first_card_content'] ) ) {
	$output .= '<p>' . esc_attr( $shortcode['flip_box_first_card_content'] ) . '</p>';
}
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="second-card">';
$output .= '<div class="table">';
$output .= '<div class="table-cell ' . esc_attr( $flip_box_second_card_css_class ) . '">';
if ( ! empty( $shortcode['flip_box_second_card_title'] ) ) {
	$output .= '<h4>' . esc_attr( $shortcode['flip_box_second_card_title'] ) . '</h4>';
}
if ( ! empty( $shortcode['flip_box_second_card_content'] ) ) {
	$output .= '<p>' . esc_attr( $shortcode['flip_box_second_card_content'] ) . '</p>';
}
$output .= '<a class="btn" href="' . esc_url( $flip_box_second_card_button_url ) . '" target="' . esc_html( $flip_box_second_card_button_target ) . '" rel="' . esc_html( $flip_box_second_card_button_rel ) . '">' . esc_attr( $flip_box_second_card_button_title ) . '</a>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

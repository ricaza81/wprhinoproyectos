<?php
/**
 * Template Style One Pricing Table
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder">';
$output .= '<div class="heading">';
if ( ! empty( $shortcode['pricing_table_title'] ) ) {
	$output .= '<p class="title">' . $shortcode['pricing_table_title'] . '</p>';
}
if ( ! empty( $shortcode['pricing_table_subtitle'] ) ) {
	$output .= '<p class="subtitle">' . $shortcode['pricing_table_subtitle'] . '</p>';
}
$output .= '</div>';
$output .= '<div class="pricing">';
if ( ! empty( $shortcode['pricing_table_price'] ) ) {
	$output .= '<p class="price"><strong>' . $shortcode['pricing_table_currency_symbol'] . '</strong>' . $shortcode['pricing_table_price'] . '</p>';
}
if ( ! empty( $shortcode['pricing_table_period'] ) ) {
	$output .= '<p class="period">' . $shortcode['pricing_table_period'] . '</p>';
}
if ( ! empty( $shortcode['pricing_table_tagline'] ) ) {
	$output .= '<p class="tagline">' . $shortcode['pricing_table_tagline'] . '</p>';
}
$output .= '</div>';
if ( ! empty( $shortcode['pricing_table_content'] ) ) {
	$output .= '<div class="list">' . $shortcode['pricing_table_content'] . '</div>';
}
$output .= '<div class="more">';
$output .= '<a class="btn" href="' . $shortcode['pricing_table_button_link'] . '">' . $shortcode['pricing_table_button'] . '<i class="fa fa-long-arrow-right"></i></a>';
$output .= '</div>';
$output .= '</div>';

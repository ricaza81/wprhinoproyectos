<?php
/**
 * Template ihover style six.
 *
 * @package Radiantthemes
 */
 
$output .= '<div class="holder">';
$output .= '<div class="pic">';
$output .= wp_get_attachment_image( $shortcode['ihover_image'], 'full' );
$output .= '</div>';
$output .= '<div class="data">';
$output .= '<div class="table">';
$output .= '<div class="table-cell">';
$output .= '<h2>' . esc_attr( $shortcode['title'] ) . '</h2>';
$output .= '<p>' . esc_attr( $shortcode['ihover_content'] ) . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';


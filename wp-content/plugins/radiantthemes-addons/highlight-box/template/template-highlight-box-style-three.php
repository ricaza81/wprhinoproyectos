<?php
/**
 * Template Highlight Box Style One.
 *
 * @package Radiantthemes
 */
 
$output .= '<div class="holder">';
$output .= '<div class="pic">';
$output .= wp_get_attachment_image( $shortcode['highlight_box_image'], 'full' );
$output .= '</div>';
$output .= '<div class="data matchHeight">';
$output .= '<h4>' . esc_attr( $shortcode['highlight_box_title'] ) . '</h4>';
$output .= '<p>' . esc_attr( $shortcode['highlight_box_content'] ) . '</p>';
$output .= '<a class="btn" href="' . esc_url( $highlight_box_url ) . '" target="' . esc_html( $highlight_box_target ) . '" rel="' . esc_html( $highlight_box_rel ) . '">' . esc_attr( $highlight_box_title ) . '</a>';
$output .= '</div>';
$output .= '</div>';
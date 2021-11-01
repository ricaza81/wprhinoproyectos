<?php
/**
 * Template Highlight Box Style One.
 *
 * @package Radiantthemes
 */
 
$output .= '<div class="row holder">';
$output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
$output .= '<div class="data matchHeight">';
$output .= '<div class="table">';
$output .= '<div class="table-cell">';
$output .= '<h4>' . esc_attr( $shortcode['highlight_box_title'] ) . '</h4>';
$output .= '<p>' . esc_attr( $shortcode['highlight_box_content'] ) . '</p>';
$output .= '<a class="btn" href="' . esc_url( $highlight_box_url ) . '" target="' . esc_html( $highlight_box_target ) . '" rel="' . esc_html( $highlight_box_rel ) . '">' . esc_attr( $highlight_box_title ) . '</a>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
$output .= '<div class="pic matchHeight">';
$output .= '<div class="table">';
$output .= '<div class="table-cell">';
$output .= wp_get_attachment_image( $shortcode['highlight_box_image'], 'full' );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
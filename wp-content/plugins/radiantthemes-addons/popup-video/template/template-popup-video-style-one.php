<?php
/**
 * Popup Video Template Style One
 *
 * @package Radiantthemes
 */

$output .= '<div id="' . esc_html( $shortcode['extra_id'] ) . '" class="rt-popup-video element-' . esc_html( $shortcode['popup_video_style_variation'] ) . ' ' . esc_html( $shortcode['extra_class'] ) . '" data-popup-video-align="' . esc_attr( $shortcode['popup_video_alignment'] ) . '">';
$output .= '<div class="holder">';
$output .= '<div class="icon">';
$output .= '<a class="video-link" href="' . esc_url( $shortcode['popup_video_link'] ) . '">' . wp_get_attachment_image( $shortcode['popup_video_image'], 'full' ) . '</a>';
$output .= '</div></div></div>';

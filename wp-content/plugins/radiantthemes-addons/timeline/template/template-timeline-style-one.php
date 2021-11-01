<?php
/**
 * Timeline Template Style One
 *
 * @package Radiantthemes
 */

$output .= '<div class="radiantthemes-timeline-item row">';
$output .= '<div class="radiantthemes-timeline-item-pic col-lg-5 col-md-5 col-sm-5 col-xs-12">';
$output .= '<div class="radiantthemes-timeline-item-pic-main  matchHeight">';
$output .= '<img src="' . plugins_url( 'radiantthemes-addons/timeline/images/Blank-Image-100x90.jpg' ) . '" alt="blank image" width="100" height="90">';
$output .= '<div class="holder">';
$output .= wp_get_attachment_image( $shortcode['radiant_timeline_image'], 'full' );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="radiantthemes-timeline-item-data col-lg-7 col-md-7 col-sm-7 col-xs-12">';
$output .= '<div class="holder matchHeight">';
$output .= '<h4 class="title">' . esc_html( $shortcode['radiant_timeline_title'] ) . '</h4>';
$output .= '<p>' . $content . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

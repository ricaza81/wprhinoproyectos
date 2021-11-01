<?php
/**
 * Timeline Template Style Two
 *
 * @package Radiantthemes
 */

$output .= '<div class="radiantthemes-timeline-item row">';
$output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
$output .= '<div class="radiantthemes-timeline-item-icon">';
$output .= '<div class="holder">';
$output .= wp_get_attachment_image( $shortcode['radiant_timeline_image'], 'thumbnail' );
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="radiantthemes-timeline-item-date">';
$output .= '<h5 class="date">' . esc_html( $shortcode['radiant_timeline_date_month'] ) . '<strong>' . esc_html( $shortcode['radiant_timeline_date_year'] ) . '</strong></h5>';
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
$output .= '<div class="radiantthemes-timeline-item-data">';
$output .= '<div class="holder">';
$output .= '<h4 class="title">' . esc_html( $shortcode['radiant_timeline_title'] ) . '</h4>';
$output .= '<p>' . $content . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

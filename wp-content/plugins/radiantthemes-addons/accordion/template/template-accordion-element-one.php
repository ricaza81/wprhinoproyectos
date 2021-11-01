<?php
/**
 * Accordion Template Style One
 *
 * @package Radiantthemes
 */

$output .= '<div class="rt-accordion-item">';
$output .= '<div class="rt-accordion-item-title">';
$output .= '<div class="rt-accordion-item-title-icon"><i class="fa fa-angle-down"></i></div>';
$output .= '<h4 class="panel-title">' . esc_attr( $shortcode['radiant_accordiontitle'] ) . '</h4>';
$output .= '</div>';
$output .= '<div class="rt-accordion-item-body">';
$output .= $content;
$output .= '</div>';
$output .= '</div>';

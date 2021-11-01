<?php
/**
 * Animated Link Template Style Two
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder">';
$output .= '<a class="main-link" href="' . esc_url( $animated_url ) . '" target="' . esc_html( $animated_target ) . '" rel="' . esc_html( $animated_rel ) . '">' . esc_attr( $animated_title ) . '</a>';
$output .= '</div>';

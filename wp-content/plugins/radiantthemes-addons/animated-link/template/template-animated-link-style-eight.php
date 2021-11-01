<?php
/**
 * Animated Link Template Style Eight
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder">';
$output .= '<a class="main-link-fliper" href="' . esc_url( $animated_url ) . '" target="' . esc_html( $animated_target ) . '" rel="' . esc_html( $animated_rel ) . '">' . esc_attr( $animated_title ) . '</a>';
$output .= '<a class="main-link" href="' . esc_url( $animated_url ) . '" target="' . esc_html( $animated_target ) . '" rel="' . esc_html( $animated_rel ) . '">' . esc_attr( $animated_title ) . '</a>';
$output .= '</div>';

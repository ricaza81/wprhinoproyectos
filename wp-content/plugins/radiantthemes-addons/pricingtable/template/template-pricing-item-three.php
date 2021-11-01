<?php
/**
 * Template Style Three Pricing Table
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder">';
$output .= '<div class="title">';
$output .= '<h4>' . $shortcode['pricing_table_title'] . '</h4>';
$output .= '<h5><strong>' . $shortcode['pricing_table_currency_symbol'] . '' . $shortcode['pricing_table_price'] . '</strong> ' . $shortcode['pricing_table_period'] . '</h5>';
$output .= '</div>';
$output .= '<div class="list">' . $shortcode['pricing_table_content'] . '</div>';
$output .= '<div class="data">';
$output .= '<a class="btn" href="' . $shortcode['pricing_table_button_link'] . '">' . $shortcode['pricing_table_button'] . '</a>';
$output .= '<a class="btn-hover" href="' . $shortcode['pricing_table_button_link'] . '"><i class="fa fa-arrow-right"></i></a>';
$output .= '</div>';
$output .= '</div>';

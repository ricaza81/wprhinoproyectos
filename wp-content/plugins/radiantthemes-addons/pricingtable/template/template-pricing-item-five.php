<?php
/**
 * Template Style Five Pricing Table
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder">';
$output .= '<div class="title">';
$output .= '<h4>' . $shortcode['pricing_table_title'] . '</h4>';
$output .= '<h5>' . $shortcode['pricing_table_currency_symbol'] . '' . $shortcode['pricing_table_price'] . '<span>/' . $shortcode['pricing_table_period'] . '</span>';
$output .= '</div>';
$output .= '<div class="list">' . $shortcode['pricing_table_content'] . '</div>';
$output .= '<div class="data">';
$output .= '<a class="btn" href="' . $shortcode['pricing_table_button_link'] . '">' . $shortcode['pricing_table_button'] . '</a>';
$output .= '</div>';
$output .= '</div>';

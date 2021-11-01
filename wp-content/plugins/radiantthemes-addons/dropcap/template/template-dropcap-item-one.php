<?php
/**
 * Template Style One Dropcap
 *
 * @package Radiantthemes
 */

$output .= '<div class="holder">';
$output .= '<div class="rt-dropcap-letter" style="background-color:' . $shortcode['background_color'] . '; border-color:' . $shortcode['border_color'] . '; color:' . $shortcode['text_color'] . ';">';
$output .= $content[0];
$output .= '</div>';
$output .= $content;
$output .= '</div>';

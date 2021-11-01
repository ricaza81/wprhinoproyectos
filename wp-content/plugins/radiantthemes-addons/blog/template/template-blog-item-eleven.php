<?php
/**
 * Template Blog Item Eleven.
 *
 * @package Radiantthemes
 */

$output .= '<article class="blog-item '. $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder matchHeight">';
$output .= '<div class="pic">';
$output .= '<img src="' . plugins_url( 'radiantthemes-addons/blog/images/blank-image-100x60.jpg' ) . '" alt="blank image" width="100" height="60">';
$output .= '<a class="holder" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ')">';
$output .= '</a>';
$output .= '</div>';
$output .= '<div class="data">';
$output .= '<h4>';
$output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
$output .= '</h4>';
$output .= '<ul class="meta">';
$output .= '<li><i class="fa fa-clock-o"></i>' . get_the_date() . '</li>';
$output .= '</ul>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';

<?php
/**
 * Template Blog Item Eight.
 *
 * @package Radiantthemes
 */

$output .= '<article class="blog-item '. $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder matchHeight">';
$output .= '<div class="pic">';
$output .= '<img src="' . plugins_url( 'radiantthemes-addons/blog/images/blank-image-100x70.jpg' ) . '" alt="blank image" width="100" height="70">';
$output .= '<div class="holder">';
$output .= get_the_post_thumbnail( get_the_ID(), 'large' );
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="data">';
$output .= '<ul class="meta">';
$output .= '<li><i class="fa fa-user-o"></i>' . get_the_author_link() . '</li>';
$output .= '<li><i class="fa fa-clock-o"></i>' . get_the_date() . '</li>';
$output .= '</ul>';
$output .= '<h4>';
$output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
$output .= '</h4>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';

<?php
/**
 * Template Blog Item Nine.
 *
 * @package Radiantthemes
 */

$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder matchHeight">';
$output .= '<div class="pic">';
$output .= '<img src="' . plugins_url( 'radiantthemes-addons/blog/images/blank-image-100x70.jpg' ) . '" alt="blank image" width="100" height="70">';
$output .= '<a class="holder" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ')"></a>';
$output .= '</div>';
$output .= '<div class="data">';
$output .= '<ul class="meta">';
$output .= '<li>' . esc_html__( 'By: ', 'radiantthemes-addons' ) . get_the_author_link() . '</li>';
$output .= '<li>' . esc_html__( 'On: ', 'radiantthemes-addons' ) . get_the_date() . '</li>';
$output .= '</ul>';
$output .= '<h4>';
$output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
$output .= '</h4>';
$output .= '<p>' . wp_trim_words( get_the_excerpt(), 20, '...' ) . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';

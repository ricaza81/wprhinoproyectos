<?php
/**
 * Template for Custom Menu Two
 *
 * @package Radiantthemes
 */

$args    = array(
	'theme_location'  => '',
	'menu'            => $shortcode['nav_menu'],
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'menu',
	'menu_id'         => '',
	'echo'            => false,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => '',
);
$output .= wp_nav_menu( $args );

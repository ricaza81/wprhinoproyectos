<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<?php
if ( ! empty( brixel_global_var( 'shop_box_style', '', false ) ) ) {
	include get_parent_theme_file_path( 'woocommerce/shop-box/shop-box-' . brixel_global_var( 'shop_box_style', '', false ) . '.php' );
} else {
	include get_parent_theme_file_path( 'woocommerce/shop-box/shop-box-style-one.php' );
}
?>
<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' ); ?>

	<!-- wraper_shop_main -->
	<div class="wraper_shop_main">
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php if ( 'shop-nosidebar' === brixel_global_var( 'shop-sidebar', '', false ) ) { ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php } else { ?>
					<?php if ( 'shop-leftsidebar' === brixel_global_var( 'shop-sidebar', '', false ) ) { ?>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right">
					<?php } elseif ( 'shop-rightsidebar' === brixel_global_var( 'shop-sidebar', '', false ) ) { ?>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-left">
					<?php } else { ?>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
					<?php } ?>
				<?php } ?>
					<?php
						/**
						 * Woocommerce Content Hook.
						 * woocommerce_before_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
						 * @hooked woocommerce_breadcrumb - 20
						 * @hooked WC_Structured_Data::generate_website_data() - 30
						 */
						//do_action( 'woocommerce_before_main_content' );
					?>

					<header class="woocommerce-products-header">

						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

							<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

						<?php endif; ?>

						<?php
							/**
							 * Woocommerce Archive Description hook.
							 * woocommerce_archive_description hook.
							 *
							 * @hooked woocommerce_taxonomy_archive_description - 10
							 * @hooked woocommerce_product_archive_description - 10
							 */
							do_action( 'woocommerce_archive_description' );
						?>

					</header>

						<?php if ( have_posts() ) : ?>

							<?php
								/**
								 * Woocommerce Before Shop Loop hook.
								 * woocommerce_before_shop_loop hook.
								 *
								 * @hooked wc_print_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_before_shop_loop' );
							?>

							<?php woocommerce_product_loop_start(); ?>

								<?php woocommerce_product_subcategories(); ?>

								<?php
								while ( have_posts() ) :
									the_post();
								?>

									<?php
										/**
										 * Woocommerce Shop Loop hook.
										 * woocommerce_shop_loop hook.
										 *
										 * @hooked WC_Structured_Data::generate_product_data() - 10
										 */
										do_action( 'woocommerce_shop_loop' );
									?>

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
										exit; // Exit if accessed directly.
									}

									global $product;

									// Ensure visibility.
									if ( empty( $product ) || ! $product->is_visible() ) {
										return;
									}
								    wc_get_template_part( 'content', 'product' );
								endwhile; // end of the loop. ?>

							<?php woocommerce_product_loop_end(); ?>

							<?php
								/**
								 * Woocommerce After Shop Loop hook.
								 * woocommerce_after_shop_loop hook.
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								do_action( 'woocommerce_after_shop_loop' );
							?>

						<?php
						elseif ( ! woocommerce_product_subcategories(
							array(
								'before' => woocommerce_product_loop_start( false ),
								'after'  => woocommerce_product_loop_end( false ),
							)
						) ) :
						?>

							<?php
								/**
								 * Woocommerce No Products Found hook.
								 * woocommerce_no_products_found hook.
								 *
								 * @hooked wc_no_products_found - 10
								 */
								do_action( 'woocommerce_no_products_found' );
							?>

						<?php endif; ?>

					<?php
						/**
						 * Woocommerce After Main Content hook.
						 * woocommerce_after_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
					?>
				</div>
				<?php if ( 'shop-nosidebar' === brixel_global_var( 'shop-sidebar', '', false ) ) { ?>
				<?php } else { ?>
					<?php if ( 'shop-leftsidebar' === brixel_global_var( 'shop-sidebar', '', false ) ) { ?>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-left">
					<?php } elseif ( 'shop-rightsidebar' === brixel_global_var( 'shop-sidebar', '', false ) ) { ?>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
					<?php } else { ?>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
					<?php } ?>
						<aside id="secondary" class="widget-area">
						<?php
							/**
							 * Sidebar
							 */
							dynamic_sidebar( 'brixel-product-sidebar' );
						?>
						</aside>
					</div>
				<?php } ?>
			</div>
			<!-- row -->
		</div>
	</div>
	<!-- wraper_shop_main -->

<?php
get_footer( 'shop' );

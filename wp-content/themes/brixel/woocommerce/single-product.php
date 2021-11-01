<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' ); ?>

	<!-- wraper_shop_single -->
	<div class="wraper_shop_single">
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php if ( 'shop-details-nosidebar' === brixel_global_var( 'shop-details-sidebar', '', false ) ) { ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php } else { ?>
					<?php if ( 'shop-details-leftsidebar' === brixel_global_var( 'shop-details-sidebar', '', false ) ) { ?>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right">
					<?php } elseif ( 'shop-details-rightsidebar' === brixel_global_var( 'shop-details-sidebar', '', false ) ) { ?>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-left">
					<?php } else { ?>
						<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
					<?php } ?>
				<?php } ?>
				    <!-- shop_single -->
				    <div class="shop_single">
				        <?php
    						/**
    						 * Woocommerce Before Main Content hook.
    						 * woocommerce_before_main_content hook.
    						 *
    						 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
    						 * @hooked woocommerce_breadcrumb - 20
    						 */
    						// do_action( 'woocommerce_before_main_content' );
    					?>
						<?php
						while ( have_posts() ) :
							the_post();
						?>
							<?php
							/**
							 * The template for displaying product content in the single-product.php template
							 *
							 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
							 * @version     3.0.0
							 */
							if ( ! defined( 'ABSPATH' ) ) {
								exit; // Exit if accessed directly.
							}
							?>
							<?php
							/**
							 * Woocommerce Before Single Product hook.
							 * woocommerce_before_single_product hook.
							 *
							 * @hooked wc_print_notices - 10
							 */
							do_action( 'woocommerce_before_single_product' );

							if ( post_password_required() ) {
								echo wp_kses_post( get_the_password_form() );
								return;
							}
							?>
							<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php
									/**
									 * Woocommerce Before Single Product Summary hook.
									 * woocommerce_before_single_product_summary hook.
									 *
									 * @hooked woocommerce_show_product_sale_flash - 10
									 * @hooked woocommerce_show_product_images - 20
									 */
									do_action( 'woocommerce_before_single_product_summary' );
								?>
								<div class="summary entry-summary">
									<?php
										/**
										 * Woocommerce Single Product Summary hook.
										 * woocommerce_single_product_summary hook.
										 *
										 * @hooked woocommerce_template_single_title - 5
										 * @hooked woocommerce_template_single_rating - 10
										 * @hooked woocommerce_template_single_price - 10
										 * @hooked woocommerce_template_single_excerpt - 20
										 * @hooked woocommerce_template_single_add_to_cart - 30
										 * @hooked woocommerce_template_single_meta - 40
										 * @hooked woocommerce_template_single_sharing - 50
										 * @hooked WC_Structured_Data::generate_product_data() - 60
										 */
										do_action( 'woocommerce_single_product_summary' );
									?>
								</div><!-- .summary -->
								<div class="clearfix"></div>
								<?php
									/**
									 * Woocommerce_after_single_product_summary hook.
									 * woocommerce_after_single_product_summary hook.
									 *
									 * @hooked woocommerce_output_product_data_tabs - 10
									 * @hooked woocommerce_upsell_display - 15
									 * @hooked woocommerce_output_related_products - 20
									 */
									do_action( 'woocommerce_after_single_product_summary' );
								?>
							</div><!-- #product-<?php the_ID(); ?> -->
							<?php do_action( 'woocommerce_after_single_product' ); ?>
						<?php endwhile; // end of the loop. ?>
    					<?php
    						/**
    						 * Woocommerce After Main Content hook.
    						 * woocommerce_after_main_content hook.
    						 *
    						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
    						 */
    						//do_action( 'woocommerce_after_main_content' );
    					?>
					</div>
				    <!-- shop_single -->
				</div>
				<?php if ( 'shop-details-nosidebar' === brixel_global_var( 'shop-details-sidebar', '', false ) ) { ?>
				<?php } else { ?>
					<?php if ( 'shop-details-leftsidebar' === brixel_global_var( 'shop-details-sidebar', '', false ) ) { ?>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-left">
					<?php } elseif ( 'shop-details-rightsidebar' === brixel_global_var( 'shop-details-sidebar', '', false ) ) { ?>
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
	<!-- wraper_shop_single -->

<?php
get_footer( 'shop' );
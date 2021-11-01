<?php
/**
 * Shop Box Style Three Template
 *
 * @package brixel
 */
?>

<!-- rt-shop-box style-three -->
<?php if ( 'shop-one' === brixel_global_var( 'shop-style', '', false ) ) { ?>
    <div <?php post_class( 'rt-shop-box style-three matchHeight col-lg-4 col-md-4 col-sm-6 col-xs-12' ); ?> class="">
<?php } elseif ( 'shop-two' === brixel_global_var( 'shop-style', '', false ) ) { ?>
    <div <?php post_class( 'rt-shop-box style-three matchHeight col-lg-3 col-md-4 col-sm-6 col-xs-12' ); ?>>
<?php } else { ?>
    <div <?php post_class( 'rt-shop-box style-three matchHeight col-lg-4 col-md-4 col-sm-6 col-xs-12' ); ?>>
<?php } ?>
    <div class="holder">
        <?php if ( $product->is_on_sale() ) { ?>
            <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'brixel' ) . '</span>', $post, $product ); ?>
        <?php } ?>
        <div class="pic">
            <div class="product-image">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('large');?></a>
                <a href="<?php the_permalink();?>" class="hover-image">
    	            <?php
    	            /**
    				 * Woocommerce Before Shop Loop Item Title hook.
    				 * woocommerce_before_shop_loop_item_title hook.
    				 *
    				 * @hooked woocommerce_show_product_loop_sale_flash - 10
    				 * @hooked woocommerce_template_loop_product_thumbnail - 10
    				 */
    				//do_action( 'woocommerce_before_shop_loop_item_title' );
    				?>
    			    <?php  global $product;
    			    $attachment_ids = $product->get_gallery_image_ids();
                    foreach( $attachment_ids as $attachment_id ) { ?>
                        <?php $image_link = wp_get_attachment_image_src ( $attachment_id, 'large' ); ?>
                        <img src="<?php echo esc_url( $image_link[0] ); ?>" alt="<?php the_title();?>">
                    <?php } ?>
                </a>
			</div>
        </div>
        <div class="data">
            <?php
			/**
			 * Woocommerce Before Shop Loop Item hook.
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );
			?>
            <?php
			/**
			 * Woocommerce Shop Loop Item Title hook.
			 * woocommerce_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
			?>
			</a>
			<?php
			/**
			 * Woocommerce After Shop Loop Item Title hook.
			 * woocommerce_after_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
			<?php
			/**
			 * Woocommerce After Shop Loop Item hook.
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
        </div>
    </div>
</div>
<!-- rt-shop-box style-two -->
<?php
/**
 * Header Style Two Template
 *
 * @package brixel
 */
?>

<!-- wraper_header -->
<?php if ( true == brixel_global_var( 'header_two_sticky', '', false ) ) { ?>
    <header class="wraper_header style-two i-am-sticky">
<?php } else { ?>
    <header class="wraper_header style-two">
<?php } ?>
	<!-- wraper_header_main -->
	<div class="wraper_header_main">
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
				<!-- brand-logo -->
				<div class="brand-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( brixel_global_var( 'header_two_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( 'header_two_logo', 'brixel' ); ?>"></a>
				</div>
				<!-- brand-logo -->
				<!-- responsive-nav -->
				<div class="responsive-nav hidden-lg hidden-md visible-sm visible-xs" data-responsive-nav-displace="<?php echo esc_attr( brixel_global_var( 'header_two_mobile_menu_displace', '', false ) ); ?>">
					<i class="fa fa-bars"></i>
				</div>
				<!-- responsive-nav -->
				<!-- header_main_action -->
				<div class="header_main_action">
					<ul>
						<?php if ( ( class_exists( 'WooCommerce' ) ) && ( true == brixel_global_var( 'header_cart_display', '', false ) ) ) : ?>
						<li class="header-cart-bar">
						    <a class="header-cart-bar-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
							    <i class="fa fa-shopping-cart"></i>
							    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
							</a>
						</li>
						<?php endif; ?>
						<?php if ( true == brixel_global_var( 'header_two_search_display', '', false ) ) : ?>
							<?php if ( 'floating-search' == brixel_global_var( 'header_two_search_style', '', false ) ) { ?>
								<li class="floating-searchbar">
									<i class="fa fa-search"></i>
									<i class="fa fa-times"></i>
									<!-- floating-search-bar -->
									<div class="floating-search-bar">
										<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
										<div class="form-row">
											<input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'brixel' ); ?>" value="" name="s" required>
											<button type="submit"><i class="fa fa-search"></i></button>
										</div>
										</form>
									</div>
									<!-- floating-search-bar -->
								</li>
							<?php } elseif ( 'flyout-search' == brixel_global_var( 'header_two_search_style', '', false ) ) { ?>
								<li class="flyout-searchbar-toggle">
									<i class="fa fa-search"></i>
									<i class="fa fa-times"></i>
								</li>
							<?php } ?>
						<?php endif; ?>
					</ul>
				</div>
				<!-- header_main_action -->
				<!-- nav -->
				<nav class="nav visible-lg visible-md hidden-sm hidden-xs">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'top',
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>
				<!-- nav -->
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
		</div>
	</div>
	<!-- wraper_header_main -->
</header>
<!-- wraper_header -->

<?php if ( true == brixel_global_var( 'header_two_search_display', '', false ) ) : ?>
	<?php if ( 'flyout-search' == brixel_global_var( 'header_two_search_style', '', false ) ) : ?>
		<!-- wraper_flyout_search -->
		<div class="wraper_flyout_search header-style-two">
			<div class="table">
				<div class="table-cell">
				    <!-- flyout-search-close -->
				    <div class="flyout-search-close">
    					<i class="fa fa-times"></i>
    				</div>
    				<!-- flyout-search-close -->
					<!-- flyout_search -->
					<div class="flyout_search">
						<!-- search-form -->
						<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="form-row">
							<input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'brixel' ); ?>" value="" name="s" required>
							<button type="submit"><i class="fa fa-search"></i></button>
						</div>
						</form>
						<!-- search-form -->
					</div>
					<!-- flyout_search -->
				</div>
			</div>
		</div>
		<!-- wraper_flyout_search -->
	<?php endif; ?>
<?php endif; ?>
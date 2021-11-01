<?php
/**
 * Header Style Six Template
 *
 * @package brixel
 */

?>

<!-- wraper_header -->
<?php if ( true == brixel_global_var( 'header_six_sticky', '', false ) ) { ?>
    <header class="wraper_header style-six i-am-sticky">
<?php } else { ?>
    <header class="wraper_header style-six">
<?php } ?>
	<!-- wraper_header_main -->
	<div class="wraper_header_main">
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
				<!-- brand-logo -->
				<div class="brand-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( brixel_global_var( 'header_six_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( 'header_six_logo', 'brixel' ); ?>"></a>
				</div>
				<!-- brand-logo -->
				<!-- header_main_action -->
				<div class="header_main_action">
					<ul>
						<?php if ( true == brixel_global_var( 'header_six_search_display', '', false ) ) : ?>
							<?php if ( 'floating-search' == brixel_global_var( 'header_six_search_style', '', false ) ) { ?>
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
							<?php } elseif ( 'flyout-search' == brixel_global_var( 'header_six_search_style', '', false ) ) { ?>
								<li class="flyout-searchbar-toggle">
									<i class="fa fa-search"></i>
									<i class="fa fa-times"></i>
								</li>
							<?php } ?>
						<?php endif; ?>
						<li class="flyout-menubar-toggle">
							<span class="bar"></span>
							<span class="bar"></span>
							<span class="bar"></span>
						</li>
					</ul>
				</div>
				<!-- header_main_action -->
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
		</div>
	</div>
	<!-- wraper_header_main -->
</header>
<!-- wraper_header -->

<?php if ( true == brixel_global_var( 'header_six_search_display', '', false ) ) : ?>
	<?php if ( 'flyout-search' == brixel_global_var( 'header_six_search_style', '', false ) ) : ?>
		<!-- wraper_flyout_search -->
		<div class="wraper_flyout_search header-style-six">
			<div class="table">
				<div class="table-cell">
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

<!-- wraper_flyout_menu -->
<div class="wraper_flyout_menu header-style-six">
	<div class="table">
		<div class="table-cell">
			<!-- flyout_menu -->
			<div class="flyout_menu">
				<!-- nav -->
				<nav class="nav">
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
			</div>
			<!-- flyout_menu -->
		</div>
	</div>
</div>
<!-- wraper_flyout_menu -->

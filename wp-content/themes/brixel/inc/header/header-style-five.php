<?php
/**
 * Header Style Five Template
 *
 * @package brixel
 */
?>

<!-- wraper_header -->
<header class="wraper_header style-five">
	<!-- wraper_header_main -->
	<div class="wraper_header_main">
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
				<!-- brand-logo -->
				<div class="brand-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( brixel_global_var( 'header_five_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( 'header_five_logo', 'brixel' ); ?>"></a>
				</div>
				<!-- brand-logo -->
				<!-- header_main_action -->
				<div class="header_main_action">
					<ul>
						<?php if ( true == brixel_global_var( 'header_five_search_display', '', false ) ) : ?>
							<?php if ( 'floating-search' == brixel_global_var( 'header_five_search_style', '', false ) ) { ?>
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
							<?php } elseif ( 'flyout-search' == brixel_global_var( 'header_five_search_style', '', false ) ) { ?>
								<li class="flyout-searchbar-toggle">
									<i class="fa fa-search"></i>
									<i class="fa fa-times"></i>
								</li>
							<?php } ?>
						<?php endif; ?>
						<li class="hamburger-menu-open is-sidr">
							<i class="fa fa-bars"></i>
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
	<!-- wraper_hamburger_menu -->
	<div class="wraper_hamburger_menu is-sidr hidden">
		<!-- hamburger_menu -->
		<div class="hamburger_menu header-style-five">
			<!-- hamburger-menu-close -->
			<div class="hamburger-menu-close">
				<i class="fa fa-times"></i>
			</div>
			<!-- hamburger-menu-close -->
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
			<!-- hamburger_menu_data -->
			<div class="hamburger_menu_data">
				<!-- contact -->
				<ul class="contact">
					<li class="phone"><a href="tel:<?php echo esc_attr( brixel_global_var( 'header_five_header_main_contact_phone', '', false ) ); ?>"><?php echo esc_html( brixel_global_var( 'header_five_header_main_contact_phone', '', false ) ); ?></a></li>
					<li class="email"><a href="mailto:<?php echo esc_attr( sanitize_email( brixel_global_var( 'header_five_header_main_contact_email', '', false ) ) ); ?>"><?php echo esc_html( sanitize_email( brixel_global_var( 'header_five_header_main_contact_email', '', false ) ) ); ?></a></li>
				</ul>
				<!-- contact -->
				<!-- social -->
				<ul class="social">
					<?php if ( ! empty( brixel_global_var( 'social-icon-googleplus', '', false ) ) ) : ?>
						<li class="google-plus"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-googleplus', '', false ) ); ?>" rel="publisher"><i class="fa fa-google-plus"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-facebook', '', false ) ) ) : ?>
						<li class="facebook"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-facebook', '', false ) ); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-twitter', '', false ) ) ) : ?>
						<li class="twitter"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-twitter', '', false ) ); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-vimeo', '', false ) ) ) : ?>
						<li class="vimeo"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-vimeo', '', false ) ); ?>"><i class="fa fa-vimeo"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-youtube', '', false ) ) ) : ?>
						<li class="youtube"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-youtube', '', false ) ); ?>"><i class="fa fa-youtube-play"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-flickr', '', false ) ) ) : ?>
						<li class="flickr"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-flickr', '', false ) ); ?>"><i class="fa fa-flickr"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-linkedin', '', false ) ) ) : ?>
						<li class="linkedin"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-linkedin', '', false ) ); ?>"><i class="fa fa-linkedin"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-pinterest', '', false ) ) ) : ?>
						<li class="pinterest"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-pinterest', '', false ) ); ?>"><i class="fa fa-pinterest-p"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-xing', '', false ) ) ) : ?>
						<li class="xing"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-xing', '', false ) ); ?>"><i class="fa fa-xing"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-viadeo', '', false ) ) ) : ?>
						<li class="viadeo"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-viadeo', '', false ) ); ?>"><i class="fa fa-viadeo"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-vkontakte', '', false ) ) ) : ?>
						<li class="vkontakte"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-vkontakte', '', false ) ); ?>"><i class="fa fa-vk"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-tripadvisor', '', false ) ) ) : ?>
						<li class="tripadvisor"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-tripadvisor', '', false ) ); ?>"><i class="fa fa-tripadvisor"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-tumblr', '', false ) ) ) : ?>
						<li class="tumblr"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-tumblr', '', false ) ); ?>"><i class="fa fa-tumblr"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-behance', '', false ) ) ) : ?>
						<li class="behance"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-behance', '', false ) ); ?>"><i class="fa fa-behance"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-instagram', '', false ) ) ) : ?>
						<li class="instagram"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-instagram', '', false ) ); ?>"><i class="fa fa-instagram"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-dribbble', '', false ) ) ) : ?>
						<li class="dribbble"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-dribbble', '', false ) ); ?>"><i class="fa fa-dribbble"></i></a></li>
					<?php endif; ?>
					<?php if ( ! empty( brixel_global_var( 'social-icon-skype', '', false ) ) ) : ?>
						<li class="skype"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-skype', '', false ) ); ?>"><i class="fa fa-skype"></i></a></li>
					<?php endif; ?>
				</ul>
				<!-- social -->
			</div>
			<!-- hamburger_menu_data -->
		</div>
		<!-- hamburger_menu -->
	</div>
	<!-- wraper_hamburger_menu -->
</header>
<!-- wraper_header -->

<?php if ( true == brixel_global_var( 'header_five_search_display', '', false ) ) : ?>
	<?php if ( 'flyout-search' == brixel_global_var( 'header_five_search_style', '', false ) ) : ?>
		<!-- wraper_flyout_search -->
		<div class="wraper_flyout_search header-style-five">
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
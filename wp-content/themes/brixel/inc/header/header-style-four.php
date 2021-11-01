<?php
/**
 * Header Style Four Template
 *
 * @package brixel
 */

?>

<!-- sidenav-trigger -->
<div class="sidenav-trigger hidden-lg hidden-md hidden-sm visible-xs">
	<div class="holder">
		<div class="display-one">
			<i class="fa fa-bars"></i>
		</div>
		<div class="display-two">
			<i class="fa fa-arrow-left"></i>
		</div>
	</div>
</div>
<!-- sidenav-trigger -->

<!-- wraper_header -->
<header class="wraper_header style-four infinity-scroll">
	<div class="table">
		<div class="table-cell">
			<!-- header_main -->
			<div class="header_main">
				<!-- brand-logo -->
				<div class="brand-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( brixel_global_var( 'header_four_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( 'header_four_logo', 'brixel' ); ?>"></a>
				</div>
				<!-- brand-logo -->
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
				<!-- header-data -->
				<div class="header-data">
					<?php
					if ( true == brixel_global_var( 'social-icon-target', '', false ) ) {
						$social_target = 'target="_blank"';
					} else {
						$social_target = '';
					}
					?>
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
				<!-- header-data -->
			</div>
			<!-- header_main -->
		</div>
	</div>
</header>
<!-- wraper_header -->

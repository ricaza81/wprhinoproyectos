<?php
/**
 * Header Style Three Template
 *
 * @package brixel
 */
?>

<!-- wraper_header -->
<header class="wraper_header style-three">
	<!-- wraper_header_main -->
	<div class="wraper_header_main">
		<div class="container">
			<!-- header_main -->
			<div class="header_main">
				<!-- brand-logo -->
				<div class="brand-logo radiantthemes-retina">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( brixel_global_var( 'header_three_logo', 'url', true ) ); ?>" alt="<?php echo esc_attr( 'header_three_logo', 'brixel' ); ?>"></a>
				</div>
				<!-- brand-logo -->
				<!-- header-data -->
				<div class="header-data">
					<!-- header-data-contact -->
					<div class="header-data-contact hidden-xs">
						<p><?php echo esc_html( brixel_global_var( 'header_three_header_main_contact_text', '', false ) ); ?> <strong><a href="tel:<?php echo esc_attr( brixel_global_var( 'header_three_header_main_contact_phone', '', false ) ); ?>"><?php echo esc_html( brixel_global_var( 'header_three_header_main_contact_phone', '', false ) ); ?></a></strong></p>
					</div>
					<!-- header-data-contact -->
					<?php if ( function_exists( 'icl_object_id' ) ) : ?>
					<!-- header-data-translator -->
					<div class="header-data-translator">
                        <?php
                        $languages = icl_get_languages( 'skip_missing=0' );
                        ?>
                        <div class="dropdown">
                            <?php if ( ! empty( $languages ) ) : ?>
                                <?php foreach( $languages as $l ) : ?>
                                    <?php if ( $l['active'] ) : ?>
                                        <div class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <img src="<?php echo esc_url( $l['country_flag_url'] ); ?>" alt="<?php echo esc_attr( $l['native_name'] ); ?>">
                                            <?php echo esc_attr( $l['native_name'] ); ?>
                                            <span class="caret"></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <ul class="dropdown-menu">
                                    <?php foreach( $languages as $lang ) : ?>
                                    <li>
                                        <a href="<?php echo esc_url( $lang['url'] ); ?>">
                                            <img src="<?php echo esc_url( $lang['country_flag_url'] ); ?>" alt="<?php echo esc_attr( $lang['native_name'] ); ?>">
                                            <?php echo esc_attr( $lang['native_name'] ); ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
					</div>
					<!-- header-data-translator -->
					<?php endif; ?>
					<!-- header-data-social -->
					<div class="header-data-social">
					    <p><?php echo esc_html( brixel_global_var( 'header_three_header_top_social_text', '', false ) ); ?></p>
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
    							<li class="google-plus"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-googleplus', '', false ) ); ?>" rel="publisher" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-google-plus"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-facebook', '', false ) ) ) : ?>
    							<li class="facebook"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-facebook', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-facebook"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-twitter', '', false ) ) ) : ?>
    							<li class="twitter"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-twitter', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-twitter"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-vimeo', '', false ) ) ) : ?>
    							<li class="vimeo"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-vimeo', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-vimeo"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-youtube', '', false ) ) ) : ?>
    							<li class="youtube"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-youtube', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-youtube-play"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-flickr', '', false ) ) ) : ?>
    							<li class="flickr"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-flickr', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-flickr"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-linkedin', '', false ) ) ) : ?>
    							<li class="linkedin"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-linkedin', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-linkedin"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-pinterest', '', false ) ) ) : ?>
    							<li class="pinterest"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-pinterest', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-pinterest-p"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-xing', '', false ) ) ) : ?>
    							<li class="xing"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-xing', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-xing"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-viadeo', '', false ) ) ) : ?>
    							<li class="viadeo"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-viadeo', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-viadeo"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-vkontakte', '', false ) ) ) : ?>
    							<li class="vkontakte"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-vkontakte', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-vk"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-tripadvisor', '', false ) ) ) : ?>
    							<li class="tripadvisor"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-tripadvisor', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-tripadvisor"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-tumblr', '', false ) ) ) : ?>
    							<li class="tumblr"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-tumblr', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-tumblr"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-behance', '', false ) ) ) : ?>
    							<li class="behance"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-behance', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-behance"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-instagram', '', false ) ) ) : ?>
    							<li class="instagram"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-instagram', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-instagram"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-dribbble', '', false ) ) ) : ?>
    							<li class="dribbble"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-dribbble', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-dribbble"></i></a></li>
    						<?php endif; ?>
    						<?php if ( ! empty( brixel_global_var( 'social-icon-skype', '', false ) ) ) : ?>
    							<li class="skype"><a href="<?php echo esc_url( brixel_global_var( 'social-icon-skype', '', false ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="fa fa-skype"></i></a></li>
    						<?php endif; ?>
    					</ul>
    					<!-- social -->
					</div>
					<!-- header-data-social -->
				</div>
				<!-- header-data -->
			</div>
			<!-- header_main -->
		</div>
	</div>
	<!-- wraper_header_main -->
	<!-- wraper_header_nav -->
	<?php if ( true == brixel_global_var( 'header_three_sticky', '', false ) ) { ?>
	    <div class="wraper_header_nav i-am-sticky">
	<?php } else { ?>
	    <div class="wraper_header_nav">
	<?php } ?>
		<div class="container">
			<!-- header_nav -->
			<div class="header_nav">
			    <!-- responsive-nav -->
				<div class="responsive-nav hidden-lg hidden-md hidden-sm visible-xs" data-responsive-nav-displace="<?php echo esc_attr( brixel_global_var( 'header_three_mobile_menu_displace', '', false ) ); ?>">
					<i class="fa fa-bars"></i>
				</div>
				<!-- responsive-nav -->
			    <!-- header_nav_action -->
				<div class="header_nav_action">
					<ul>
						<?php if ( ( class_exists( 'WooCommerce' ) ) && ( true == brixel_global_var( 'header_cart_display', '', false ) ) ) : ?>
    						<li class="header-cart-bar">
    						    <a class="header-cart-bar-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
    							    <i class="fa fa-shopping-cart"></i>
    							    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    							</a>
    						</li>
						<?php endif; ?>
						<?php if ( true == brixel_global_var( 'header_three_search_display', '', false ) ) : ?>
    						<li class="expanded-searchbar">
    							<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    							<div class="form-row">
    								<input type="search" placeholder="<?php echo esc_attr__( 'Search', 'brixel' ); ?>" value="" name="s" required>
    								<button type="submit"></button>
    							</div>
    							</form>
    						</li>
						<?php endif; ?>
					</ul>
				</div>
				<!-- header_nav_action -->
				<!-- nav -->
				<nav class="nav visible-lg visible-md visible-sm hidden-xs">
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
			<!-- header_nav -->
		</div>
	</div>
	<!-- wraper_header_nav -->
</header>
<!-- wraper_header -->
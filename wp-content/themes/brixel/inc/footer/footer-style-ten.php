<?php
/**
 * Template for Footer Style Ten
 *
 * @package brixel
 */

?>
<!-- wraper_footer -->
<footer class="wraper_footer style-ten">
	<?php
	$footer_widgets_count = 0;
	for ( $j = 1; $j <= 4; $j++ ) {
		if ( is_active_sidebar( 'brixel-footer-area-' . $j ) ) {
			$footer_widgets_count++;
		}
	}
	if ( $footer_widgets_count > 0 ) {
	?>
	<!-- wraper_footer_main -->
	<div class="wraper_footer_main">
		<div class="container">
			<!-- row -->
			<div class="row footer_main">
				<?php
				// Default - Footer 4 column.
				$footer_class = '';
				switch ( $footer_widgets_count ) {
					case 1:
						$footer_class = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
						break;
					case 2:
						$footer_class = '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
						break;
					case 3:
						$footer_class = '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';
						break;
					default:
						$footer_class = '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
				}

				for ( $j = 1; $j <= 4; $j++ ) {
					if ( is_active_sidebar( 'brixel-footer-area-' . $j ) ) {
						echo wp_kses_post( $footer_class ) . '<div class="footer_main_item matchHeight">';
						dynamic_sidebar( 'brixel-footer-area-' . $j );
						echo '</div>
									 </div>';
					}
				}
				?>
			</div>
			<!-- row -->
		</div>
	</div>
	<!-- wraper_footer_main -->
    <?php
    }
    ?>
	<!-- wraper_footer_copyright -->
	<div class="wraper_footer_copyright">
		<div class="container">
			<!-- row -->
			<div class="row footer_copyright">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<!-- footer_copyright_item -->
					<div class="footer_copyright_item text-left">
					    <p><?php echo wp_kses_post( brixel_global_var( 'footer_ten_copyright_text', '', false ) ); ?></p>
					</div>
					<!-- footer_copyright_item -->
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<!-- footer_copyright_item -->
					<div class="footer_copyright_item text-right">
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
					<!-- footer_copyright_item -->
				</div>
			</div>
			<!-- row -->
		</div>
	</div>
	<!-- wraper_footer_copyright -->
</footer>
<!-- wraper_footer -->

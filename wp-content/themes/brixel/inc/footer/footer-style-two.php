<?php
/**
 * Template for Footer Style Two
 *
 * @package brixel
 */

?>
<!-- wraper_footer -->
<footer class="wraper_footer style-two">
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
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- footer_copyright_item -->
					<div class="footer_copyright_item text-center">
						<p><?php echo wp_kses_post( brixel_global_var( 'footer_two_copyright_text', '', false ) ); ?></p>
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
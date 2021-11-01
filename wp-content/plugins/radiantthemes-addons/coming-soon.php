<?php
/**
 * Template for Coming Soon Page
 *
 * @package brixel
 */

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<!-- wraper_comingsoon_main -->
		<div class="wraper_comingsoon_main">
			<div class="table">
				<div class="table-cell">
					<!-- comingsoon_main -->
					<div class="comingsoon_main">
						<div class="holder">
							<?php
							if ( brixel_global_var( 'coming_soon_body', '', false ) ) {
								echo wp_kses_post( brixel_global_var( 'coming_soon_body', '', false ) );
							}
							?>
						</div>
						<!-- comingsoon-counter -->
						<div class="comingsoon-counter" data-launch-date="<?php echo wp_kses_post( brixel_global_var( 'coming_soon_datetime', '', false ) ); ?>">
						</div>
						<!-- comingsoon-counter -->
					</div>
					<!-- comingsoon_main -->
				</div>
			</div>
		</div>
		<!-- wraper_comingsoon_main -->

	</main><!-- #main -->
</div><!-- #primary -->

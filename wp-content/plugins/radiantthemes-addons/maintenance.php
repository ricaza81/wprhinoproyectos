<?php
/**
 * Template for Maintenance Page
 *
 * @package brixel
 */

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<!-- wraper_maintenance_main -->
		<div class="wraper_maintenance_main">
			<div class="table">
				<div class="table-cell">
					<!-- maintenance_main -->
					<div class="maintenance_main">
						<div class="holder">
							<?php
							if ( brixel_global_var( 'maintenance_mode_content_body', '', false ) ) {
								echo wp_kses_post( brixel_global_var( 'maintenance_mode_content_body', '', false ) );
							}
							?>
							<?php
							if ( brixel_global_var( 'maintenance_mode_progressbar_switch', '', false ) ) :
							?>
								<!-- maintenance-progress -->
								<div class="maintenance-progress" style="height:<?php echo wp_kses_post( brixel_global_var( 'maintenance_mode_progressbar_height', 'height', true ) ); ?>;">
									<div class="maintenance-progress-bar progress-bar-striped active" style="width:<?php echo wp_kses_post( brixel_global_var( 'maintenance_mode_progressbar_width', '', false ) ); ?>%;">
										<div class="maintenance-progress-percentage"><span><?php echo wp_kses_post( brixel_global_var( 'maintenance_mode_progressbar_width', '', false ) ); ?>%</span></div>
									</div>
								</div>
								<!-- maintenance-progress -->
							<?php
							endif;
							?>
						</div>
					</div>
					<!-- maintenance_main -->
				</div>
			</div>
		</div>
		<!-- wraper_maintenance_main -->

	</main><!-- #main -->
</div><!-- #primary -->

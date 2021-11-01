<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package brixel
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<!-- wraper_error_main -->
		<div class="wraper_error_main">
			<div class="container">
				<!-- row -->
				<div class="row error_main">
				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- error_main_item -->
						<div class="error_main_item matchHeight">
						    <div class="table">
						        <div class="table-cell">
						            <img src="<?php echo esc_url( brixel_global_var( '404_error_image', 'url', true ) ); ?>" alt="<?php echo esc_attr( '404_error_image', 'brixel' ); ?>">
						        </div>
						    </div>
						</div>
						<!-- error_main_item -->
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- error_main_item -->
						<div class="error_main_item matchHeight">
						    <div class="table">
						        <div class="table-cell">
						            <?php
        							if ( brixel_global_var( '404_error_content', '', false ) ) {
        								echo wp_kses_post( brixel_global_var( '404_error_content', '', false ) );
        							} else {
        							?>
        							    <h1><?php esc_html_e( 'Page Not Found', 'brixel' ); ?></h1>
        							    <h2><?php esc_html_e( "We're sorry, the page you have looked for does not exist in our database.", "brixel" ); ?></h2>
        							<?php } ?>
        							<button class="btn" onclick="window.history.back();"><i class="fa fa-arrow-left"></i><?php esc_html_e( 'Go Back', 'brixel' ); ?></button>
						        </div>
						    </div>
						</div>
						<!-- error_main_item -->
					</div>
				</div>
				<!-- row -->
			</div>
		</div>
		<!-- wraper_error_main -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

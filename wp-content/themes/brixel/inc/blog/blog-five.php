<?php
/**
 * Template for Blog Five
 *
 * @package brixel
 */

?>
<!-- wraper_blog_main -->
<div class="wraper_blog_main style-five">
	<div class="container-fluid">
		<!-- row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- blog_main -->
				<div class="blog_main row isotope-blog-style">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content-five', get_post_format() );
						endwhile;
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
					<?php brixel_pagination(); ?>
				</div>
				<!-- blog_main -->
			</div>
		</div>
		<!-- row -->
	</div>
</div>
<!-- wraper_blog_main -->

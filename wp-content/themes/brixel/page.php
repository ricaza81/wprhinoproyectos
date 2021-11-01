<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package brixel
 */

get_header(); ?>
<?php if ( class_exists( 'Tribe__Events__Main' ) && ( ( tribe_is_past() || tribe_is_upcoming() && !is_tax() ) || ( tribe_is_month() && !is_tax() ) || ( tribe_is_day() && !is_tax() ) ) ) { ?>
    <!-- wraper-radiantthemes-event -->
    <div class="wraper-radiantthemes-event">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
    				while ( have_posts() ) :
    					the_post();
    					the_content();
    				endwhile; // End of the loop.
    				?>
				</div>
			</div>
        </div>
    </div>
    <!-- wraper-radiantthemes-event -->
<?php } elseif ( class_exists( 'Tribe__Events__Main' ) && is_singular( 'tribe_events' ) ) { ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile; // End of the loop.
                ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php } else { ?>
    <div id="primary" class="content-area">
    	<main id="main" class="site-main">
    		<?php if ( get_post() && ! preg_match( '/vc_row/', get_post()->post_content ) ) : ?>
    			<div class="wraper_blog_main default-page">
    		<?php endif; ?>
    			<div class="container">
    				<?php
    				while ( have_posts() ) :
    					the_post();
    					get_template_part( 'template-parts/content', 'page' );
    					// If comments are open or we have at least one comment, load up the comment template.
    					if ( comments_open() || get_comments_number() ) :
    						comments_template();
    					endif;
    				endwhile; // End of the loop.
    				?>
    			</div>
    		<?php if ( get_post() && ! preg_match( '/vc_row/', get_post()->post_content ) ) : ?>
    			</div>
    		<?php endif; ?>
    	</main><!-- #main -->
    </div><!-- #primary -->
<?php } ?>
<?php get_footer();

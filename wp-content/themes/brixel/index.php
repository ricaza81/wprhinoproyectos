<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package brixel
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" <?php post_class( 'site-main' ); ?> >
	<?php if ( ! empty( brixel_global_var( 'blog-style', '', false ) ) ) : ?>
		<?php include get_parent_theme_file_path( '/inc/blog/blog-' . brixel_global_var( 'blog-style', '', false ) . '.php' ); ?>
	<?php else : ?>
		<?php include get_parent_theme_file_path( '/inc/blog/blog-default.php' ); ?>
	<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();

<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package brixel
 */

get_header(); ?>


<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if ( ! empty( brixel_global_var( 'blog-style', '', false ) ) ) { ?>
			<?php
			include get_parent_theme_file_path( '/inc/blog/blog-' . brixel_global_var( 'blog-style', '', false ) . '.php' );
			?>

		<?php } else { ?>
			<?php include get_parent_theme_file_path( '/inc/blog/blog-default.php' ); ?>
		<?php } ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

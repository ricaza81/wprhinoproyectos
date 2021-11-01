<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package brixel
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
		require get_parent_theme_file_path( '/inc/blog/blog-default.php' );
		?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

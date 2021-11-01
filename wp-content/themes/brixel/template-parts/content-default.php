<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package brixel
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'style-default' ); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
	</div><!-- .post-thumbnail -->
	<?php } ?>
	<div class="entry-main">
		<div class="entry-meta">
			<?php brixel_posted_on(); ?>
		</div><!-- .entry-meta -->
		<header class="entry-header">
			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php echo wp_kses_post( substr( strip_tags( get_the_excerpt() ), 0, 300 ) . '...' ); ?>
		</div><!-- .entry-content -->
		<div class="post-read-more">
			<a class="btn" href="<?php the_permalink(); ?>"><span><?php esc_html_e( 'Read More', 'brixel' ); ?></span></a>
		</div><!-- .post-read-more -->
	</div><!-- .entry-main -->
</article><!-- #post-## -->
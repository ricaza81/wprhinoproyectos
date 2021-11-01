<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package brixel
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php brixel_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'full' ); ?>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	<div class="entry-main">
		<div class="entry-content default-page">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. */
						__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'brixel' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					), the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'brixel' ),
					'after'  => '</div>',
				)
			);
			?>
			<div class="clearfix"></div>
		</div><!-- .entry-content -->
	</div><!-- .entry-main -->
</article><!-- #post-## -->
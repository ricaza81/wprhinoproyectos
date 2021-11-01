<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package brixel
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'style-two' ); ?>>
	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
			    <?php the_post_thumbnail( 'full' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	<div class="entry-main">
		<header class="entry-header">
			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<p><?php echo wp_kses_post( substr( strip_tags( get_the_excerpt() ), 0, 100 ) . '...' ); ?></p>
		</div><!-- .entry-content -->
		<div class="post-meta">
            <?php
                $user = wp_get_current_user();
                if ( $user ) :
            ?>
                <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" alt="<?php echo get_the_author(); ?>" width="96" height="96">
            <?php endif; ?>
			<span><?php echo wp_kses_post( 'by' ); ?> <?php echo get_the_author_link(); ?></span>
		</div><!-- .post-meta -->
	</div><!-- .entry-main -->
</article><!-- #post-## -->
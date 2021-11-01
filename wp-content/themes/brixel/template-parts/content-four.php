<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package brixel
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'style-four wow fadeInUp' ); ?>>
    <div class="holder">
        <div class="category-list">
            <?php
    		$category_detail = get_the_category( get_the_id() );
    		$result          = '';
    		foreach ( $category_detail as $item ) :
    			$category_link = get_category_link( $item->cat_ID );
    			$result       .= '<a href = "' . esc_url( $category_link ) . '">' . $item->name . '</a>';
    		endforeach;
    		echo wp_kses_post( $result );
    		?>
        </div><!-- .category-list -->
    	<div class="entry-main matchHeight">
    		<header class="entry-header">
    			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
    		</header><!-- .entry-header -->
    		<div class="entry-content">
    			<p><?php echo wp_kses_post( substr( strip_tags( get_the_excerpt() ), 0, 150 ) . '...' ); ?></p>
    		</div><!-- .entry-content -->
    	</div><!-- .entry-main -->
    	<div class="post-meta">
    		<span class="author"><?php echo get_the_author_link(); ?></span>
    		<span class="date"><?php the_date('F j, Y') ?></span>
    	</div><!-- .post-meta -->
    </div>
</article><!-- #post-## -->
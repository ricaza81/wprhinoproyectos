<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package brixel
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'style-five col-lg-4 col-md-4 col-sm-6 col-xs-12 isotope-blog-style-item' ); ?>>
    <a class="holder" href="<?php the_permalink(); ?>">
        <div class="post-thumbnail">
            <img src="<?php echo esc_url( get_parent_theme_file_uri( '/images/No-Image-Found-300x300.png' ) ); ?>" alt="<?php echo esc_attr( 'No Image Found', 'brixel' ); ?>" width="300" height="300">
            <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
                <div class="placeholder" style="background-image:url('<?php the_post_thumbnail_url( 'full' ); ?>')"></div>
            <?php endif; ?>
            <div class="entry-main">
                <div class="table">
                    <div class="table-cell">
                        <div class="category-list">
                            <?php
                            $category_detail = get_the_category( get_the_id() );
                            $result          = '';
                            foreach ( $category_detail as $item ) :
                                $category_link = get_category_link( $item->cat_ID );
                                $result       .= '<span>' . $item->name . '</span>';
                            endforeach;
                            echo wp_kses_post( $result );
                            ?>
                        </div><!-- .category-list -->
                        <header class="entry-header">
                            <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
                        </header><!-- .entry-header -->
                    </div>
                </div>
            </div><!-- .entry-main -->
        </div><!-- .post-thumbnail -->
    </a>
</article><!-- #post-## -->
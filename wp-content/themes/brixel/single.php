<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package brixel
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- wraper_blog_main -->
		<section class="wraper_blog_main">
			<div class="container">
				<!-- row -->
				<div class="row">
					<?php if ( 'nosidebar' === brixel_global_var( 'blog-layout', '', false ) ) { ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php } else { ?>
						<?php if ( 'leftsidebar' === brixel_global_var( 'blog-layout', '', false ) ) { ?>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right">
						<?php } elseif ( 'rightsidebar' === brixel_global_var( 'blog-layout', '', false ) ) { ?>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-left">
						<?php } else { ?>
							<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<?php } ?>
					<?php } ?>
						<!-- blog_single -->
						<div class="blog_single">
							<?php
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content-single', get_post_format() );
								endwhile; // End of the loop.
							?>
							<?php
							$tags = get_the_tags( $post->ID );
							if ( ! empty( $tags ) ) {
							?>
								<!-- post-tags -->
								<div class="post-tags">
									<?php
									/* translators: used between list items, there is a space after the comma */
									$tags_list = get_the_tag_list( '', esc_html__( ', ', 'brixel' ) );
									if ( $tags_list ) {
										printf(
											wp_kses_post( '<strong class="tags-title">Tags:</strong> ' ) .
											/* translators: used between list items, there is a space after the comma */
											esc_html__( '%1$s', 'brixel' ) .
											wp_kses_post( '' ),
											wp_kses_post( $tags_list )
										); // WPCS: XSS OK.
									}
									?>
								</div>
								<!-- post-tags -->
							<?php } ?>
							<!-- post-navigation -->
							<?php
							the_post_navigation(
								array(
									'prev_text' => esc_html__( '%title', 'brixel' ),
									'next_text' => esc_html__( '%title', 'brixel' ),
								)
							);
							?>
							<!-- post-navigation -->
							<?php if ( get_the_author_meta( 'description' ) ) : ?>
								<!-- author-bio -->
								<div class="author-bio">
									<div class="holder">
										<div class="pic">
											<?php echo get_avatar( get_the_author_meta( 'email' ), '150' ); ?>
										</div>
										<div class="data">
											<p class="designation">
												<?php echo esc_html__( 'Author', 'brixel' ); ?>
											</p>
											<p class="title"><?php the_author_link(); ?></p>
											<?php the_author_meta( 'description' ); ?>
										</div>
									</div>
								</div>
								<!-- author-bio -->
							<?php endif; ?>
							<!-- comments-area -->
							<?php if ( brixel_global_var( 'blog-layout', '', false ) ) : ?>
							<?php if ( brixel_global_var( 'blog_comment_display', '', false ) ) : ?>
								<?php if ( comments_open() || get_comments_number() ) : ?>
									<?php comments_template(); ?>
								<?php endif; ?>
							<?php endif; ?>
							<?php else : ?>
							<?php if ( comments_open() || get_comments_number() ) : ?>
									<?php comments_template(); ?>
								<?php endif; ?>
							<?php endif; ?>
							<!-- comments-area -->
						</div>
						<!-- blog_single -->
					</div>
					<?php if ( 'nosidebar' === brixel_global_var( 'blog-layout', '', false ) ) { ?>
					<?php } else { ?>
						<?php if ( 'leftsidebar' === brixel_global_var( 'blog-layout', '', false ) ) { ?>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-left">
						<?php } elseif ( 'rightsidebar' === brixel_global_var( 'blog-layout', '', false ) ) { ?>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
						<?php } else { ?>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<?php } ?>
							<?php get_sidebar(); ?>
						</div>
					<?php } ?>
				</div>
				<!-- row -->
			</div>
		</section>
		<!-- wraper_blog_main -->
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();

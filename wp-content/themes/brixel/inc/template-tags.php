<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package brixel
 */

if ( ! function_exists( 'brixel_global_var' ) ) {
	/**
	 * [brixel_global_var description]
	 *
	 * @param  [type] $brixel_opt_one   description.
	 * @param  [type] $brixel_opt_two   description.
	 * @param  [type] $brixel_opt_check description.
	 * @return [type]                          description
	 */
	function brixel_global_var(
		$brixel_opt_one,
		$brixel_opt_two,
		$brixel_opt_check
	) {
		global $brixel_theme_option;
		if ( $brixel_opt_check ) {
			if ( isset( $brixel_theme_option[ $brixel_opt_one ][ $brixel_opt_two ] ) ) {
				return $brixel_theme_option[ $brixel_opt_one ][ $brixel_opt_two ];
			}
		} else {
			if ( isset( $brixel_theme_option[ $brixel_opt_one ] ) ) {
				return $brixel_theme_option[ $brixel_opt_one ];
			}
		}
	}
}



if ( ! function_exists( 'brixel_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function brixel_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string          = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$author_image = sprintf(
			get_avatar( get_the_author_meta('email'), '150' )
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'brixel' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		$published_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Published On - %s', 'post date', 'brixel' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

				printf(
					wp_kses_post(
						'<div class="holder">
									<div class="author-image">' . $author_image . '</div>
									  <div class="data">
										<p class="published-on">' . $published_on . '</p>
										<div class="meta">
										<span class="byline"><i class="fa fa-user-o"></i> ' . $byline . '</span>'
					)
				);

					// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'brixel' ) );
			if ( $categories_list && brixel_categorized_blog() ) {
				printf(
					wp_kses_post( '<span class="category"><i class="fa fa-th-large"></i>' ) .
					/* translators: used between list items, there is a space after the comma */
					esc_html__( ' %1$s', 'brixel' ) .
					wp_kses_post( '</span>' ),
					wp_kses_post( $categories_list )
				);
			}
		}
		if ( ! is_single() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'brixel' ) );
			if ( $tags_list ) {
				printf(
					wp_kses_post( '<span class="tags-links"><i class="fa fa-tags"></i>' ) .
					/* translators: used between list items, there is a space after the comma */
					esc_html__( 'Tags: %1$s', 'brixel' ) .
					wp_kses_post( '</span>' ),
					wp_kses_post( $tags_list )
				); // WPCS: XSS OK.
			}
		}
					// <li class="category"><i class="fa fa-th-large"></i> ' . $fromcategory . '</li>
				echo ' </div>
			</div>
		</div>';

	}
endif;
function brixel_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'brixel_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'brixel_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so brixel_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so brixel_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in brixel_categorized_blog.
 */
function brixel_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'brixel_categories' );
}
add_action( 'edit_category', 'brixel_category_transient_flusher' );
add_action( 'save_post', 'brixel_category_transient_flusher' );

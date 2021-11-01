<?php
/**
 * Basic Custom Post Types. Custom Post Types include Team, Clients,
 * Portfolios, Our Story and Testimonials.
 *
 * @package RadiantThemes
 *
 * @wordpress-plugin
 * Plugin Name: RadiantThemes Custom Post Type
 * Description: Basic Custom Post Types. Custom Post Types include  Team, Clients, Portfolios, Our Story and Testimonials.
 * Version: 1.2.1
 * Author: RadiantThemes
 * Author URI: http://www.radiantthemes.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: radiantthemes-custom-post-type
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
include( 'short-header.php' );
// Register the "Testimonials" custom post type.
function radiantthemes_custom_posts_init() {
	// Localization.
	load_plugin_textdomain( 'radiantthemes-custom-post-type', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

	$testimonials_labels = array(
		'name'                  => _x( 'Testimonials', 'Post type general name', 'radiantthemes-custom-post-type' ),
		'singular_name'         => _x( 'Testimonial', 'Post type singular name', 'radiantthemes-custom-post-type' ),
		'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'radiantthemes-custom-post-type' ),
		'name_admin_bar'        => _x( 'Testimonial', 'Add New on Toolbar', 'radiantthemes-custom-post-type' ),
		'add_new'               => __( 'Add New Testimonial', 'radiantthemes-custom-post-type' ),
		'add_new_item'          => __( 'Add New Testimonials', 'radiantthemes-custom-post-type' ),
		'new_item'              => __( 'New Testimonials', 'radiantthemes-custom-post-type' ),
		'edit_item'             => __( 'Edit Testimonials', 'radiantthemes-custom-post-type' ),
		'view_item'             => __( 'View Testimonials', 'radiantthemes-custom-post-type' ),
		'all_items'             => __( 'All Testimonials', 'radiantthemes-custom-post-type' ),
		'search_items'          => __( 'Search Testimonials', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'     => __( 'Parent Testimonials:', 'radiantthemes-custom-post-type' ),
		'not_found'             => __( 'No Testimonials found.', 'radiantthemes-custom-post-type' ),
		'not_found_in_trash'    => __( 'No Testimonials found in Trash.', 'radiantthemes-custom-post-type' ),
		'featured_image'        => _x( 'Client Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'set_featured_image'    => _x( 'Set Client Image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'remove_featured_image' => _x( 'Remove Client image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'use_featured_image'    => _x( 'Use as Client image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'archives'              => _x( 'Testimonials archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'insert_into_item'      => _x( 'Insert into testimonial', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this testimonial', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'filter_items_list'     => _x( 'Filter testimonials list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list_navigation' => _x( 'Testimonials list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list'            => _x( 'Testimonials list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
	);

	$post_type_testimonial = array(
		'labels'             => $testimonials_labels,
		'public'             => true,
		'publicly_queryable' => false,
		'menu_icon'          => 'dashicons-testimonial',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'testimonial',
		),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type( 'testimonial', $post_type_testimonial );

	// Register the "Team" custom post type.
	$team_labels = array(
		'name'                  => _x( 'Team', 'Post type general name', 'radiantthemes-custom-post-type' ),
		'singular_name'         => _x( 'Team', 'Post type singular name', 'radiantthemes-custom-post-type' ),
		'menu_name'             => _x( 'Team', 'Admin Menu text', 'radiantthemes-custom-post-type' ),
		'name_admin_bar'        => _x( 'Team', 'Add New on Toolbar', 'radiantthemes-custom-post-type' ),
		'add_new'               => __( 'Add New Team', 'radiantthemes-custom-post-type' ),
		'add_new_item'          => __( 'Add New Team', 'radiantthemes-custom-post-type' ),
		'new_item'              => __( 'New Team', 'radiantthemes-custom-post-type' ),
		'edit_item'             => __( 'Edit Team', 'radiantthemes-custom-post-type' ),
		'view_item'             => __( 'View Team', 'radiantthemes-custom-post-type' ),
		'all_items'             => __( 'All Team', 'radiantthemes-custom-post-type' ),
		'search_items'          => __( 'Search Team', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'     => __( 'Parent Team:', 'radiantthemes-custom-post-type' ),
		'not_found'             => __( 'No Team found.', 'radiantthemes-custom-post-type' ),
		'not_found_in_trash'    => __( 'No Team found in Trash.', 'radiantthemes-custom-post-type' ),
		'featured_image'        => _x( 'Team Member Image', 'Overrides the "Featured Image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'set_featured_image'    => _x( 'Set Team Member Image', 'Overrides the "Set featured image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'remove_featured_image' => _x( 'Remove Team Member Image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'use_featured_image'    => _x( 'Use as Team Member Image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'archives'              => _x( 'Team archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'insert_into_item'      => _x( 'Insert into team', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this team', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'filter_items_list'     => _x( 'Filter team list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list_navigation' => _x( 'Team list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list'            => _x( 'Team list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
	);

	$post_type_team = array(
		'labels'             => $team_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'menu_icon'          => 'dashicons-groups',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'team',
		),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'team', $post_type_team );
	/**
	 * Register the "Profession" taxonomy.
	 */
	$profession_label = array(
		'name'                       => _x( 'Professions', 'Taxonomy General Name', 'radiantthemes-custom-post-type' ),
		'singular_name'              => _x( 'Profession', 'Taxonomy Singular Name', 'radiantthemes-custom-post-type' ),
		'menu_name'                  => __( 'Profession', 'radiantthemes-custom-post-type' ),
		'all_items'                  => __( 'All Professions', 'radiantthemes-custom-post-type' ),
		'parent_item'                => __( 'Parent Profession', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'          => __( 'Parent Profession:', 'radiantthemes-custom-post-type' ),
		'new_item_name'              => __( 'New Profession Name', 'radiantthemes-custom-post-type' ),
		'add_new_item'               => __( 'Add New Profession', 'radiantthemes-custom-post-type' ),
		'edit_item'                  => __( 'Edit Profession', 'radiantthemes-custom-post-type' ),
		'update_item'                => __( 'Update Profession', 'radiantthemes-custom-post-type' ),
		'view_item'                  => __( 'View Profession', 'radiantthemes-custom-post-type' ),
		'separate_items_with_commas' => __( 'Separate Professions with commas', 'radiantthemes-custom-post-type' ),
		'add_or_remove_items'        => __( 'Add or remove Professions', 'radiantthemes-custom-post-type' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'radiantthemes-custom-post-type' ),
		'popular_items'              => __( 'Popular Professions', 'radiantthemes-custom-post-type' ),
		'search_items'               => __( 'Search Professions', 'radiantthemes-custom-post-type' ),
		'not_found'                  => __( 'Not Found', 'radiantthemes-custom-post-type' ),
		'no_terms'                   => __( 'No Professions', 'radiantthemes-custom-post-type' ),
		'items_list'                 => __( 'Professions list', 'radiantthemes-custom-post-type' ),
		'items_list_navigation'      => __( 'Professions list navigation', 'radiantthemes-custom-post-type' ),
	);

	$post_type_professional = array(
		'labels'            => $profession_label,
		'hierarchical'      => true,
		'public'            => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'profession', array( 'team' ), $post_type_professional );

	// Register the "Portfolio" custom post type.
	$portfolio_labels = array(
		'name'                  => _x( 'Portfolio', 'Post type general name', 'radiantthemes-custom-post-type' ),
		'singular_name'         => _x( 'Portfolio', 'Post type singular name', 'radiantthemes-custom-post-type' ),
		'menu_name'             => _x( 'Portfolio', 'Admin Menu text', 'radiantthemes-custom-post-type' ),
		'name_admin_bar'        => _x( 'Portfolio', 'Add New on Toolbar', 'radiantthemes-custom-post-type' ),
		'add_new'               => __( 'Add New Portfolio', 'radiantthemes-custom-post-type' ),
		'add_new_item'          => __( 'Add New Portfolio', 'radiantthemes-custom-post-type' ),
		'new_item'              => __( 'New Portfolio', 'radiantthemes-custom-post-type' ),
		'edit_item'             => __( 'Edit Portfolio', 'radiantthemes-custom-post-type' ),
		'view_item'             => __( 'View Portfolio', 'radiantthemes-custom-post-type' ),
		'all_items'             => __( 'All Portfolio', 'radiantthemes-custom-post-type' ),
		'search_items'          => __( 'Search Portfolio', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'     => __( 'Parent Portfolio:', 'radiantthemes-custom-post-type' ),
		'not_found'             => __( 'No Portfolio found.', 'radiantthemes-custom-post-type' ),
		'not_found_in_trash'    => __( 'No Portfolio found in Trash.', 'radiantthemes-custom-post-type' ),
		'featured_image'        => _x( 'Portfolio Image', 'Overrides the "Featured Image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'set_featured_image'    => _x( 'Set Portfolio Image', 'Overrides the "Set featured image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'remove_featured_image' => _x( 'Remove Portfolio Image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'use_featured_image'    => _x( 'Use as Portfolio Image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'archives'              => _x( 'Portfolio archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'insert_into_item'      => _x( 'Insert into Portfolio', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Portfolio', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'filter_items_list'     => _x( 'Filter Portfolio list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list_navigation' => _x( 'Portfolio list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list'            => _x( 'Portfolio list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
	);

	$post_type_portfolio = array(
		'labels'             => $portfolio_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'menu_icon'          => 'dashicons-images-alt2',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'portfolio',
		),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'portfolio', $post_type_portfolio );

	/**
	 * Register the "Portfolio Categories" custom post type.
	 */
	$category_label = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'radiantthemes-custom-post-type' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'radiantthemes-custom-post-type' ),
		'menu_name'                  => __( 'Portfolio Category', 'radiantthemes-custom-post-type' ),
		'all_items'                  => __( 'All Portfolio Categories', 'radiantthemes-custom-post-type' ),
		'parent_item'                => __( 'Parent Portfolio Category', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'          => __( 'Parent Portfolio Category:', 'radiantthemes-custom-post-type' ),
		'new_item_name'              => __( 'New Portfolio Category Name', 'radiantthemes-custom-post-type' ),
		'add_new_item'               => __( 'Add New Portfolio Category', 'radiantthemes-custom-post-type' ),
		'edit_item'                  => __( 'Edit Portfolio Category', 'radiantthemes-custom-post-type' ),
		'update_item'                => __( 'Update Portfolio Category', 'radiantthemes-custom-post-type' ),
		'view_item'                  => __( 'View Portfolio Category', 'radiantthemes-custom-post-type' ),
		'separate_items_with_commas' => __( 'Separate Portfolio Categories with commas', 'radiantthemes-custom-post-type' ),
		'add_or_remove_items'        => __( 'Add or remove Portfolio Categories', 'radiantthemes-custom-post-type' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'radiantthemes-custom-post-type' ),
		'popular_items'              => __( 'Popular Portfolio Categories', 'radiantthemes-custom-post-type' ),
		'search_items'               => __( 'Search Portfolio Categories', 'radiantthemes-custom-post-type' ),
		'not_found'                  => __( 'Not Found', 'radiantthemes-custom-post-type' ),
		'no_terms'                   => __( 'No Portfolio Categories', 'radiantthemes-custom-post-type' ),
		'items_list'                 => __( 'Portfolio Categories list', 'radiantthemes-custom-post-type' ),
		'items_list_navigation'      => __( 'Portfolio Categories list navigation', 'radiantthemes-custom-post-type' ),
	);

	$post_type_category = array(
		'labels'            => $category_label,
		'hierarchical'      => true,
		'public'            => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'portfolio-category', array( 'portfolio' ), $post_type_category );

	// Register the "Case Studies" custom post type.
	$case_study_labels = array(
		'name'                  => _x( 'Case Studies', 'Post type general name', 'radiantthemes-custom-post-type' ),
		'singular_name'         => _x( 'Case Study', 'Post type singular name', 'radiantthemes-custom-post-type' ),
		'menu_name'             => _x( 'Case Study', 'Admin Menu text', 'radiantthemes-custom-post-type' ),
		'name_admin_bar'        => _x( 'Case Study', 'Add New on Toolbar', 'radiantthemes-custom-post-type' ),
		'add_new'               => __( 'Add New Case Study', 'radiantthemes-custom-post-type' ),
		'add_new_item'          => __( 'Add New Case Study', 'radiantthemes-custom-post-type' ),
		'new_item'              => __( 'New Case Study', 'radiantthemes-custom-post-type' ),
		'edit_item'             => __( 'Edit Case Study', 'radiantthemes-custom-post-type' ),
		'view_item'             => __( 'View Case Study', 'radiantthemes-custom-post-type' ),
		'all_items'             => __( 'All Case Studies', 'radiantthemes-custom-post-type' ),
		'search_items'          => __( 'Search Case Study', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'     => __( 'Parent Case Study:', 'radiantthemes-custom-post-type' ),
		'not_found'             => __( 'No Case Study found.', 'radiantthemes-custom-post-type' ),
		'not_found_in_trash'    => __( 'No Case Study found in Trash.', 'radiantthemes-custom-post-type' ),
		'featured_image'        => _x( 'Case Study Image', 'Overrides the "Featured Image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'set_featured_image'    => _x( 'Set Case Study Image', 'Overrides the "Set featured image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'remove_featured_image' => _x( 'Remove Case Study Image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'use_featured_image'    => _x( 'Use as Case Study Image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'archives'              => _x( 'Case Study archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'insert_into_item'      => _x( 'Insert into Case Study', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Case Study', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'filter_items_list'     => _x( 'Filter Case Study list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list_navigation' => _x( 'Case Study list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list'            => _x( 'Case Study list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
	);

	$post_type_case_study = array(
		'labels'             => $case_study_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'menu_icon'          => 'dashicons-images-alt2',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'case-studies',
		),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'case-studies', $post_type_case_study );

	/**
	 * Register the "Case Study Categories" custom post type.
	 */
	$case_study_category_label = array(
		'name'                       => _x( 'Case Study Categories', 'Taxonomy General Name', 'radiantthemes-custom-post-type' ),
		'singular_name'              => _x( 'Case Study Category', 'Taxonomy Singular Name', 'radiantthemes-custom-post-type' ),
		'menu_name'                  => __( 'Case Study Category', 'radiantthemes-custom-post-type' ),
		'all_items'                  => __( 'All Case Study Categories', 'radiantthemes-custom-post-type' ),
		'parent_item'                => __( 'Parent Case Study Category', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'          => __( 'Parent Case Study Category:', 'radiantthemes-custom-post-type' ),
		'new_item_name'              => __( 'New Case Study Category Name', 'radiantthemes-custom-post-type' ),
		'add_new_item'               => __( 'Add New Case Study Category', 'radiantthemes-custom-post-type' ),
		'edit_item'                  => __( 'Edit Case Study Category', 'radiantthemes-custom-post-type' ),
		'update_item'                => __( 'Update Case Study Category', 'radiantthemes-custom-post-type' ),
		'view_item'                  => __( 'View Case Study Category', 'radiantthemes-custom-post-type' ),
		'separate_items_with_commas' => __( 'Separate Case Study Categories with commas', 'radiantthemes-custom-post-type' ),
		'add_or_remove_items'        => __( 'Add or remove Case Study Categories', 'radiantthemes-custom-post-type' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'radiantthemes-custom-post-type' ),
		'popular_items'              => __( 'Popular Case Study Categories', 'radiantthemes-custom-post-type' ),
		'search_items'               => __( 'Search Case Study Categories', 'radiantthemes-custom-post-type' ),
		'not_found'                  => __( 'Not Found', 'radiantthemes-custom-post-type' ),
		'no_terms'                   => __( 'No Case Study Categories', 'radiantthemes-custom-post-type' ),
		'items_list'                 => __( 'Case Study Categories list', 'radiantthemes-custom-post-type' ),
		'items_list_navigation'      => __( 'Case Study Categories list navigation', 'radiantthemes-custom-post-type' ),
	);

	$post_type_category_case_study = array(
		'labels'            => $case_study_category_label,
		'hierarchical'      => true,
		'public'            => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'case-study-category', array( 'case-studies' ), $post_type_category_case_study );

	// Register the "Clients" custom post type.
	$clients_labels = array(
		'name'                  => _x( 'Clients', 'Post type general name', 'radiantthemes-custom-post-type' ),
		'singular_name'         => _x( 'Client', 'Post type singular name', 'radiantthemes-custom-post-type' ),
		'menu_name'             => _x( 'Clients', 'Admin Menu text', 'radiantthemes-custom-post-type' ),
		'name_admin_bar'        => _x( 'Client', 'Add New on Toolbar', 'radiantthemes-custom-post-type' ),
		'add_new'               => __( 'Add New Client', 'radiantthemes-custom-post-type' ),
		'add_new_item'          => __( 'Add New Clients', 'radiantthemes-custom-post-type' ),
		'new_item'              => __( 'New Clients', 'radiantthemes-custom-post-type' ),
		'edit_item'             => __( 'Edit Clients', 'radiantthemes-custom-post-type' ),
		'view_item'             => __( 'View Clients', 'radiantthemes-custom-post-type' ),
		'all_items'             => __( 'All Clients', 'radiantthemes-custom-post-type' ),
		'search_items'          => __( 'Search Clients', 'radiantthemes-custom-post-type' ),
		'parent_item_colon'     => __( 'Parent Clients:', 'radiantthemes-custom-post-type' ),
		'not_found'             => __( 'No Clients found.', 'radiantthemes-custom-post-type' ),
		'not_found_in_trash'    => __( 'No Clients found in Trash.', 'radiantthemes-custom-post-type' ),
		'featured_image'        => _x( 'Client Cover Image', 'Overrides the "Featured Image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'set_featured_image'    => _x( 'Set Client Image', 'Overrides the "Set featured image", phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'remove_featured_image' => _x( 'Remove Client image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'use_featured_image'    => _x( 'Use as Client image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'radiantthemes-custom-post-type' ),
		'archives'              => _x( 'Clients archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'insert_into_item'      => _x( 'Insert into Client', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Client', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'radiantthemes-custom-post-type' ),
		'filter_items_list'     => _x( 'Filter Clients list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list_navigation' => _x( 'Clients list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'radiantthemes-custom-post-type' ),
		'items_list'            => _x( 'Clients list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'radiantthemes-custom-post-type' ),
	);

	$post_type_client = array(
		'labels'             => $clients_labels,
		'public'             => true,
		'publicly_queryable' => false,
		'menu_icon'          => 'dashicons-businessman',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'client',
		),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' ),
	);

	register_post_type( 'client', $post_type_client );
	}

/**
 * Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */
add_action( 'init', 'radiantthemes_custom_posts_init' );

/**
 * Add meta box for testimonials
 *
 * @param post $post The post object.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function testimonial_add_meta_boxes( $post ) {
	add_meta_box(
		'testimonial_meta_box',
		__( 'CLIENT INFORMATION', 'radiantthemes-custom-post-type' ),
		'testimonial_build_meta_box',
		'testimonial',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes_testimonial', 'testimonial_add_meta_boxes' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object.
 */
function testimonial_build_meta_box( $post ) {
	// make sure the form request comes from WordPress.
	wp_nonce_field( basename( __FILE__ ), 'testimonial_meta_box_nonce' );

	// retrieve the _testimonial_designation current value.
	$current_designation = get_post_meta( $post->ID, '_testimonial_designation', true );

	// retrieve the _testimonial_facebook current value.
	$current_facebook = get_post_meta( $post->ID, '_testimonial_facebook', true );

	// retrieve the _testimonial_twitter current value.
	$current_twitter = get_post_meta( $post->ID, '_testimonial_twitter', true );

	// retrieve the _testimonial_gplus current value.
	$current_gplus = get_post_meta( $post->ID, '_testimonial_gplus', true );

	// retrieve the _testimonial_pinterest current value.
	$current_pinterest = get_post_meta( $post->ID, '_testimonial_pinterest', true );

	// retrieve the _testimonial_rating current value.
	$current_rating = get_post_meta( $post->ID, '_testimonial_rating', true );
	?>
	<div class='inside'>
		<h3><?php esc_html_e( 'Designation', 'radiantthemes-custom-post-type' ); ?></h3>
		<input type="text" class="widefat" name="designation" value="<?php echo esc_attr( $current_designation ); ?>" />

		<h3><?php esc_html_e( 'Facebook Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="facebook" value="<?php echo esc_url( $current_facebook ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Twitter Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="twitter" value="<?php echo esc_url( $current_twitter ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Google Plus Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="gplus" value="<?php echo esc_url( $current_gplus ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Pinterest Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="pinterest" value="<?php echo esc_url( $current_pinterest ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Rating', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="radio" name="rating" value="1" <?php checked( $current_rating, '1' ); ?> />One Star
			<input type="radio" name="rating" value="2" <?php checked( $current_rating, '2' ); ?> />Two Star
			<input type="radio" name="rating" value="3" <?php checked( $current_rating, '3' ); ?> />Three Star
			<input type="radio" name="rating" value="4" <?php checked( $current_rating, '4' ); ?> />Four Star
			<input type="radio" name="rating" value="5" <?php checked( $current_rating, '5' ); ?> />Five Star
		</p>
	</div>
<?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function testimonial_save_meta_box_data( $post_id ) {
	// verify meta box nonce.
	if ( ! isset( $_POST['testimonial_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['testimonial_meta_box_nonce'] ), basename( __FILE__ ) ) ) { // Input var okay.
		return;
	}
	// return if autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	// store custom fields values
	// designation string.
	if ( isset( $_REQUEST['designation'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_testimonial_designation', sanitize_text_field( wp_unslash( $_POST['designation'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// facebook link.
	if ( isset( $_REQUEST['facebook'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_testimonial_facebook', sanitize_text_field( wp_unslash( $_POST['facebook'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// twitter link.
	if ( isset( $_REQUEST['twitter'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_testimonial_twitter', sanitize_text_field( wp_unslash( $_POST['twitter'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// gplus link.
	if ( isset( $_REQUEST['gplus'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_testimonial_gplus', sanitize_text_field( wp_unslash( $_POST['gplus'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// pinterest link.
	if ( isset( $_REQUEST['pinterest'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_testimonial_pinterest', sanitize_text_field( wp_unslash( $_POST['pinterest'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// rating string.
	if ( isset( $_REQUEST['rating'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_testimonial_rating', sanitize_text_field( wp_unslash( $_POST['rating'] ) ) ); // Input var okay.
	}
}
add_action( 'save_post_testimonial', 'testimonial_save_meta_box_data' );
/**
 * Add meta box for team
 *
 * @param post $post The post object.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function team_add_meta_boxes( $post ) {
	add_meta_box(
		'team_meta_box',
		__( 'PERSON INFORMATION', 'radiantthemes-custom-post-type' ),
		'team_build_meta_box',
		'team',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes_team', 'team_add_meta_boxes' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object.
 */
function team_build_meta_box( $post ) {
	// make sure the form request comes from WordPress.
	wp_nonce_field( basename( __FILE__ ), 'team_meta_box_nonce' );

	// retrieve the _team_facebook current value.
	$current_phone = get_post_meta( $post->ID, '_team_phone', true );

	// retrieve the _team_facebook current value.
	$current_email = get_post_meta( $post->ID, '_team_email', true );

	// retrieve the _team_facebook current value.
	$current_facebook = get_post_meta( $post->ID, '_team_facebook', true );

	// retrieve the _team_twitter current value.
	$current_twitter = get_post_meta( $post->ID, '_team_twitter', true );

	// retrieve the _team_gplus current value.
	$current_gplus = get_post_meta( $post->ID, '_team_gplus', true );

	// retrieve the _team_pinterest current value.
	$current_pinterest = get_post_meta( $post->ID, '_team_pinterest', true );

	?>
	<div class='inside'>
		<h3><?php esc_html_e( 'Phone', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="phone" value="<?php echo esc_html( $current_phone ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Email', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="email" value="<?php echo sanitize_email( $current_email ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Facebook Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="facebook" value="<?php echo esc_url( $current_facebook ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Twitter Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="twitter" value="<?php echo esc_url( $current_twitter ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Google Plus Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="gplus" value="<?php echo esc_url( $current_gplus ); ?>" />
		</p>

		<h3><?php esc_html_e( 'Pinterest Link', 'radiantthemes-custom-post-type' ); ?></h3>
		<p>
			<input type="text" class="widefat" name="pinterest" value="<?php echo esc_url( $current_pinterest ); ?>" />
		</p>
	</div>
<?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function team_save_meta_box_data( $post_id ) {
	// verify meta box nonce.
	if ( ! isset( $_POST['team_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['team_meta_box_nonce'] ), basename( __FILE__ ) ) ) { // Input var okay.
		return;
	}
	// return if autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	// store custom fields values
	// phone link.
	if ( isset( $_REQUEST['phone'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_phone', sanitize_text_field( wp_unslash( $_POST['phone'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// phone link.
	if ( isset( $_REQUEST['email'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_email', sanitize_text_field( wp_unslash( $_POST['email'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// facebook link.
	if ( isset( $_REQUEST['facebook'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_facebook', sanitize_text_field( wp_unslash( $_POST['facebook'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// twitter link.
	if ( isset( $_REQUEST['twitter'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_twitter', sanitize_text_field( wp_unslash( $_POST['twitter'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// gplus link.
	if ( isset( $_REQUEST['gplus'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_gplus', sanitize_text_field( wp_unslash( $_POST['gplus'] ) ) ); // Input var okay.
	}
	// store custom fields values
	// pinterest link.
	if ( isset( $_REQUEST['pinterest'] ) ) { // Input var okay.
		update_post_meta( $post_id, '_team_pinterest', sanitize_text_field( wp_unslash( $_POST['pinterest'] ) ) ); // Input var okay.
	}
}
add_action( 'save_post_team', 'team_save_meta_box_data' );
/**
 * The following function is fired during plugin activation which calls
 * lcpt_setup_post_types function
 */
function lcpt_install() {
	// trigger our function that registers the custom post type.
	radiantthemes_custom_posts_init();

	// clear the permalinks after the post type has been registered.
	flush_rewrite_rules();
}

/**
 * The following function is fired during plugin deactivation
 */
function lcpt_deactivation() {
	// our post type will be automatically removed, so no need to unregister it
	// clear the permalinks to remove our post type's rules.
	flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'lcpt_install' );
register_deactivation_hook( __FILE__, 'lcpt_deactivation' );
<?php
/**
 * Require Redux Files
 *
 * @package brixel
 */

// Load Redux extensions - MUST be loaded before your options are set.
if ( file_exists( get_parent_theme_file_path( '/inc/redux-framework/redux-extensions/extensions-init.php' ) ) ) {
	require_once get_parent_theme_file_path( '/inc/redux-framework/redux-extensions/extensions-init.php' );
}

// Load the theme/plugin options.
if ( file_exists( get_parent_theme_file_path( '/inc/redux-framework/options-init.php' ) ) ) {
	require_once get_parent_theme_file_path( '/inc/redux-framework/options-init.php' );
}

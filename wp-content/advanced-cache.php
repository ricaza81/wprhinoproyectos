<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'WP_ROCKET_ADVANCED_CACHE', true );
$rocket_cache_path = '/var/www/html/wp-content/cache/wp-rocket/';
$rocket_config_path = '/var/www/html/wp-content/wp-rocket-config/';

if ( file_exists( '/var/www/html/wp-content/plugins/wp-rocket/inc/front/process.php' ) ) {
	include( '/var/www/html/wp-content/plugins/wp-rocket/inc/front/process.php' );
} else {
	define( 'WP_ROCKET_ADVANCED_CACHE_PROBLEM', true );
}
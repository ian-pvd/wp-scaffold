<?php
/**
 * WP Theme constants and setup functions
 *
 * @package RoundhouseTheme
 */

// Useful global constants.
define( 'ROUNDHOUSE_THEME_VERSION', '0.1.0' );
define( 'ROUNDHOUSE_THEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'ROUNDHOUSE_THEME_PATH', get_template_directory() . '/' );
define( 'ROUNDHOUSE_THEME_DIST_PATH', ROUNDHOUSE_THEME_PATH . 'dist/' );
define( 'ROUNDHOUSE_THEME_DIST_URL', ROUNDHOUSE_THEME_TEMPLATE_URL . '/dist/' );
define( 'ROUNDHOUSE_THEME_INC', ROUNDHOUSE_THEME_PATH . 'includes/' );
define( 'ROUNDHOUSE_THEME_BLOCK_DIR', ROUNDHOUSE_THEME_INC . 'blocks/' );
define( 'ROUNDHOUSE_THEME_BLOCK_DIST_DIR', ROUNDHOUSE_THEME_PATH . 'dist/blocks/' );

$is_local_env = in_array( wp_get_environment_type(), [ 'local', 'development' ], true );
$is_local_url = strpos( home_url(), '.test' ) || strpos( home_url(), '.local' );
$is_local     = $is_local_env || $is_local_url;

if ( $is_local && file_exists( __DIR__ . '/dist/fast-refresh.php' ) ) {
	require_once __DIR__ . '/dist/fast-refresh.php';
	TenUpToolkit\set_dist_url_path( basename( __DIR__ ), ROUNDHOUSE_THEME_DIST_URL, ROUNDHOUSE_THEME_DIST_PATH );
}

require_once ROUNDHOUSE_THEME_INC . 'core.php';
require_once ROUNDHOUSE_THEME_INC . 'overrides.php';
require_once ROUNDHOUSE_THEME_INC . 'template-tags.php';
require_once ROUNDHOUSE_THEME_INC . 'utility.php';
require_once ROUNDHOUSE_THEME_INC . 'blocks.php';
require_once ROUNDHOUSE_THEME_INC . 'helpers.php';

// Run the setup functions.
RoundhouseTheme\Core\setup();
RoundhouseTheme\Blocks\setup();

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for the the new wp_body_open() function that was added in 5.2
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

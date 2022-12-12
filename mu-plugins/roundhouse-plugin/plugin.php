<?php

// Useful global constants.
define( 'ROUNDHOUSE_PLUGIN_VERSION', '0.1.0' );
define( 'ROUNDHOUSE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ROUNDHOUSE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'ROUNDHOUSE_PLUGIN_INC', ROUNDHOUSE_PLUGIN_PATH . 'includes/' );

$is_local_env = in_array( wp_get_environment_type(), [ 'local', 'development' ], true );
$is_local_url = strpos( home_url(), '.test' ) || strpos( home_url(), '.local' );
$is_local     = $is_local_env || $is_local_url;

if ( $is_local && file_exists( __DIR__ . '/dist/fast-refresh.php' ) ) {
	require_once __DIR__ . '/dist/fast-refresh.php';
	TenUpToolkit\set_dist_url_path( basename( __DIR__ ), ROUNDHOUSE_THEME_DIST_URL, ROUNDHOUSE_THEME_DIST_PATH );
}

// Require Composer autoloader if it exists.
if ( file_exists( ROUNDHOUSE_PLUGIN_PATH . 'vendor/autoload.php' ) ) {
	require_once ROUNDHOUSE_PLUGIN_PATH . 'vendor/autoload.php';
}

// Include files.
require_once ROUNDHOUSE_PLUGIN_INC . '/utility.php';
require_once ROUNDHOUSE_PLUGIN_INC . '/core.php';

// Activation/Deactivation.
register_activation_hook( __FILE__, '\RoundhousePlugin\Core\activate' );
register_deactivation_hook( __FILE__, '\RoundhousePlugin\Core\deactivate' );

// Bootstrap.
RoundhousePlugin\Core\setup();

<?php

/** Bootstrap our deps */
try {
  require dirname(__FILE__) . '/../vendor/autoload.php';

  # Load dotenv library
  $dotenv = Dotenv\Dotenv::create(__DIR__, '/../.env');
  $dotenv->load();
}
catch(Exception $e) {
  echo "Something went wrong loading composer dependencies: ${e}";
}


/**
 * Define some sensible default configs for our environments
 *
 * If you need another environment (like stagging) use the
 * template to do so.
 */
switch (getenv('APP_ENV')) {
    case 'local':
        if (file_exists(dirname(__FILE__) . '/../local-config.php')) {
            include(dirname(__FILE__) . '/../local-config.php');
        } else {
            throw new Exception("No config file found for this environment");
            die();
        }
        break;
    case 'production':
        if (file_exists(dirname(__FILE__) . '/../production-config.php')) {
            @ini_set('display_errors', 0); # Hide errors on production
            define('WP_LOCAL_DEV', false); # Set dev constant to false
            include(dirname(__FILE__) . '/../production-config.php'); # Include config file
        } else {
            throw new Exception("No config file found for this environment");
            die();
        }
        break;
    /* TEMPLATE
        case 'new-environment':
        if (file_exists(dirname(__FILE__) . '/../new-environment-config.php')) {
            define('WP_LOCAL_DEV', false); # Set dev constant to false
            include(dirname(__FILE__) . '/../new-environment-config.php'); # Include config file
        } else {
            throw new Exception("No config file found for this environment");
            die();
        }
        break;
    */

    default:
        throw new Exception('Environment not defined or misspelled.');
        die();
        break;
}

/**
 * Fallback configs
 */
if ( ! defined( 'DB_CHARSET' ) ) {
    define( 'DB_CHARSET', getenv('DB_CHARSET') );
}

/**
 * Custom Content Directory
 */
if ( ! defined( 'WP_CONTENT_DIR' ) ) {
    define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . getenv('APP_WP_CONTENT_DIR') );
}

/**
 * Custom Content URL
 */
if ( ! defined( 'WP_CONTENT_URL' ) && ! empty( $_SERVER['HTTP_HOST'] ) ) {
    $protocol = ( ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' ) || ( isset( $_SERVER['SERVER_PORT'] ) && $_SERVER['SERVER_PORT'] == 443 ) ) ? 'https://' : 'http://';
    define( 'WP_CONTENT_URL', $protocol . $_SERVER['HTTP_HOST'] . getenv('APP_WP_CONTENT_URL') );
}

// ===========================
// Disable WP_DEBUG by default
// ===========================
if ( ! defined( 'WP_DEBUG' ) ) {
    define( 'WP_DEBUG', false );
}

// =========================
// Disable automatic updates
// =========================
if ( ! defined( 'AUTOMATIC_UPDATER_DISABLED' ) ) {
    define( 'AUTOMATIC_UPDATER_DISABLED', false );
}

// =======================
// Load WordPress Settings
// =======================
$table_prefix = 'wp_';

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}
require_once( ABSPATH . 'wp-settings.php' );

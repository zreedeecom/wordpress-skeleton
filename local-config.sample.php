<?php

/**
 * Lets add some sugar to our dev environment
 * Note: This tools are not loaded on provision server so we
 * don't drain server resources when not needed.
 *
 * Whoops brings up a Laravel flavored error handling interface
 * @info: http://filp.github.io/whoops/
 *
 * Kint - a modern and powerful PHP debugging helper
 * @info: https://kint-php.github.io/kint/
 */
$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

/**
 * Database details
 */
define( 'DB_NAME',     getenv('DB_NAME') );
define( 'DB_USER',     getenv('DB_USER') );
define( 'DB_PASSWORD', getenv('DB_PASSWORD') );
define( 'DB_HOST',     getenv('DB_HOST') );

/**
 * Error reporting
 *
 * On production sites you might want to disable WP_DEBUG as it
 * can be a performance leak.
 */
@ini_set( 'display_errors', getenv('APP_DISPLAY_ERRORS') );
error_reporting(getenv('APP_ERROR_REPORTING'));
define( 'WP_DEBUG',         getenv('WP_DEBUG') );
define( 'WP_DEBUG_LOG',     getenv('WP_DEBUG_LOG') );
define( 'WP_DEBUG_DISPLAY', getenv('WP_DEBUG_DISPLAY') );

/**
 * URLs
 *
 * WP_HOME: Define where is your site going to be accessed from by
 * users (aka frontend).
 *
 * WP_SITEURL: Define where are your wordpress core files living
 */
define( 'WP_HOME', getenv('APP_WP_HOME') );
define( 'WP_SITE_URL', getenv('APP_WP_SITE_URL') );

/**
 * Salt
 *
 * For new sites: visit https://api.wordpress.org/secret-key/1.1/salt/
 * and paste the results below
 *
 * For existing sites: you can reuse your previous values.
 */
define('AUTH_KEY',         '');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '');
define('NONCE_KEY',        '');
define('AUTH_SALT',        '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT',   '');
define('NONCE_SALT',       '');

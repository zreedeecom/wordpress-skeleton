<?php
/**
 * Rename this file to local-config.php (or production-config.php)
 */

/**
 * Database details
 */
define( 'DB_NAME',     '' );
define( 'DB_USER',     '' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST',     'localhost' );

/**
 * Error reporting
 * 
 * On production sites you might want to disable WP_DEBUG as it
 * can be a performance leak.
 */
@ini_set( 'display_errors', E_ALL );
define( 'WP_DEBUG',         true );
define( 'WP_DEBUG_LOG',     true );
define( 'WP_DEBUG_DISPLAY', false );

/**
 * URLs
 * 
 * WP_HOME: Define where is your site going to be accessed from by 
 * users (aka frontend).
 * 
 * WP_SITEURL: Define where are your wordpress core files living
 */
define( 'WP_HOME', 'http(s)://domain.test' ); 
define( 'WP_SITE_URL', 'http(s)://domain.test/wp' );

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

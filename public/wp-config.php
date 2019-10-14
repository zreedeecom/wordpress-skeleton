<?php

/**
 * This is a modified version of wp-config.php from WordPress
 *
 * Please set all your credentials/preferences via the .env file
 *
 * By default you should not change anything here unless
 * you know what you're doing.
 *
 * You can get a good hint of what's happening here by visiting
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 */


/** Bootstrap our deps */
try {
  require dirname(__FILE__) . '/../vendor/autoload.php';

  # Load dotenv library
  if (file_exists(dirname(__FILE__) . '/../.env')) {
    # we are in local
    $dotenv = Dotenv\Dotenv::create(__DIR__, '/../.env');
    $dotenv->load();
  } elseif (file_exists(__DIR__ . '/../../../.env')) {
    # we are in server
    $dotenv = Dotenv\Dotenv::create(__DIR__, '/../../../.env');
    $dotenv->load();
  } else {
    throw new Exception("We couldn't find your .env file, is it there?", 1);
  }

  if (env('APP_WHOOPS') === true) {
    $whoops = new \Whoops\Run;
    $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
  }

  Kint::$enabled_mode = env('APP_KINT');
} catch (Exception $e) {
  echo "<pre>Something went wrong loading dependencies:\n"
    . $e->getMessage()
    . "\n\nStack trace:\n"
    . $e->getTraceAsString()
    . "</pre>";
  die();
}


/**
 * Database details
 */
define('DB_NAME',     env('DB_NAME'));
define('DB_USER',     env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST',     env('DB_HOST'));
define('DB_CHARSET',  env('DB_CHARSET'));
$table_prefix =       env('TABLE_PREFIX');

/**
 * Error reporting
 *
 * On production sites you might want to disable WP_DEBUG as it
 * can be a performance leak.
 */
@ini_set('display_errors', env('APP_DISPLAY_ERRORS'));
error_reporting(env('APP_ERROR_REPORTING'));
define('WP_DEBUG',         env('WP_DEBUG'));
define('WP_DEBUG_LOG',     env('WP_DEBUG_LOG'));
define('WP_DEBUG_DISPLAY', env('WP_DEBUG_DISPLAY'));

/**
 * Custom Content Directory
 *
 * This tells WordPress to completely ignore default wp-content folder
 * location in favour of our preferred location.
 */
define('WP_CONTENT_DIR', dirname(__FILE__) . env('WP_CONTENT_DIR'));
define('WP_CONTENT_URL', env('WP_CONTENT_URL'));

/**
 * Custom Content URL
 */
if (!empty($_SERVER['HTTP_HOST'])) {
  // $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? 'https://' : 'http://';

  if ((!empty('WP_CONTENT_URL') && $_SERVER['HTTPS'] !== 'off')
    || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
  ) {
    $protocol = 'https://';
  } else {
    $protocol = 'http://';
  }
  define('WP_CONTENT_URL', $protocol . $_SERVER['HTTP_HOST'] . env('WP_CONTENT_URL'));
}

/**
 * URLs
 *
 * WP_HOME: Define where is your site going to be accessed from by
 * users (aka frontend).
 *
 * WP_SITEURL: Define where are your wordpress core files living
 */
define('WP_HOME', env('WP_HOME'));
define('WP_SITE_URL', env('WP_SITE_URL'));

/**
 * Salt
 *
 * For new sites: visit https://api.wordpress.org/secret-key/1.1/salt/
 * and paste the results below
 *
 * For existing sites: you can reuse your previous values.
 */
define('AUTH_KEY',         env('AUTH_KEY'));
define('SECURE_AUTH_KEY',  env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',    env('LOGGED_IN_KEY'));
define('NONCE_KEY',        env('NONCE_KEY'));
define('AUTH_SALT',        env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   env('LOGGED_IN_SALT'));
define('NONCE_SALT',       env('NONCE_SALT'));

/**
 * Updates and file editing
 */
define('AUTOMATIC_UPDATER_DISABLED', env('AUTOMATIC_UPDATER_DISABLED'));
define('DISALLOW_FILE_EDIT',         env('DISALLOW_FILE_EDIT'));
define('WP_AUTO_UPDATE_CORE',        env('WP_AUTO_UPDATE_CORE'));
define('DISALLOW_FILE_MODS',         env('DISALLOW_FILE_MODS'));

/**
 * Load WordPress Settings
 */
if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(__FILE__) . '/wp/');
}
require_once(ABSPATH . 'wp-settings.php');

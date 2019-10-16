<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              URL to plugin homepage
 * @since             1.0.0
 * @package           TODO
 *
 * @wordpress-plugin
 * Plugin Name: WP Migrations
 * Plugin URI : URL to the homepage of the plugin
 * Description: Laravel flavoured DB migrations
 * Author     : Luis Giménez
 * License    : MIT
 * Version    : 0.1
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

/**
 * Instantiates the plugin and and initializes the functionality necessary for
 * WordPress.
 *
 * @since 0.1
 */
$migrator = \DeliciousBrains\WPMigrations\Database\Migrator::instance();
// $migrator->init();

function wpsk_setWpMigrationsFolder()
{
  $base_path = __FILE__;
  while (basename($base_path) != 'public') {
    $base_path = dirname($base_path);
  }
  $val = dirname($base_path) . '/migrations';
  return $val;
}
//add_filter('dbi_wp_migrations_path', 'wpsk_setWpMigrationsFolder', 99);


function get_filters_for($hook = '')
{
  global $wp_filter;
  if (empty($hook) || !isset($wp_filter[$hook]))
    return;

  return $wp_filter[$hook];
}

add_action('shutdown', 'wpsk_Test');
function wpsk_Test()
{
  // $base_path = __FILE__;
  // while (basename($base_path) != 'public') {
  //   $base_path = dirname($base_path);
  // }
  // $val = dirname($base_path) . '/migrations';
  // //return $val;
  // d($val);

  //d(get_filters_for('dbi_wp_migrations_path'));
}

<?php

/**
 * Wss functions and definitions
 *
 * @package Wss
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Wsstheme's includes directory.
$wsstheme_inc_dir = 'inc';

// Array of files to include.
$wsstheme_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/template_functions.php',              // heme_functions.
	'/template_hooks.php',                  // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/websweetstudio/wssthemeissues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/beaver-builder.php',                  // Load Beaver Builder functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$wsstheme_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
	$wsstheme_includes[] = '/jetpack.php';
}

// Include files.
foreach ($wsstheme_includes as $file) {
	require_once get_theme_file_path($wsstheme_inc_dir . $file);
}
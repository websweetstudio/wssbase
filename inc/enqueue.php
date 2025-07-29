<?php

/**
 * Wss enqueue scripts
 *
 * @package Wssbase
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! function_exists('wssbase_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function wssbase_scripts()
	{
		// Get the theme data.
		$the_theme         = wp_get_theme();
		$theme_version     = $the_theme->get('Version');
		$suffix            = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '.min' : '.min';

		// Grab asset urls.
		$theme_styles  = "/css/theme{$suffix}.css";
		$theme_scripts = "/js/theme{$suffix}.js";

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . $theme_styles);
		wp_enqueue_style('wssbase-styles', get_template_directory_uri() . $theme_styles, array(), $css_version);

		wp_enqueue_script('jquery');

		$js_version = $theme_version . '.' . filemtime(get_template_directory() . $theme_scripts);
		wp_enqueue_script('wssbase-scripts', get_template_directory_uri() . $theme_scripts, array(), $js_version, true);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
} // End of if function_exists( 'wssbase_scripts' ).

add_action('wp_enqueue_scripts', 'wssbase_scripts');

if (! function_exists('wssbase_google_fonts')) {
	/**
	 * Load Google Fonts for Space Grotesk and Inter.
	 */
	function wssbase_google_fonts()
	{
		// Enqueue Space Grotesk font from Google Fonts (for headings & navigation)
		wp_enqueue_style(
			'wssbase-space-grotesk-font',
			'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap',
			array(),
			null
		);

		// Enqueue Inter font from Google Fonts (for body text)
		wp_enqueue_style(
			'wssbase-inter-font',
			'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
			array(),
			null
		);
	}
}

add_action('wp_enqueue_scripts', 'wssbase_google_fonts');

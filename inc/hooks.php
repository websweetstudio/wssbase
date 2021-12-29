<?php
/**
 * Custom hooks
 *
 * @package SweetWeb
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'sweetweb_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function sweetweb_site_info() {
		do_action( 'sweetweb_site_info' );
	}
}

add_action( 'sweetweb_site_info', 'sweetweb_add_site_info' );
if ( ! function_exists( 'sweetweb_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function sweetweb_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = '<center>Website by <span style="color:#be1931">&#10084;</span> <a href="https://websweet.xyz">websweet.xyz</a></center>';

		// Check if customizer site info has value.
		if ( get_theme_mod( 'sweetweb_site_info_override' ) ) {
			$site_info = get_theme_mod( 'sweetweb_site_info_override' );
		}

		echo apply_filters( 'sweetweb_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}

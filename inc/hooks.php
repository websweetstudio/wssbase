<?php
/**
 * Custom hooks
 *
 * @package sweetweb
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

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'https://wordpress.org/', 'sweetweb' ) ),
			sprintf(
				/* translators: WordPress */
				esc_html__( 'Proudly powered by %s', 'sweetweb' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( 'Theme: %1$s by %2$s.', 'sweetweb' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'https://websweet.xyz', 'sweetweb' ) ) . '">websweet.xyz</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: Theme version */
				esc_html__( 'Version: %1$s', 'sweetweb' ),
				$the_theme->get( 'Version' )
			)
		);

		// Check if customizer site info has value.
		if ( get_theme_mod( 'sweetweb_site_info_override' ) ) {
			$site_info = get_theme_mod( 'sweetweb_site_info_override' );
		}

		echo apply_filters( 'sweetweb_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}

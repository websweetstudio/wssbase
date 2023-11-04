<?php
/**
 * Custom hooks
 *
 * @package Wss
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$navbar_type       = get_theme_mod( 'wsstheme_navbar_type', 'offcanvas' );
if($navbar_type == 'offcanvas') {
	add_action( 'wsstheme_navbar', 'wsstheme_navbar_offcanvas' );
} else {
	add_action( 'wsstheme_navbar', 'wsstheme_navbar_collapse' );
}

add_action( 'wsstheme_header', 'wsstheme_add_navbar' );	// Add navbar.

add_action( 'wsstheme_footer', 'wsstheme_add_footer' );	// Add footer.

add_action( 'wsstheme_site_info', 'wsstheme_add_site_info' );



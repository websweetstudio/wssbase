<?php
/**
 * Custom hooks
 *
 * @package Wss
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$navbar_type       = get_theme_mod( 'wss_navbar_type', 'offcanvas' );
if($navbar_type == 'offcanvas') {
	add_action( 'wss_navbar', 'wss_navbar_offcanvas' );
} else {
	add_action( 'wss_navbar', 'wss_navbar_collapse' );
}

add_action( 'wss_header', 'wss_add_navbar' );	// Add navbar.

add_action( 'wss_footer', 'wss_add_footer' );	// Add footer.

add_action( 'wss_site_info', 'wss_add_site_info' );



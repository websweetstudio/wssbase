<?php
/**
 * Custom hooks
 *
 * @package Sweetweb
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$navbar_type       = get_theme_mod( 'sweetweb_navbar_type', 'offcanvas' );
if($navbar_type == 'offcanvas') {
	add_action( 'sweetweb_navbar', 'sweetweb_navbar_offcanvas' );
} else {
	add_action( 'sweetweb_navbar', 'sweetweb_navbar_collapse' );
}

add_action( 'sweetweb_header', 'sweetweb_add_navbar' );	// Add navbar.

add_action( 'sweetweb_footer', 'sweetweb_add_footer' );	// Add footer.

add_action( 'sweetweb_site_info', 'sweetweb_add_site_info' );



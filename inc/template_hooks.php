<?php
/**
 * Custom hooks
 *
 * @package Wssbase
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$navbar_type       = get_theme_mod( 'wssbase_navbar_type', 'offcanvas' );
if($navbar_type == 'offcanvas') {
	add_action( 'wssbase_navbar', 'wssbase_navbar_offcanvas' );
} else {
	add_action( 'wssbase_navbar', 'wssbase_navbar_collapse' );
}

add_action( 'wssbase_header', 'wssbase_add_navbar' );	// Add navbar.

add_action( 'wssbase_footer', 'wssbase_add_footer' );	// Add footer.

add_action( 'wssbase_site_info', 'wssbase_add_site_info' );



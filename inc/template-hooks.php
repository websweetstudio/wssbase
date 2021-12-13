<?php
/**
 * Template Hooks
 * 
 * @package SweetWeb
 * 
 */

/**
 * Header
 * 
 * @see sweetweb_secondary_navigation()
 */
add_action( 'sweetweb_header', 'sweetweb_secondary_navigation', 10 );

/**
 * Footer
 * 
 * @see sweetweb_footer_content()
 */
add_action( 'sweetweb_footer', 'sweetweb_footer_content', 10 );
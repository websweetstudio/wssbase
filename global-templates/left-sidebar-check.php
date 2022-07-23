<?php
/**
 * Left sidebar check
 *
 * @package Sweetweb
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$sidebar_pos = get_theme_mod( 'sweetweb_sidebar_position' );

// disable sidebar in woocommerce pages
if ( ('left' === $sidebar_pos || 'both' === $sidebar_pos) && !(class_exists( 'WooCommerce' ) && is_woocommerce()) ) {
	get_template_part( 'sidebar-templates/sidebar', 'left' );
}
?>

<div class="col content-area" id="primary">

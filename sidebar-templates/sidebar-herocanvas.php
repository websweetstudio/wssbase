<?php
/**
 * Sidebar - The Hero Canvas Widget Area
 *
 * @package Wssbase
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_active_sidebar( 'herocanvas' ) ) {

	dynamic_sidebar( 'herocanvas' );

}

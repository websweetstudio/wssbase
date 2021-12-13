<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SweetWeb
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php sweetweb_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<header id="wrapper-navbar">
	<?php
		/**
		 * Functions hooked into sweetweb_header action
		 *
		 * @hooked sweetweb_header_container                 - 0
		 * @hooked sweetweb_secondary_navigation             - 10
		 * @hooked sweetweb_header_container_close           - 20
		 */
		do_action( 'sweetweb_header' );
		?>
	</header><!-- #wrapper-navbar end -->

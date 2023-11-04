<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wss
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<?php do_action( 'wsstheme_footer' ); ?>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>


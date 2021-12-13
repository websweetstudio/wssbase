<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SweetWeb
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'sweetweb_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>


<div class="wrapper" id="wrapper-footer">
	<?php
	/**
	 * Functions hooked into sweetweb_footer action
	 * 
	 * 
	 * @hooked sweetweb_footer_start - 10
	 * @hooked sweetweb_footer - 20
	 * @hooked sweetweb_footer_end - 30
	 * 
	 * 
	 */
		do_action( 'sweetweb_footer' );
	?>

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>


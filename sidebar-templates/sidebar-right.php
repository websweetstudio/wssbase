<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package sweetweb
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'sweetweb_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="right-sidebar">
<?php else : ?>
	<div class="col-md-4 widget-area" id="right-sidebar">
<?php endif; ?>
<?php 
do_action( 'sweetweb_right_sidebar' );
dynamic_sidebar( 'right-sidebar' );
?>

</div><!-- #right-sidebar -->

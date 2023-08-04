<?php
/**
 * Custom hooks
 *
 * @package Sweetweb
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'sweetweb_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function sweetweb_site_info() {
		do_action( 'sweetweb_site_info' );
	}
}

add_action( 'sweetweb_site_info', 'sweetweb_add_site_info' );
if ( ! function_exists( 'sweetweb_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function sweetweb_add_site_info() {
		$the_theme = wp_get_theme();
		$year 	= date( 'Y' );
		$site_title = get_bloginfo( 'name' );
		$site_info =  "Copyright $year &copy; $site_title. All rights reserved | Powered by <a href='https://websweetstudio.com/'>websweetstudio.com</a>";

		// Check if customizer site info has value.
		if ( get_theme_mod( 'sweetweb_site_info_override' ) ) {
			$site_info = get_theme_mod( 'sweetweb_site_info_override' );
		}

		$site_info = '<div class="text-center">'.$site_info.'</div>';

		echo apply_filters( 'sweetweb_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}

add_action( 'sweetweb_header', 'sweetweb_add_navbar' );	// Add navbar.
if( ! function_exists( 'sweetweb_add_navbar' ) ) {
	/**
	 * Add navbar.
	 */
	function sweetweb_add_navbar() {
		$navbar_type       = get_theme_mod( 'sweetweb_navbar_type', 'offcanvas' );
		$header_position   = get_theme_mod( 'sweetweb_header_position', 'position-relative' );
		?>

		<header id="wrapper-navbar" class="<?php echo $header_position; ?> bg-white shadow-light">

			<a class="visually-hidden-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'sweetweb' ); ?></a>

			<?php get_template_part( 'global-templates/navbar-'. $navbar_type); ?>

		</header><!-- #wrapper-navbar end -->

		<?php
	}
}

add_action( 'sweetweb_footer', 'sweetweb_add_footer' );	// Add footer.
if( ! function_exists( 'sweetweb_add_footer' ) ) {
	/**
	 * Add footer.
	 */
	function sweetweb_add_footer() {
		$container = get_theme_mod( 'sweetweb_container_type' );
		?>
		<div class="wrapper-footer" id="wrapper-footer">
			<footer class="site-footer" id="colophon">
				<div class="<?php echo esc_attr( $container ); ?> py-3">
					<div class="site-info">
						<?php sweetweb_site_info(); ?>
					</div><!-- .site-info -->
				</div><!-- container end -->
			</footer><!-- #colophon -->
		</div><!-- wrapper end -->
		<?php
	}
}

if (!function_exists('sweetweb_color_scheme')) {
	/**
	 * Membuat color scheme.
	 *
	 * @return array
	 */
	function sweetweb_color_scheme()
	{
		$color_scheme = isset($_COOKIE["color_scheme"]) ? $_COOKIE["color_scheme"] : 'light';
		echo 'data-bs-theme="' . $color_scheme . '"';
	}
}
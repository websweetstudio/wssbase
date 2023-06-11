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
		$site_info =  "Copyright $year &copy; $site_title. All rights reserved | Powered by <a href='https://websweetstudio.com/'>websweetstudio.com</a>.";

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

		<header id="wrapper-navbar" class="<?php echo $header_position; ?> bg-white shadow-sm py-1">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'sweetweb' ); ?></a>

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
		
		<div class="wrapper bg-light" id="wrapper-footer">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row">

				<div class="col-md-12">

					<footer class="site-footer" id="colophon">

						<div class="site-info">

							<?php sweetweb_site_info(); ?>

						</div><!-- .site-info -->

					</footer><!-- #colophon -->

				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

		</div><!-- wrapper end -->
		<?php
	}
}
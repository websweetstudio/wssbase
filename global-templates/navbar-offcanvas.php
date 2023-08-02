<?php

/**
 * Header Navbar
 *
 * @package Sweetweb
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('sweetweb_container_type');
?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-light py-3" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e('Main Navigation', 'sweetweb'); ?>
	</h2>


	<div class="<?php echo esc_attr($container); ?>">

		<!-- Your site title as branding in the menu -->
		<?php if (!has_custom_logo()) { ?>

			<?php if (is_front_page() && is_home()) : ?>

				<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a></h1>

			<?php else : ?>

				<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>

			<?php endif; ?>

		<?php
		} else {
			the_custom_logo();
		}
		?>
		<!-- end custom logo -->

		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'sweetweb'); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNavOffcanvas">

			<div class="offcanvas-header justify-content-end">
				<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div><!-- .offcancas-header -->

			<!-- The WordPress Menu goes here -->
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'offcanvas-body justify-content-end',
					'container_id'    => '',
					'menu_class'      => 'navbar-nav justify-content-end d-flex flex-wrap justify-content-end',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'depth'           => 2,
					'walker'          => new sweetweb_WP_Bootstrap_Navwalker(),
				)
			);
			?>
		</div><!-- .offcanvas -->

	</div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->
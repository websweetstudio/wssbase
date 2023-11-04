<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Wss
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('mb-3'); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

	</header><!-- .entry-header -->

	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('large', ['class' => 'img-fluid mb-3 w-100', 'alt' => the_title_attribute(['echo' => false])]); ?>
	</a>
	
	<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta text-muted">
		<?php wsstheme_posted_on(); ?>
	</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-content">

		<?php
		the_excerpt();
		wsstheme_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php wsstheme_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

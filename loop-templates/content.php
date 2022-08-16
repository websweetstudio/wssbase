<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Sweetweb
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
		<?php sweetweb_posted_on(); ?>
	</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-content">

		<?php
		the_excerpt();
		sweetweb_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php sweetweb_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

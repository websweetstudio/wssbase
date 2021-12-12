<?php
/**
 * Beaver Builder Compatibility File
 *
 * @package SweetWeb
 */

add_action( 'after_setup_theme', 'sweetweb_header_footer_support' );

function sweetweb_header_footer_support() {
  add_theme_support( 'fl-theme-builder-headers' );
  add_theme_support( 'fl-theme-builder-footers' );
  add_theme_support( 'fl-theme-builder-parts' );
}

add_filter( 'fl_theme_builder_part_hooks', 'sweetweb_register_part_hooks' );


add_action( 'wp', 'sweetweb_header_footer_render' );

function sweetweb_header_footer_render() {
  // Get the header ID.
  $header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();

  // If we have a header, remove the theme header and hook in Beaver Themer'
  if ( ! empty( $header_ids ) ) {
    remove_action( 'sweetweb_header', 'sweetweb_do_header' );
    add_action( 'sweetweb_header', 'FLThemeBuilderLayoutRenderer::render_header' );
  }

  // Get the footer ID.
  $footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

  // If we have a footer, remove the theme footer and hook in Beaver Themer.
  if ( ! empty( $footer_ids ) ) {
    remove_action( 'sweetweb_footer', 'sweetweb_do_footer' );
    add_action( 'sweetweb_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
  }
}


function sweetweb_register_part_hooks() {
  return array(
    array(
      'label' => 'Header',
      'hooks' => array(
        'sweetweb_before_header' => 'Before Header',
        'sweetweb_after_header'  => 'After Header',
      )
    ),
    array(
      'label' => 'Content',
      'hooks' => array(
        'sweetweb_before_content' => 'Before Content',
        'sweetweb_after_content'  => 'After Content',
      )
    ),
    array(
      'label' => 'Footer',
      'hooks' => array(
        'sweetweb_before_footer' => 'Before Footer',
        'sweetweb_after_footer'  => 'After Footer',
      )
    )
  );
}

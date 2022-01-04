<?php
/**
 * Template function
 * 
 * @package SweetWeb
 * 
 */


 if( !function_exists('sweetweb_secondary_navigation') ){
     /**
      * Display menu navigation by $navbar_type & $bootstrap_version
      * 
      * @since 1.0.0
      */
    function sweetweb_secondary_navigation(){
        $bootstrap_version = get_theme_mod( 'sweetweb_bootstrap_version', 'bootstrap4' );
        $navbar_type       = get_theme_mod( 'sweetweb_navbar_type', 'collapse' );

        get_template_part( 'global-templates/navbar', $navbar_type . '-' . $bootstrap_version );
    }
}

if( !function_exists('sweetweb_footer_content') ){
    /**
     * Display footer content
     * 
     * @since 1.0.0
     */
    function sweetweb_footer_content(){
        $container = get_theme_mod( 'sweetweb_container_type' );
        ?>
        <div class="frame-footer">
        	<div class="<?php echo esc_attr( $container ); ?>">

                <div class="row">

                    <div class="col-md-12">

                        <footer class="site-footer" id="colophon">

                            <div class="site-info">

                                <div class="text-center">Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name' ); ?></a> | Allright reserved</div>
                                <small><?php sweetweb_site_info(); ?></small>

                            </div><!-- .site-info -->

                        </footer><!-- #colophon -->

                    </div><!--col end -->

                </div><!-- row end -->

            </div><!-- container end -->
        </div>
        <?php

    }
}
<?php

/**
 * Heda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Heda
 * @since Heda 1.0
 */

if (!function_exists('heda_support')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since Heda 1.0
     *
     * @return void
     */
    function heda_support()
    {
        // Add support for block styles.
        add_theme_support('wp-block-styles');

        // Enqueue editor styles.
        add_editor_style('style.css');
    }

endif;
add_action('after_setup_theme', 'heda_support');

/*-------------------------------------------------------------------------------------
Enqueue Styles
-------------------------------------------------------------------------------------*/
if (!function_exists('heda_styles')) :

    /**
     * Enqueue styles.
     *
     * @since Heda 1.0
     *
     * @return void
     */
    function heda_styles()
    {
        // Enqueue theme stylesheet.
        wp_enqueue_style('heda-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
        wp_enqueue_style('heda-style-blocks', get_stylesheet_directory_uri() . '/assets/css/blocks.css');
    }
endif;
add_action('wp_enqueue_scripts', 'heda_styles');

//FOOTER
add_action('wp_footer', 'astra_footer_align_bottom');

function astra_footer_align_bottom()
{ ?>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            fullHeight();
        }, false);

        function fullHeight() {
            let headerHeight = document.querySelector("header").clientHeight;
            let footerHeight = document.querySelector("footer").clientHeight;
            let headerFooter = headerHeight + footerHeight;
            let content = document.querySelector(".wp-block-post-content");
            content.style.minHeight = "calc( 95vh - " + headerFooter + "px )";
        }
    </script>
<?php
}

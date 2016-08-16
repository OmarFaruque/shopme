<?php
/*
 * Default Theme Function file
 */
// Add Thumbnail Images Support
add_theme_support( 'post-thumbnails' );

if (!function_exists('addShopmeThemeScript')) {
    function addShopmeThemeScript()
    {
        // All CSS files
        wp_enqueue_style('shop-me-style', get_stylesheet_uri());
        wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
        wp_enqueue_style('shopme-css', get_template_directory_uri() . '/css/shopme.css');
        wp_enqueue_style('background-css', get_template_directory_uri() . '/css/background.css');

        // All Jquery
        wp_enqueue_script('jquery', 'http://code.jquery.com/jquery.js', array(), '1.0.0', true);
        wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(), '1.0.1', true);
        wp_enqueue_script( 'zoom_js', get_template_directory_uri() . '/js/jquery.elevateZoom.js', array(), '1.0.2', true );
        wp_enqueue_script('shopme-js', get_template_directory_uri() . '/js/shopme.js', array(), '1.0.3', true);

    }
    add_action('wp_enqueue_scripts', 'addShopmeThemeScript');
}

/*
* Reguster menu
*/
register_nav_menus( array(
    'top_menu' => 'Site Main Menu',
    'footer_menu' => 'Site Footer Menu',
) );




   /**
    * Creates a sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
add_action( 'widgets_init', 'shopme_widget_init' );
function shopme_widget_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'Shop Me' ),
        'id' => 'main_sidebar',
        'description' => __( 'widget for Main Sidebar in Homepage & Product Page.', 'Shop Me' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );
}

require_once('ch_admin_option/admin-function.php');
require_once('inc_function/reg_custom_post.php');
require_once('inc_function/metabox.php');
require_once('inc_function/custom_widget.php');




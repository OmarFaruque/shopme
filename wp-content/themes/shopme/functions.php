<?php
/*
 * Default Theme Function file
 */

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
        wp_enqueue_script('shopme-js', get_template_directory_uri() . '/js/shopme.js', array(), '1.0.2', true);

    }
    add_action('wp_enqueue_scripts', 'addShopmeThemeScript');
}

/*
* Reguster menu
*/
register_nav_menus( array(
    'top_menu' => 'Site Main Menu',
) );

require_once('ch_admin_option/admin-function.php');
require_once('css/dynamic.php');
require_once('inc_function/reg_custom_post.php');
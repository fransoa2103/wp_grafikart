<?php 
// To create WP theme from scratch, we must use add_them_support
// https://developer.wordpress.org/reference/functions/add_theme_support/

function montheme_supports()
{
    add_theme_support('title-tag'); // This feature allows themes to add document title tag to HTML <head>
    add_theme_support('post-thumbnails'); // Display the post thumbnail // https://developer.wordpress.org/reference/functions/the_post_thumbnail/
    add_theme_support('menus'); // Registers a navigation menu location for a theme // https://developer.wordpress.org/reference/functions/register_nav_menu/
    register_nav_menu('header-nav', 'En tête du menu'); // Displays a navigation menu // https://developer.wordpress.org/reference/functions/wp_nav_menu/
}

// register libraries
function montheme_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css');
    
    // parameters
    // 1st arg = we install popper and jquery with a dependencies injection into array[]
    // 2nd arg = versions of bootstrap, jquery and JS not specified then return false 
    // 3rd arg = do you want load scripts in footer ? 'yes' then return true

    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js',['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery'); // Jquery exist with WP files source. For best performance remove jquery WP version from origin
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true); // and install last version
    
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

function montheme_title_separator()
{
    return '|'; // filter to change separator in title page
}

function montheme_menu_class(array $classes): array
{
    // var_dump(func_get_args()); die();
    $classes = ['nav-item','mx-3'];
    return $classes;

}

function montheme_menu_link_class(array $attrs): array
{
    $attrs[] = 'nav-link';
    return $attrs;
}

// ACTION
add_action('after_setup_theme', 'montheme_supports');
add_action('wp_enqueue_scripts', 'montheme_register_assets');

// FILTER
add_filter('document_title_separator', 'montheme_title_separator');
add_filter('nav_menu_css_class', 'montheme_menu_class'); // 'nav_menu_css_class' from wp-includes\class-walker-nav-menu.php
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class'); // 'nav_menu_link_attributes' from wp-includes\class-walker-nav-menu.php

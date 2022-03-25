<?php 
// before create WP theme from scratch, we must read before use add_them_support
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
    // 1st arg = install popper and jquery with dependencies injection in array []
    // 2nd arg = versions of bootstrap, jquery and JS no specified then = false 
    // 3rd arg = do you want load scripts in footer ? 'yes' then = true

    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js',['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery'); // Jquery exist with WP files source. For best performance remove jquery WP version from origin
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true); // and install last version
    
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

function montheme_title_separator()
{
    return '|';
}

add_action('after_setup_theme', 'montheme_supports');
add_action('wp_enqueue_scripts', 'montheme_register_assets');
add_filter('document_title_separator', 'montheme_title_separator');

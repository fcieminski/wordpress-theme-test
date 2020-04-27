<?php


function load_css()
{
    wp_register_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_css');


function load_js()
{
    wp_register_script('script', get_template_directory_uri() . '/script.js', 'javascript', false, true);
    wp_enqueue_script('script');
}
add_action('wp_enqueue_scripts', 'load_js');

add_theme_support('menus');
register_nav_menus(
    array(
        'top-menu' => 'Top Menu',
        'mobile-menu' => 'Mobile menu',
        'bottom-menu' => 'Footer menu'
    )
);

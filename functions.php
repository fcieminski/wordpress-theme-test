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
add_theme_support('post-thumbnails');
add_theme_support('widgets');

register_nav_menus(
    array(
        'top-menu' => 'Top Menu',
        'mobile-menu' => 'Mobile menu',
        'bottom-menu' => 'Footer menu'
    )
);

add_image_size('blog-large', 800, 400, false);
add_image_size('blog-small', 300, 200, true);


// sidebar

register_sidebar([
    'name' => 'Blog Sidebar',
    'id' => 'blog-sidebar',
    'before_title' => '<h4 class="widget--title">',
    'after_title' => '</h4>'
]);
register_sidebar([
    'name' => 'Page Sidebar',
    'id' => 'page-sidebar',
    'before_title' => '<h4 class="widget--title">',
    'after_title' => '</h4>'
]);


function first_post_type()
{

    $args = [
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => ['slug' => 'post-gallery'],
        'menu_icon' => 'dashicons-megaphone',
        'labels' => ['name' => 'Galeria']
    ];
    register_post_type('gallery', $args);
}
add_action('init', 'first_post_type');

function my_taxonomy()
{
    $args = [
        'labels' => [
            'name' => 'Images',
            'singular_name' => 'Image'
        ],
        'public' => true,
        'hierarchical' => true,
    ];
    register_taxonomy('images', ['gallery'], $args);
}
add_action('init', 'my_taxonomy');


function customFormatGallery($string, $attr)
{

    $output = "<div id=\"container\">";
    $posts = get_posts(array('include' => $attr['ids'], 'post_type' => 'attachment'));

    foreach ($posts as $imagePost) {
        $output .= "<div src='" . wp_get_attachment_image_src($imagePost->ID, 'small')[0] . "'>";
        $output .= "<div src='" . wp_get_attachment_image_src($imagePost->ID, 'medium')[0] . "' data-media=\"(min-width: 400px)\">";
        $output .= "<div src='" . wp_get_attachment_image_src($imagePost->ID, 'large')[0] . "' data-media=\"(min-width: 950px)\">";
        $output .= "<div src='" . wp_get_attachment_image_src($imagePost->ID, 'extralarge')[0] . "' data-media=\"(min-width: 1200px)\">";
    }

    $output .= "</div>";

    return $output;
}
add_filter('post_gallery', 'customFormatGallery', 10, 2);

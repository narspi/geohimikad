<?php
show_admin_bar(false);

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

function zdfinance_assets()
{
    wp_enqueue_style('global-page-styles', get_template_directory_uri() . '/assets/css/style.css', array());
    wp_enqueue_script('global-page-scripts', get_template_directory_uri() . '/assets/js/main.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'zdfinance_assets');

function register_service_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Услуги',
            'singular_name' => 'Услуга',
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 's', // это даёт /s/услуга
            'with_front' => false
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('service', $args);
}
add_action('init', 'register_service_post_type');
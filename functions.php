
<?php

function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');

}

add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_enqueue_script('jquery');


    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');


// theme options

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');


// menu
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location'
    )
);

/* A function that allows you to create a custom image size. */
add_image_size('blog-small', 400, 300, true);
add_image_size('blog-large', 800, 600, true);


// register sidebars

function my_sidebar(){
    register_sidebar(
        array(
            'name' => 'Page sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Blog sidebar',
            'id' => 'blog-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
}
add_action('widgets_init', 'my_sidebar');


function my_first_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio Item'
        ),
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-products',
        'supports' => array('title', 'editor', 'thumbnail')
        // 'rewrite' => array('slug' => 'portfolio'),
    );
    register_post_type('portfolio', $args);
}

add_action('init', 'my_first_post_type');

function my_first_taxonomy(){
    $args = array(
        'labels' => array(
            'name' => 'Subjects',
            'singular_name' => 'Subjects'
        ), 
        'public' => true,
        'hierarchical' => false,
        
        
    );
    register_taxonomy('subjects', array('portfolio'), $args);
}
add_action('init', 'my_first_taxonomy');
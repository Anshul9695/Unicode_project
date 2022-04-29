<?php

function htmltowordpress_theme_support(){
    add_theme_support('custome-logo');
    add_theme_support( 'title-tag');
    add_theme_support( 'post-thumbnails');
    add_image_size( 'home-featured', 600, 400, array('center','center'));
    add_image_size('single-img', 600,450,array('center','center'));
    add_theme_support( 'automatic-feed-links');

    register_nav_menus(
    array(
  'primary'=>__('Primary Menu','wphtml')
    ));
}
add_action( 'after_setup_theme','htmltowordpress_theme_support');

function htmlwptheme(){
wp_enqueue_style('style',get_stylesheet_uri());
}
add_action('wp_enqueue_scripts','htmlwptheme');



function html2wp_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'html2wp' ),
        'id'            => 'main-sidebar',
        'description'   => 'Main sidebar on right side',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget 1', 'html2wp' ),
        'id'            => 'footer-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme_name' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget 2', 'html2wp' ),
        'id'            => 'footer-2',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme_name' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget 3', 'html2wp' ),
        'id'            => 'footer-3',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme_name' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init','html2wp_widgets_init' );



?>
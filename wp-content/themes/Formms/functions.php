<?php


// function themename_custom_header_setup() {
//     $defaults = array(
//         // Default Header Image to display
//         'default-image'         => get_template_directory_uri() . '/images/headers/default.jpg',
//         // Display the header text along with the image
//         'header-text'           => false,
//         // Header text color default
//         'default-text-color'        => '000',
//         // Header image width (in pixels)
//         'width'             => 1000,
//         // Header image height (in pixels)
//         'height'            => 198,
//         // Header image random rotation default
//         'random-default'        => false,
//         // Enable upload of image file in admin 
//         'uploads'       => false,
//         // function to be called in theme head section
//         'wp-head-callback'      => 'wphead_cb',
//         //  function to be called in preview page head section
//         'admin-head-callback'       => 'adminhead_cb',
//         // function to produce preview markup in the admin screen
//         'admin-preview-callback'    => 'adminpreview_cb',
//         );
// }
// add_action( 'after_setup_theme', 'themename_custom_header_setup' );


//logo section 
function themename_custom_logo_setup()
{
    $defaults = array(
        'height'               => 50,
        'width'                => 100,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );

    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');

//creating the menu section here...
///navigation menu 
function  woocommerce_themedev_menus()
{
    register_nav_menus(array(
        //menu id or location id=>menu name
        "primary" => "primary",
        "theme_top_menu" => "top menu",
        "footer1" => "footer1",
        "footer2" => "footer2"
    ));
    add_theme_support("post-thumbnails");
}
add_action("after_setup_theme", "woocommerce_themedev_menus");

//adding style section 
add_action('wp_enqueue_scripts', 'formmas_styles');

function formmas_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css');
    wp_enqueue_style('font-asesome-style', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
}

//adding js files from here...
function formms_custome_js()
{
    wp_enqueue_script('jquery-3.4.1', get_template_directory_uri(), '/assets/js/jquery-3.4.1.min.js');
    wp_enqueue_script('popper', get_template_directory_uri(), '/assets/js/popper.min.js');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri(), '/assets/js/bootstrap.js');
    wp_enqueue_script('custome-js', get_template_directory_uri(), '/assets/js/custom.js');
}
add_action('wp_enqueue_scripts', 'formms_custome_js');
function html2wp_widgets_init()
{

    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'html2wp'),
        'id'            => 'main-sidebar',
        'description'   => 'Main sidebar on right side',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'html2wp'),
        'id'            => 'footer-1',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'theme_name'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'html2wp'),
        'id'            => 'footer-2',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'theme_name'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'html2wp'),
        'id'            => 'footer-3',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'theme_name'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}

add_action('widgets_init', 'html2wp_widgets_init');


//include the files
require_once get_template_directory() . '/inc/banner.php';

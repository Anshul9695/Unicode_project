<?php
/**
*function file to enqueue them files .
*
*@package Wp_medilab
*/
?>

<?php

function wp_medilab_scripts(){
    // theme css parent 
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    // theme css 
    wp_enqueue_style('theme-style', get_template_directory_uri().'/assets/css/mystyle.css');
// Vender Css Files 
    wp_enqueue_style('stylesheet1', get_template_directory_uri().'/assets/vendor/fontawesome-free/css/all.min.css');
    wp_enqueue_style('stylesheet2', get_template_directory_uri().'/assets/vendor/animate.css/animate.min.css');
    wp_enqueue_style('stylesheet3', get_template_directory_uri().'/assets/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('stylesheet4', get_template_directory_uri().'/assets/vendor/bootstrap-icons/bootstrap-icons.css');
    wp_enqueue_style('stylesheet5', get_template_directory_uri().'/assets/vendor/boxicons/css/boxicons.min.css');
    wp_enqueue_style('stylesheet6', get_template_directory_uri().'/assets/vendor/glightbox/css/glightbox.min.css');
    wp_enqueue_style('stylesheet7', get_template_directory_uri().'/assets/vendor/remixicon/remixicon.css');
    wp_enqueue_style('stylesheet8', get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.css');
}
add_action('wp_enqueue_scripts','wp_medilab_scripts');

function wp_medilab_Js_scripts(){
    wp_enqueue_script('scripts1', get_template_directory_uri().'/assets/vendor/purecounter/purecounter.js');
    wp_enqueue_script('scripts2', get_template_directory_uri().'/assets/vendor/bootstrap/js/bootstrap.bundle.min.js');
    wp_enqueue_script('scripts3', get_template_directory_uri().'/assets/vendor/glightbox/js/glightbox.min.js');
    wp_enqueue_script('scripts4', get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.js');
    wp_enqueue_script('scripts5', get_template_directory_uri().'/assets/vendor/php-email-form/validate.js');
    wp_enqueue_script('scripts6', get_template_directory_uri().'/assets/js/main.js');

}

add_action('wp_enqueue_scripts','wp_medilab_Js_scripts');


function medilab_nev_menus_custome(){
    register_nav_menus(array(
   'primary'=>'primary',
   'top_bar'=>'top_bar',
   'footer1'=>'footer1',
   'footer2'=>'footer2'
    ));
}
add_action('after_setup_theme','medilab_nev_menus_custome');
//Including files 
require_once get_template_directory() . '/inc/gallery.php';
require_once get_template_directory().'/inc/docter.php';
require_once get_template_directory().'/inc/question.php';
require_once get_template_directory().'/inc/about.php';
require_once get_template_directory().'/inc/servic.php';
require_once get_template_directory().'/inc/welcome.php';
?>
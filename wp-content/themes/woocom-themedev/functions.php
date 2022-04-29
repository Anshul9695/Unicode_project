<?php

// atteching the css file in the theme
function woocom_themedev_load_scripts(){
    wp_enqueue_style("custome-themecss",get_template_directory_uri()."/assets/css/themecss.css",array(),'1.0','all');  //for add the custome stylesheet
    wp_enqueue_style("themecss",get_stylesheet_uri());

    // atteching the javascript file in custome theme 
    wp_enqueue_script('customeJsFile',get_template_directory_uri()."/assets/js/customejs.js",array("jquery"),"1.0",true);
}
add_action("wp_enqueue_scripts","woocom_themedev_load_scripts");


// adding menu in the custome theme

function  woocommerce_themedev_menus(){
register_nav_menus(array(
    //menu id or location id=>menu name
    "theme_primary_menu"=>"primary",
    "theme_top_menu"=>"top menu",
    "theme_left_sidebar"=>"left sidebar",
    "theme_footer_menu"=>"footer menu"
));
 }
 add_action("after_setup_theme","woocommerce_themedev_menus");
?>
<?php
function simple_wordpress_theme_load_scripts(){
wp_enqueue_style("bootstrap",get_template_directory_uri()."/assets/css/styles.css",array(),"1.0","all");
wp_enqueue_style("maincss",get_template_directory_uri());
wp_enqueue_script('customeJsFile',get_template_directory_uri()."/assets/js/scripts.js",array("jquery"),"1.0",true);
}
add_action("wp_enqueue_scripts","simple_wordpress_theme_load_scripts");



    ///navigation menu 
    function  woocommerce_themedev_menus(){
        register_nav_menus(array(
            //menu id or location id=>menu name
            "theme_primary_menu"=>"primary",
            "theme_top_menu"=>"top menu",
            "theme_left_sidebar"=>"left sidebar",
            "theme_footer_menu"=>"footer menu"
        ));

        add_theme_support("post-thumbnails");
         }

         add_action("after_setup_theme","woocommerce_themedev_menus");


           // adding li class from here in navigation menu
    function simple_wordpress_theme_li_classes($classes,$item,$args){
        $classes []= "nav-item";
        return $classes;
           }

           add_filter("nav_menu_css_class","simple_wordpress_theme_li_classes",1,3);

    function simple_theme_add_anchor_tag($classes,$item,$args){
        $classes['class']='nav-link';
        return $classes;
    }
    add_filter("nav_menu_link_attributes","simple_theme_add_anchor_tag",1,3);

?>
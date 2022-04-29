<?php
/*
  Plugin Name: WP Next Plugin
  Description: Simple Plugin shows the direct form submission
  Version: 1.0.0
  Author: Anshul Mishra
 */


 function wp_admin_scripts_next(){
     wp_enqueue_script( 'jquery-validation', plugin_dir_url( __FILE__ ).'/js/jquery.validate.min.js',array('jquery'),true ); //validation jquery file
 }
add_action( 'admin_enqueue_scripts', 'wp_admin_scripts_next');

register_activation_hook(__FILE__, 'activate_the_next_plugin');
register_deactivation_hook(__FILE__, 'deactivate_the_next_plugin');

function activate_the_next_plugin()
{
    global $wpdb;
    global $table_prifix;
    $dbname=$wpdb->dbname;
    $table = $table_prifix.'wp_next_plugin_tbl';
    $sql = "CREATE TABLE IF NOT EXISTS $dbname.$table  ( 
    `id` INT(40) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
      PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $wpdb->query($sql);
}
function deactivate_the_next_plugin()
{
    global $wpdb;
    global $table_prifix;
    $dbname=$wpdb->dbname;
    $table = $table_prifix . 'wp_next_plugin_tbl';
    $sql = "DROP TABLE $dbname.$table";
    $wpdb->query($sql);
}

define("NEXT_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));

function next_menus_development()
{

    // checking user Capability  
    global $user_ID;
    $getuserDetails = get_userdata($user_ID);
    //    print_r($getuserDetails);die;
    $role = $getuserDetails->roles;
    //    print_r($role);die;
    $valid_roles = array('administrator', 'author', 'editor');
    if (in_array($role[0], $valid_roles)) {

        // for user capablity where you want to show menu or not 

        // manage_options   ==>its show the menu in only administrator and admin 
        // edit_others_posts ==>for editor user WP_Role
        // edit_posts ==> for the author 

        add_menu_page("Next Plugin", "Next Plugin", $role[0], "wp-next-plugin", "next_wp_list_call");
        add_submenu_page("wp-next-plugin", "List Students", "List Students", "manage_options", "wp-next-plugin", "next_wp_list_call");  //this menu  display in admin
        add_submenu_page("wp-next-plugin", "Addd Student", "Add Student", "manage_options", "wp-next-add", "next_wp_add_call");     //this menu  display in admin

        add_submenu_page("wp-next-plugin", "Addd Student", "editor user role", "edit_others_posts", "wp-next-add", "next_wp_add_call");  //this menu display in editor user role
        add_submenu_page("wp-next-plugin", "Addd Student", "Author user role", "edit_posts", "wp-next-add", "next_wp_add_call");   //this menu display in author user role

    }
}

add_action("admin_menu", "next_menus_development");


function next_wp_list_call()
{
    include_once NEXT_PLUGIN_DIR_PATH . '/views/list-student.php';
}

function next_wp_add_call()
{
    include_once NEXT_PLUGIN_DIR_PATH . '/views/add-student.php';
}

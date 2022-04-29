<?php

/*
 * Plugin name: MY_WP_LIST_TALBE
 * Description: this is my custome plugin to getting the data from data base table in the formet of wp_list_table
 * Author: Anshul Mishra
 */

add_action("admin_menu", "my_wp_list_table_menu");

function my_wp_list_table_menu() {

    add_menu_page("OWT List Table", "TABLE DATA", "manage_options", "owt-list-table", "my_wp_list_table_function");
}

function my_wp_list_table_function() {

    ob_start();

    include_once plugin_dir_path(__FILE__) .'table-data-list.php';

    $template = ob_get_contents();
    
    ob_end_clean();
    
    echo $template;
}
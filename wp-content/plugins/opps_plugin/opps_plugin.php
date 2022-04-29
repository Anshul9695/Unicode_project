<?php

/**
 * Plugin Name: OppsPlugin
 * Version: 1.0
 * Description: this is the unicode best opps based plugin is here... 
 * Author: Unicode Systems
 * Author URI: https://www.ndevr.io
 * Plugin URI:  https://www.ndevr.io
 */


class mycustomeplugin
{

    public function __construct()
    {
        $this->setup_plugin();
    }
    public function setup_plugin()
    {

        register_activation_hook(__FILE__, array($this, 'opps_plugin_activate'));
        register_deactivation_hook(__FILE__, array($this, 'opps_plugin_deactivate'));

        //adding menu for the plugin 
        add_action('admin_menu', 'my_custome_plugin_admin_menu');
        function my_custome_plugin_admin_menu()
        {
            add_menu_page(
                'opps_plugin', //page title
                'opps_plugin', //menu title
                'manage_options', //capabilities
                'Student_Insert', //menu slug
                'student_insert', //function
                'dashicons-media-spreadsheet',
                9
            );
            add_submenu_page(
                'Student_Insert',  //parent page slug
                'student_insert', //page title
                'student_insert', //menu titel
                'manage_options', //manage optios
                'Student_Insert', //slug
                'student_insert' //function
            );
            add_submenu_page(
                'Student_Insert',  //parent page slug
                'student_listing', //page title
                'student_list', //menu titel
                'manage_options', //manage optios
                'Student_List', //slug
                'student_list' //function
            );
        }
    }

    public function opps_plugin_activate()
    {
        global $wpdb;
        global $table_prifix;
        $dbname = $wpdb->dbname;
        $table = $table_prifix . 'student_record';
        $sql = "CREATE TABLE IF NOT EXISTS $dbname.$table  ( 
        `id` INT(40) NOT NULL AUTO_INCREMENT,
      `name` varchar(250) NOT NULL,
      `email` varchar(250) NOT NULL,
      `phone` varchar(250) NOT NULL,
      `address` varchar(250) NOT NULL,
          PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $wpdb->query($sql);
    }
    public function opps_plugin_deactivate()
    {
        global $wpdb;
        global $table_prifix;
        $dbname = $wpdb->dbname;
        $table = $table_prifix . 'student_record';
        $sql = "DROP TABLE $dbname.$table";
        $wpdb->query($sql);
    }
}
$callingClass = new mycustomeplugin();


define('ROOTDIRPATH', plugin_dir_path(__FILE__));
require_once(ROOTDIRPATH . 'student_insert.php');
require_once(ROOTDIRPATH . 'student_list.php');

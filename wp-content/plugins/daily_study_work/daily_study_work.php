<?php

/*
 * Plugin name:DAILY_STUDY_WORK
 * Description: THIS IS THE PLUGIN FOR DAILY STUDY WORK 
 * Author: ANSHUL MISHRA
 */


class mycustomeplugin_daily_work
{

    public function __construct()
    {
        $this->setup_plugin();
    }
    public function setup_plugin()
    {

        register_activation_hook(__FILE__, array($this, 'opps_plugin_activate_for_daily_task'));
        register_deactivation_hook(__FILE__, array($this, 'opps_plugin_deactivate_for_daily_task'));

        //adding menu for the plugin 
        add_action('admin_menu', 'my_custome_plugin_admin_menu_for_daily_work');
        function my_custome_plugin_admin_menu_for_daily_work()
        {
            add_menu_page(
                'DAILY_STUDY_WORK', //page title
                'DAILY_STUDY_WORK', //menu title
                'manage_options', //capabilities
                'Array_function', //menu slug
                'array_function', //function
                'dashicons-media-spreadsheet',
                9
            );
            add_submenu_page(
                'Array_function',  //parent page slug
                'arrayfunction', //page title
                'array_function', //menu titel
                'manage_options', //manage optios
                'Array_function', //slug
                'array_function' //function
            );
           
        }
    }

    public function opps_plugin_activate_for_daily_task()
    {
    //     global $wpdb;
    //     global $table_prifix;
    //     $dbname = $wpdb->dbname;
    //     $table = $table_prifix . 'student_record';
    //     $sql = "CREATE TABLE IF NOT EXISTS $dbname.$table  ( 
    //     `id` INT(40) NOT NULL AUTO_INCREMENT,
    //   `name` varchar(250) NOT NULL,
    //   `email` varchar(250) NOT NULL,
    //   `phone` varchar(250) NOT NULL,
    //   `address` varchar(250) NOT NULL,
    //       PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    //     $wpdb->query($sql);
    }
    public function opps_plugin_deactivate_for_daily_task()
    {
        // global $wpdb;
        // global $table_prifix;
        // $dbname = $wpdb->dbname;
        // $table = $table_prifix . 'student_record';
        // $sql = "DROP TABLE $dbname.$table";
        // $wpdb->query($sql);
    }
}
$callingClass = new mycustomeplugin_daily_work();


define('ROOTDIRPATHTOADD', plugin_dir_path(__FILE__));
require_once(ROOTDIRPATHTOADD. 'arrayfunction.php');


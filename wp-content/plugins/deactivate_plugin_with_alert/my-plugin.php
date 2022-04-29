<?php
   /*
   Plugin Name:my-plugin
   Plugin URI: https://my-awesomeness-emporium.com
   description:  this is the custome plugin created by Anshul mishra for testing the data to delete the table from here..
   Version: 1.0
   Author: Unicode Systems
   Author URI: https://mrtotallyawesome.com
   */


if(!defined('ABSPATH')){
    header("location: /Unicode_project");
    die("");
}
function wpdocs_selectively_enqueue_admin_script( $hook ) {
    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . '/js/message.js', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script' );

class my_custome_plugin{
    public function __construct()
    {
        $this->plugin_setup_code();
      
    }
    public function plugin_setup_code(){
          register_activation_hook( __FILE__,array($this,"activation_plugin"));
          register_deactivation_hook( __FILE__,array($this,"deactivation_plugin"));

        //   register_uninstall_hook(__FILE__, 'delete_plugin_database_table');
          //short code
          add_shortcode('my_plugin_sc',array($this,'shortcode_function'));
        
    }
    public function activation_plugin(){
        //activation code 
        global $wpdb,$table_prefix;
        $dbname=$wpdb->dbname;
        $table=$table_prefix.'emp';
        $sql="CREATE TABLE IF NOT EXISTS $dbname.$table (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(250) NOT NULL , `email` VARCHAR(250) NOT NULL , `address` VARCHAR(250) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
       $wpdb->query($sql);
    }
    public function deactivation_plugin(){
       //deactivation code 
      global $wpdb;
        $table_name = $wpdb->prefix . 'emp';
        $sql = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
       
    }


  
//short code is here...
public function shortcode_function(){
    return "hello shortcode";
}
}
$custome_plugin = new my_custome_plugin();



?>
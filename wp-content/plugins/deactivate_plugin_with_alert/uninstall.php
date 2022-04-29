<?php

//checks to make sure Wordpress is the one requesting the uninstall
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//include $my_plugin_file_path . 'templates/my-plugin-uninstall-popup.php';
// if uninstall.php is not called by WordPress, die

    if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();
    global $wpdb,$table_prefix;
    $table=$table_prefix.'emp';
    $wpdb->query( "DROP TABLE IF EXISTS $table");
    delete_option("my_plugin_db_version");



//     window.onload = function(){
//         document.querySelector('[data-slug="plugin-name-here"] a').addEventListener('click', function(event){
//             event.preventDefault()
//             var urlRedirect = document.querySelector('[data-slug="plugin-name-here"] a').getAttribute('href');
//             if (confirm('Are you sure you want to save this thing into the database?')) {
//                 window.location.href = urlRedirect;
//             } else {
//                 console.log('Ohhh, you are so sweet!')
//             }
//         })
// }



// function va_deactivation() {
//     .... //unregisters settings
    
//     //Asks for confirmation - Code here
    
    
//     //If answer is yes proceed to delete. If no, doesn't execute the following code 
//     global $wpdb;
//     $pa_table = $wpdb->prefix."tableName";
//     $sql = 'DROP TABLE IF EXISTS '.$pa_table;
//     $wpdb->query( $sql );
    
//     }




//     jQuery(function () {
//         jQuery('.deactivate a').click(function (e) {
//             let url = jQuery(this).attr('href');
//             let regex = /[?&]([^=#]+)=([^&#]*)/g,
//                     params = {},
//                     match;
//             while (match = regex.exec(url)) {
//                 params[match[1]] = match[2];
//             }
//             if(params.plugin === "{plugin_name}%2F{plugin_name}.php"){
//                 let delete_confirm = confirm("You are going deactivate this plugin");
//                 if (delete_confirm !== true) {
//                     e.preventDefault()
//                 }
//             }
//         });
//     });
?>
<?php
/**
* This filter ads the SeamlessChex Status Update All button to the top of WooCommerce Orders page
*/
add_filter('views_edit-shop_order', function($args) {
    echo '<button class="button wc-action-button wc-action-button-view status_update_all view status_update_all" href="#" aria-label="Status Update">Update eCheck statuses</button><hr class="wp-header-end">';
    return $args;
});


/**
* @param  string $hook
*/
function seamlesschex_js_enqueue($hook){
    wp_enqueue_script('status-update-script', plugins_url( '../js/seamlesschex_scripts.js', __FILE__ ), array('jquery') );
    wp_localize_script('status-update-script', 'ajax_object_name', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce("status_update_nonce")
    ));
}
add_action( 'admin_enqueue_scripts', 'seamlesschex_js_enqueue' );

function seamlesschex_status_update_all() {
    check_ajax_referer('status_update_nonce', 'security');
    seamlesschex_status_update();
}
//
//add_action( 'woocommerce_checkout_create_order', 'force_new_order_status', 20, 1 );
//function force_new_order_status( $order ) {
//
//    if( ! $order->has_status('on-hold') )
//        $order->set_status( 'on-hold', 'Verification process completed by SeamlessChex and check is in queue to be processed. Once the check has processed at SeamlessChex, we will update your order status from On-Hold to Processing.' );
//}

function seamlesschex_status_update() {
  require_once('gateway.php');
  $gateway = new WC_Gateway_SeamlessChex();
  $ep_mode = seamlesschex_get_mode($options['seamlesschex_api_endpoint']);
  //Get user id
  $current_account  = wp_get_current_user();
  if(!$current_account->ID){
        $seamlessOptions = get_option('seamlesschex_settings');
        $current_account = $seamlessOptions['curent_user'];
  }
  $current_customer = $current_account->ID;
  $args = array(
     'customer' => $current_customer,
     'limit'    => -1,
  );
  $orders = wc_get_orders($args);
  foreach ($orders as $order) {
    if ($order->get_status() == 'completed' ||
       $order->get_payment_method() != 'seamless' ||
       $order->get_status() == 'failed' ||
       $order->get_status() == 'refunded' ||
       $order->get_status() == 'cancelled') {
      continue;
    }

    //Get $order and $results
    $order_id = $order->get_id();
    $check    = $gateway->check_by_order($order_id);

    if ($check) {    

      $resultCode              = $check->basic_verification->code_bv;
      $resultDescription       = $check->basic_verification->description_bv;

      $verifyResultCode        = $check->basic_verification->pass_bv;
      $verifyResultDescription = $check->basic_verification->verification_bv;

      $deleted   = in_array(strtolower($check->status), ['deleted', 'failed', 'void']);
      $processed = in_array(strtolower($check->status), ["deposited", "printed"]);

      if ($ep_mode == 'Test' || $verifyResultCode) {
        if (!$deleted) {
          if ($processed) {
            $order->update_status('processing');
            $order->add_order_note('Check has been processed by SeamlessChex Processing.');
            $order->add_order_note(sprintf(__('<a href="https://developers.seamlesschex.com/seamlesschex/docs/#basicVerificatio" target="_blank">Basic Verification</a> Code: <b>%s</b>, Description: <b>%s</b>', 'woocommerce-gateway-seamlesschex'), $resultCode, $resultDescription)); 
            $order->payment_complete();
            
          } else {
            $order->update_status('on-hold');
            $order->add_order_note('Verification process completed by SeamlessChex and check is in queue to be processed. Once the check has processed at SeamlessChex, we will update your order status from On-Hold to Processing.');
            $order->add_order_note(sprintf(__('<a href="https://developers.seamlesschex.com/seamlesschex/docs/#basicVerificatio" target="_blank">Basic Verification</a> Code: <b>%s</b>, Description: <b>%s</b>', 'woocommerce-gateway-seamlesschex'), $resultCode, $resultDescription));
          }
        } else { //Deleted
          $order->update_status('cancelled');
          $order->add_order_note('Verification process completed by SeamlessChex Processing and verification status returned is: Deleted by SeamlessChex Processing or by merchant.');
          $order->add_order_note(sprintf(__('<a href="https://developers.seamlesschex.com/seamlesschex/docs/#basicVerificatio" target="_blank">Basic Verification</a> Code: <b>%s</b>, Description: <b>%s</b>', 'woocommerce-gateway-seamlesschex'), $resultCode, $resultDescription));
        }
      } else {
        $order->update_status('failed');
        $order->add_order_note("Verification process could not be determined due to the following error: {$resultDescription}");
        $order->add_order_note(sprintf(__('<a href="https://developers.seamlesschex.com/seamlesschex/docs/#basicVerificatio" target="_blank">Basic Verification</a> Code: <b>%s</b>, Description: <b>%s</b>', 'woocommerce-gateway-seamlesschex'), $resultCode, $resultDescription));
        echo "Verification not completed.<br/>Error Code: {$verifyResultDescription}<br/>Error: {$resultDescription}<br/>";
      }
    } else {
      echo "GATEWAY SEAMLESSCHEX PAYMENT ERROR: " . $gateway->seamlesschex_getLastError();
    }
  } //END foreach($orders as $order)
}

add_action("wp_ajax_status_update_all_hook", "seamlesschex_status_update_all");

add_action("wp_ajax_start_session", "seamlesschex_start_session");
add_action("wp_ajax_nopriv_start_session", "seamlesschex_start_session");

function seamlesschex_start_session(){
	require_once('gateway.php');
	$gateway = new WC_Gateway_SeamlessChex();
	$s = sanitize_text_field($_POST["s"]);
	check_ajax_referer('start_session');

	$options = get_option( 'seamlesschex_settings' );
        $client_id = $options['seamlesschex_test_api_key'];
        $api_pass = $options['seamlesschex_live_api_key'];
        $endpoint = $options['seamlesschex_api_endpoint'];

    if($client_id && $api_pass && $endpoint){
	$gateway->log("Attempting to call start_session with id: {$s}.");
        echo $gateway->start_session($s);
    } else {
        echo false;
    }
}

/**
* @param array $actions
*/
function seamlesschex_single_status_update_order_action( $actions ) {
    $actions['seamlesschex_single_status_update_order_action'] = __( 'SeamlessChex Status Update', 'woocommerce-gateway-seamlesschex' );
    return $actions;
}
add_action( 'woocommerce_order_actions', 'seamlesschex_single_status_update_order_action' );

/**
* @param WC_Order $order
*/
function seamlesschex_single_status_update( $order ) {
    require_once('gateway.php');

    if($order->get_status() == 'completed' || 
       $order->get_payment_method() != 'seamless' || 
       $order->get_status() == 'failed' || 
       $order->get_status() == 'refunded' || 
       $order->get_status() == 'cancelled'){
        return;
    }

    $options = get_option( 'seamlesschex_settings' );
    $verification_mode = $options['seamlesschex_override_risky_option'];
    $gateway = new WC_Gateway_SeamlessChex();
    
    $order_id = $order->get_id();
    $check    = $gateway->check_by_order($order_id);

    if ($check) {   
      $resultCode              = $check->basic_verification->code_bv;
      $resultDescription       = $check->basic_verification->description_bv;

      $verifyResultCode        = $check->basic_verification->pass_bv;
      $verifyResultDescription = $check->basic_verification->verification_bv;

      $deleted   = in_array(strtolower($check->status), ['deleted', 'failed', 'void']);
      $processed = in_array(strtolower($check->status), ["deposited", "printed"]);

      if ($verifyResultCode) {
        if (!$deleted) {
          if ($processed) {
            $order->update_status('processing');
            $order->add_order_note('Check has been processed by SeamlessChex Processing.');
            $order->add_order_note(sprintf(__('<a href="https://developers.seamlesschex.com/seamlesschex/docs/#basicVerificatio" target="_blank">Basic Verification</a> Code: <b>%s</b>, Description: <b>%s</b>', 'woocommerce-gateway-seamlesschex'), $resultCode, $resultDescription));
          } else {
            $order->update_status('on-hold');
            $order->add_order_note('Verification process completed by SeamlessChex and check is in queue to be processed. Once the check has processed at SeamlessChex, we will update your order status from On-Hold to Processing.');
            $order->add_order_note(sprintf(__('<a href="https://developers.seamlesschex.com/seamlesschex/docs/#basicVerificatio" target="_blank">Basic Verification</a> Code: <b>%s</b>, Description: <b>%s</b>', 'woocommerce-gateway-seamlesschex'), $resultCode, $resultDescription));
          }
        } else { //Deleted
          $order->update_status('failed');
          $order->add_order_note('Verification process completed by SeamlessChex Processing and verification status returned is: Deleted by SeamlessChex Processing or by merchant.');
          $order->add_order_note(sprintf(__('<a href="https://developers.seamlesschex.com/seamlesschex/docs/#basicVerificatio" target="_blank">Basic Verification</a> Code: <b>%s</b>, Description: <b>%s</b>', 'woocommerce-gateway-seamlesschex'), $resultCode, $resultDescription));
        }
      } else {
        $order->update_status('failed');
        $order->add_order_note("Verification process could not be determined due to the following error: {$resultDescription}");
        $order->add_order_note(sprintf(__('<a href="https://developers.seamlesschex.com/seamlesschex/docs/#basicVerificatio" target="_blank">Basic Verification</a> Code: <b>%s</b>, Description: <b>%s</b>', 'woocommerce-gateway-seamlesschex'), $resultCode, $resultDescription));
        echo "Verification not completed.<br/>Error Code: {$verifyResultDescription}<br/>Error: {$resultDescription}<br/>";
      }
    } else {
      echo "GATEWAY ERROR: " . $gateway->seamlesschex_getLastError();
    }

} //END seamlesschex_single_status_update()
add_action( 'woocommerce_order_action_seamlesschex_single_status_update_order_action', 'seamlesschex_single_status_update' );

/**
 * @param string $endpoint  either "Live" or "Test"
*/
function seamlesschex_get_mode($endpoint){
    if($endpoint == SCX_ENDPOINT_LINK_LIVE){
        $mode = 'Live';
    }
    else{
        $mode = 'Test';
    }
    return $mode;
}

function scx_return_schedules_name() {
    $options = get_option('seamlesschex_settings');
    $getOrderCronn = $options['seamlesschex_settings_order_cron'];

    switch ($getOrderCronn) {
        case 900:
            return '15min';
            break;
        case 1800:
            return '30min';
            break;
        case 3600:
            return 'everyhours';
            break;
        case 86400:
            return 'everyday';
            break;
        default:
            return '15min';
    }
}

function scx_my_cron_reccurences($schedules) {
    if (!isset($schedules["15min"])) {
        $schedules["15min"] = array(
            'interval' => 900,
            'display' => __('Once every 15 minutes'));
    };
    if (!isset($schedules["30min"])) {
        $schedules["30min"] = array(
            'interval' => 1800,
            'display' => __('Once every 30 minutes'));
    };
    if (!isset($schedules["everyhours"])) {
        $schedules["everyhours"] = array(
            'interval' => 3600,
            'display' => __('Once every hours'));
    };
    if (!isset($schedules["everyday"])) {
        $schedules["everyday"] = array(
            'interval' => 86400,
            'display' => __('Once every day'));
    };
    return $schedules;
}

add_filter('cron_schedules','scx_my_cron_reccurences');


function scx_cron_starter() {
    $seamlessOptions = get_option('seamlesschex_settings');
    $seamlessOptions['curent_user'] = wp_get_current_user();
    update_option( 'seamlesschex_settings', $seamlessOptions );

    if ($seamlessOptions['seamlesschex_settings_order_cron'] == 0) {        
        seamless_remove_event_cron();
    } else {        
        seamless_add_event_cron();
    }
}

function seamless_add_event_cron() {    
    if (!wp_next_scheduled('lim-cron')) {
        wp_schedule_event(time(), scx_return_schedules_name(), 'lim-cron');
    }
}

register_deactivation_hook( __FILE__, 'seamless_remove_event_cron' );

function seamless_remove_event_cron() {
    $timestamp = wp_next_scheduled( 'lim-cron' );
    wp_unschedule_event( $timestamp, 'lim-cron' );
    wp_clear_scheduled_hook( 'lim-cron' );
}

add_action('lim-cron', 'seamlesschex_status_update');

add_action('woocommerce_order_status_changed', 'scx_send_custom_email_notifications', 10, 4 );
function scx_send_custom_email_notifications( $order_id, $old_status, $new_status){
    $order = wc_get_order( $order_id );
    if ( $new_status == 'cancelled' || $new_status == 'failed'){
        $wc_emails = WC()->mailer()->get_emails(); // Get all WC_emails objects instances
        $customer_email = $order->get_billing_email(); // The customer email
    }
    

    if ( $new_status == 'cancelled' ) {
        $wc_emails['WC_Email_Cancelled_Order']->recipient = $customer_email;
        $wc_emails['WC_Email_Cancelled_Order']->trigger( $order_id );
    } 
    elseif ( $new_status == 'failed' ) {
        $wc_emails['WC_Email_Failed_Order']->recipient = $customer_email;
        $wc_emails['WC_Email_Failed_Order']->trigger( $order_id );
    } 
}

 ///New order notification only for "Pending" Order status
add_action( 'woocommerce_checkout_order_processed', 'scx_pending_new_order_notification', 20, 1 );
function scx_pending_new_order_notification( $order_id ) {
    // Get an instance of the WC_Order object
    $order = wc_get_order( $order_id );
    $customer_email = $order->get_billing_email(); // The customer email
    // Only for "pending" order status
    if( ! $order->has_status( 'pending' ) ) return;
    // Get an instance of the WC_Email_New_Order object
    $wc_email = WC()->mailer()->get_emails()['WC_Email_New_Order'];
    // Change Subject
    $wc_email->settings['subject'] = __('Pending Payment status for Order# {order_number}');
    // Change Heading
    $wc_email->settings['heading'] = __('Pending Payment status for Order# {order_number}'); 
    $wc_email->settings['recipient'] .= "," . $customer_email ; // Add email recipients (coma separated)

    // Send "New Email" notification (to admin)
    $wc_email->trigger( $order_id );
}

add_filter( 'woocommerce_email_recipient_new_order', 'scx_custom_new_order_email_recipient', 10, 2 );
function scx_custom_new_order_email_recipient( $recipient, $order ) {
    if ( ! is_a( $order, 'WC_Order' ) ) 
        return $recipient;  
    foreach ( $order->get_items() as $item ) {
        $product = $item->get_product();
        if ( $product->needs_shipping() ) {
            return $recipient . ',' . $order->get_billing_email();
        }
    }
    return $recipient;
}

?>

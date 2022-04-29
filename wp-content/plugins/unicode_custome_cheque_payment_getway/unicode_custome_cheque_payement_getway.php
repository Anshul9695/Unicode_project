<?php
/*
 * Plugin Name: Unicode Custome Cheque Payment Getway
 * Plugin URI: https://rudrastyh.com/woocommerce/payment-gateway-plugin.html
 * Description: Take credit card payments on your store.
 * Author: unicode 
 * Author URI: http://rudrastyh.com
 * Version: 1.0.1
 */


////Misha Rudrastyh textdomain name replace by the unicode

/*
 * This action hook registers our PHP class as a WooCommerce payment gateway
 */
add_filter( 'woocommerce_payment_gateways', 'unicode_add_gateway_class' );
function unicode_add_gateway_class( $gateways ) {
	$gateways[] = 'WC_Unicode_Gateway'; // your class name is here
	return $gateways;
}

add_action( 'wp_enqueue_scripts', 'my_custom_script_load' );
function my_custom_script_load(){
  wp_enqueue_script( 'my-custom-script', plugin_dir_url( __FILE__ ) . 'js/myscript.js', array( 'jquery' ) );
}
/*
 * The class itself, please note that it is inside plugins_loaded action hook
 */
add_action( 'plugins_loaded', 'unicode_init_gateway_class' );
function unicode_init_gateway_class() {

	class WC_Unicode_Gateway extends WC_Payment_Gateway {

 		/**
 		 * Class constructor, more about it in Step 3
 		 */
          public function __construct() {

            $this->id = 'unicode'; // payment gateway plugin ID
            $this->icon = ''; // URL of the icon that will be displayed on checkout page near your gateway name
            $this->has_fields = true; // in case you need a custom credit card form
            $this->method_title = 'Unicode Payment Gateway';
            $this->method_description = 'This is the Custome Unicode payment gateway pay via cheque Upload the Check Image'; // will be displayed on the options page
        
            // gateways can support subscriptions, refunds, saved payment methods,
            // but in this tutorial we begin with simple payments
            $this->supports = array(
                'products'
            );
        
            // Method with all the options fields
            $this->init_form_fields();
        
            // Load the settings.
            $this->init_settings();
            $this->title = $this->get_option( 'title' );
            $this->description = $this->get_option( 'description' );
            $this->enabled = $this->get_option( 'enabled' );
            $this->testmode = 'yes' === $this->get_option( 'testmode' );
            $this->private_key = $this->testmode ? $this->get_option( 'test_private_key' ) : $this->get_option( 'private_key' );
            $this->publishable_key = $this->testmode ? $this->get_option( 'test_publishable_key' ) : $this->get_option( 'publishable_key' );
        
            // This action hook saves the settings
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
        
            // We need custom JavaScript to obtain a token
            add_action( 'wp_enqueue_scripts', array( $this, 'payment_scripts' ) );
            
            // You can also register a webhook here
            // add_action( 'woocommerce_api_{webhook name}', array( $this, 'webhook' ) );
         }

		/**
 		 * Plugin options, we deal with it in Step 3 too
 		 */
          public function init_form_fields(){

            $this->form_fields = array(  //these field show in woocommerce setting form and title show in the place order page 
                'enabled' => array(
                    'title'       => 'Enable/Disable',
                    'label'       => 'Enable Unicode Gateway',
                    'type'        => 'checkbox',
                    'description' => '',
                    'default'     => 'no'
                ),
                'title' => array(
                    'title'       => 'Title',
                    'type'        => 'text',
                    'description' => 'This controls the title which the user sees during checkout.',
                    'default'     => 'Unicode Pay Via cheque',
                    'desc_tip'    => true,
                ),
                'description' => array(
                    'title'       => 'Description',
                    'type'        => 'textarea',
                    'description' => 'This controls the description which the user sees during checkout.',
                    'default'     => 'Uploade image',
                ),
                'testmode' => array(
                    'title'       => 'Test mode',
                    'label'       => 'Enable Test Mode',
                    'type'        => 'checkbox',
                    'description' => 'Place the payment gateway in test mode using test API keys.',
                    'default'     => 'yes',
                    'desc_tip'    => true,
                ),
                'test_publishable_key' => array(
                    'title'       => 'Test Publishable Key',
                    'type'        => 'text'
                ),
                'test_private_key' => array(
                    'title'       => 'Test Private Key',
                    'type'        => 'password',
                ),
                'publishable_key' => array(
                    'title'       => 'Live Publishable Key',
                    'type'        => 'text'
                ),
                'private_key' => array(
                    'title'       => 'Live Private Key',
                    'type'        => 'password'
                )
            );
        }
		/**
		 * You will need it if you want your custom credit card form, Step 4 is about it
		 */

   
        public function payment_fields() {
 
            // ok, let's display some description before the payment form
            if ( $this->description ) {
                // you can instructions for test mode, I mean test card numbers etc.
                if ( $this->testmode ) {
                    $this->description .= 'pay with the cheque.';
                    $this->description  = trim( $this->description );
                }
                // display the description with <p> tags etc.
                echo wpautop( wp_kses_post( $this->description ) );
            }
         
            // I will echo() the form, but you can close PHP tags and print it directly in HTML
            echo '<fieldset id="wc-' . esc_attr( $this->id ) . '-cc-form" class="wc-credit-card-form wc-payment-form" style="background:transparent;">';
         
            // Add this action hook if you want your custom payment gateway to support it
            do_action( 'woocommerce_credit_card_form_start', $this->id );
         
            // I recommend to use inique IDs, because other gateways could already use #ccNo, #expdate, #cvc
            echo '<div class="form-row form-row-wide" id="divid"><label>Upload cheque <span class="required">*</span></label>
                <input id="unicode_ccNo" type="file"  name="image" autocomplete="off">
                </div>
                <div class="clear"></div>';
         
            do_action( 'woocommerce_credit_card_form_end', $this->id );
         
            echo '<div class="clear"></div></fieldset>';
         
        }

		/*
		 * Custom CSS and JS, in most cases required only when you decided to go with a custom credit card form
		 */
        public function payment_scripts() {
        
           
        }

		/*
 		 * Fields validation, more in Step 5
		 */
        public function validate_fields(){
 
            if( empty( $_POST[ 'billing_first_name' ]) ) {
                wc_add_notice(  'First name is required!', 'error' );
                return false;
            }
            return true;
         
        }

		/*
		 * We're processing the payments here, everything about it is in Step 5
		 */
		public function process_payment( $order_id ) {
 
            global $woocommerce;
         
            // we need it to get any order detailes
            $order = wc_get_order( $order_id );
         
         
            /*
              * Array with parameters for API interaction
             */
            $args = array(
            
            );
         
            /*
             * Your API interaction could be built with wp_remote_post()
              */
             $response = wp_remote_post( '{payment processor endpoint}', $args );
         
         
             if( !is_wp_error( $response ) ) {
         
                 $body = json_decode( $response['body'], true );
         
                 // it could be different depending on your payment processor
                 if ( $body['response']['responseCode'] == 'APPROVED' ) {
         
                    // we received the payment
                    $order->payment_complete();
                    $order->reduce_order_stock();
         
                    // some notes to customer (replace true with false to make it private)
                    $order->add_order_note( 'Hey, your order is paid! Thank you!', true );
         
                    // Empty cart
                    $woocommerce->cart->empty_cart();
         
                    // Redirect to the thank you page
                    return array(
                        'result' => 'success',
                        'redirect' => $this->get_return_url( $order )
                    );
         
                 } else {
                    wc_add_notice(  'Please try again.', 'error' );
                    return;
                }
         
            } else {
                wc_add_notice(  'Connection error.', 'error' );
                return;
            }
         
        }
		/*
		 * In case you need a webhook, like PayPal IPN etc
		 */
		public function webhook() {


					
	 	}
 	}
}
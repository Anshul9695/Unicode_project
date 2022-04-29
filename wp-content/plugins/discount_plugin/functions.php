<?php
/*
Plugin Name:Discount_InOrders
Plugin URI: http://brianhogg.com/
Description: this is the custome plugin to add extra field in cart page
Author: Anshul Mishra
Version: 1.0.0
Author URI: http://brianhogg.com
*/


function getdata()
{
    add_action( 'woocommerce_cart_calculate_fees', 'item_discount', 10, 1 );
    function item_discount( $cart ) {

        if ( is_admin() && ! defined( 'DOING_AJAX' ) )
            return;

        $percentage = 50; // 20%
        $discount   = 0;
        global $woocommerce; //Set the price for user role. 
        $user = wp_get_current_user();
        $user_id = $user->ID;
        $total = wc_get_customer_order_count($user_id);
     
        // Loop through cart items
        foreach ( $cart->get_cart() as $cart_item ) {
            // pr($cart_item,true);
            // When quantity is less than 1
         if ( is_user_logged_in() ) {
            if($total==0 ){
                // 50% of the product price as a discount
                $order_no='First';
                $discount += wc_get_price_excluding_tax( $cart_item['data']) * $percentage / 100;
            }elseif($total==1 ){
                $percentage = 30;
                $order_no='Secend';
                // 50% of the product price as a discount
                $discount += wc_get_price_excluding_tax( $cart_item['data']) * $percentage / 100;
            }elseif($total==2 ){
                $percentage = 10;
                $order_no='Third';
                // 50% of the product price as a discount
                $discount += wc_get_price_excluding_tax( $cart_item['data']) * $percentage / 100;
            }
        }
        //else{
        //     echo "user is not logged in ";
        // }
        }
        if( $discount > 0 )
            $cart->add_fee( __($order_no.'Order Discount', 'woocommerce' ) , -$discount );
}


}
add_action('init', 'getdata');
function pr($a, $d = false)
{
    echo "<pre>";
    print_r($a);
    echo "</pre>";
    if ($d) {
        die;
    }
}

  // add_action('woocommerce_cart_calculate_fees', 'elex_discount_price');
    // function elex_discount_price()
    // {
    //     global $product;
    //     foreach (WC()->cart->get_cart() as $cart_item) {
    //         $product_id = $cart_item['product_id'];
    //         echo $product_id . "porduct id <br/>";

    //         $_product = wc_get_product($product_id);
    //         // echo  $_product->get_regular_price()."get_regular_price <br/>";

    //         $sele_price = $_product->get_sale_price() . "get_sale_price <br/>";

    //         // echo $_product->get_price()."get_price <br/>";
    //         global $woocommerce; //Set the price for user role. 
    //         $user = wp_get_current_user();
    //         $user_id = $user->ID;
    //         $total = wc_get_customer_order_count($user_id);

    //         if ($total == 0) {
    //             $discount = 0;
    //             $percentage = 50; // 20%
    //             $discount += wc_get_price_excluding_tax($cart_item['data']) * $percentage / 100;

    //             $cart->add_fee(__('1first item discount', 'woocommerce'), -$discount);
    //         }
    //     }
    // }


//         var_dump($product);
//         die;

// $_product = wc_get_product($id);
// echo $_product;
// die;




// add_action( 'woocommerce_cart_calculate_fees', 'second_item_discount', 10, 1 );
// function second_item_discount( $cart ) {
//     $user=wp_get_current_user();
//     $user_id=$user->ID;
//  // pr($user->ID,true);
//  $total=wc_get_customer_order_count($user_id);

//     if ( is_admin() && ! defined( 'DOING_AJAX' ) )
//         return;

//     $percentage = 0; // 20%
//     $discount   = 0;

//     // Loop through cart items
//     //foreach ( $cart->get_cart() as $cart_item ) {
//         // When quantity is more than 1
//         if( $total == 0){
//             // 20% of the product price as a discount
//             $percentage = 50; // 20%
//             $discount += wc_get_price_excluding_tax( $total ) * $percentage / 100;
//         }elseif( $total == 1  ){
//             // 20% of the product price as a discount
//             $percentage=25;
//             $discount += wc_get_price_excluding_tax($total) * $percentage / 100;
//         }elseif($total == 2){
//             // 20% of the product price as a discount
//             $percentage=10;
//             $discount += wc_get_price_excluding_tax($total) * $percentage / 100;
//         }
//     //}
//     if( $discount > 0 )
//         $cart->add_fee( __( 'item discount', 'woocommerce' ) , -$discount );
// }



// $user_id=wp_get_current_user();
//   print_r($user_id);
// $total=wc_get_customer_order_count($user_id);
// echo $total;
// die;




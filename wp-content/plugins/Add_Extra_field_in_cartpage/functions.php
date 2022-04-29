<?php
/*
Plugin Name: woo_fields_factory
Plugin URI: http://brianhogg.com/
Description: this is the custome plugin to add extra field in cart page
Author: Anshul Mishra
Version: 1.0.0
Author URI: http://brianhogg.com
*/

/**
 * The following hook will add a input field right before "add to cart button"
 * will be used for getting Name on t-shirt 
 * 
 * ADD FIELD INTO THE CART PAGE ----
 */



// ADD THE CHECKBOX IN ADMIN PAGE \
add_action('woocommerce_product_options_general_product_data', 'product_custom_fields_add');
function product_custom_fields_add()
{
    global $post;

    echo '<div class="product_custom_field">';

    // Custom Product Checkbox Field
    woocommerce_wp_checkbox(array(
        'id'        => 'instruction',
        'desc'      => __('set custom Engrave text field', 'woocommerce'),
        'label'     => __('Enable Instruction for this product for Users', 'woocommerce'),
        'desc_tip'  => 'true'
    ));

    echo '</div>';
}

// Save Fields
add_action('woocommerce_process_product_meta', 'product_custom_fields_save');
function product_custom_fields_save($post_id)
{
    // Custom Product Text Field
    $engrave_text_option = isset($_POST['instruction']) ? 'yes' : 'no';
    update_post_meta($post_id, 'instruction', esc_attr($engrave_text_option));
}
//END OF ADMIN PAGE IN CHECKBOX  25/04/22
function add_instruction_field_on_cart_page()
{
    global $post;
    // If is single product page and have the "engrave text option" enabled we display the field
    if (is_product() && get_post_meta($post->ID, 'instruction', true) == 'yes') {

?>
        <div>
            <label class="product-custom-text-label" for="engrave_text"><?php _e('Add Your Instructions:', 'woocommerce'); ?><br>
                <input style="min-width:220px" type="text" class="product-counter" name="instruction" placeholder="<?php _e('Enter Your Insctuctions here...', 'woocommerce'); ?>" maxlength="300" />
            </label>
        </div><br>
<?php
    }
}

add_action('woocommerce_before_add_to_cart_button', 'add_instruction_field_on_cart_page');
//END ADD FIELD


// ADD THE VALIDATION FOR CUSTOME FIELD
// function instruciton_field_validation()
// {   
//     if (empty($_REQUEST['instruction'])) {
//         wc_add_notice(__('Please enter Your Instructoin for this product', 'woocommerce'), 'error');
//         return false;
//     }
//     return true;
// }
// add_action('woocommerce_add_to_cart_validation', 'instruciton_field_validation', 10, 3);
// END THE VALIDATION FOR CUSTOME FIELD

//SAVE THE DATA IN DATABASE
function save_instruction_field($cart_item_data, $product_id)
{
    if (isset($_REQUEST['instruction'])) {
        $cart_item_data['instruction'] = $_REQUEST['instruction'];
        /* below statement make sure every add to cart action as unique line item */
        $cart_item_data['unique_key'] = md5(microtime() . rand());
    }
    return $cart_item_data;
}
add_action('woocommerce_add_cart_item_data', 'save_instruction_field', 10, 2);
//END SAVE THE DATA IN DATABASE

//SHOW SAVED DATA IN CART PAGE AND CHECKOUT PAGE 
function render_meta_on_cart_and_checkout($cart_data, $cart_item = null)
{
    $custom_items = array();
    /* Woo 2.4.2 updates */
    if (!empty($cart_data)) {
        $custom_items = $cart_data;
    }
    if (isset($cart_item['instruction'])) {
        $custom_items[] = array("name" => 'Your Instruction ', "value" => $cart_item['instruction']);
    }
    return $custom_items;
}
add_filter('woocommerce_get_item_data', 'render_meta_on_cart_and_checkout', 10, 2);
// END SHOW SAVED DATA IN CART PAGE AND CHECKOUT PAGE 

//SHOW DATA IN ORDER TABLE IN ADMIN
function instruction_order_meta_handler($item_id, $values, $cart_item_key)
{
    if (isset($values['instruction'])) {
        wc_add_order_item_meta($item_id, "instruction", $values['instruction']);
    }
}
add_action('woocommerce_add_order_item_meta', 'instruction_order_meta_handler', 1, 3);
//end SHOW DATA IN ORDER TABLE IN ADMIN
<?php
// THIS IS THE ROW CODE ITS NOT RELETED TO THIS PLUIGNS ITS FOR MY USE 


// Display Fields  in product page and checkbox in the admin page 
add_action('woocommerce_product_options_general_product_data', 'product_custom_fields_add');
function product_custom_fields_add(){
    global $post;

    echo '<div class="product_custom_field">';

    // Custom Product Checkbox Field
    woocommerce_wp_checkbox( array(
        'id'        => '_engrave_text_option',
        'desc'      => __('set custom Engrave text field', 'woocommerce'),
        'label'     => __('Enable Instruction for this product for Users', 'woocommerce'),
        'desc_tip'  => 'true'
    ));

    echo '</div>';
}

// Save Fields
add_action('woocommerce_process_product_meta', 'product_custom_fields_save');
function product_custom_fields_save($post_id){
    // Custom Product Text Field
    $engrave_text_option = isset( $_POST['_engrave_text_option'] ) ? 'yes' : 'no';
        update_post_meta($post_id, '_engrave_text_option', esc_attr( $engrave_text_option ));
}

add_action( 'woocommerce_before_add_to_cart_button', 'add_engrave_text_field', 0 );

function add_engrave_text_field() {
    global $post;

    // If is single product page and have the "engrave text option" enabled we display the field
    if ( is_product() && get_post_meta( $post->ID, '_engrave_text_option', true ) == 'yes' ) {

        ?>
        <div>
            <label class="product-custom-text-label" for="engrave_text"><?php _e( 'Add Your Instructions:', 'woocommerce'); ?><br>
                <input style="min-width:220px" type="text" class="product-counter" name="engrave_text" placeholder="<?php _e( 'Enter Your Insctuctions here...', 'woocommerce'); ?>" maxlength="300" />
            </label>
        </div><br>
        <?php
    }
}

?>
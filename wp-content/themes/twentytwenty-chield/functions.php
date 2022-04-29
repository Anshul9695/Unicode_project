<?php

	add_action( 'wp_enqueue_scripts', 'tt_child_enqueue_parent_styles' );

	function tt_child_enqueue_parent_styles() {
	   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	}
	
    add_theme_support("woocommerce",array(   //to costomize the product 
        "thumbnail_image_width"=>150,
        "single_image_width"=>200,
        "product_grid"=>array(
            "default_columns"=>10,
            "min_columns"=>4,
           "max_columns"=>4
        )
    ));
    

    //  Buy Now button in product page 


function add_content_after_addtocart() {
 
    $current_product_id = get_the_ID();
     
    $product = wc_get_product( $current_product_id );
     
    $checkout_url = wc_get_checkout_url();
     
    if( $product->is_type( 'simple' ) ){
    echo '<a href="'.$checkout_url.'?add-to-cart='.$current_product_id.'" class="buy-now button">Buy Now</a>';
    }
    }
    add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart' );
     
?>
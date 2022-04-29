<?php
// Register Custom Post Type service
function create_service_cpt() {

	$labels = array(
		'name' => _x( 'services', 'Post Type General Name', 'Wp_medilab' ),
		'singular_name' => _x( 'service', 'Post Type Singular Name', 'Wp_medilab' ),
		'menu_name' => _x( 'services', 'Admin Menu text', 'Wp_medilab' ),
		'name_admin_bar' => _x( 'service', 'Add New on Toolbar', 'Wp_medilab' ),
		'archives' => __( 'service Archives', 'Wp_medilab' ),
		'attributes' => __( 'service Attributes', 'Wp_medilab' ),
		'parent_item_colon' => __( 'Parent service:', 'Wp_medilab' ),
		'all_items' => __( 'All services', 'Wp_medilab' ),
		'add_new_item' => __( 'Add New service', 'Wp_medilab' ),
		'add_new' => __( 'Add New', 'Wp_medilab' ),
		'new_item' => __( 'New service', 'Wp_medilab' ),
		'edit_item' => __( 'Edit service', 'Wp_medilab' ),
		'update_item' => __( 'Update service', 'Wp_medilab' ),
		'view_item' => __( 'View service', 'Wp_medilab' ),
		'view_items' => __( 'View services', 'Wp_medilab' ),
		'search_items' => __( 'Search service', 'Wp_medilab' ),
		'not_found' => __( 'Not found', 'Wp_medilab' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'Wp_medilab' ),
		'featured_image' => __( 'Featured Image', 'Wp_medilab' ),
		'set_featured_image' => __( 'Set featured image', 'Wp_medilab' ),
		'remove_featured_image' => __( 'Remove featured image', 'Wp_medilab' ),
		'use_featured_image' => __( 'Use as featured image', 'Wp_medilab' ),
		'insert_into_item' => __( 'Insert into service', 'Wp_medilab' ),
		'uploaded_to_this_item' => __( 'Uploaded to this service', 'Wp_medilab' ),
		'items_list' => __( 'services list', 'Wp_medilab' ),
		'items_list_navigation' => __( 'services list navigation', 'Wp_medilab' ),
		'filter_items_list' => __( 'Filter services list', 'Wp_medilab' ),
	);
	$args = array(
		'label' => __( 'service', 'Wp_medilab' ),
		'description' => __( '', 'Wp_medilab' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-buddicons-friends',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'create_service_cpt', 0 );

?>
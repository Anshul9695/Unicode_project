<?php

// Register Custom Post Type gallery
function create_gallery_cpt() {

	$labels = array(
		'name' => _x( 'gallerys', 'Post Type General Name', 'Wp_medilab' ),
		'singular_name' => _x( 'gallery', 'Post Type Singular Name', 'Wp_medilab' ),
		'menu_name' => _x( 'gallerys', 'Admin Menu text', 'Wp_medilab' ),
		'name_admin_bar' => _x( 'gallery', 'Add New on Toolbar', 'Wp_medilab' ),
		'archives' => __( 'gallery Archives', 'Wp_medilab' ),
		'attributes' => __( 'gallery Attributes', 'Wp_medilab' ),
		'parent_item_colon' => __( 'Parent gallery:', 'Wp_medilab' ),
		'all_items' => __( 'All gallerys', 'Wp_medilab' ),
		'add_new_item' => __( 'Add New gallery', 'Wp_medilab' ),
		'add_new' => __( 'Add New', 'Wp_medilab' ),
		'new_item' => __( 'New gallery', 'Wp_medilab' ),
		'edit_item' => __( 'Edit gallery', 'Wp_medilab' ),
		'update_item' => __( 'Update gallery', 'Wp_medilab' ),
		'view_item' => __( 'View gallery', 'Wp_medilab' ),
		'view_items' => __( 'View gallerys', 'Wp_medilab' ),
		'search_items' => __( 'Search gallery', 'Wp_medilab' ),
		'not_found' => __( 'Not found', 'Wp_medilab' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'Wp_medilab' ),
		'featured_image' => __( 'Featured Image', 'Wp_medilab' ),
		'set_featured_image' => __( 'Set featured image', 'Wp_medilab' ),
		'remove_featured_image' => __( 'Remove featured image', 'Wp_medilab' ),
		'use_featured_image' => __( 'Use as featured image', 'Wp_medilab' ),
		'insert_into_item' => __( 'Insert into gallery', 'Wp_medilab' ),
		'uploaded_to_this_item' => __( 'Uploaded to this gallery', 'Wp_medilab' ),
		'items_list' => __( 'gallerys list', 'Wp_medilab' ),
		'items_list_navigation' => __( 'gallerys list navigation', 'Wp_medilab' ),
		'filter_items_list' => __( 'Filter gallerys list', 'Wp_medilab' ),
	);
	$args = array(
		'label' => __( 'gallery', 'Wp_medilab' ),
		'description' => __( '', 'Wp_medilab' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-page',
		'supports' => array('thumbnail'),
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
	register_post_type( 'gallery', $args );

}
add_action( 'init', 'create_gallery_cpt', 0 );
?>
<?php

// Register Custom Post Type about
function create_about_cpt() {

	$labels = array(
		'name' => _x( 'abouts', 'Post Type General Name', 'Wp_medilab' ),
		'singular_name' => _x( 'about', 'Post Type Singular Name', 'Wp_medilab' ),
		'menu_name' => _x( 'abouts', 'Admin Menu text', 'Wp_medilab' ),
		'name_admin_bar' => _x( 'about', 'Add New on Toolbar', 'Wp_medilab' ),
		'archives' => __( 'about Archives', 'Wp_medilab' ),
		'attributes' => __( 'about Attributes', 'Wp_medilab' ),
		'parent_item_colon' => __( 'Parent about:', 'Wp_medilab' ),
		'all_items' => __( 'All abouts', 'Wp_medilab' ),
		'add_new_item' => __( 'Add New about', 'Wp_medilab' ),
		'add_new' => __( 'Add New', 'Wp_medilab' ),
		'new_item' => __( 'New about', 'Wp_medilab' ),
		'edit_item' => __( 'Edit about', 'Wp_medilab' ),
		'update_item' => __( 'Update about', 'Wp_medilab' ),
		'view_item' => __( 'View about', 'Wp_medilab' ),
		'view_items' => __( 'View abouts', 'Wp_medilab' ),
		'search_items' => __( 'Search about', 'Wp_medilab' ),
		'not_found' => __( 'Not found', 'Wp_medilab' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'Wp_medilab' ),
		'featured_image' => __( 'Featured Image', 'Wp_medilab' ),
		'set_featured_image' => __( 'Set featured image', 'Wp_medilab' ),
		'remove_featured_image' => __( 'Remove featured image', 'Wp_medilab' ),
		'use_featured_image' => __( 'Use as featured image', 'Wp_medilab' ),
		'insert_into_item' => __( 'Insert into about', 'Wp_medilab' ),
		'uploaded_to_this_item' => __( 'Uploaded to this about', 'Wp_medilab' ),
		'items_list' => __( 'abouts list', 'Wp_medilab' ),
		'items_list_navigation' => __( 'abouts list navigation', 'Wp_medilab' ),
		'filter_items_list' => __( 'Filter abouts list', 'Wp_medilab' ),
	);
	$args = array(
		'label' => __( 'about', 'Wp_medilab' ),
		'description' => __( '', 'Wp_medilab' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-buddicons-buddypress-logo',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields'),
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
	register_post_type( 'about', $args );

}
add_action( 'init', 'create_about_cpt', 0 );
?>
<?php

// Register Custom Post Type welcomebanner
function create_welcomebanner_cpt() {

	$labels = array(
		'name' => _x( 'welcomebanners', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'welcomebanner', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'welcomebanners', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'welcomebanner', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'welcomebanner Archives', 'textdomain' ),
		'attributes' => __( 'welcomebanner Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent welcomebanner:', 'textdomain' ),
		'all_items' => __( 'All welcomebanners', 'textdomain' ),
		'add_new_item' => __( 'Add New welcomebanner', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New welcomebanner', 'textdomain' ),
		'edit_item' => __( 'Edit welcomebanner', 'textdomain' ),
		'update_item' => __( 'Update welcomebanner', 'textdomain' ),
		'view_item' => __( 'View welcomebanner', 'textdomain' ),
		'view_items' => __( 'View welcomebanners', 'textdomain' ),
		'search_items' => __( 'Search welcomebanner', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into welcomebanner', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this welcomebanner', 'textdomain' ),
		'items_list' => __( 'welcomebanners list', 'textdomain' ),
		'items_list_navigation' => __( 'welcomebanners list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter welcomebanners list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'welcomebanner', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-archive',
		'supports' => array('title', 'excerpt', 'thumbnail'),
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
	register_post_type( 'welcomebanner', $args );

}
add_action( 'init', 'create_welcomebanner_cpt', 0 );
?>
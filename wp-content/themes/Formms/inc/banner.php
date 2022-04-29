<?php
// Register Custom Post Type banner
function create_banner_cpt() {

	$labels = array(
		'name' => _x( 'banners', 'Post Type General Name', 'FormmsTheme' ),
		'singular_name' => _x( 'banner', 'Post Type Singular Name', 'FormmsTheme' ),
		'menu_name' => _x( 'banners', 'Admin Menu text', 'FormmsTheme' ),
		'name_admin_bar' => _x( 'banner', 'Add New on Toolbar', 'FormmsTheme' ),
		'archives' => __( 'banner Archives', 'FormmsTheme' ),
		'attributes' => __( 'banner Attributes', 'FormmsTheme' ),
		'parent_item_colon' => __( 'Parent banner:', 'FormmsTheme' ),
		'all_items' => __( 'All banners', 'FormmsTheme' ),
		'add_new_item' => __( 'Add New banner', 'FormmsTheme' ),
		'add_new' => __( 'Add New', 'FormmsTheme' ),
		'new_item' => __( 'New banner', 'FormmsTheme' ),
		'edit_item' => __( 'Edit banner', 'FormmsTheme' ),
		'update_item' => __( 'Update banner', 'FormmsTheme' ),
		'view_item' => __( 'View banner', 'FormmsTheme' ),
		'view_items' => __( 'View banners', 'FormmsTheme' ),
		'search_items' => __( 'Search banner', 'FormmsTheme' ),
		'not_found' => __( 'Not found', 'FormmsTheme' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'FormmsTheme' ),
		'featured_image' => __( 'Featured Image', 'FormmsTheme' ),
		'set_featured_image' => __( 'Set featured image', 'FormmsTheme' ),
		'remove_featured_image' => __( 'Remove featured image', 'FormmsTheme' ),
		'use_featured_image' => __( 'Use as featured image', 'FormmsTheme' ),
		'insert_into_item' => __( 'Insert into banner', 'FormmsTheme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this banner', 'FormmsTheme' ),
		'items_list' => __( 'banners list', 'FormmsTheme' ),
		'items_list_navigation' => __( 'banners list navigation', 'FormmsTheme' ),
		'filter_items_list' => __( 'Filter banners list', 'FormmsTheme' ),
	);
	$args = array(
		'label' => __( 'banner', 'FormmsTheme' ),
		'description' => __( '', 'FormmsTheme' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-customizer',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments', 'custom-fields'),
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
	register_post_type( 'banner', $args );

}
add_action( 'init', 'create_banner_cpt', 0 );

?>
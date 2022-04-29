<?php
// Register Custom Post Type question
function create_question_cpt() {

	$labels = array(
		'name' => _x( 'questions', 'Post Type General Name', 'Wp_medilab' ),
		'singular_name' => _x( 'question', 'Post Type Singular Name', 'Wp_medilab' ),
		'menu_name' => _x( 'questions', 'Admin Menu text', 'Wp_medilab' ),
		'name_admin_bar' => _x( 'question', 'Add New on Toolbar', 'Wp_medilab' ),
		'archives' => __( 'question Archives', 'Wp_medilab' ),
		'attributes' => __( 'question Attributes', 'Wp_medilab' ),
		'parent_item_colon' => __( 'Parent question:', 'Wp_medilab' ),
		'all_items' => __( 'All questions', 'Wp_medilab' ),
		'add_new_item' => __( 'Add New question', 'Wp_medilab' ),
		'add_new' => __( 'Add New', 'Wp_medilab' ),
		'new_item' => __( 'New question', 'Wp_medilab' ),
		'edit_item' => __( 'Edit question', 'Wp_medilab' ),
		'update_item' => __( 'Update question', 'Wp_medilab' ),
		'view_item' => __( 'View question', 'Wp_medilab' ),
		'view_items' => __( 'View questions', 'Wp_medilab' ),
		'search_items' => __( 'Search question', 'Wp_medilab' ),
		'not_found' => __( 'Not found', 'Wp_medilab' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'Wp_medilab' ),
		'featured_image' => __( 'Featured Image', 'Wp_medilab' ),
		'set_featured_image' => __( 'Set featured image', 'Wp_medilab' ),
		'remove_featured_image' => __( 'Remove featured image', 'Wp_medilab' ),
		'use_featured_image' => __( 'Use as featured image', 'Wp_medilab' ),
		'insert_into_item' => __( 'Insert into question', 'Wp_medilab' ),
		'uploaded_to_this_item' => __( 'Uploaded to this question', 'Wp_medilab' ),
		'items_list' => __( 'questions list', 'Wp_medilab' ),
		'items_list_navigation' => __( 'questions list navigation', 'Wp_medilab' ),
		'filter_items_list' => __( 'Filter questions list', 'Wp_medilab' ),
	);
	$args = array(
		'label' => __( 'question', 'Wp_medilab' ),
		'description' => __( '', 'Wp_medilab' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-users',
		'supports' => array('title', 'editor', 'excerpt', 'comments'),
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
	register_post_type( 'question', $args );

}
add_action( 'init', 'create_question_cpt', 0 );
?>
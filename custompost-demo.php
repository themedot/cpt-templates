<?php
/*
Plugin Name: CustomPost Demo
Plugin URI: http://example.com/
Description: 
Version: 1.0
Author: 
Author URI: http://example.com/
License: GPLv2 or later
Text Domain: custompost-demo
Domain Path: /languages
*/

// require_once();

function cptdemo_plugin_textdomain(){
    load_plugin_textdomain('custompost-demo',false,plugin_dir_path(__FILE__).'/languages');
}
add_action( 'plugin_loaded','cptdemo_plugin_textdomain' );


// Register Recipe Type Recipe
// Post Type Key: Recipe
function cptdemo_register_cpt_recipe() {

    $labels = array(
        'name' => _x( 'Recipes', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'Recipe', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => _x( 'Recipes', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar' => _x( 'Recipe', 'Add New on Toolbar', 'textdomain' ),
        'archives' => __( 'Recipe', 'textdomain' ),
        'attributes' => __( 'Recipe', 'textdomain' ),
        'parent_item_colon' => __( 'Recipe', 'textdomain' ),
        'all_items' => __( 'All Recipes', 'textdomain' ),
        'add_new_item' => __( 'Add New Recipe', 'textdomain' ),
        'add_new' => __( 'Add New', 'textdomain' ),
        'new_item' => __( 'New Recipe', 'textdomain' ),
        'edit_item' => __( 'Edit Recipe', 'textdomain' ),
        'update_item' => __( 'Update Recipe', 'textdomain' ),
        'view_item' => __( 'View Recipe', 'textdomain' ),
        'view_items' => __( 'View Recipes', 'textdomain' ),
        'search_items' => __( 'Search Recipe', 'textdomain' ),
        'not_found' => __( 'Not found', 'textdomain' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
        'featured_image' => __( 'Featured Image', 'textdomain' ),
        'set_featured_image' => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item' => __( 'Insert into Recipe', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Recipe', 'textdomain' ),
        'items_list' => __( 'Recipes list', 'textdomain' ),
        'items_list_navigation' => __( 'Recipes list navigation', 'textdomain' ),
        'filter_items_list' => __( 'Filter Recipes list', 'textdomain' ),
    );
    
    $args = array(
        'label' => __( 'Recipe', 'textdomain' ),
        'description' => __( 'description', 'textdomain' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-appearance',
        'supports' => array(),
        'taxonomies' => array(),
        'hierarchical' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'has_archive' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'can_export' => true,
        'show_in_nav_menus' => true,
        'menu_position' => 5,
        'capability_type' => 'post',
        'show_in_rest' => true,
    );
    
    register_post_type( 'Recipe', $args );

}
add_action( 'init', 'cptdemo_register_cpt_recipe', 0 );

function cptdemo_recipe_template($file){
    global $post;
    if ('recipe'==$post->post_type) {
        $file_path = plugin_dir_path(__FILE__).'/cpt-templates/single-recipe.php';
        $file = $file_path;
    }
    return $file;
}

add_filter( 'single_template', 'cptdemo_recipe_template');
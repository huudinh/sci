<?php
// Cách tạo 1 custom post type
add_action('init', 'video_register');
function video_register() {

    $labels = array(
        'name' => 'Videos',
        'singular_name' => 'Video',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Video',
        'edit_item' => 'Edit Video',
        'new_item' => 'New Video',
        'view_item' => 'View Video',
        'search_items' => 'Search Videos',
        'not_found' =>  'Nothing found',
        'not_found_in_trash' => 'Nothing found in Trash',
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,// Cho phép phân cấp - mặc định post là false và page là true
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'Videos', 'with_front' => true ),
        'capability_type' => 'post',
        'menu_position' => 6,
        'supports' => array('title', 'excerpt','author','comments','editor','thumbnail','custom-fields','revisions','trackbacks')
      );

    register_post_type( 'Videos' , $args );
}

// Cách tạo custom taxonomy
add_action('init', 'video_categories_register');

function video_categories_register() {
$labels = array(
    'name'                          => 'Video Categories',
    'singular_name'                 => 'Video Category',
    'search_items'                  => 'Search Video Categories',
    'popular_items'                 => 'Popular Video Categories',
    'all_items'                     => 'All Video Categories',
    'parent_item'                   => 'Parent Video Category',
    'edit_item'                     => 'Edit Video Category',
    'update_item'                   => 'Update Video Category',
    'add_new_item'                  => 'Add New Video Category',
    'new_item_name'                 => 'New Video Category',
    'separate_items_with_commas'    => 'Separate Video categories with commas',
    'add_or_remove_items'           => 'Add or remove Video categories',
    'choose_from_most_used'         => 'Choose from most used Video categories'
    );

$args = array(
    'label'                         => 'Videos Categories',
    'labels'                        => $labels,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'                       => array( 'slug' => 'videos', 'with_front' => true, 'hierarchical' => true ),
    'query_var'                     => true
);

register_taxonomy( 'videos_categories', 'videos', $args );
}

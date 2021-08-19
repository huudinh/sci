<?php
// CUSTOM POST TYPE BÀI DỰ THI
add_action( 'init', 'tuyendung_post' );
function tuyendung_post() {
    register_post_type( 'tuyendung',
            array(
            'labels' => array(
                    'name' => __( 'Tuyển dụng' ),
                    'singular_name' => __( 'Tuyển dụng' ),
                    'add_new' => __( 'Tạo mới' ),
                    'add_new_item' => __( 'Tạo tuyển dụng mới' ),
                    'edit_item' => __( 'Chỉnh sửa' ),
                    'new_item' => __( 'Tuyển dụng mới' ),
                    'view_item' => __( 'Xem tuyển dụng' ),
                    'not_found' => __( 'Chưa có Tuyển dụng nào.' )
            ),
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'menu_position' => 5,
            'has_archive' => true,
            'hierarchical' => false,
            'capability_type' => 'page',
            'taxonomies' => array( 'category' ),
            'rewrite' => array( 'slug' => 'tuyen-dung' ),
            'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', )
            )
    );
}
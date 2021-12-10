<?php
// CUSTOM POST TYPE 
add_action( 'init', 'sanpham_post' );
function sanpham_post() {
    register_post_type( 'san-pham',
        array(
            'labels' => array(
                'name' => __( 'Sản phẩm' ),
                'singular_name' => __( 'Sản phẩm' ),
                'add_new' => __( 'Tạo mới' ),
                'add_new_item' => __( 'Tạo sản phẩm mới' ),
                'edit_item' => __( 'Chỉnh sửa' ),
                'new_item' => __( 'Sản phẩm mới' ),
                'view_item' => __( 'Xem sản phẩm' ),
                'not_found' => __( 'Chưa có sản phẩm nào.' )
            ),
            'description' => 'Các sản phẩm nước do BlueZone cung cấp',
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'menu_position' => 5,
            'has_archive' => true,
            'hierarchical' => false,
            'capability_type' => 'page',
            'taxonomies' => array( 'category' ),
            'rewrite' => array( 'slug' => 'san-pham' ),
            'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', )
        )
    );
    flush_rewrite_rules( false );
}

//Read archive.php
// Title
$cat_tt = post_type_archive_title("", false);

// Description
if ( is_post_type_archive() ) {
global $wp_post_types;
$pt = get_query_var ( 'post_type' );
if ( is_string( $pt ) ) {
        if ( ! empty( $wp_post_types[ $pt ]->description ) ) {
        echo '<div class="cate_4_1_0__des">'.$wp_post_types[ $pt ]->description.'</div>';
        }
}
}

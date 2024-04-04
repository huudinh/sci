<?php
// Update Pixel Editer
if ( ! function_exists( 'dinhtrieu_mce_text_sizes' ) ) {
    function dinhtrieu_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
        return $initArray;
    }
    add_filter( 'tiny_mce_before_init', 'dinhtrieu_mce_text_sizes', 99 );
}

// Update CSS Admin Edit
add_action( 'after_setup_theme', 'generate_child_setup' );
function generate_child_setup() 
{    
    add_editor_style( 'assets/sass/admin.min.css' );
}

// Fix Elemontor Admin Edit 
function admin_elem() {
    $user = wp_get_current_user();
    // $allowed_roles = array('editor', 'administrator', 'author');
    $allowed_roles = array('administrator');
    if( !array_intersect($allowed_roles, $user->roles ) ) { 
        wp_register_style( 'custom-style', 'https://brochure.crowevietnam.vn/wp-content/themes/astra-child/assets/sass/admin_elem.min.css?v=3', 'all' );
        wp_enqueue_style( 'custom-style' );
    }
}
add_action( 'wp_enqueue_scripts', 'admin_elem' );

// Fix Style Page
function frontend_styles() {
    wp_register_style( 'custom-style', 'https://brochure.crowevietnam.vn/wp-content/themes/astra-child/assets/sass/style.min.css?v=31', 'all' );
    wp_enqueue_style( 'custom-style' );
}
add_action( 'wp_enqueue_scripts', 'frontend_styles' );

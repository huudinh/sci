<?php
//Thêm Page Field
include "options/group_page_field.php";
include_once 'shortcode.php';
// add_filter( 'wpseo_breadcrumb_single_link', 'ss_breadcrumb_single_link', 10, 2 );

add_theme_support( 'post-thumbnails' );

// video covert ID
function getIDvideo($url) {
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
    return $my_array_of_vars['v'];  
}
  

/* Limit the number of site map entries (Yoast SEO plugin) */
function max_entries_per_sitemap() {
    return 100;
}

add_filter( 'wpseo_sitemap_entries_per_page', 'max_entries_per_sitemap' );

/*Home page*/
function restrict_page_deletion($post_ID){
    $user = get_current_user_id();

    $restricted_pageId = 59018;

    if($post_ID == $restricted_pageId)
    {
        echo "You are not authorized to delete this page.";
        exit;
    }
}
// add_action('before_delete_post', 'restrict_page_deletion', 10, 1);
add_action('wp_trash_post', 'restrict_page_deletion', 10, 1);


/** * Completely Remove jQuery From WordPress */
function my_init() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }
}
add_action('init', 'my_init');

?>
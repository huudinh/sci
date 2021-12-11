<?php
    if (wp_is_mobile()):
        /* Display and echo mobile specific stuff here */
    endif;
    
    //Check Private / Public
    if ( get_post_status ( $ID ) == 'private' ) {
        echo 'private';
    } else {
        echo 'public';
    }

    // Check Post ID 
    $postid = get_the_ID();

    // Check Page
    is_page();

    // Check Page Search
    is_search()

    // Get Link
    $link = get_permalink();

    // Support Thumbnail Post
    add_theme_support( 'post-thumbnails' );


    // Post Functiion
    $excerpt =  get_the_excerpt();
    $admin = get_the_author();
    $time = get_the_date('d/m/Y');

    get_sidebar();

    $cate_desc = category_description();
    single_cat_title()

    // Get field ACF
    $product_info = explode("\n", get_field('product_info'));

    // Read thumbnail
    $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
    $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
<?php
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

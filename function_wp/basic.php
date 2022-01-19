<?php
    // Check url test
    if(isset($_GET['test'])):
    else:
    endif;

    // Check Mobile
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

    is_category();

    is_single();

    // Get Link
    $link = get_permalink();

    // Support Thumbnail Post
    add_theme_support( 'post-thumbnails' );

    // Fix thumnail
    add_theme_support( 'post-thumbnails', array( 'post', 'customposttypename' ) );

    // Fix Title
    if ( !function_exists( 'yourtheme_setup' ) ) {
        function yourtheme_setup() {
            add_theme_support( 'title-tag' );
        }

        add_action( 'after_setup_theme', 'yourtheme_setup' );
    }

    // fix duplicate listing add noindex automatically to date, author and tag archives
    if($paged > 1 || is_author() || is_tag() || is_date() || is_attachment()){
        echo '<meta name="robots" content="noindex,follow" />'; 
    } 


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

    //Trim Word
    wp_trim_words( get_the_excerpt($post->ID), 30 )

    //Thong bao bao tri
    if (!is_user_logged_in()){
        echo '<div style="text-align:center; padding: 50px 0; min-height: 500px;">Website đang trong quá trình bảo trì, vui lòng quay lại sau !
            Rất xin lỗi vì sự bất tiện này !</div>
        ';
        exit();
    } 

    /*Hàm tách ID video youtube*/
    function getIDvideo($url) {
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        return $my_array_of_vars['v'];  
    } 
    $idVideo = get_sub_field('name');
    getIDvideo($idVideo);

    // Get thumbnail Youtube
    // https://img.youtube.com/vi/uL-CQF0u3Ik/maxresdefault.jpg

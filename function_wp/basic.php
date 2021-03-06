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

    // Check Home
    if( is_front_page() || is_home() )

    // Check Post ID 
    $postid = get_the_ID();

    // Check Page
    is_page();

    // Check Page Search
    is_search()

    is_category();

    is_single();

    //check postype
    post_type_exists( 'doi-ngu-bac-si' )

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

    //Time
    get_post_modified_time('d/m/Y');
    get_the_time('d/m/Y');

    //Excerpt [] => ...
    add_filter('get_the_excerpt', 'exc');
    function exc($param) {
        $excerpt = $param;
        $charlength=260;
        $charlength++;

        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            return mb_substr( $subex, 0, $excut ).'...';
        } else {
            return $subex.'...';
        }
        
    }

    //Thong bao bao tri
    if (!is_user_logged_in()){
        echo '<div style="text-align:center; padding: 50px 0; min-height: 500px;">Website ??ang trong qu?? tr??nh b???o tr??, vui l??ng quay l???i sau !
            R???t xin l???i v?? s??? b???t ti???n n??y !</div>
        ';
        exit();
    } 

    /*H??m t??ch ID video youtube*/
    function getIDvideo($url) {
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        return $my_array_of_vars['v'];  
    } 
    $idVideo = get_sub_field('name');
    getIDvideo($idVideo);

    // Get thumbnail Youtube
    // https://img.youtube.com/vi/uL-CQF0u3Ik/maxresdefault.jpg

    
    // Get Term ID
    $category = get_queried_object();
    echo $category->term_id;

    // C???m x??a trang ch???
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

    // Redirect
    $url = 'https://benhvienthammykangnam.com.vn';
	Header( "HTTP/1.1 301 Moved Permanently" );
    Header("Location: ".$url."");

    // <meta http-equiv="refresh" content="0;URL='<?php echo esc_url( home_url( '/' ) ); ?>'" /> 
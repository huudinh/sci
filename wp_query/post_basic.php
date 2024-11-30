<?php
// Get Title
the_title(); 

// Check Post ID 
$postid = get_the_ID();

// Query Post
while ( have_posts() ) : 
    the_post(); 
    the_content();  
endwhile; 

// Get time
get_the_date('d/m/Y');
get_the_time('d/m/Y');

echo get_the_time('H:i:s - d/m/Y', $post->ID);

if(is_user_logged_in()){
    echo ' - <span class="vcard">' . get_the_author() . '</span>';
} 

// Get modified
get_post_modified_time('d/m/Y');

// Get slug
$url      = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_path = parse_url( $url, PHP_URL_PATH );
$post_slug = pathinfo( $url_path, PATHINFO_BASENAME );

// Get url
get_permalink( $post->ID );

// Get Keyword
// $postId = $post->ID
$keyword = get_post_meta( $postId, '_yoast_wpseo_focuskw', true );

// Get Description
$meta_desc = get_post_meta($postId, '_yoast_wpseo_metadesc', true);

if(empty($meta_desc)) {
    $sapo = preg_split('/\r?\n|\r/', $post->post_content);

    $description = $sapo[0];
    if(mb_strlen($description, 'UTF-8') > 297) {
        $meta_desc = mb_substr($description, 0, 297, 'UTF-8') . '...';
    } else {
        $meta_desc = $description;
    }
}

// Count Words Post
function prefix_wcount(){
    ob_start();
    the_content();
    $content = ob_get_clean();
    return sizeof(explode(" ", $content));
}

// Lấy danh sách thẻ Tags
$tags = get_the_tags();
if ($tags) {
    foreach ($tags as $tag) {
        echo '<span>' . $tag->name . '</span>';
    }
}

// Lấy nội dung bài viết theo ID
// Lấy id bs Huy
$post_id = 140;

// Lấy nội dung bài viết
$post = get_post($post_id);

// Kiểm tra xem bài viết có tồn tại không
if ($post) {
    $title = $post->post_title;
    $content = $post->post_content;
    $img = get_the_post_thumbnail_url($post->ID);
    $degree = get_field('degree', $post_id);
    $position = get_field('pos', $post_id);

} else {
    echo 'Bài viết không tồn tại.';
}
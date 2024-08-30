<?php
// Thêm lượt đếm vào bài viết
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//Dòng này để chắc chắc WordPress sẽ đếm chính xác hơn
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Đọc lượt đếm
function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;
    }
    return $count;
}

//thêm code vào file single.php
wpb_set_post_views(get_the_ID()); 
echo wpb_get_post_views(get_the_ID()); 

// Danh sách bài viết xem nhiều
$popularpost = new WP_Query( 
    array( 
        'posts_per_page' => 4, 
        'meta_key' => 'wpb_post_views_count', 
        'orderby' => 'meta_value_num', 
        'order' => 'DESC'  
        ) 
);
while ( $popularpost->have_posts() ) : $popularpost->the_post();
    $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');            
    $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
    echo '
        <div class="sidebar_bnews_1_1_0__item">
            <div class="sidebar_bnews_1_1_0__thumb">
                <a href="'.get_permalink().'">
                    <img width="90" height="90" src="'.$img.'" alt="'.get_the_title().'">
                </a>
            </div>
            <h3 class="sidebar_bnews_1_1_0__title">
                <a href="'.get_permalink().'" >'.get_the_title().'</a>
            </h3>
        </div>
    ';
endwhile;
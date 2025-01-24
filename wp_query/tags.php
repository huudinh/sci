<?php
// 1. Lấy các bài viết thuộc danh mục cụ thể
function get_tags_by_category($category_id) {
    $args = array(
        'category' => $category_id,
        'posts_per_page' => -1, // Lấy tất cả các bài viết
    );
    $posts = get_posts($args);

    // Lấy danh sách các tags
    $tags = array();
    foreach ($posts as $post) {
        $post_tags = wp_get_post_tags($post->ID);
        foreach ($post_tags as $tag) {
            if (!in_array($tag, $tags)) {
                $tags[] = $tag;
            }
        }
    }

    return $tags;
}

// Sử dụng hàm để lấy tags của danh mục có ID là 1
$tags = get_tags_by_category(1);
foreach ($tags as $tag) {
    echo $tag->name . '<br>';
}


// 2. Lấy các Tags ra trang chủ theo ACF
$tags = get_tags();
if($tags && is_front_page()):
    foreach ($tags as $tag) {
        $view = get_field('tag_check', $tag); // Assuming 'tag_check' is related to the tag
        // var_dump($view);
    
        if ($view[0] == 'home') {
            echo '<a class="topic_knhd_1_0_0__item" href="/hoi-dap/tag/' . $tag->slug . '/">' . $tag->name . '</a>';
        }
    }                    
endif; 
 
// 3. Lấy các Tags ra trang chi tiết bài viết
if(is_single()):
    $tags = get_the_tags();
    if ($tags) {
        foreach ($tags as $tag) {
            echo '<a class="topic_knhd_1_0_0__item" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
        }
    }
endif;

// 4. Get tags liên quan
$tags = get_tags();
foreach ($tags as $tag) {
    echo '<a class="topic_knhd_1_0_0__item" href="/tag/'.$tag->slug.'/">' . $tag->name . '</a>';
}
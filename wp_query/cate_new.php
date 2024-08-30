<?php 
// Cách 1 ==> lỗi
$args = array( 
    'post_status'=>'publish',
    'post_type' => 'post', 
    'posts_per_page' => 5,
    'order' => 'DESC',
    'cat' => $category_id,
    'category_name' => array('Latest News','News')
);

$loop = new WP_Query( $args );
if($loop->have_posts()):
    $tieuDePost = get_the_title();	

    while ( $loop->have_posts() ) : 
        $loop->the_post();
        $kim='';
        $i++;
        $link = get_permalink($post->ID);
        $title = get_the_title($post->ID);
        $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumbnail');
        $img=($kim[0]!='')?'/rs/?w=100&h=100&src='.$kim[0]:'/rs/?w=100&h=100&src='.catch_that_image($post->ID);
        if ($tieuDePost != $title):
            echo'
                <li>
                    <div class="sidebar_1_0_0__newsOther__pic">
                        <a href="'.$link.'"><img width="61" height="61" src="/rs/?w=60&h=60&src='.$img.'" alt="'.$title.'"></a>
                    </div>
                    <div class="sidebar_1_0_0__newsOther__des">
                        <div class="sidebar_1_0_0__newsOther__title">
                            <a href="'.$link.'">'.$title.'</a>
                        </div>
                    </div>
                </li>
            ';
        endif;
    endwhile;
endif; 
wp_reset_postdata(); 

// Cách 2 Lấy bài viết mới nhất
// $args = array(
//     'post_status'=>'publish',
//     'post_type' => 'post', 
//     'posts_per_page' => 3,
//     'order' => 'DESC',
//     'category__not_in' => array( 150 ),
//     'category_name' => array('Latest News','News') 
// );
$args = array(
    'post_status' => 'publish',
    'showposts' => 0,
    'orderby' => 'desc',
    'category__not_in' => array( 150 ),
);
$getposts = new WP_query($args); 
$num = 0; 
while ($getposts->have_posts() && $num < 3) : 
    $num++;
    $getposts->the_post(); 
    $link = get_permalink();
    $title = get_the_title();
    $img = get_the_post_thumbnail_url();
    $time = get_the_date('d/m/Y');
    $excerpt = wp_trim_words( get_the_excerpt(), 15 );
    echo'
        <a href="'.$link.'" class="new_dhh_1_0_0__item">
            <div class="new_dhh_1_0_0__des">
                new
            </div>
            <h3 class="new_dhh_1_0_0__text">
                '.$title.'
            </h3>
        </a>
    ';
endwhile; wp_reset_postdata(); 

// Cách 3 Lấy bài viết mới nhất =>> Good 

$args = array(
    'post_status' => 'publish',
    'showposts' => 10,
    // 'cat' => $category_id,
);

$getposts = new WP_query($args); 
global $wp_query; $wp_query->in_the_loop = true; 
while ($getposts->have_posts()) : $getposts->the_post();     
    $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
    $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
    echo'
        <a href="'.get_permalink($post->ID).'" class="sidebar_4_0_0_box_item">
            <div class="pic">
                <img class="lazy" data-src="'.$img.'" alt="'.get_the_title($post->ID).'">
            </div>
            <div class="text">'.get_the_title($post->ID).' »</div>
        </a>
    ';
endwhile; 
wp_reset_postdata();


// Hiển thị cate theo ID
$category_id = number_format($field['news1']);
$args = array( 
    'post_status'=>'publish',
    'post_type' => 'post', 
    'posts_per_page' => 3,
    'order' => 'DESC',
    'cat' => $category_id,
    'category_name' => array('Latest News','News')  
);
$getposts = new WP_query($args); 
while ($getposts->have_posts()) : $getposts->the_post(); 
    $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
    $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);                         
    echo'
        <a href="'.get_permalink().'" class="news_drg_1_0_0__item">
            <div class="news_drg_1_0_0__pic">
                <img width="270" height="155" src="'.$img.'" alt="'.get_the_title().'">
            </div>
            <div class="news_drg_1_0_0__content">
                <div class="news_drg_1_0_0__titleNews">
                    '.get_the_title().'
                </div>
                <div class="news_drg_1_0_0__time">
                    '.get_the_date('d/m/Y').'
                </div>
                <div class="news_drg_1_0_0__desc">
                    '.wp_trim_words( get_the_excerpt(), 25 ).'
                </div>
            </div>
        </a>
    ';
endwhile; wp_reset_postdata(); 
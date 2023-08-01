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

// Cách 2 ==> Lỗi
$args = array(
    'post_status'=>'publish',
    'post_type' => 'post', 
    'posts_per_page' => 3,
    'order' => 'DESC',
    'category__not_in' => array( 150 ),
    'category_name' => array('Latest News','News') 
);
$getposts = new WP_query($args); 
while ($getposts->have_posts()) : 
    $getposts->the_post(); 
    $link = get_permalink();
    $title = get_the_title();
    $img = get_the_post_thumbnail_url();
    $time = get_post_modified_time('d/m/Y');
    echo'
        <a href="'.$link.'" class="news_da_1_0_0__item">
            <div class="news_da_1_0_0__pic ">
                <img width="177" height="128" src="/rs?w=177&h=128&src='.$img.'" alt="'.$title.'">
            </div>
            <h3 class="news_da_1_0_0__detail">
                '.$title.'
                <div class="news_da_1_0_0__numb">
                    <img width="15" height="13" src="'.$path.'images/icon.png" alt="icon"> '.$time.'
                </div>
            </h3>
        </a>
    ';
endwhile; wp_reset_postdata(); 

// Cách 3 =>> Good
// Lấy 5 bài viết mới nhất -->

$args = array(
    'post_status' => 'publish',
    'showposts' => 10,
);

$getposts = new WP_query($args); 
global $wp_query; $wp_query->in_the_loop = true; 
while ($getposts->have_posts()) : $getposts->the_post();     
    echo'
        <a href="'.get_permalink($post->ID).'" class="sidebar_4_0_0_box_item">
            <div class="pic">
                <img class="lazy" data-src="'.get_the_post_thumbnail_url($post->ID).'" alt="'.get_the_title($post->ID).'">
            </div>
            <div class="text">'.get_the_title($post->ID).' »</div>
        </a>
    ';
endwhile; 
wp_reset_postdata();
?>
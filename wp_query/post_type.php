<?php
// Lấy bài viết liên quan
$related = get_posts( 
    array( 
        'post_type'=> 'san-pham',
        'category__in' => wp_get_post_categories($post->ID), 
        'numberposts' => 3, 
        'post__not_in' => array($post->ID) 
    ) 
);
if( $related ) foreach( $related as $key => $post ) {
    setup_postdata($post); 
    $time = get_the_date('d/m/Y');
    echo'
        <li>
            <div class="newsOther_1_0_0__pic">
                <a href="'.get_permalink().'"><img width="228" height="196" src="'.get_the_post_thumbnail_url(get_the_ID(),'thumbnail').'" alt="'.get_the_title().'"></a>
            </div>
            <div class="newsOther_1_0_0__body">
                <h3 class="newsOther_1_0_0__tt">
                    <a href="'.get_permalink().'">'.get_the_title().'</a>
                </h3>
            </div>
        </li>
    ';	
}
wp_reset_postdata(); 

// Lấy danh sách cate
$args = array(
    'post_type' => 'doi-ngu-bac-si',
    'posts_per_page' => 20, // Số lượng bài viết muốn hiển thị
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        global $post; 
        $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
        $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
        $excerpt = wp_trim_words( get_the_excerpt($post->ID), 30 );
        $comment = wp_count_comments()->approved;
        $title = get_the_title($post->ID);
        $link = get_permalink($post->ID);
        $date = get_the_date('d/m/Y');
        $degree = get_field('degree');
        $pos = get_field('pos');
        $experience = get_field('experience');
        echo '
            <div class="cateDoctor_knhd_1_0_0__item">
                <div class="cateDoctor_knhd_1_0_0__thumb">
                    <img width="245" height="244" src="'.$img.'" alt="'.$title.'">
                </div>
                <div class="cateDoctor_knhd_1_0_0__info">
                    <div class="cateDoctor_knhd_1_0_0__top">
                        <div class="cateDoctor_knhd_1_0_0__left">
                            <div class="cateDoctor_knhd_1_0_0__degree">'.$degree.'</div>
                            <h2 class="cateDoctor_knhd_1_0_0__name">
                                <a href="'.$link.'">'.$title.'</a>
                            </h2>
                        </div>
                        <div class="cateDoctor_knhd_1_0_0__year">'.$experience.' <br> năm</div>
                    </div>
                    <div class="cateDoctor_knhd_1_0_0__position">'.$pos.'</div>
                </div>
            </div>
        ';
    endwhile;
    wp_reset_postdata();
endif;
<?php
// Get description
category_description();

// Get title
single_cat_title();

// Get Term ID
$category = get_queried_object();
$category->term_id;

// Get Cate ID
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;

// Get cate name theo ID
get_the_category_by_ID( $cate1 );

// Get Categories
$categories = get_the_category();

// Get Link cate
$cat = get_the_category($post->ID);
get_category_link($cat[0]->term_id);
echo $cat[0]->name;

if ( ! empty( $categories ) ) {
    $cate_name = esc_html( $categories[0]->name );	
    $cate_link = esc_html( $categories[0]->slug );
}

// Get thumbnail
$kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');            
$img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);

// Cate list
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        global $post; 
            $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
            $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
            $date = get_the_date();
            $excerpt = wp_trim_words( get_the_excerpt($post->ID), 120 );
            echo '
                <div class="cate_4_1_0__item">
                    <div class="cate_4_1_0_box__pic">
                        <a class="cate_4_1_0__item" href="'.get_permalink($post->ID).'">
                            <img src="/rs/?w=300&h=300&src='.$img.'" alt="'.get_the_title($post->ID).'">
                        </a>
                    </div>
                    <div class="cate_4_1_0_box__sub">
                        <h2 class="sub_title">
                            <a class="cate_4_1_0__item" href="'.get_permalink($post->ID).'">
                                '.get_the_title($post->ID).'
                            </a>
                        </h2>
                        <p>'.$excerpt.'</p>
                        <span>Ngày '.$date.'</span>
                    </div>
                </div>
            ';
    endwhile;
endif;

// Loop post type
$loop = new WP_Query( 'post_type=baiduthi' );
if ( $loop -> have_posts() ) :
    while (  $loop->have_posts() ) :  $loop->the_post();
        global $post; 
            $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
            $img = ($kim[0]!='')?$kim[0]:get_template_directory_uri().'/post_placeholder.jpg';
            
            echo '
                <div class="thiSinh__item">
                    <div class="thiSinh__thumb">
                        <a href="'.get_permalink($post->ID).'" class="thiSinh__pic">
                            <img class="img-lazy" data-src="/rs?w=255&h=260&src='.get_field('chan_dung',$post->ID).'" alt="">
                            <img class="img-lazy" data-src="/rs?w=255&h=260&src='.get_field('nghieng_trai',$post->ID).'" alt="">
                            <span>'.get_field('ma_so',$post->ID).'</span>
                        </a>
                        <div class="thiSinh__like">'.get_field('vote',$post->ID).'</div>
                        <a href="'.get_permalink($post->ID).'">
                            <div class="thiSinh__name">'.get_field('ho_ten',$post->ID).'</div>
                            <div class="thiSinh__city">'.((get_field('dia_chi') != '')?esc_attr(get_field('dia_chi')) : 'Đang cập nhật').'</div>
                        </a>
                    </div>
                </div>
            ';
    endwhile;
endif;
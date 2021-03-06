<?php
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
?>
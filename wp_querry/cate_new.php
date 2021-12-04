<?php 

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
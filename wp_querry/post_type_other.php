<?php
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
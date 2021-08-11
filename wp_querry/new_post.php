<?php
    $args = array(
        'post_status' => 'publish',
        'showposts' => 0,
        'orderby' => 'desc',
        'category__not_in' => array( 150 ),
    );
    $getposts = new WP_query($args); 
    $num = 0; 
    while ($getposts->have_posts() && $num < 4) : 
        $num++;
        $getposts->the_post(); 
        $link = get_permalink();
        $title = get_the_title();
        $img = get_the_post_thumbnail_url();
        $time = get_the_date('d/m/Y');
        echo'
            <div class="sidebar_2_1_0_item-7">
                <div class="siderbar_news">
                    <div class="siderbar_news-item">
                        <div class="img">
                            <img width="90" height="82" src="'.$img.' ?>" alt="'.$title.'">
                        </div>
                        <h3 class="tt">
                            <a href="'.$link.'" class="tt-1">'.$title.'</a><br>
                        </h3>
                    </div>
                </div>
            </div>
        ';
    endwhile; wp_reset_postdata(); 
?>
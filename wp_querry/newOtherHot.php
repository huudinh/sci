<?php
    $randPosts = new WP_Query();
    $randPosts->query('tag_slug__in=tin-noi-bat&showposts=4&orderby=rand');

    while($randPosts->have_posts()) : 
        $randPosts->the_post();

        if ( has_post_thumbnail() ) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');              
        }

        $img = ($large_image_url[0]!='')?$large_image_url[0]:URLMEDIA.'/images/no-images.png';

        echo '
            <a href="'.get_the_permalink().'" title="'.get_the_title().'" class="outstandingNews_vpl_1_0_0__item">
                <img width="150" height="150" src="'.$img.'" alt="'.get_the_title().'">
                <h3 class="outstandingNews_vpl_1_0_0__title">'.get_the_title().'</h3>
            </a>
        ';
    endwhile; 
    wp_reset_query();
?>
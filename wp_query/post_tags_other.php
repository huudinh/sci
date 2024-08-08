<?php
    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);

    if ($tags) {
        $tag_ids = array();
        foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
        $args = array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 4, // Number of related posts to display.
            'caller_get_posts' => 4
        );
        $html = '';
        $my_query = new wp_query($args);
        while ($my_query->have_posts()) {
            $my_query->the_post();
            $title = get_the_title();
            $link = get_permalink();
            $time = get_post_modified_time('d/m/Y');
            $excerpt = get_the_excerpt($post->ID);

            $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
            $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
            $html .= '
                <a href="'.$link.'" class="postOther_da_1_1_0__item">
                    <div class="postOther_da_1_1_0__pic">
                        <img width="180" height="108" class="lazy" data-src="'.$img.'" alt="'.$title.'">
                    </div>
                    <div class="postOther_da_1_1_0__text">
                        <div class="postOther_da_1_1_0__title">'.$title.'</div>
                        <p class="postOther_da_1_1_0__desc">'.$excerpt.'</p>
                    </div>
                </a>
            ';
        }

        echo '
            <section class="postOther_da_1_1_0">'.$html.'</section>
        '; 
    }
    $post = $orig_post;
    wp_reset_query();
?> 
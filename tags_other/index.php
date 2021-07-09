<div class="row news_12_1_0_box">
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
                'posts_per_page' => 6, // Number of related posts to display.
                'caller_get_posts' => 6
            );

            $my_query = new wp_query($args);

            while ($my_query->have_posts()) {
                $my_query->the_post();
                $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                $img = ($kim[0] != '') ? $kim[0] : catch_that_image($post->ID);
                echo '
                    <div class="col-md-4">
                        <a href="' . get_the_permalink() . '">
                            <div class="news_12_1_0_box__pic">
                                <img src="/rs/?w=184&h=184&src=' . $img . '" alt="' . get_the_title() . '">
                            </div>
                            <h3 class="news_12_1_0_box__sub">
                                ' . get_the_title() . '
                            </h3>
                        </a>
                    </div>
                ';
            
            }
        }
        $post = $orig_post;
        wp_reset_query();
    ?>
</div>
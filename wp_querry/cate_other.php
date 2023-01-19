<?php
    $categories = get_the_category($post->ID);
    if ($categories) {
        $category_ids = array();
        foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

        $args = array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'showposts' => 6, // Số bài viết bạn muốn hiển thị.
            'caller_get_posts' => 1
        );
        $my_query = new wp_query($args);

        if ($my_query->have_posts()) {
            while ($my_query->have_posts()) {
                $my_query->the_post();
                global $post;
                $do_not_duplicate[$post->ID] = $post->ID;
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
    }
?>


<!-- Cach 2 Multil Cate -->
<?php
    $categories = 9;
    if ($categories) {
        $category_ids = 9;
        foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

        $args = array(
            'category__in' => $category_ids,
            'showposts' => 6, // Số bài viết bạn muốn hiển thị.
        );
        $my_query = new wp_query($args);

        if ($my_query->have_posts()) {
            while ($my_query->have_posts()) {
                $my_query->the_post();
                global $post;
                $do_not_duplicate[$post->ID] = $post->ID;
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
    }
?>
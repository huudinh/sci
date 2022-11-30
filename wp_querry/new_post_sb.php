<!-- Lấy 5 bài viết mới nhất -->
<?php 
    $args = array(
        'post_status' => 'publish',
        'showposts' => 5,
    );
?>
<?php $getposts = new WP_query($args); ?>
<?php global $wp_query; $wp_query->in_the_loop = true; ?>
<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
    <?php 
        echo'
            <a href="'.get_permalink($post->ID).'" class="sidebar_4_0_0_box_item">
                <div class="pic">
                    <img class="lazy" data-src="'.get_the_post_thumbnail_url($post->ID).'" alt="'.get_the_title($post->ID).'">
                </div>
                <div class="text">'.get_the_title($post->ID).' »</div>
            </a>
        ';
    ?>
<?php endwhile; wp_reset_postdata(); ?>
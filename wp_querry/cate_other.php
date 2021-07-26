<div class="row news_12_1_0_box">
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

</div>

<!-- Cach 2 -->
<?php
	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 6, 'post__not_in' => array($post->ID) ) );

	if( $related ) foreach( $related as $key => $post ) {
		setup_postdata($post); 
		$new_other .= '<div class="col-md-6"><ul><li>
							<div class="newsOther_2_0_0__pic">
								<a href="'.get_permalink().'"><img class="lazy" data-src="'.get_the_post_thumbnail_url(get_the_ID(),'thumbnail').'" alt="'.get_the_title().'"></a>
							</div>
							<div class="newsOther_2_0_0__body">
								<div class="newsOther_2_0_0__title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>
							</div>
							</li></ul></div>';	
	}
	wp_reset_postdata(); 
?>

<div class="newsOther_2_0_0">
	<div class="newsOther_2_0_0__head"><i class="icon-doc-text"></i>CÁC TIN LIÊN QUAN</div>
	<div class="row">
		<?php echo $new_other; ?>
	</div>
</div>
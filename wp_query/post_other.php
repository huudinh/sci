<?php
	$related = get_posts( 
		array( 
			'category__in' => wp_get_post_categories($post->ID), 
			'numberposts' => 4, 
			'post__not_in' => array($post->ID), 
			'orderby' => 'rand' 
			) 
		);
	if( $related ) {
		foreach( $related as $key => $post ) {
			setup_postdata($post); 
			$time = get_the_date('d/m/Y');
			$kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');            
			$img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
			echo'
				<li>
					<div class="newsOther_2_0_0__pic">
						<a href="'.get_permalink().'"><img width="80" height="80" src="'.$img.'" alt="'.get_the_title().'"></a>
					</div>
					<div class="newsOther_2_0_0__body">
						<h3 class="newsOther_2_0_0__tt">
							<a href="'.get_permalink().'">'.get_the_title().'</a>
						</h3>
						<span>Ngày '.$time.'</span>
					</div>
				</li>
			';	
		}
	}
	wp_reset_postdata(); 


	// Cách 2
	function tinkhac($cat=''){
		$my_query = new WP_Query('cat='.$cat.'&offset=0&showposts=10&orderby=rand'); 
		while ($my_query->have_posts()) : 
			$my_query->the_post(); 
			global $post;
			$do_not_duplicate[$post->ID] = $post->ID;
			$dat.='
				<li>
					<a title="'.get_the_title($post->ID).'" href="'.get_permalink($post->ID).'">
						'.get_the_title($post->ID).'
					</a>
					<span> ('. $time = get_the_time('d/m/Y', $post->ID).')</span>
				</li>';
		endwhile;
		wp_reset_query();   
		echo $dat;
	}
	tinkhac(get_query_var('cat'));

	// Cách 3
	$post_tag = $amp_helper->post_tag($post_id);
	if(!empty($post_tag)) {
		$argsRelatedPost = array(
			'tag__in' => $tag_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page' => 6, // Number of related posts to display.
			'caller_get_posts' => 6,
			'post_status' => 'publish'
		);

		$queryRelatedPost = new WP_Query($argsRelatedPost);

		if($queryRelatedPost->have_posts()) {
			?>
			<div class="post_other_3_0_0">
				<div class="post_other_3_0_0__title">Bài viết liên quan</div>
				<div class="post_other_3_0_0__box">
					<?php
					while($queryRelatedPost->have_posts()) {
						$queryRelatedPost->the_post();
						global $post;
						$postId = $post->ID;
						array_push($post_exclude, $postId);

						$title = get_the_title();
						$feature = AMP_THEMES_URL .'images/no-image/img-square.jpg';
						if(has_post_thumbnail($postId))
							$feature = wp_get_attachment_image_url(get_post_thumbnail_id($postId), 'medium');
						?>
						<article>
							<div class="post_other_3_0_0__boxPic">
								<a href="<?php echo get_the_permalink(); ?>">
									<amp-img src="<?php echo $feature; ?>" alt="<?php echo $title; ?>" width="156" height="115"></amp-img>
								</a>
							</div>
							<div class="post_other_3_0_0__boxSub">
								<h3><a href="<?php echo get_the_permalink(); ?>"><?php echo $title; ?></a></h3>
							</div>
						</article>
					<?php } ?>
				</div>
			</div>
			<?php
		}

		wp_reset_query();
	}
?>
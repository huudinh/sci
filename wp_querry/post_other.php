<?php
	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID), 'orderby' => 'rand' ) );
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
?>
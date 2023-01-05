<?php
	include(locate_template("Module/Post/newsOther_dls_1_0_0/css/newsOther_dls_1_0_0_css.php"));
?>
<div class="newsOther_dls_1_0_0">
	<div class="newsOther_dls_1_0_0__title">Bài viết liên quan</div>
	<ul>
<?php
	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID) ) );
	if( $related ) foreach( $related as $key => $post ) {
		setup_postdata($post); 
		$time = get_the_date('d/m/Y');
		echo'
			<li>
				<div class="newsOther_dls_1_0_0__pic">
					<a href="'.get_permalink().'"><img width="161" height="106" src="/rs?w=161&h=106&src='.get_the_post_thumbnail_url(get_the_ID(),'thumbnail').'" alt="'.get_the_title().'"></a>
				</div>
				<div class="newsOther_dls_1_0_0__body">
					<h3 class="newsOther_dls_1_0_0__tt">
						<a href="'.get_permalink().'">'.get_the_title().'</a>
					</h3>
					<span>Ngày '.$time.'</span>
				</div>
			</li>
		';	
	}
	wp_reset_postdata(); 
?>
	</ul>
</div>


<?php
	include(locate_template("Module/Post/projectList_dls_1_0_0/projectList_dls_1_0_0_css.php"));
?>
<div class="projectList_dls_1_0_0">
	<div class="projectList_dls_1_0_0__title">Other Products</div>
	<div class="projectList_dls_1_0_0__line"></div>
	<ul>
		<?php
		$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
		if( $related ) foreach( $related as $key => $post ) {
			setup_postdata($post); 
			$time = get_the_date('d/m/Y');
			echo'
				<li>
					<div class="projectList_dls_1_0_0__pic">
						<a href="'.get_permalink().'"><img width="360" height="225" src="'.get_the_post_thumbnail_url(get_the_ID(),'medium').'" alt="'.get_the_title().'"></a>
					</div>
					<h3 class="projectList_dls_1_0_0__tt">
						<a href="'.get_permalink().'">Aluminium Quarzite</a>
						<span>'.get_the_title().'</span>
					</h3>
				</li>
			';	
		}
		wp_reset_postdata(); 
	?>
	</ul>
</div>
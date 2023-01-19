<?php
	array(
		'key' => 'id_news_1_0_sub3',
		'label' => 'Danh sách tin',
		'name' => 'content',
		'type' => 'relationship',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'post_type' => '',
		'taxonomy' => '',
		'filters' => array(
			0 => 'search',
			1 => 'post_type',
			2 => 'taxonomy',
		),
		'elements' => array(
			0 => 'featured_image',
		),
		'min' => '',
		'max' => 4,
		'return_format' => 'id',
	),
?>

<?php
	foreach($field["content"] as $key => $post):
		setup_postdata($post);
		$link = get_permalink();
		$title = get_the_title();
		$img = get_the_post_thumbnail_url();
		$excerpt = wp_trim_words( get_the_excerpt(), 30 );
		$admin = get_the_author();
		$time = get_the_date('d/m/Y');
			if($key == 0):
				echo'
					<a href="'. $link.'" class="item">
						<div class="pic">
							<img width="559" height="335" class="lazy" data-src="'.$img.'" alt="'. $title.'">
						</div>
						<div class="sub">
							<h3>'. $title.'</h3>
							<span class="sub_time">Bác sĩ nha khoa - '.$time.'</span><br>
							<span>
								'.$excerpt.'
							</span>
						</div>
					</a>
				';
			endif;
	endforeach;
	wp_reset_postdata(); 
?>
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
	// $content = $field['content'];
	$content = get_field('content');

	foreach($content as $key => $post):
		setup_postdata($post);
		$title = get_the_title();
		$link = get_permalink();
		$img = get_the_post_thumbnail_url();
		echo "
			{
				title : '".$title."',
				link : '".$link."',
				img : '".$img."',
			},
		";
	endforeach;
	wp_reset_postdata(); 
?> 
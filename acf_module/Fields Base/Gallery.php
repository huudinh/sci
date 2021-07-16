<?php
	array(
		'key' => 'field_homeBox1',
		'label' => 'Dịch Vụ',
		'name' => 'content',
		'type' => 'gallery',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'return_format' => 'array',
		'preview_size' => 'medium',
		'insert' => 'append',
		'library' => 'all',
		'min' => '',
		'max' => '',
		'min_width' => '',
		'min_height' => '',
		'min_size' => '',
		'max_width' => '',
		'max_height' => '',
		'max_size' => '',
		'mime_types' => '',
	),
?>

<?php /* Code lấy Gallery */ ?>
<?php
	$content = $field['news_clips'];
	foreach( $content as $image ):
		$linkID = getIDvideo($image['description']);
		echo '
			<div class="news_1_0_0__newsClip__item">
				<a href="#" class="modal-clip" data-video-id="'.$linkID.'">
					<img src="/rs/?w=263&amp;h=175&amp;src='.$image['url'].'" alt="'.$image['title'].'">
				</a>
				<p>'.$image['title'].'</p>
			</div>
		';
	endforeach;
?>
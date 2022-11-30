<?php /* Tổng Hợp code Field */ ?>

<?php 
	/* Code lấy Text Field */ 
	$name = get_field( 'name' );
	echo $field['service_title'];
?>

<?php /* Code lấy Image Field */ ?>
<?php echo $field['about_ytbimage']['url']; ?>


<?php /* Code lấy Flexible-Content */ ?>
<?php
	foreach($field['cauchuyen_info'] as $key => $value):
		$image_thumb = $value['image_thumb'];
		if($key == 1):
			$active = 'active';
		else:
			$active = '';
		endif;
		echo'
			<a class="tab" href="#t1'.$key.'">
				<img class="img-lazy '.$active.'" data-src="'.$image_thumb['url'].'" alt="'.$image_thumb['alt'].'">
			</a>
		';
	endforeach;
?>


<?php /* Code lấy Relationship */ ?>
<?php
	foreach($field['content'] as $key => $post):
		setup_postdata($post);
		$link = get_permalink();
		$title = get_the_title();
		$img = get_the_post_thumbnail_url();
		if($key == 0):
			echo'
				<div class="col-md-6">
					<a class="home5Big" href="'.$link.'">
						<div class="home5Big__pic">
							<img src="/rs/?w=480&h=320&src='.$img.'" alt="'.$title.'">
						</div>
						<div class="home5Big__ct">
							<p>'.$title.'</p>
							<div class="home5__more home5__more1 btn">
								xem ngay
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-6">
			';
		else:
			echo '
				<a class="home5List media" href="'.$link.'">
					<div class="home5List__pic">
						<img src="/rs/?w=215&h=144&src='.$img.'" alt="'.$title.'">
					</div>
					<div class="media-body home5List__ct ">
						<p>'.$title.'</p>
						<div class="home5__more home5__more2 btn">đọc thêm</div>
					</div>
				</a>
			';

		endif;

	// endforeach;
	// wp_reset_postdata(); 
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


<?php
$data = explode("|",  $field["title"]);
echo $main_tt[0]
?>

<?php /* Loại bỏ khoang trang */ ?>
<?php
// $data_link = substr("$data[1]", 0,-1);
?>
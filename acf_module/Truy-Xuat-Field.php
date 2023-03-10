<?php /* Tổng Hợp code Field */ ?>

<?php 
	// Get Field basic
	$product_info = get_field('product_info');

	/* Code lấy Field Module */ 
	echo $field['service_title'];

	// Lấy Field Select từ Cate
	$cate_group = get_field( 'cate_group', 'category_'.$ID );

	// Lấy Field từ Author
	$author_id = get_the_author_meta('ID');
    $author_field = get_field('author_info', 'user_'. $author_id );

	// Lấy field Image từ cate
	$img = get_field( 'img_thumb', 'category_'.$ID );

	// Get field option
	$images = get_field('setting_post_kh','option');
	$max = count($images);
	$rand = rand(0,$max-1);
	echo $images[$rand]['url'];

	// Chuyển string sang array
	$data = explode("|",  $field["title"]);
	$data = explode("\n",  $field["title"]);
	echo $data[0]

	/* Loại bỏ khoang trang */ 
	$data_link = substr("$data[1]", 0,-1);

	// Loop ảnh từ Gallery
	$content = get_field( 'single_photo' );
	foreach( $content as $image ):
		echo "
			{
				pic: '".$image['url']."',
				name: '".$image['title']."',
				des: '".$image['description']."',
			},
		";
	endforeach;

	/* Code lấy Gallery Video */
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

	/* Code lấy Image Field */
	echo $field['about_ytbimage']['url'];

	/* Code lấy Flexible-Content */
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

	/* Code lấy Relationship */
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
	endforeach;
	wp_reset_postdata(); 

	// Get Field Custom Post
	$args = array( 
        'post_status'=>'publish',
        'post_type' => 'tuyen-dung', 
        'posts_per_page' => -1,
        'order' => 'DESC',
    );
    
    $loop = new WP_Query( $args );
    
    if($loop->have_posts()):
        echo '
            <script>
                const data = [
        ';

        while ( $loop->have_posts() ) : 
            $loop->the_post();
            $link = get_permalink($post->ID);
            $title = get_the_title($post->ID);
            $name = get_field( 'name' );
            $deadline = get_field( 'deadline' );
            $department = get_field( 'department' );
            $location = get_field( 'location' );
            
            if($name){
                echo '
                    {
                        name: "'. $name.'",
                        link: "'.$link.'",
                        deadline: "'.$deadline.'",
                        department: "'.$department.'",
                        location: "'.$location.'",
                    },
                ';
            }
        endwhile;
        echo ' ]; </script>';
    endif; 
    wp_reset_postdata(); 
?>
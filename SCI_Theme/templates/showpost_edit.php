<?php 
/* Template Name:Danh Sách Post Edit 
* Template Post Type: page
*/

	get_header();
	
	if (!is_user_logged_in()) {
		header("HTTP/1.1 301 Moved Permanently"); 
		header("Location: /"); 
		exit();
  	}else{

?>
	<div class="container siteMain">
		<div class="row">
			<div class="col-lg-12">
				<main>
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div class="breadcrumb"><p id="">','</p></div>');} ?>
					<div class="cateInfo" style="margin-bottom:0">
						<?php
							echo '<h1 class="siteTitle">' . get_the_title( $post->ID ) . '</h1>';
							echo '<div class="cateInfo-desc">'.get_the_content($post->ID).'</div>';
						?>
					</div>
					<div class="cateMain">
						<table class="list-unstyled cateList table table-bordered table-striped">

						<?php 
							global $paged;
						 
							$the_query = new WP_Query( array(
								'orderby'=> 'modified',
								'order' => 'DESC',
								'post_type' => 'post',
								'paged' => $paged,
								'post_status' => 'publish',
								'ignore_sticky_posts'   => '1',
								// 'meta_key' => 'event_date',
								'posts_per_page' => 50
							 ));
							
							
							$i=1;
							while ($the_query -> have_posts()) : $the_query -> the_post();
								$pagenum = ($paged == 0)?1:$paged;
								$number = ($pagenum - 1) * 50 + $i;
								$kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
								$img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
								$i++ ;
						?>
								<tr>
									<td><?php echo $number; ?></td>
									<?php 
										
									?>
									<td>
										<div class="media-title"><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></div>
										<div class="author" style="font-size:13px;">
											<span>Tác giả: </span> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><strong style="color: #5c5cba; font-size: 12px"> <?php echo the_author_nickname(); ?></strong></a> | Ngày đăng: <?php echo get_the_time('d/m/Y'); ?> | Lần cập nhật cuối: <?php echo get_post_modified_time('d/m/Y') ?> - Bởi <b style="color:#f26649"><?php echo get_the_modified_author(); ?></b>
											</div>
									</td>
								</tr>
						
						<?php 
						endwhile;
						?>

						<?php

							
						?>
						</table>
						<div class="pagination_1_0_0">
							<?php
								if (function_exists("pagination")) {
										pagination($the_query->max_num_pages,2);
									}
							?>
						</div>
						<style>
							.pagination_1_0_0 {
								text-align: center
							}
							
							.pagination_1_0_0 .page_nav {
								padding-left: 0
							}
							
							.pagination_1_0_0 .wp-pagenavi {
								display: flex;
								justify-content: center
							}
							
							.pagination_1_0_0 .wp-pagenavi .pages {
								margin: 0 20px 0 0;
								line-height: 30px
							}
							
							.pagination_1_0_0 .wp-pagenavi .current {
								background: #004689;
								color: #fff
							}
							
							.pagination_1_0_0 .wp-pagenavi .current,
							.pagination_1_0_0 .wp-pagenavi a {
								border: 1px solid #004689;
								width: 30px;
								height: 30px;
								display: block;
								line-height: 30px;
								margin: 0 5px
							}
						</style>
					</div>
				</main>
			</div>
			<!-- <div class="col-lg-3">
				<?php //get_sidebar(); ?>
			</div> -->
		</div>
	</div>

<?php  get_footer(); } ?>
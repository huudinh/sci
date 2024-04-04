<!-- 1. Hiển thị ảnh sản phẩm -->

<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );?>
       
<div class="thumbnail">
    <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
</div>
<style>
	.thumbnail img{width: 100%;}
</style>

<!-- 2. Check pages -->
<?php echo ( get_query_var('paged') ? ' ' : '<a id="show-more">Xem thêm</a>' ) ?>
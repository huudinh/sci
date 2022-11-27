<?php 
	/* Template Name: Page Doctor
	* Template Post Type: page */       
?>
<?php get_header(); ?>
<div class="layout_1_0_0">
	<div style="background: #f5f5f5">
		<div class="container">
			<?php get_template_part('Module/Post/breadcrumb_1_0_0/breadcrumb_1_0_0'); ?>
		</div>
	</div>
		<?php get_template_part('Module/filter_template'); ?>
	</div>
	<?php get_template_part('Module/Post/post_regist_2_0_0/post_regist_2_0_0'); ?>
<?php get_footer(); ?>
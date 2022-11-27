<?php get_header(); ?>


<main class="container">
    <div class="row">
        <div class="col-lg-9">
            <?php get_template_part('Module/Category/breadcrumb_1_0_1/breadcrumb_1_0_1'); ?>
            <?php get_template_part('Module/Post/post_1_0_1/post_1_0_1'); ?>
            <?php get_template_part('Module/Post/post_new_other_2_1_0/post_new_other_2_1_0'); ?>
        </div>
        <div class="col-lg-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
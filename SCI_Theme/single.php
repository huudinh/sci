<?php get_header(); ?>

<main class="container">
    <div class="main_dls_1_0_0__post row">
        <div class="col-xl-2">
            <?php get_sidebar(); ?>
        </div>
        <div class="col-xl-10">
            <?php get_template_part('Module/Post/product_dls_1_0_0/product_dls_1_0_0'); ?>
            <?php get_template_part('Module/Post/newsOther_dls_1_0_0/newsOther_dls_1_0_0'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
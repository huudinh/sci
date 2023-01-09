<?php get_header(); ?>

<?php
    $category = get_queried_object();
    $category_id = $category->term_id;

    $typecate = get_field('cate_type', 'category_'.$category_id);

    if ($typecate == 'default'):
        get_template_part('Module/Category/prodcate_dls_1_0_0/prodcate_dls_1_0_0');
    endif;

    if (($typecate == 'brand') || ($typecate == '') || ($typecate == 'new_2')):
        get_template_part('Module/Category/brandcate_dls_1_0_0/brandcate_dls_1_0_0');
    endif;
?>

<?php get_footer(); ?>


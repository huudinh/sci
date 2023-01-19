<style>
    .prodcate_dls_1_0_0{padding:40px 0 20px 0;font-family:var(--primary-font);font-weight:600}.prodcate_dls_1_0_0__photo{gap:20px;margin:20px 0;text-align:center;display:grid;grid-template-rows:auto auto;grid-template-columns:auto auto}.prodcate_dls_1_0_0__title{position:relative;font-weight:700;font-size:18px;margin:20px 0;text-transform:uppercase}.prodcate_dls_1_0_0__name{font-weight:600;color:#fff}.prodcate_dls_1_0_0__des{color:#777}.prodcate_dls_1_0_0__pic{background-color:#ccc;overflow:hidden;margin:10px 0 15px}.prodcate_dls_1_0_0__pic img{width:100%;height:auto;display:block;transition:all .2s linear}.prodcate_dls_1_0_0__pic:hover img{filter:grayscale(0);transform:scale(1.05)}@media(max-width: 1180px){.prodcate_dls_1_0_0{padding:20px 0 20px 0}}
</style>

<main class="container">
    <div class="main_dls_1_0_0__post row">
        <div class="col-xl-2">
            <?php get_sidebar(); ?>
        </div>
        <div class="col-xl-10">
            <section class="prodcate_dls_1_0_0 ">
                <div class="prodcate_dls_1_0_0__box">
                    <h1 class="prodcate_dls_1_0_0__title">
                        <?php echo single_cat_title() ?>
                    </h1>
                    <div class="prodcate_dls_1_0_0__content">
                        <?php echo category_description(); ?>
                    </div>
                    <div class="prodcate_dls_1_0_0__photo">
                        <?php
                            if ( have_posts() ) :
                                while ( have_posts() ) : the_post();
                                    global $post; 
                                        $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');            
                                        $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
                                        $date = get_the_date();
                                        $excerpt = wp_trim_words( get_the_excerpt($post->ID), 120 );
                                        $description = get_field( 'description' );
                                        echo '
                                            <a href="'.get_permalink($post->ID).'" class="prodcate_dls_1_0_0__item">
                                                <div class="prodcate_dls_1_0_0__pic">
                                                    <img src="'.$img.'" alt="'.get_the_title($post->ID).'">
                                                </div>
                                                <div class="prodcate_dls_1_0_0__name">'.get_the_title($post->ID).'</div>
                                                <div class="prodcate_dls_1_0_0__des">'.$description.'</div>
                                            </a>
                                        ';
                                endwhile;
                            endif;
                        ?>
                    </div>
                    <?php get_template_part('Module/Category/pagination_dls_1_0_0/pagination_dls_1_0_0'); ?>
                </div>
            </section>
        </div>
    </div>
</main>
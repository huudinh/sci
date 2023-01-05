<?php
    $path = get_template_directory_uri();
    $path = $path.'/Module/Post/post_1_1_0';

	include(locate_template("Module/Post/post_1_1_0/css/post_1_1_0_css.php"));
    $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');            
    $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
    $product_info = explode("\n", get_field('product_info'));
?>

<div class="post_1_1_0">
    <div class="post_1_1_0__content">
        <div class="post_1_1_0__top">
            <div class="post_1_1_0__pic">
                <img width="400" height="400" src="<?php echo $img ?>" alt="<?php the_title() ?>">
            </div>
            <div class="post_1_1_0__info">
                <h1 class="post_1_1_0__title"><?php the_title(); ?></h1>
                <div class="post_1_1_0__des">
                    <?php
                        echo '
                            <p>'.$product_info[0].'</p>
                            <p>'.$product_info[1].'</p>
                            <p>'.$product_info[2].'</p>
                        ';
                    ?>
                </div>
                <div class="post_1_1_0__price">
                    <?php echo $product_info[3] ?>
                </div>
                <div class="post_1_1_0__buy">
                    <a href="/lien-he/">Liên Hệ</a>
                </div>

            </div>

        </div>
        <div class="post_1_1_0__titleSub">MÔ TẢ SẢN PHẨM</div>
        <div class="post_1_1_0__detail">
            <?php 
                while ( have_posts() ) : 
                    the_post(); 
                    the_content();  
                endwhile; 
            ?>            

        </div>
    </div>
</div>
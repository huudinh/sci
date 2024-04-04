<?php
    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
    );
?>
<?php $args = array( 'post_type' => 'product','posts_per_page' => 10,'ignore_sticky_posts' => 1, 'tax_query' => $tax_query); ?>
<?php $getposts = new WP_query( $args);?>
<?php global $wp_query; $wp_query->in_the_loop = true; ?>
<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
<?php global $product; ?>
    <div class="product_bee_1_0_0__item">
        <a class="product_bee_1_0_0__pic" href="<?php the_permalink(); ?>">
            <?php $url = get_the_post_thumbnail_url(get_the_ID(), 'thumnail', array( 'class' =>'thumnail') ); ?>
            <img width="300" height="300" alt="<?php the_title(); ?>" src="<?php echo $url ?>" />
        </a>
        <h2 class="product_bee_1_0_0__content"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="product_bee_1_0_0__des"><?php echo $product->get_price_html(); ?></div>
        <!-- <a href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>">Thêm vào giỏ</a> -->
    </div>
<?php endwhile; wp_reset_postdata(); ?>
                



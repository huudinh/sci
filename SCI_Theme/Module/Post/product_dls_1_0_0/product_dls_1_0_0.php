<?php
    $path = get_template_directory_uri();
    $path = $path.'/Module/Post/product_dls_1_0_0/';

	include(locate_template("Module/Post/product_dls_1_0_0/sass/product_dls_1_0_0_css.php"));
    $categories = get_the_category();

    $content = get_field( 'single_photo' );    
?>
<script src="<?php echo get_template_directory_uri() ?>/Module/assets/js/tiny-slider.min.js"></script>

<div class="product_dls_1_0_0">
    <h1 class="product_dls_1_0_0__title">
        <?php 
            if ( ! empty( $categories ) ) {
                echo esc_html( $categories[0]->name );	
            }
        ?>
    </h1>
    <div class="product_dls_1_0_0__photo" style="position: relative;">
        <div class="slider_pro" id="slider_pro">
            <?php 
                foreach( $content as $image ):
                    echo "
                        <div>
                            <img src='".$image['url']."' alt='".$image['title']."'>
                        </div>
                    ";
                endforeach;
            ?>
        </div>
        <ul class="controls" id="slider-contPro">
            <li class="prev">
                <span aria-label="Previous">‹</span>
            </li>
            <li class="next">
                <span aria-label="Next">›</span>
            </li>
        </ul>
    </div>
    <div class="product_dls_1_0_0__photoList">
        <ul class="slider_navpro" id="slider_navpro">
            <?php 
                foreach( $content as $image ):
                    echo "
                        <li>
                            <img src='".$image['url']."' alt='".$image['title']."'>
                        </li>
                    ";
                endforeach;
            ?>
        </ul>
        <ul class="controls" id="slider-contPro2">
            <li class="prev">
                <span aria-label="Previous"><img src="<?php echo $path ?>images/prev.png" /></span>
            </li>
            <li class="next">
                <span aria-label="Next"><img src="<?php echo $path ?>images/next.png" /></span>
            </li>
        </ul>

    </div>
    <h2 class="product_dls_1_0_0__titleSub"><?php the_title(); ?></h2>
    <div class="product_dls_1_0_0__detail">
        <?php 
            while ( have_posts() ) : 
                the_post(); 
                the_content();  
            endwhile; 
        ?>             
    </div>
</div>
<script>
    // Slide Pro
    var slider_pro = tns({
        container: '.slider_pro',
        items: 1,
        controlsContainer: '#slider-contPro',
        navContainer: '#slider_navpro',
        navAsThumbnails: true,
        autoplay: false,
        autoplayTimeout: 1000,
        gutter: 10,
    });
    var slider_navpro = tns({
        container: '.slider_navpro',
        items: 3,
        controlsContainer: '#slider-contPro2',
        slideBy: 'page',
        autoplay: false,
        loop:true,
        mouseDrag: true,
        lazyload: true,
        lazyloadSelector: '.tns-lazy',
        gutter: 10,
        nav:false,
    
    });
</script>
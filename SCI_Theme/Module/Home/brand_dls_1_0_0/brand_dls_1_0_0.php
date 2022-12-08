<?php
    if($check == 0){
        include(locate_template("Module/Home/brand_dls_1_0_0/sass/brand_dls_1_0_0_css.php")); 
    }
    add_action( 'theme_js', 'brand_dls_1_0_0' );
    function brand_dls_1_0_0(){
        echo "
            <script>
                var slide_step = tns({
                    container: '#slide_step',
                    items: 3,
                    controlsContainer: '#slide_stepControl',
                    navAsThumbnails: true,
                    autoplay: false,
                    autoplayTimeout: 1000,
                    autoplayButton: '#customize-toggle',
                    gutter: 10,
                    nav:false,
                    responsive: {
                    0: {
                        items: 1,
                    },
                    820: {
                        items: 3,
                    }
                },
                });
            </script>
        ";
    }
?>
<section class="brand_dls_1_0_0 ">
    <div class="container">
        <div class="main_dls_1_0_0__title fadeInUp load"><?php echo $field['brand_title'] ?></div>
        <div class="main_dls_1_0_0__line fadeInUp load"></div>
        <div class="brand_dls_1_0_0__content fadeInUp load" style="position: relative;">
            <div class="slide_step" id="slide_step">
                <?php 
                    $content = $field['slider'];
                    foreach( $content as $key => $image ):
                        if($key % 2 == 0){echo '<div>';} 
                        echo '
                            <p><a href="'.$image['description'].'"><img src="'.$image['url'].'" alt=""></a></p>
                        ';
                        if($key % 2 != 0){echo '</div>';}
                    endforeach;
                ?>
            </div>
            <ul class="controls " id="slide_stepControl">
                <li class="prev">
                    <span aria-label="Previous"></span>
                </li>
                <li class="next">
                    <span aria-label="Next"></span>
                </li>
            </ul>
        </div>
        <a href="/brands/" class="brand_dls_1_0_0__more fadeInUp load">VIEW ALL</a>
    </div>
</section>

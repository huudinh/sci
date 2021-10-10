<?php
    if($check == 0){
        include(locate_template("Module/Home/slider_1_0_2/css/slider_1_0_2_css.php"));
        
        add_action( 'theme_js', 'slide_1_0_2_js' );
        function slide_1_0_2_js(){
            echo "
                <script>
                    var customize2 = tns({
                        container: '.slide_thumb2',
                        items: 1,
                        navAsThumbnails: true,
                        autoplay: true,
                        mouseDrag: true,
                        touch: true,
                        loop: true,
                        autoplayTimeout: 8000,
                        gutter: 10,
                    });
                </script>
            ";
        }
    }
?>

<?php
    if($field_data->acf_fc_layout == 'slider_1_0_2'):
        $slider_pc = $field_data->slide_pc;
        $slider_mobile = $field_data->slide_mb;
        echo '<section class="slider_1_0_2"><div class="slide_thumb2">';
        foreach($slider_pc as $key => $value):
            echo '<a href="'.$value->description.'" class="slider_1_0_2_item">
                <picture>
                    <source width="1920" height="382" media="(min-width:600px)" srcset="'.$value->url.'">
                    <img width="414" height="265" src="'.$slider_mobile[$key]->url.'" alt="'.$value->alt.'" title="'.$value->title.'">
                </picture>
            </a>';
        endforeach;
        echo '</div></section>';
    endif;
?>        
<div class="container">
    <div class="service_3_1_0">
        <h1 class="service_3_1_0__title"><?php echo single_cat_title() ?></h1>
        <div class="service_3_1_0__box">
        <?php
            $category = get_queried_object();
            $category_id = $category->term_id;
            $args = array('child_of' =>  $category_id);
            $categories = get_categories( $args );

            foreach($categories as $category) { 
                $img = $category->description;
                if (!$img){
                    $img = '<img width="359" height="359" src="/rs/?w=359&h=359&src=/wp-content/themes/SCI_Theme/Module/media/images/no-image.png" alt="'.$category->name.'">';
                }
                echo '
                    <a class="service_3_1_0_item" href="'.get_category_link( $category->term_id ).'">
                        '. $img.'
                        <h2 class="service_3_1_0_content">
                            '.$category->name.' ('.$category->count.')
                        </h2>
                    </a>
                ';
            }
        ?>
        </div>
    </div>
</div>
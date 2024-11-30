
<?php
    $tags = get_tags();
    // var_dump($tags);
    $path = get_template_directory_uri().'/Module/Home/topic_knhd_1_0_0/';
    if($tags && is_front_page()):
?>

<style>
    <?php include(locate_template("Module/Home/topic_knhd_1_0_0/sass/topic_knhd_1_0_0.min.css"));  ?>
</style>

<section class="topic_knhd_1_0_0">
    <div class="topic_knhd_1_0_0__head">Chủ đề được quan tâm</div>
    <div class="topic_knhd_1_0_0__box">
        <div class="topic_knhd_1_0_0__arrow topic_knhd_1_0_0__arrow--1">
            <img width="10" height="10" src="<?php echo $path ?>images/icon-left.svg" alt="">
        </div>
        <div class="topic_knhd_1_0_0__list">
            <div class="topic_knhd_1_0_0__scroll">               
                <?php                    
                    foreach ($tags as $tag) {
                        $view = get_field('tag_check', $tag); // Assuming 'tag_check' is related to the tag
                        // var_dump($view);
                    
                        if ($view[0] == 'home') {
                            echo '<a class="topic_knhd_1_0_0__item" href="/hoi-dap/tag/' . $tag->slug . '/">' . $tag->name . '</a>';
                        }
                    }                    
                ?>
            </div>
        </div>
        <div class="topic_knhd_1_0_0__arrow topic_knhd_1_0_0__arrow--2">
            <img width="10" height="10" src="<?php echo $path ?>images/icon-left.svg" alt="">
        </div>
    </div>
</section>

<script>
    <?php include(locate_template("Module/Home/topic_knhd_1_0_0/js/topic_knhd_1_0_0.min.js"));  ?>
</script>

<?php endif; ?>


<?php 
    if(is_single()):
?>
<style>
    <?php include(locate_template("Module/Home/topic_knhd_1_0_0/sass/topic_knhd_1_0_0.min.css"));  ?>
</style>

<section class="topic_knhd_1_0_0">
    <div class="topic_knhd_1_0_0__head topic_knhd_1_0_0__post" >Tags:</div>
    <div class="topic_knhd_1_0_0__box">
        <div class="topic_knhd_1_0_0__arrow topic_knhd_1_0_0__arrow--1">
            <img width="10" height="10" src="<?php echo $path ?>images/icon-left.svg" alt="">
        </div>
        <div class="topic_knhd_1_0_0__list">
            <div class="topic_knhd_1_0_0__scroll">               
                <?php
                    $tags = get_the_tags();
                    if ($tags) {
                        foreach ($tags as $tag) {
                            echo '<a class="topic_knhd_1_0_0__item" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                        }
                    }
                ?>
            </div>
        </div>
        <div class="topic_knhd_1_0_0__arrow topic_knhd_1_0_0__arrow--2">
            <img width="10" height="10" src="<?php echo $path ?>images/icon-left.svg" alt="">
        </div>
    </div>
</section>

<script>
    <?php include(locate_template("Module/Home/topic_knhd_1_0_0/js/topic_knhd_1_0_0.min.js"));  ?>
</script>


<?php 
    endif;
?>
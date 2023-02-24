<?php 
    if($check == 0){
        include(locate_template("Module/Home/about_dls_1_0_0/sass/about_dls_1_0_0_css.php"));
    }
?>
<section class="about_dls_1_0_0 ">
    <div class="container">
        <div class="main_dls_1_0_0__title fadeInUp load"><?php echo $field["about_title"] ?></div>
        <div class="main_dls_1_0_0__line fadeInUp load"></div>
        <div class="about_dls_1_0_0__content fadeInUp load">
            <?php echo $field["about_content"] ?>
        </div>
    </div>
</section>
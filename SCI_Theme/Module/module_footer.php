<?php    
    $module_id =  get_option('mfpd_option_name');
    $path = get_template_directory_uri();
    $arrcheck = array();

    $url = get_site_url().'/wp-json/acf/v3/pages/';
    $page_json = json_decode(file_get_contents($url.$module_id.'/group_page_field/'));

    foreach($page_json->group_page_field->footer_custom as $field): 

        if($field->acf_fc_layout == 'footer'): 
            foreach($field->footer_sub_fields as $footer_data): 

                $name = $footer_data->acf_fc_layout;
            
                if(in_array($name,$arrcheck)){
                    $check = 1;
                }else{
                    array_push($arrcheck,$name);
                    $check = 0;
                }
                include(locate_template('template-footer/content-'.$name.'.php'));	
            endforeach;
        endif;
    endforeach;
?>



<?php include(locate_template('media/js/lib-min.php')); ?>
<?php include(locate_template('media/js/tiny-slider-min.php')); ?>
<?php do_action( 'theme_js' ); ?>
<script>
// add Img Lazy Demo
// addImgDefault('img.lazy','src');
// addImgDefault('source.lazy','srcset');

window.addEventListener("scroll", function () { 
    // Add Onscroll .menu a
    onScroll();
    // Add Lazy Screen LDP
    myLoad('section','loaded');
    myLoad('.slide_run','slide');
    myLazy('img.lazy','src');
    myLazy('source.lazy','srcset');
    myLazy('.lazy-bg','img-bg');
}); 
autoLazy('section','loaded');
autoLazy('.slide_run','slide');
autoLazy('img.lazy','src');
autoLazy('source.lazy','srcset');
autoLazy('.lazy-bg','img-bg');
</script>


<?php get_template_part('Module/Popup/popup_call_1_1_0/popup_call_1_1_0'); ?>
<?php get_template_part('Module/Popup/regist_ft_1_0_0/regist_ft_1_0_0'); ?>
<?php get_template_part('Module/Popup/popup_regist_1_0_8/popup_regist_1_0_8'); ?>
<?php get_template_part('Module/Popup/popup_regist_1_0_1/popup_regist_1_0_1'); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/media/js/jquery.min.js"></script>
<!-- <script src="/quangcao247/contact/template/js/js.js?t=11235"></script> -->
<?php get_template_part('Module/Other/checking_site_1_0_0/checking_site_1_0_0'); ?>
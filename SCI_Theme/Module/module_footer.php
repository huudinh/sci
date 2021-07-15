<?php    
$module_id =  get_option('mfpd_option_name');

// Json Build
// $json = new BuildJson;
// $page_json = json_decode($json->read('page-'.get_the_ID()));
$filename = 'https://nhakhoaparis.vn/wp-json/acf/v3/pages/'.$module_id.'/page_field/';
$data = file_get_contents($filename);
$page_json = json_decode($data);

$page_field = get_field('page_field',$module_id);
// Đường dẫn đến theme
$path = get_template_directory_uri();
$arrcheck = array();
$css_inline = '';
$js_inline = '';

foreach($page_field as $field_0):
    foreach($field_0 as $field_1):
        foreach($field_1 as $field):
            $name = $field['acf_fc_layout'];

            if(in_array($name,$arrcheck)){
                $check = 1;
            }else{
                array_push($arrcheck,$name);
                $check = 0;
            }
            include(locate_template('template-footer_v2/content-'.$name.'.php'));
        endforeach;
    endforeach;
endforeach;
echo $css_inline;
?>



<?php include(locate_template('media/js/lib-min.php')); ?>
<?php include(locate_template('media/js/tiny-slider-min.php')); ?>
<?php do_action( 'theme_js' ); ?>
<script>
// add Img Lazy Demo
addImgDefault('img.lazy','src');
addImgDefault('source.lazy','srcset');

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

<?php //get_template_part('Module_v2/Popup/messenger_1_0_0/messenger_1_0_0'); ?>
<?php //get_template_part('Module_v2/Popup/popup_person_1_0_0/popup_person_1_0_0'); ?>
<?php get_template_part('Module_v2/Popup/popup_call_1_1_0/popup_call_1_1_0'); ?>
<?php get_template_part('Module_v2/Popup/regist_ft_1_0_0/regist_ft_1_0_0'); ?>
<?php get_template_part('Module_v2/Popup/popup_regist_1_0_8/popup_regist_1_0_8'); ?>
<?php get_template_part('Module_v2/Popup/popup_regist_1_0_1/popup_regist_1_0_1'); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/core_v2/js/jquery.min.js"></script>
<script src="/quangcao247/contact/template/js/js.js?t=11235"></script>
<?php get_template_part('Module_v2/Other/checking_site_1_0_0/checking_site_1_0_0'); ?>
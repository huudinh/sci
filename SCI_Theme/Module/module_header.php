<?php
    $module_id =  get_option('mfpd_option_name');
    $page_field = get_field('group_page_field',$module_id);
    // Đường dẫn đến theme
    $arrcheck = array();
    $css_inline = '';
    $js_inline = '';
    if (!empty($page_field)){
        foreach($page_field as $field_0){
            if (!empty($field_0)){
                foreach($field_0 as $field){
                    $name = $field['acf_fc_layout'];
                    if($name == 'header_dls_1_0_0'){
                        if(in_array($name,$arrcheck)){
                            $check = 1;
                        }else{
                            array_push($arrcheck,$name);
                            $check = 0;
                        }
                        include(locate_template('template-parts/content-'.$name.'.php'));
                    }
                }
            }
        }
    }
?>
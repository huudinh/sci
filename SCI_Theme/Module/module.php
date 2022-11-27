<?php
    $page_field = get_field('group_page_field');
    // Đường dẫn đến theme
    $path = get_template_directory_uri();
    $arrcheck = array();
    $css_inline = '';
    $js_inline = '';
    $view = '';
    if(!empty($page_field)){
        foreach($page_field as $field_0){
            if(!empty($field_0)){
                foreach($field_0 as $field){
                    $name = $field['acf_fc_layout'];
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
?>
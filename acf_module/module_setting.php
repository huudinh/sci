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
                    if($name == 'sidebar_vpl_1_0_0'){
                        if(in_array($name,$arrcheck)){
                            $check = 1;
                        }else{
                            array_push($arrcheck,$name);
                            $check = 0;
                        }
                        include(locate_template('template-parts/content-'.$name.'.php'));
                    }
                    if($name == 'banner_vpl_1_0_0'){
                        $info = explode("\n", $field["info"]);
                        $title = substr("$info[0]", 0,-1);
                        $img = substr("$info[1]", 0,-1);
                        $link = substr("$info[2]", 0, 1);
                        echo '
                            <script>
                                document.getElementById("banner_vpl_1_0_0_img").src = "'.$img.'";
                                document.getElementById("banner_vpl_1_0_0_img").alt = "'.$title.'";
                            </script>
                        ';
                        
                    }
                }
            }
        }
    }
?>
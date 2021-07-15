<?php
    $path = get_template_directory_uri();
    $arrcheck = array();
    $url = 'https://tuyendung.benhvienthammydonga.vn/wp-json/acf/v3/pages/';

    $page_json = json_decode(file_get_contents($url.get_the_ID().'/page_field/'));

    foreach($page_json->page_field as $field): 
        foreach($field as $field_sub): 
            foreach($field_sub as $field_data): 
                $name = $field_data->acf_fc_layout;

                if(in_array($name,$arrcheck)){
                    $check = 1;
                }else{
                    array_push($arrcheck,$name);
                    $check = 0;
                }
                include(locate_template('template-parts_v2/content-'.$name.'.php'));
            endforeach;
        endforeach;
    endforeach;    

?>
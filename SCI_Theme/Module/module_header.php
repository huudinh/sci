<?php 
    $module_id =  get_option('mfpd_option_name');
    $path = get_template_directory_uri();
    $arrcheck = array();

    $url = get_site_url().'/wp-json/acf/v3/pages/';
    $page_json = json_decode(file_get_contents($url.$module_id.'/group_page_field/'));
    
    foreach($page_json->group_page_field->header_custom as $field): 
        if($field->acf_fc_layout == 'header'): 
            foreach($field->header_sub_fields as $header_data): 

                $name = $header_data->acf_fc_layout;
               
                if(in_array($name,$arrcheck)){
                    $check = 1;
                }else{
                    array_push($arrcheck,$name);
                    $check = 0;
                }
                include(locate_template('template-header/content-'.$name.'.php'));	
            endforeach;
        endif;
    endforeach;
?>
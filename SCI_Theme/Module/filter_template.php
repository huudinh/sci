<?php
    $path = get_template_directory_uri();
    $arrcheck = array();
    $url = get_site_url().'/wp-json/acf/v3/pages/';

    $apiUrl = $url.get_the_ID().'/group_page_field/';
    $response = wp_remote_get($apiUrl);
    $responseBody = wp_remote_retrieve_body( $response );
    $page_json = json_decode( $responseBody );

    foreach($page_json->group_page_field->body_custom as $field): 
        foreach($field as $field_sub): 
            foreach($field_sub as $field_data): 
                $name = $field_data->acf_fc_layout;
               
                if(in_array($name,$arrcheck)){
                    $check = 1;
                }else{
                    array_push($arrcheck,$name);
                    $check = 0;
                }
                include(locate_template('template-parts/content-'.$name.'.php'));	
            endforeach;
        endforeach;
    endforeach;
?>
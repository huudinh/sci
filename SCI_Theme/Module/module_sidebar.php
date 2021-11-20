<?php 
    $module_id =  get_option('mfpd_option_name');
    $path = get_template_directory_uri();
    $arrcheck = array();
    $categories = get_the_category();
	$category_id = $categories[0]->cat_ID;

    //Get Data Page Config
    $url = get_site_url().'/wp-json/acf/v3/pages/';
    $apiUrl = $url.$module_id.'/group_page_field/';
    $response = wp_remote_get($apiUrl);
    $responseBody = wp_remote_retrieve_body( $response );
    $page_json = json_decode( $responseBody );

    //Get Data Cate
    $url_cate = get_site_url().'/wp-json/acf/v3/categories/'.$category_id;
    $response_cate = wp_remote_get($url_cate);
    $responseBody_cate = wp_remote_retrieve_body( $response_cate );
    $sidebar_cate = json_decode( $responseBody_cate );
    
    //Check
    if (in_array('show_module_sidebar', $sidebar_cate->acf->group_admin)):
        $page_json = $sidebar_cate->acf;
    else:
        $page_json = $page_json;
    endif; 
    
    // Loop Read Data
    foreach($page_json->group_page_field->sidebar_custom as $field): 
        if($field->acf_fc_layout == 'sidebar'): 
            foreach($field->sidebar_sub_fields as $field_data): 
                $name = $field_data->acf_fc_layout;
               
                if(in_array($name,$arrcheck)){
                    $check = 1;
                }else{
                    array_push($arrcheck,$name);
                    $check = 0;
                }
                if($name = 'sidebar_2_1_0'):
                    include(locate_template('Module/Post/sidebar_2_1_0/sidebar_2_1_0.php'));	
                endif;
            endforeach;
        endif;
    endforeach;
?>
<?php 
    $module_id =  get_option('mfpd_option_name');
    $path = get_template_directory_uri();
    $arrcheck = array();
    $categories = get_the_category();
	$category_id = $categories[0]->cat_ID;

    $url = get_site_url().'/wp-json/acf/v3/pages/';
    $url_cate = get_site_url().'/wp-json/acf/v3/categories/'.$category_id;
    $page_json = json_decode(file_get_contents($url.$module_id.'/group_page_field/'));

    // Check sidebar
    $sidebar_cate = json_decode(file_get_contents($url_cate));

    if (in_array('show_module_sidebar', $sidebar_cate->acf->group_admin)):
        $page_json = $sidebar_cate->acf;
    else:
        $page_json = $page_json;
    endif; 
    
    // Process
    foreach($page_json->group_page_field->sidebar_custom as $field): 
        if($field->acf_fc_layout == 'sidebar'): 
            foreach($field->sidebar_sub_fields as $sidebar_data): 

                $name = $sidebar_data->acf_fc_layout;
               
                if(in_array($name,$arrcheck)){
                    $check = 1;
                }else{
                    array_push($arrcheck,$name);
                    $check = 0;
                }
                include(locate_template('template-sidebar/content-'.$name.'.php'));	
            endforeach;
        endif;
    endforeach;
?>
<?php
    $module_id =  get_option('mfpd_option_name');
	$categories = get_the_category();
	$category_id = $categories[0]->cat_ID;
    $sidebar = get_field('group_page_field',$module_id);
    $sidebar_cate = get_field('group_page_field','category_'.$category_id);
    $url = 'https://nhakhoaparis.vn/wp-json/acf/v3';

    $css_inline = '';
    if ($sidebar_cate["sidebar_custom"]):
        $page_json = json_decode(file_get_contents($url.'/categories/'.$category_id));

        foreach($page_json->acf->group_page_field->sidebar_custom as $field):
            if($field->acf_fc_layout == 'sidebar'):
                foreach($field->sidebar_sub_fields as $sidebar_data):
                    $name = $sidebar_data->acf_fc_layout;
                    if(in_array($name,$arrcheck)):
                        $check = 1;
                    else:
                        array_push($arrcheck,$name);
                        $check = 0;
                    endif;                   
                    include(locate_template('template-sidebar_v2/content-'.$name.'.php'));
                endforeach;
            endif;
        endforeach;

    else:
        $page_json = json_decode(file_get_contents($url.'/pages/'.$module_id));

        foreach($page_json->acf->group_page_field->sidebar_custom as $field):
            foreach($field->sidebar_sub_fields as $sidebar_data):
                $name = $sidebar_data->acf_fc_layout;
                if(in_array($name,$arrcheck)):
                    $check = 1;
                else:
                    array_push($arrcheck,$name);
                    $check = 0;
                endif;                   
                include(locate_template('template-sidebar_v2/content-'.$name.'.php'));
            endforeach;
        endforeach;

    endif;
    echo $css_inline;
?>
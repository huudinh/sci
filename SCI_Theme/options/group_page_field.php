<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5e534d93e4dbc',
        'title' => 'Cấu hình Hệ Thống',
        'fields' => array(
            array(
                'key' => 'group_admin_control',
                'label' => '',
                'name' => 'group_admin_control',
                'type' => 'checkbox',            
                'choices' => array(
                    'show' => 'Hiển Thị Module',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'default',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'group_admin',
                'label' => '',
                'name' => 'group_admin',
                'type' => 'checkbox',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'group_admin_control',
                            'operator' => '==',
                            'value' => 'show',
                        ),
                    ),
                ),
                'choices' => array(
                    'show_header_footer' => 'Header/Footer',
                    'show_module_main' => 'Module Main',
                    'show_module_site' => 'Setup Website',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'default',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_5e534e2c90dac',
                'label' => '',
                'name' => 'group_page_field',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'group_admin_control',
                            'operator' => '==',
                            'value' => 'show',
                        ),
                    ),
                ),
                'layout' => 'block',
                'sub_fields' => array(
                    array(      
                        'key' => 'group_page_field_header',
                        'label' => 'Cài đặt Header - Footer',
                        'name' => '',
                        'type' => 'tab',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'group_admin',
                                    'operator' => '==',
                                    'value' => 'show_header_footer',
                                ),
                            ),
                        ),
                        'placement' => 'top',
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'header_custom',
                        'label' => '',
                        'name' => 'header_custom',
                        'type' => 'flexible_content',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'group_admin',
                                    'operator' => '==',
                                    'value' => 'show_header_footer',
                                ),
                            ),
                        ),
                        'layouts' => array(                        
                            'id_header_dls_1_0_0' => array(
                                'key' => 'id_header_dls_1_0_0',
                                'name' => 'header_dls_1_0_0',
                                'label' => 'Header 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'id_header_dls_1_0_0_tab1',
                                        'label' => 'Thông Tin Chung',
                                        'type' => 'tab',
                                    ),
                                    array(
                                        'key' => 'id_header_dls_1_0_0_tab1_sub1',
                                        'name' => 'info',
                                        'type' => 'textarea',
                                        'rows' => 3,
                                    ),
                                    array(
                                        'key' => 'id_header_dls_1_0_0_tab2',
                                        'label' => 'Cài Đặt Menu',
                                        'type' => 'tab',
                                    ),
                                    array(
                                        'key' => 'id_header_dls_1_0_0_sub1',
                                        'label' => 'Menu',
                                        'name' => 'id_header_dls_1_0_0_sub1',
                                        'type' => 'flexible_content',
                                        'layouts' => array(
                                            'id_header_dls_1_0_0_sub1_layout1' => array(
                                                'key' => 'id_header_dls_1_0_0_sub1_layout1',
                                                'name' => 'menu_don',
                                                'label' => 'Menu Đơn',
                                                'display' => 'row',
                                                'sub_fields' => array(
                                                    array(
                                                        'key' => 'id_header_dls_1_0_0_sub1_layout1_sub',
                                                        'label' => 'Tên Menu',
                                                        'name' => 'title',
                                                        'type' => 'textarea',
                                                        'instructions' => 'Tên Menu | Link ',
                                                        'rows' => 2,
                                                    ),
                                                ),
                                            ),
                                            'id_header_dls_1_0_0_sub1_layout2' => array(
                                                'key' => 'id_header_dls_1_0_0_sub1_layout2',
                                                'name' => 'menu_sub',
                                                'label' => 'Menu Sub',
                                                'display' => 'row',
                                                'sub_fields' => array(
                                                    array(
                                                        'key' => 'id_header_dls_1_0_0_sub1_layout2_sub1',
                                                        'label' => 'Menu Cha',
                                                        'name' => 'title',
                                                        'type' => 'textarea',
                                                        'instructions' => 'Tên Menu | Link ',
                                                        'rows' => 2,
                                                    ),
                                                    array(
                                                        'key' => 'id_header_dls_1_0_0_sub1_layout2_sub2',
                                                        'label' => 'Sub Menu',
                                                        'name' => 'col1',
                                                        'type' => 'wysiwyg',
                                                        'instructions' => 'Sử dụng groups UL>LI + Enter để tạo cột',
                                                        'default_value' => '',
                                                        'tabs' => 'all',
                                                        'toolbar' => 'full',
                                                        'media_upload' => 1,
                                                        'delay' => 0,
                                                    ),
                                                ),
                                            ),
                                            'id_header_dls_1_0_0_sub1_layout3' => array(
                                                'key' => 'id_header_dls_1_0_0_sub1_layout3',
                                                'name' => 'menu_sub_full',
                                                'label' => 'Mega Menu',
                                                'display' => 'row',
                                                'sub_fields' => array(
                                                    array(
                                                        'key' => 'id_header_dls_1_0_0_sub1_layout3_sub1',
                                                        'label' => 'Menu cha',
                                                        'name' => 'title',
                                                        'type' => 'textarea',
                                                        'instructions' => '
                                                            Dòng 1 : Tên menu <br>
                                                            Dòng 2 : Link <br>
                                                            Dòng 3 : Số cột <br>
                                                        ',
                                                        'rows' => 3,
                                                    ),
                                                    array(
                                                        'key' => 'id_header_dls_1_0_0_sub1_layout3_sub2',
                                                        'label' => 'Sub Menu',
                                                        'name' => 'col1',
                                                        'type' => 'wysiwyg',
                                                        'instructions' => 'Sử dụng groups UL>LI + Enter để tạo cột',
                                                        'required' => 0,
                                                        'tabs' => 'all',
                                                        'toolbar' => 'full',
                                                        'media_upload' => 1,
                                                        'delay' => 0,
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'button_label' => 'Thêm Menu',
                                    ),
                                ),
                                'min' => '',
                                'max' => '',
                            ),
                            'id_footer_dls_1_0_0' => array(
                                'key' => 'id_footer_dls_1_0_0',
                                'name' => 'footer_dls_1_0_0',
                                'label' => 'Footer 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'id_footer_dls_1_0_0_sub',
                                        'label' => 'Thông Tin',
                                        'name' => 'info',
                                        'type' => 'textarea',
                                        'instructions' => '',
                                        'rows' => 2,
                                    ),
                                ),
                            ),                                                       
                        ),
                        'button_label' => 'Thêm Module',
                        'min' => '',
                        'max' => '',
                    ),
                    array(      
                        'key' => 'group_page_field_body',
                        'label' => 'Cài đặt Module Main',
                        'name' => '',
                        'type' => 'tab',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'group_admin',
                                    'operator' => '==',
                                    'value' => 'show_module_main',
                                ),
                            ),
                        ),
                        'placement' => 'top',
                        'endpoint' => 0,
                    ),
                
                    array(
                        'key' => 'body_custom',
                        'label' => '',
                        'name' => 'body_custom',
                        'type' => 'flexible_content',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'group_admin',
                                    'operator' => '==',
                                    'value' => 'show_module_main',
                                ),
                            ),
                        ),
                        'layouts' => array(
                            'id_slider_dls_1_0_0' => array(
                                'key' => 'id_slider_dls_1_0_0',
                                'name' => 'slider_dls_1_0_0',
                                'label' => 'Slider 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'id_slider_dls_1_0_0_sub1',
                                        'label' => 'Nội dung',
                                        'name' => 'slider',
                                        'type' => 'repeater',
                                        'layout' => 'table',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'id_slider_dls_1_0_0_sub1_sub1',
                                                'label' => 'Tiêu đề',
                                                'name' => 'sliderItemText',
                                                'type' => 'text',
                                            ),
                                            array(
                                                'key' => 'id_slider_dls_1_0_0_sub1_sub2',
                                                'label' => 'Link ảnh (size 1920 x 900)',
                                                'name' => 'sliderItemLink',
                                                'type' => 'text',
                                            ),
                                            array(
                                                'key' => 'id_slider_dls_1_0_0_sub1_sub3',
                                                'label' => 'id Youtube',
                                                'name' => 'sliderItemId',
                                                'type' => 'text',
                                            ),
                                        ),
                                    ),
                                ),
                            ), 
                            'id_about_dls_1_0_0' => array(
                                'key' => 'id_about_dls_1_0_0',
                                'name' => 'about_dls_1_0_0',
                                'label' => 'About 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'id_about_dls_1_0_0_sub1',
                                        'label' => 'Tiêu đề',
                                        'name' => 'about_title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'id_about_dls_1_0_0_sub2',
                                        'label' => 'Nội dung',
                                        'name' => 'about_content',
                                        'type' => 'wysiwyg',
                                    ),
                                ),
                            ), 
                            'id_brand_dls_1_0_0' => array(
                                'key' => 'id_brand_dls_1_0_0',
                                'name' => 'brand_dls_1_0_0',
                                'label' => 'Brand 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
									array(
                                        'key' => 'id_brand_dls_1_0_0_sub1',
                                        'label' => 'Tiêu đề',
                                        'name' => 'brand_title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'id_brand_dls_1_0_0_sub2',
                                        'label' => 'Photo',
                                        'name' => 'slider',
                                        'type' => 'gallery',
                                    ),
                                ),
                            ),
                            'id_project_dls_1_0_0' => array(
                                'key' => 'id_project_dls_1_0_0',
                                'name' => 'project_dls_1_0_0',
                                'label' => 'Project 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'id_project_dls_1_0_0_sub1',
                                        'label' => 'Tiêu đề',
                                        'name' => 'project_title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'id_project_dls_1_0_0_sub2',
                                        'label' => 'Photo',
                                        'name' => 'data',
                                        'type' => 'gallery',
                                    ),
                                ),
                            ),
                            'id_service_dls_1_0_0' => array(
                                'key' => 'id_service_dls_1_0_0',
                                'name' => 'service_dls_1_0_0',
                                'label' => 'Service 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'id_service_dls_1_0_0_sub1',
                                        'label' => 'Tiêu đề',
                                        'name' => 'service_title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'id_service_dls_1_0_0_sub2',
                                        'label' => 'Photo',
                                        'name' => 'data',
                                        'type' => 'gallery',
                                    ),
                                    array(
                                        'key' => 'id_service_dls_1_0_0_sub3',
                                        'label' => 'Nội dung',
                                        'name' => 'service_content',
                                        'type' => 'wysiwyg',
                                    ),
                                ),
                            ),
                            'id_project_dls_1_1_0' => array(
                                'key' => 'id_project_dls_1_1_0',
                                'name' => 'project_dls_1_1_0',
                                'label' => 'Project 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'id_project_dls_1_1_0_sub1',
                                        'label' => 'Nội dung',
                                        'name' => 'project',
                                        'type' => 'repeater',
                                        'layout' => 'block',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'id_project_dls_1_1_0_sub1_sub1',
                                                'label' => 'Tiêu đề',
                                                'name' => 'project_title',
                                                'type' => 'text',
                                            ),
                                            array(
                                                'key' => 'id_project_dls_1_1_0_sub1_sub2',
                                                'label' => 'Mô tả',
                                                'name' => 'project_content',
                                                'type' => 'textarea',
                                                'rows' => 3,
                                            ),
                                            array(
                                                'key' => 'id_project_dls_1_1_0_sub1_sub3',
                                                'label' => 'Photo',
                                                'name' => 'project_photo',
                                                'type' => 'gallery',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'button_label' => 'Thêm Module',
                        'min' => '',
                        'max' => '',
                    ),
                          
                    array(      
                        'key' => 'group_page_field_site',
                        'label' => 'Cài đặt Website',
                        'name' => '',
                        'type' => 'tab',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'group_admin',
                                    'operator' => '==',
                                    'value' => 'show_module_site',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'placement' => 'top',
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'site_custom',
                        'label' => '',
                        'name' => 'site_custom',
                        'type' => 'flexible_content',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'group_admin',
                                    'operator' => '==',
                                    'value' => 'show_module_site',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layouts' => array(
                            'id_sidebar_dls_1_0_0' => array(
                                'key' => 'id_sidebar_dls_1_0_0',
                                'name' => 'sidebar_dls_1_0_0',
                                'label' => 'Sidebar 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'id_sidebar_dls_1_0_0_sub1',
                                        'label' => 'Tiêu đề',
                                        'name' => 'sidebar_title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'id_sidebar_dls_1_0_0_sub2',
                                        'label' => 'Danh sách sản phẩm',
                                        'name' => 'sidebar_content',
                                        'type' => 'wysiwyg',
                                    ),
                                ),
                            ),
                        ),
                        'button_label' => 'Thêm Module',
                        'min' => '',
                        'max' => '',
                    ),                     
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-cau-hinh-website',
                ),
            ),
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'category',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;
?>
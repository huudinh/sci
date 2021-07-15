<?php

// Group field
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
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
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
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'show_header_footer' => 'Header/Footer',
                    'show_module_main' => 'Module Main',
                    'show_module_sidebar' => 'Sidebar',
                    'show_module_site' => 'WebSite',
                    'show_module_landing' => 'Landing',
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
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
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
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'placement' => 'top',
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'header_custom',
                        'label' => '',
                        'name' => 'header_custom',
                        'type' => 'flexible_content',
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
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layouts' => array(
                        // Bat dau Module

                            /*HEADER*/
                            'header' => array(
                                'key' => 'header',
                                'name' => 'header',
                                'label' => 'Header Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'header_sub_fields',
                                        'label' => '',
                                        'name' => 'header_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                        // Bat dau Module


                                        // End Module
                                        ),
                                        'button_label' => 'Thêm Header',
                                        'min' => '',
                                        'max' => '1',
                                    ),                     
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END HEADER*/ 

                            /*FOOTER*/
                            'footers' => array(
                                'key' => 'footers',
                                'name' => 'footers',
                                'label' => 'Footers Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'footers_sub_fields',
                                        'label' => '',
                                        'name' => 'footers_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            /*FOOTER 2.1.0*/
                                            'id_footer_ld_2_1_0' => array(
                                                'key' => 'id_footer_ld_2_1_0',
                                                'name' => 'footer_ld_2_1_0',
                                                'label' => 'Footer LD 2.1.0',
                                                'display' => 'block',
                                                'sub_fields' => array(
                                                    /* Code */
                                                    array(
                                                        'key' => 'id_footer_ld_2_1_0_sub',
                                                        'label' => 'Thông Tin',
                                                        'name' => 'info',
                                                        'type' => 'textarea',
                                                        'instructions' => '',
                                                        'required' => 0,
                                                        'conditional_logic' => 0,
                                                        'wrapper' => array(
                                                            'width' => '',
                                                            'class' => '',
                                                            'id' => '',
                                                        ),
                                                        'default_value' => '',
                                                        'placeholder' => '',
                                                        'maxlength' => '',
                                                        'rows' => 4,
                                                        'new_lines' => '',
                                                    ),
                                                    /* End Code */
                                                ),
                                                'min' => '',
                                                'max' => '',
                                            ),
                                            /*END FOOTER LD 2.1.0*/   
                                            
                                            /*Regist_FT 1.0.0*/
                                            'id_regist_ft_1_0_0' => array(
                                                'key' => 'id_regist_ft_1_0_0',
                                                'name' => 'regist_ft_1_0_0',
                                                'label' => 'Regist_FT 1.0.0',
                                                'display' => 'block',
                                                'sub_fields' => array(
                                                    /*Bắt đầu field*/
                                                    array(
                                                        'key' => 'id_regist_ft_1_0_0_sub1',
                                                        'label' => 'Code HTML',
                                                        'name' => 'info',
                                                        'type' => 'textarea',
                                                        'instructions' => '',
                                                        'required' => 0,
                                                        'conditional_logic' => 0,
                                                        'wrapper' => array(
                                                            'width' => '',
                                                            'class' => '',
                                                            'id' => '',
                                                        ),
                                                        'default_value' => $html_id_regist_ft_1_0_0,
                                                        'placeholder' => '',
                                                        'maxlength' => '',
                                                        'rows' => 15,
                                                        'new_lines' => '',
                                                    ),

                                                
                                                    /*End field*/
                                                ),
                                                'min' => '',
                                                'max' => '',
                                            ),
                                            /*END Regist_FT 1.0.0*/

                                           

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Footer',
                                        'min' => '',
                                        'max' => '2',
                                    ),                     
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END FOOTER*/ 
                        
                        // End Module                                    
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
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
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
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layouts' => array(
                        // Bat dau Module
                           
                            /*SLIDER*/
                            'slider' => array(
                                'key' => 'slider',
                                'name' => 'slider',
                                'label' => 'Slider Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'slider_sub_fields',
                                        'label' => '',
                                        'name' => 'slider_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Slider',
                                        'min' => '',
                                        'max' => '',
                                    ),                     
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END SLIDER*/ 
                            
                            /*SERVICE*/
                            'service' => array(
                                'key' => 'service',
                                'name' => 'service',
                                'label' => 'Service Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    /*Bắt đầu field*/
                                    array(
                                        'key' => 'service_sub_fields',
                                        'label' => '',
                                        'name' => 'service_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Service',
                                        'min' => '',
                                        'max' => '',
                                    ),
                                    /*End field*/
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END SERVICE*/                                     

                            /*BASIS*/
                            'basis' => array(
                                'key' => 'basis',
                                'name' => 'basis',
                                'label' => 'Basis Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    /*Bắt đầu field*/
                                    array(
                                        'key' => 'basis_sub_fields',
                                        'label' => '',
                                        'name' => 'basis_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Basis',
                                        'min' => '',
                                        'max' => '',
                                    ),
                                    /*End field*/
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END BASIS*/   

                            /*DOCTOR*/
                            'doctor' => array(
                                'key' => 'doctor',
                                'name' => 'doctor',
                                'label' => 'Doctor Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    /*Bắt đầu field*/
                                    array(
                                        'key' => 'doctor_sub_fields',
                                        'label' => '',
                                        'name' => 'doctor_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Doctor',
                                        'min' => '',
                                        'max' => '',
                                    ),
                                    /*End field*/
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END DOCTOR*/  

                            /*COMMIT*/
                            'commit' => array(
                                'key' => 'commit',
                                'name' => 'commit',
                                'label' => 'Commit Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    /*Bắt đầu field*/
                                    array(
                                        'key' => 'commit_sub_fields',
                                        'label' => '',
                                        'name' => 'commit_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Commit',
                                        'min' => '',
                                        'max' => '',
                                    ),
                                    /*End field*/
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END COMMIT*/   

                            /*PERSON*/
                            'person' => array(
                                'key' => 'person',
                                'name' => 'person',
                                'label' => 'Person Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    /*Bắt đầu field*/
                                    array(
                                        'key' => 'person_sub_fields',
                                        'label' => '',
                                        'name' => 'person_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Person',
                                        'min' => '',
                                        'max' => '',
                                    ),
                                    /*End field*/
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END PERSON*/ 

                            /*INFO*/
                            'info' => array(
                                'key' => 'info',
                                'name' => 'info',
                                'label' => 'Info Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    /*Bắt đầu field*/
                                    array(
                                        'key' => 'info_sub_fields',
                                        'label' => '',
                                        'name' => 'info_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Info',
                                        'min' => '',
                                        'max' => '',
                                    ),
                                    /*End field*/
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END INFO*/     

                            /*NEWS*/
                            'news' => array(
                                'key' => 'news',
                                'name' => 'news',
                                'label' => 'News Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    /*Bắt đầu field*/
                                    array(
                                        'key' => 'news_sub_fields',
                                        'label' => '',
                                        'name' => 'news_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                        // Bat dau Module


                                        // End Module
                                        ),
                                        'button_label' => 'Thêm News',
                                        'min' => '',
                                        'max' => '',
                                    ),
                                    /*End field*/
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END NEWS*/

                            /*PARTNER*/
                            'partner' => array(
                                'key' => 'partner',
                                'name' => 'partner',
                                'label' => 'Partner Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    /*Bắt đầu field*/
                                    array(
                                        'key' => 'partner_sub_fields',
                                        'label' => '',
                                        'name' => 'partner_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Partner',
                                        'min' => '',
                                        'max' => '',
                                    ),
                                    /*End field*/
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END PARTNER*/  

                            /*REGIST*/
                            'regist' => array(
                                'key' => 'regist',
                                'name' => 'regist',
                                'label' => 'Regist Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    /*Bắt đầu field*/
                                    array(
                                        'key' => 'regist_sub_fields',
                                        'label' => '',
                                        'name' => 'regist_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Regist',
                                        'min' => '',
                                        'max' => '',
                                    ),
                                    /*End field*/
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END REGIST*/                                     
                        
                        
                        // End Module                                    
                        ),
                        'button_label' => 'Thêm Module',
                        'min' => '',
                        'max' => '',
                    ),
                      
                    array(      
                        'key' => 'group_page_field_sidebar',
                        'label' => 'Cài đặt Sidebar',
                        'name' => '',
                        'type' => 'tab',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'group_admin',
                                    'operator' => '==',
                                    'value' => 'show_module_sidebar',
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
                        'key' => 'sidebar_custom',
                        'label' => '',
                        'name' => 'sidebar_custom',
                        'type' => 'flexible_content',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'group_admin',
                                    'operator' => '==',
                                    'value' => 'show_module_sidebar',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layouts' => array(
                        // Bat dau Module

                            /*SIDEBAR*/
                            'sidebar' => array(
                                'key' => 'sidebar',
                                'name' => 'sidebar',
                                'label' => 'Sidebar Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'sidebar_sub_fields',
                                        'label' => '',
                                        'name' => 'sidebar_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

                                            /*SIDEBAR 2.1.0*/
                                            'id_sidebar_2_1_0' => array(
                                                'key' => 'id_sidebar_2_1_0',
                                                'name' => 'sidebar_2_1_0',
                                                'label' => 'Sidebar 2.1.0',
                                                'display' => 'block',
                                                'sub_fields' => array(
                                                    /*Bắt đầu field*/
                                                    array(
                                                        'key' => 'id_sidebar_2_1_0_sub',
                                                        'label' => 'Sidebar',
                                                        'name' => 'sidebar',
                                                        'type' => 'flexible_content',
                                                        'instructions' => '',
                                                        'required' => 0,
                                                        'conditional_logic' => 0,
                                                        'wrapper' => array(
                                                            'width' => '',
                                                            'class' => '',
                                                            'id' => '',
                                                        ),
                                                        'layouts' => array(
                                                            'id_sidebar_2_1_0_sub_layout1' => array(
                                                                'key' => 'id_sidebar_2_1_0_sub_layout1',
                                                                'name' => 'sidebar_title',
                                                                'label' => 'Tiêu Đề SideBar',
                                                                'display' => 'block',
                                                                'sub_fields' => array(
                                                                    array(
                                                                        'key' => 'id_sidebar_2_1_0_sub_layout1_sub1',
                                                                        'label' => 'Tiêu đề chuyên mục',
                                                                        'name' => 'title',
                                                                        'type' => 'textarea',
                                                                        'instructions' => '
                                                                            Dòng 1: Tên tiêu đề chuyên mục <br>
                                                                            Dòng 2: Thêm "none" để sticky tiêu đề ( chỉ bổ sung phần tin tức)
                                                                        ',
                                                                        'required' => 0,
                                                                        'conditional_logic' => 0,
                                                                        'wrapper' => array(
                                                                            'width' => '',
                                                                            'class' => '',
                                                                            'id' => '',
                                                                        ),
                                                                        'default_value' => '',
                                                                        'placeholder' => '',
                                                                        'prepend' => '',
                                                                        'append' => '',
                                                                        'maxlength' => '',
                                                                        'rows' => 2,
                                                                    ),
                                                                ),
                                                                'min' => '',
                                                                'max' => '',
                                                            ),
                                                            'id_sidebar_2_1_0_sub_layout2' => array(
                                                                'key' => 'id_sidebar_2_1_0_sub_layout2',
                                                                'name' => 'sidebar_sv',
                                                                'label' => 'Dịch Vụ',
                                                                'display' => 'block',
                                                                'sub_fields' => array(
                                                                    array(
                                                                        'key' => 'id_sidebar_2_1_0_sub_layout2_sub',
                                                                        'label' => 'Danh Sách DV',
                                                                        'name' => 'content',
                                                                        'type' => 'wysiwyg',
                                                                        'instructions' => '',
                                                                        'required' => 0,
                                                                        'conditional_logic' => 0,
                                                                        'wrapper' => array(
                                                                            'width' => '',
                                                                            'class' => '',
                                                                            'id' => '',
                                                                        ),
                                                                        'default_value' => '',
                                                                        'tabs' => 'all',
                                                                        'toolbar' => 'full',
                                                                        'media_upload' => 1,
                                                                        'delay' => 0,
                                                                    ),
                                                                ),
                                                                'min' => '',
                                                                'max' => '',
                                                            ),
                                                            'id_sidebar_2_1_0_sub_layout3' => array(
                                                                'key' => 'id_sidebar_2_1_0_sub_layout3',
                                                                'name' => 'sidebar_new',
                                                                'label' => 'Tin tức',
                                                                'display' => 'block',
                                                                'sub_fields' => array(
                                                                    array(
                                                                        'key' => 'id_sidebar_2_1_0_sub_layout3_sub',
                                                                        'label' => 'Tin Được Xem Nhiều',
                                                                        'name' => 'content',
                                                                        'type' => 'relationship',
                                                                        'instructions' => '',
                                                                        'required' => 0,
                                                                        'conditional_logic' => 0,
                                                                        'wrapper' => array(
                                                                            'width' => '',
                                                                            'class' => '',
                                                                            'id' => '',
                                                                        ),
                                                                        'post_type' => '',
                                                                        'taxonomy' => '',
                                                                        'filters' => array(
                                                                            0 => 'search',
                                                                            1 => 'post_type',
                                                                            2 => 'taxonomy',
                                                                        ),
                                                                        'elements' => '',
                                                                        'min' => '',
                                                                        'max' => '',
                                                                        'return_format' => 'object',
                                                                    ),
                                                                ),
                                                                'min' => '',
                                                                'max' => '',
                                                            ),
                                                            'id_sidebar_2_1_0_sub_layout4' => array(
                                                                'key' => 'id_sidebar_2_1_0_sub_layout4',
                                                                'name' => 'sidebar_img',
                                                                'label' => 'Hình Ảnh Trước Sau',
                                                                'display' => 'block',
                                                                'sub_fields' => array(
                                                                    array(
                                                                        'key' => 'id_sidebar_2_1_0_sub_layout4_sub1',
                                                                        'label' => 'Nội dung',
                                                                        'name' => 'sidebar_sub',
                                                                        'type' => 'repeater',
                                                                        'instructions' => '',
                                                                        'required' => 0,
                                                                        'conditional_logic' => 0,
                                                                        'wrapper' => array(
                                                                            'width' => '',
                                                                            'class' => '',
                                                                            'id' => '',
                                                                        ),
                                                                        'hide_admin' => 0,
                                                                        'collapsed' => '',
                                                                        'min' => 0,
                                                                        'max' => 0,
                                                                        'layout' => 'table',
                                                                        'button_label' => '',
                                                                        'sub_fields' => array(
                                                                            array(
                                                                                'key' => 'id_sidebar_2_1_0_sub_layout4_sub1_sub1',
                                                                                'label' => 'Link ảnh khách hàng',
                                                                                'name' => 'sidebar_pic',
                                                                                'type' => 'text',
                                                                                'instructions' => '
                                                                                
                                                                                ',
                                                                                'required' => 0,
                                                                                'conditional_logic' => 0,
                                                                                'wrapper' => array(
                                                                                    'width' => '',
                                                                                    'class' => '',
                                                                                    'id' => '',
                                                                                ),
                                                                                'hide_admin' => 0,
                                                                                'default_value' => '',
                                                                                'placeholder' => '',
                                                                                'prepend' => '',
                                                                                'append' => '',
                                                                                'maxlength' => '',
                                                                            ),
                                                                            array(
                                                                                'key' => 'id_sidebar_2_1_0_sub_layout4_sub1_sub2',
                                                                                'label' => 'Thông tin khách hàng',
                                                                                'name' => 'sidebar_info',
                                                                                'type' => 'textarea',
                                                                                'instructions' => '
                                                                                    Dòng 1: Tên khách hàng <br>
                                                                                    Dòng 2: Dịch vụ khách hàng sử dụng
                                                                                ',
                                                                                'required' => 0,
                                                                                'conditional_logic' => 0,
                                                                                'wrapper' => array(
                                                                                    'width' => '',
                                                                                    'class' => '',
                                                                                    'id' => '',
                                                                                ),
                                                                                'hide_admin' => 0,
                                                                                'default_value' => '',
                                                                                'placeholder' => '',
                                                                                'prepend' => '',
                                                                                'append' => '',
                                                                                'maxlength' => '',
                                                                                'rows' => 2,
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                                'min' => '',
                                                                'max' => '',
                                                            ),
                                                            'id_sidebar_2_1_0_sub_layout5' => array(
                                                                'key' => 'id_sidebar_2_1_0_sub_layout5',
                                                                'name' => 'sidebar_banner',
                                                                'label' => 'Chương trình ưu đãi',
                                                                'display' => 'block',
                                                                'sub_fields' => array(
                                                                    array(
                                                                        'key' => 'id_sidebar_2_1_0_sub_layout5_sub1',
                                                                        'label' => 'Thông tin',
                                                                        'name' => 'sb_banner',
                                                                        'type' => 'textarea',
                                                                        'instructions' => '
                                                                            Dòng 1: Link ảnh <br>
                                                                            Dòng 2: Link liên kết <br>
                                                                            Dòng 3: Mô tả ngắn
                                                                        ',
                                                                        'required' => 0,
                                                                        'conditional_logic' => 0,
                                                                        'wrapper' => array(
                                                                            'width' => '',
                                                                            'class' => '',
                                                                            'id' => '',
                                                                        ),
                                                                        'default_value' => '',
                                                                        'placeholder' => '',
                                                                        'prepend' => '',
                                                                        'append' => '',
                                                                        'maxlength' => '',
                                                                        'rows' => 3,
                                                                    ),
                                                                ),
                                                                'min' => '',
                                                                'max' => '',
                                                            ),
                                                        ),
                                                        'button_label' => 'Add Row',
                                                        'min' => '',
                                                        'max' => '',
                                                    ),
                                                    /*End field*/
                                                ),
                                                'min' => '',
                                                'max' => '',
                                            ),
                                            /*END SIDEBAR 2.1.0*/       


                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Sidebar',
                                        'min' => '',
                                        'max' => '1',
                                    ),                     
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END SIDEBAR*/ 

                        
                        
                        // End Module                                    
                        ),
                        'button_label' => 'Thêm Module',
                        'min' => '',
                        'max' => '',
                    ),
                               
                    

                    array(      
                        'key' => 'group_page_field_landing',
                        'label' => 'Cài đặt Landing',
                        'name' => '',
                        'type' => 'tab',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'group_admin',
                                    'operator' => '==',
                                    'value' => 'show_module_landing',
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
                        'key' => 'landing_custom',
                        'label' => '',
                        'name' => 'landing_custom',
                        'type' => 'flexible_content',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'group_admin',
                                    'operator' => '==',
                                    'value' => 'show_module_landing',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layouts' => array(
                        // Bat dau Module
                            
 
                        
                        // End Module                                    
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
                        // Bat dau Module

                            /*CHECKING*/
                            'checking' => array(
                                'key' => 'checking',
                                'name' => 'checking',
                                'label' => 'Checking Module',
                                'display' => 'block',
                                'sub_fields' => array(
                                    
                                    array(
                                        'key' => 'checking_sub_fields',
                                        'label' => '',
                                        'name' => 'checking_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module                                          

                                            /*CHECKING LANDING 1.0.0*/
                                            'id_checking_ld_1_0_0' => array(
                                                'key' => 'id_checking_ld_1_0_0',
                                                'name' => 'checking_ld_1_0_0',
                                                'label' => 'Checking Landing 1.0.0',
                                                'display' => 'block',
                                                'sub_fields' => array(
                                                    /*Bắt đầu field*/
                                                    array(
                                                        /* Tab tiêu đề*/
                                                        'key' => 'id_checking_ld_1_0_tab1',
                                                        'label' => 'Tiêu Đề',
                                                        'name' => '',
                                                        'type' => 'tab',
                                                        'instructions' => '',
                                                        'required' => 0,
                                                        'conditional_logic' => 0,
                                                        'wrapper' => array(
                                                            'width' => '',
                                                            'class' => '',
                                                            'id' => '',
                                                        ),
                                                        'placement' => 'top',
                                                        'endpoint' => 0,
                                                    ),
                                                    array(
                                                        'key' => 'id_checking_ld_1_0_tab1_sub',
                                                        'label' => 'Code',
                                                        'name' => 'data',
                                                        'type' => 'textarea',
                                                        'instructions' => '',
                                                        'required' => 0,
                                                        'conditional_logic' => 0,
                                                        'wrapper' => array(
                                                            'width' => '',
                                                            'class' => '',
                                                            'id' => '',
                                                        ),
                                                        'default_value' => '',
                                                        'placeholder' => '',
                                                        'maxlength' => '',
                                                        'rows' => 10,
                                                        'new_lines' => '',
                                                    ),
                                                    /*End field*/
                                                ),
                                                'min' => '',
                                                'max' => '',
                                            ),
                                            /*END CHECKING LANDING 1.0.0*/

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Module',
                                        'min' => '',
                                        'max' => '',
                                    ),                     
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END CHECKING*/    
                        
                        // End Module                                    
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